<?php
/**
 * Funções e definições do tema Vida & Graça
 */

if ( ! function_exists( 'vida_e_graca_setup' ) ) :
    function vida_e_graca_setup() {
        // Suporte a título dinâmico
        add_theme_support( 'title-tag' );

        // Suporte a imagens destacadas
        add_theme_support( 'post-thumbnails' );

        // Registro de menus
        register_nav_menus( array(
            'primary'            => __( 'Menu Principal', 'vida-e-graca' ),
            'footer'             => __( 'Rodapé — Editorias', 'vida-e-graca' ),
            'footer_about'       => __( 'Rodapé — A Revista', 'vida-e-graca' ),
            'footer_publications'=> __( 'Rodapé — Publicações', 'vida-e-graca' ),
            'footer_legal'       => __( 'Rodapé — Links Legais', 'vida-e-graca' ),
        ) );

        // Suporte a formatos de post (útil para revista)
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );

        // Suporte a estilos do editor (Gutenberg)
        add_theme_support( 'editor-styles' );
        add_editor_style( 'assets/css/main.css' );

        // Suporte a widgets responsivos
        add_theme_support( 'responsive-embeds' );

        // Suporte a imagem do hero (Aparência > Cabeçalho)
        add_theme_support( 'custom-header', array(
            'default-image'      => '',
            'width'              => 1920,
            'height'             => 800,
            'flex-width'         => true,
            'flex-height'        => true,
            'header-text'        => false,
            'video'              => false,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'vida_e_graca_setup' );

/**
 * Define a largura do conteúdo baseado no design do tema.
 */
function vida_e_graca_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'vida_e_graca_content_width', 750 );
}
add_action( 'after_setup_theme', 'vida_e_graca_content_width', 0 );

/**
 * Enfileirar scripts e estilos
 */
function vida_e_graca_scripts() {
    // Estilo compilado do Tailwind (será gerado na fase de build)
    wp_enqueue_style( 'vida-e-graca-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0' );
    
    // Swup.js para transições em estilo App (Core) — self-hosted
    wp_enqueue_script( 'swup-core', get_template_directory_uri() . '/assets/js/vendor/swup.min.js', array(), '4.8.1', true );

    // Scripts globais (dark mode, sticky header, swup init)
    wp_enqueue_script( 
        'vida-e-graca-global', 
        get_template_directory_uri() . '/assets/js/global.js', 
        array('swup-core'), 
        '1.0.0', 
        array('strategy' => 'defer', 'in_footer' => true) 
    );

    // Scripts exclusivos de artigos (progress bar, TOC, highlight-to-share)
    if ( is_single() ) {
        wp_enqueue_script( 
            'vida-e-graca-single', 
            get_template_directory_uri() . '/assets/js/single-post.js', 
            array('vida-e-graca-global'), 
            '1.0.0', 
            array('strategy' => 'defer', 'in_footer' => true) 
        );
    }
}
add_action( 'wp_enqueue_scripts', 'vida_e_graca_scripts' );

/**
 * Registro de Custom Post Types
 */
function vida_e_graca_register_cpts() {
    // CPT Edições
    register_post_type( 'magazine_issue', array(
        'labels' => array(
            'name' => __( 'Edições', 'vida-e-graca' ),
            'singular_name' => __( 'Edição', 'vida-e-graca' ),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite' => array( 'slug' => 'edicoes' ),
    ));
}
add_action( 'init', 'vida_e_graca_register_cpts' );

/**
 * Custom Walker para menus com classes Tailwind
 */
class Vida_E_Graca_Menu_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        
        $output .= '<a href="' . $item->url . '" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors ' . $class_names . '">';
        $output .= $item->title;
        $output .= '</a>';
    }
}

/**
 * Autocreation of editorial categories
 * Executa apenas na primeira carga para garantir que a estrutura esteja lá.
 */
function vida_e_graca_ensure_categories() {
    $categories = array(
        'Fé & Cotidiano' => 'fe-e-cotidiano',
        'Cultura & Arte' => 'cultura-e-arte',
        'Histórias Reais' => 'historias-reais',
        'Vida & Sociedade' => 'vida-e-sociedade'
    );

    foreach ( $categories as $cat_name => $cat_slug ) {
        if ( ! get_category_by_slug( $cat_slug ) ) {
            wp_insert_term(
                $cat_name,
                'category',
                array(
                    'description' => 'Conteúdo editorial da Revista Vida & Graça.',
                    'slug'        => $cat_slug,
                )
            );
        }
    }
}
add_action( 'init', 'vida_e_graca_ensure_categories' );

