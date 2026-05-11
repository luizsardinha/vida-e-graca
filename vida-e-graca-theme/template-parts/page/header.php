<?php
/**
 * Template Part: Page Header
 * Breadcrumb + Título da Página
 * Diferenças vs Single Post: sem categoria, sem reading time, sem share buttons.
 */
?>

<!-- Breadcrumb (SEO + UX) -->
<nav aria-label="<?php esc_attr_e('Breadcrumb', 'vida-e-graca'); ?>" class="max-w-5xl mx-auto px-4 sm:px-8 mb-8">
    <ol class="flex flex-wrap items-center text-[11px] text-stone-400 dark:text-stone-500" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url( home_url('/') ); ?>" itemprop="item" class="hover:text-stone-700 dark:hover:text-stone-200 transition-colors">
                <span itemprop="name"><?php _e('Home', 'vida-e-graca'); ?></span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <?php if ( wp_get_post_parent_id( get_the_ID() ) ) : 
            $parent = get_post( wp_get_post_parent_id( get_the_ID() ) );
        ?>
        <li class="mx-1.5 text-stone-300 dark:text-stone-600" aria-hidden="true">/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url( get_permalink( $parent ) ); ?>" itemprop="item" class="hover:text-stone-700 dark:hover:text-stone-200 transition-colors">
                <span itemprop="name"><?php echo esc_html( $parent->post_title ); ?></span>
            </a>
            <meta itemprop="position" content="2" />
        </li>
        <?php endif; ?>
        <li class="mx-1.5 text-stone-300 dark:text-stone-600" aria-hidden="true">/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="text-stone-600 dark:text-stone-300">
            <span itemprop="name"><?php the_title(); ?></span>
            <meta itemprop="position" content="<?php echo wp_get_post_parent_id( get_the_ID() ) ? '3' : '2'; ?>" />
        </li>
    </ol>
</nav>

<!-- Header da Página -->
<header class="max-w-5xl mx-auto px-4 sm:px-8 mb-10 text-center">
    <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-medium text-stone-900 dark:text-stone-100 leading-tight">
        <?php the_title(); ?>
    </h1>

    <?php if ( has_excerpt() ) : ?>
    <p class="mt-5 text-lg text-stone-500 dark:text-stone-400 max-w-2xl mx-auto leading-relaxed">
        <?php echo esc_html( get_the_excerpt() ); ?>
    </p>
    <?php endif; ?>
</header>
