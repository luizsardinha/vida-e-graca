<?php
/**
 * Template part for displaying posts in archive and front-page loops
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('space-y-4 group'); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="aspect-[4/3] bg-stone-100 dark:bg-stone-800 rounded-sm overflow-hidden relative">
            <?php the_post_thumbnail('medium_large', array('class' => 'object-cover w-full h-full transition-transform duration-500 group-hover:scale-105')); ?>
            <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                <span class="text-white text-xs font-medium uppercase tracking-widest">
                    <?php the_category(', '); ?>
                </span>
            </div>
        </div>
    <?php endif; ?>
    <h3 class="serif text-xl font-medium text-stone-900 dark:text-stone-100 hover:text-stone-600 dark:hover:text-stone-300 transition-colors">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>
    <p class="text-sm text-stone-600 dark:text-stone-400 leading-relaxed line-clamp-3">
        <?php echo wp_kses_post( get_the_excerpt() ); ?>
    </p>
</article>
