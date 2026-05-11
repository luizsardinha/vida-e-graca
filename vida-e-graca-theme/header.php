<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://api.whatsapp.com">
    <link rel="preconnect" href="https://twitter.com">
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet"></noscript>
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased leading-relaxed selection:bg-stone-200 selection:text-stone-900 dark:selection:bg-stone-700 dark:selection:text-stone-100'); ?>>
    <?php wp_body_open(); ?>

    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[100] focus:px-4 focus:py-2 focus:bg-stone-900 focus:text-white dark:focus:bg-stone-100 dark:focus:text-stone-900">
        <?php _e('Pular para o conteúdo', 'vida-e-graca'); ?>
    </a>

    <!-- Smart Header -->
    <header id="site-header" class="fixed w-full top-0 z-50 py-5 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 bg-white/90 dark:bg-stone-950/90 backdrop-blur-lg border-b border-transparent transition-all duration-300">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            
            <!-- Logo -->
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> - Home" class="serif text-2xl font-semibold tracking-tight text-stone-900 dark:text-stone-50 hover:text-stone-600 dark:hover:text-stone-300 transition-colors flex-shrink-0">
                <?php bloginfo( 'name' ); ?>
            </a>
            
            <!-- Primary Navigation (Desktop) -->
            <nav class="hidden lg:flex items-center space-x-10 text-sm font-medium text-stone-600 dark:text-stone-400">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'walker'         => new Vida_E_Graca_Menu_Walker(),
                ) );
                ?>
            </nav>

            <!-- Actions (Theme Toggle & CTA) -->
            <div class="flex items-center space-x-4 sm:space-x-6">
                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="p-2 text-stone-500 hover:text-stone-900 dark:hover:text-stone-100 rounded-full hover:bg-stone-100 dark:hover:bg-stone-800 transition-colors focus:outline-none focus:ring-2 focus:ring-stone-400" aria-label="<?php esc_attr_e('Alternar Modo Escuro', 'vida-e-graca'); ?>">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

                <!-- Call to Action (CTA) - Ocultado temporariamente -->
                <?php /* 
                <a href="#newsletter" class="hidden sm:inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium tracking-wide text-white dark:text-stone-900 bg-stone-900 dark:bg-stone-100 rounded-full hover:bg-stone-800 dark:hover:bg-white transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-stone-900 dark:focus:ring-offset-stone-900 shadow-sm">
                    <?php _e('Assine a Revista', 'vida-e-graca'); ?>
                </a>
                */ ?>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-2 text-stone-600 dark:text-stone-400 hover:text-stone-900 dark:hover:text-stone-100 focus:outline-none" aria-label="<?php esc_attr_e('Abrir Menu Principal', 'vida-e-graca'); ?>">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Spacer to prevent content jump due to fixed header -->
    <div class="h-[76px]"></div>

    <!-- Swup Transition Wrapper -->
    <main id="swup" class="transition-fade min-h-screen">
