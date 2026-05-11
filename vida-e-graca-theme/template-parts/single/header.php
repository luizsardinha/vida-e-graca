<?php
/**
 * Template Part: Single Post Header
 * Breadcrumb + Categoria + Título + Meta + Share
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
        <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) :
            $cat = $categories[0];
        ?>
        <li class="mx-1.5 text-stone-300 dark:text-stone-600" aria-hidden="true">/</li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" itemprop="item" class="hover:text-stone-700 dark:hover:text-stone-200 transition-colors">
                <span itemprop="name"><?php echo esc_html( $cat->name ); ?></span>
            </a>
            <meta itemprop="position" content="2" />
        </li>
        <?php endif; ?>
    </ol>
</nav>

<header class="max-w-5xl mx-auto px-4 sm:px-8 mb-10 text-center">
    <!-- Categoria -->
    <div class="mb-4">
        <span class="inline-block text-amber-600 dark:text-amber-500 text-[11px] font-bold uppercase tracking-[0.15em]">
            <?php
            if ( ! empty( $categories ) ) {
                echo esc_html( $categories[0]->name );
            }
            ?>
        </span>
    </div>

    <!-- Título -->
    <h1 class="font-serif text-2xl sm:text-3xl md:text-4xl font-medium text-stone-900 dark:text-stone-100 leading-tight mb-5">
        <?php the_title(); ?>
    </h1>
    
    <!-- Meta compacto: tempo + share -->
    <?php
    $share_url = urlencode( get_permalink() );
    $share_title = urlencode( get_the_title() );
    ?>
    <div class="flex items-center justify-center text-stone-400 dark:text-stone-500 text-xs">
        <span class="italic"><?php echo esc_html( vida_e_graca_reading_time() ); ?></span>
        <span class="mx-3 text-stone-200 dark:text-stone-700">|</span>
        <div class="flex items-center gap-2">
            <a href="https://api.whatsapp.com/send?text=<?php echo $share_title; ?>%20<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="text-stone-400 hover:text-green-500 transition-colors" aria-label="WhatsApp">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 21.841c-1.6 0-3.167-.43-4.538-1.246l-.326-.193-3.37.883.905-3.284-.213-.34A9.85 9.85 0 0 1 2.152 12C2.152 6.57 6.574 2.152 12 2.152S21.848 6.57 21.848 12 17.426 21.841 12 21.841z"></path></svg>
            </a>
            <a href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="text-stone-400 hover:text-stone-900 dark:hover:text-stone-100 transition-colors" aria-label="X (Twitter)">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="text-stone-400 hover:text-blue-600 transition-colors" aria-label="Facebook">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"></path></svg>
            </a>
        </div>
    </div>
</header>
