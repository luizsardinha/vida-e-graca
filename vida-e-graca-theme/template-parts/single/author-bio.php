<?php
/**
 * Template Part: Author Bio (E-E-A-T Expandida)
 * Card com avatar, nome, data, bio e link para arquivo do autor.
 */
?>

<div class="flex flex-col sm:flex-row items-center sm:items-start gap-5 mb-10 p-6 bg-stone-50 dark:bg-stone-950/50 rounded-md">
    <!-- Avatar -->
    <div class="w-14 h-14 rounded-full overflow-hidden bg-stone-200 dark:bg-stone-800 flex-shrink-0 ring-2 ring-stone-100 dark:ring-stone-800">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 56 ); ?>
    </div>
    
    <!-- Info -->
    <div class="flex-1 text-center sm:text-left space-y-2">
        <div>
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>" class="font-medium text-sm text-stone-900 dark:text-stone-100 hover:text-amber-600 dark:hover:text-amber-500 transition-colors">
                <?php echo esc_html( get_the_author() ); ?>
            </a>
            <span class="text-stone-300 dark:text-stone-700 mx-2">·</span>
            <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>" class="text-xs text-stone-500 dark:text-stone-400">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
        </div>
        
        <?php if ( get_the_author_meta( 'description' ) ) : ?>
            <p class="text-xs text-stone-600 dark:text-stone-400 leading-relaxed">
                <?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?>
            </p>
        <?php endif; ?>
        
        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>" class="inline-flex items-center gap-1 text-[11px] text-amber-600 dark:text-amber-500 hover:text-amber-700 font-semibold uppercase tracking-widest transition-colors">
            <?php _e('Ver todos os artigos', 'vida-e-graca'); ?>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
</div>