/**
 * SEO Estruturado: Schema.org JSON-LD Otimizado
 */
function vida_e_graca_schema_org() {
    $schema = array(
        '@context' => 'https://schema.org',
    );

    if ( is_single() ) {
        // Schema NewsArticle completo (Google News, Discover, Rich Results)
        $schema['@type'] = 'NewsArticle';
        $schema['mainEntityOfPage'] = array(
            '@type' => 'WebPage',
            '@id'   => get_permalink(),
        );
        $schema['headline'] = get_the_title();
        $schema['description'] = wp_strip_all_tags( get_the_excerpt() );
        $schema['datePublished'] = get_the_time( 'c' );
        $schema['dateModified'] = get_the_modified_time( 'c' );
        
        // Word count para SEO semântico
        $content = wp_strip_all_tags( strip_shortcodes( get_the_content() ) );
        $schema['wordCount'] = str_word_count( $content );
        
        // Seção editorial
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $schema['articleSection'] = $categories[0]->name;
        }
        
        $schema['author'] = array(
            '@type' => 'Person',
            'name'  => get_the_author(),
            'url'   => get_author_posts_url( get_the_author_meta( 'ID' ) ),
        );
        $schema['publisher'] = array(
            '@type' => 'Organization',
            'name'  => get_bloginfo( 'name' ),
            'url'   => home_url( '/' ),
        );
        if ( has_post_thumbnail() ) {
            $schema['image'] = array(
                '@type'  => 'ImageObject',
                'url'    => get_the_post_thumbnail_url( null, 'full' ),
                'width'  => 1200,
                'height' => 630,
            );
        }
    } elseif ( is_front_page() || is_home() ) {
        $schema['@type'] = 'WebSite';
        $schema['name'] = get_bloginfo( 'name' );
        $schema['url'] = home_url( '/' );
        $schema['description'] = get_bloginfo( 'description' );
    } else {
        return; 
    }

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}
add_action( 'wp_head', 'vida_e_graca_schema_org' );

/**
 * Preload da imagem destacada (LCP) em single posts
 */
function vida_e_graca_preload_featured_image() {
    if ( is_single() && has_post_thumbnail() ) {
        $img_url = get_the_post_thumbnail_url( null, 'full' );
        echo '<link rel="preload" as="image" href="' . esc_url( $img_url ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'vida_e_graca_preload_featured_image', 1 );

/**
 * Cálculo Dinâmico de Tempo de Leitura (UX Sênior)
 * Baseado na média global de 200 palavras por minuto.
 */
function vida_e_graca_reading_time() {
    global $post;
    
    // Pega o conteúdo limpo, sem tags HTML
    $content = strip_shortcodes( $post->post_content );
    $content = wp_strip_all_tags( $content );
    
    // Conta as palavras
    $word_count = str_word_count( $content );
    
    // Calcula o tempo (200 wpm) e arredonda para cima
    $reading_time = ceil( $word_count / 200 );
    
    if ( $reading_time < 1 ) {
        $reading_time = 1;
    }
    
    return $reading_time . ' min de leitura';
}


/**
 * Registro de configurações no Customizer (Aparência > Personalizar)
 */
function vida_e_graca_customize_register( $wp_customize ) {
    // Seção de Redes Sociais
    $wp_customize->add_section( 'vida_e_graca_social', array(
        'title'    => __( 'Redes Sociais', 'vida-e-graca' ),
        'priority' => 30,
    ) );

    // Instagram
    $wp_customize->add_setting( 'vida_e_graca_instagram', array(
        'default'           => 'https://instagram.com/vidaegraca',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vida_e_graca_instagram', array(
        'label'    => __( 'Link do Instagram', 'vida-e-graca' ),
        'section'  => 'vida_e_graca_social',
        'type'     => 'url',
    ) );

    // Facebook
    $wp_customize->add_setting( 'vida_e_graca_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vida_e_graca_facebook', array(
        'label'    => __( 'Link do Facebook', 'vida-e-graca' ),
        'section'  => 'vida_e_graca_social',
        'type'     => 'url',
    ) );

    // YouTube
    $wp_customize->add_setting( 'vida_e_graca_youtube', array(
        'default'           => 'https://youtube.com/@vidaegraca',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'vida_e_graca_youtube', array(
        'label'    => __( 'Link do YouTube', 'vida-e-graca' ),
        'section'  => 'vida_e_graca_social',
        'type'     => 'url',
    ) );
}
add_action( 'customize_register', 'vida_e_graca_customize_register' );
