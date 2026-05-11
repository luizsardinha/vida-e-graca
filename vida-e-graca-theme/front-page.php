<?php get_header(); ?>

<?php
$header_image = get_header_image();
$has_hero_image = ! empty( $header_image );
?>

<?php if ( $has_hero_image ) : ?>
<!-- Hero com imagem de fundo -->
<section class="relative min-h-[85vh] sm:min-h-[95vh] flex items-end overflow-hidden">
    <img src="<?php echo esc_url( $header_image ); ?>" alt="<?php bloginfo('name'); ?>" class="absolute inset-0 w-full h-full object-cover" loading="eager" fetchpriority="high" />
    <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-stone-900/30 to-transparent"></div>
    <div class="relative z-10 max-w-5xl w-full mx-auto px-4 sm:px-8 pb-12 sm:pb-16 space-y-5">
        <p class="text-xs uppercase tracking-widest text-stone-300 font-medium">
            <?php bloginfo( 'description' ); ?>
        </p>
        <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl font-medium text-white leading-tight max-w-2xl">
            Fé, propósito e o <span class="italic text-stone-300">cotidiano real</span>.
        </h1>
        <p class="text-base sm:text-lg text-stone-300 max-w-xl font-light leading-relaxed">
            Vivendo com propósito. Uma revista que conecta espiritualidade à vida prática, de forma relevante, sensível e atual.
        </p>
        <?php /* CTA ocultado temporariamente
        <div class="pt-2">
            <a href="#assinar" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-stone-900 font-semibold text-sm rounded-sm hover:bg-stone-100 transition-colors">
                <?php _e('Seja o primeiro a ler', 'vida-e-graca'); ?>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </div>
        */ ?>
    </div>
</section>

<?php else : ?>
<!-- Hero sem imagem (fallback) -->
<section class="py-20 sm:py-28 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 bg-white dark:bg-stone-900">
    <div class="max-w-3xl mx-auto text-center space-y-8">
        <p class="text-sm uppercase tracking-widest text-stone-500 dark:text-stone-400 font-medium">
            <?php bloginfo( 'description' ); ?>
        </p>
        <h1 class="serif text-4xl sm:text-5xl md:text-6xl font-medium text-stone-900 dark:text-stone-100 leading-tight">
            Fé, propósito e o <span class="italic text-stone-700 dark:text-stone-400">cotidiano real</span>.
        </h1>
        <p class="text-lg sm:text-xl text-stone-600 dark:text-stone-400 max-w-2xl mx-auto font-light leading-relaxed">
            Vivendo com propósito. Uma revista que conecta espiritualidade à vida prática, de forma relevante, sensível e atual.
        </p>
        <?php /* CTA ocultado temporariamente
        <div class="pt-4">
            <a href="#assinar" class="btn-primary">
                <?php _e('Seja o primeiro a ler', 'vida-e-graca'); ?>
            </a>
        </div>
        */ ?>
    </div>
</section>
<?php endif; ?>

<!-- Últimas Notícias / Feed Editorial -->
<section id="conteudo" class="py-16 sm:py-24 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 bg-stone-50 dark:bg-stone-950">
    <div class="max-w-6xl mx-auto space-y-12">
        <div class="text-center space-y-4">
            <h2 class="serif text-3xl font-medium text-stone-900 dark:text-stone-100"><?php _e('Em nossas páginas', 'vida-e-graca'); ?></h2>
            <p class="text-lg text-stone-600 dark:text-stone-400 font-light"><?php _e('Insights e reflexões para a sua jornada.', 'vida-e-graca'); ?></p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-12">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'article' );
                endwhile;
            else :
                ?>
                <p class="text-center col-span-full"><?php _e('Nenhum artigo encontrado.', 'vida-e-graca'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
