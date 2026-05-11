
    </main>

    <!-- Global CTA / Newsletter - Ocultado temporariamente -->
    <?php /*
    <section id="assinar" class="py-16 sm:py-24 px-4 sm:px-8 bg-stone-100 dark:bg-stone-900 border-t border-stone-200 dark:border-stone-800">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <h2 class="serif text-3xl font-medium text-stone-900 dark:text-stone-100">
                <?php _e('Receba nossas reflexões semanais', 'vida-e-graca'); ?>
            </h2>
            <p class="text-stone-600 dark:text-stone-400 font-light max-w-2xl mx-auto">
                <?php _e('Junte-se à nossa comunidade e receba gratuitamente os melhores artigos, estudos e entrevistas diretamente no seu e-mail.', 'vida-e-graca'); ?>
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="<?php esc_attr_e('Seu melhor e-mail', 'vida-e-graca'); ?>" required class="flex-1 px-4 py-3 bg-white dark:bg-stone-950 border border-stone-300 dark:border-stone-700 rounded-sm text-stone-900 dark:text-stone-100 focus:outline-none focus:ring-2 focus:ring-stone-500 dark:focus:ring-stone-400 transition-shadow">
                <button type="submit" class="btn-primary whitespace-nowrap">
                    <?php _e('Inscrever-se', 'vida-e-graca'); ?>
                </button>
            </form>
            <p class="text-xs text-stone-500 dark:text-stone-500">
                <?php _e('Odiamos spam. Cancele a assinatura quando quiser.', 'vida-e-graca'); ?>
            </p>
        </div>
    </section>
    */ ?>

    <!-- Semantic Multi-column Footer -->
    <footer class="pt-16 pb-8 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 bg-white dark:bg-stone-950 border-t border-stone-100 dark:border-stone-800">
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 sm:gap-8 mb-12">
            
            <!-- Column 1: Brand & About -->
            <div class="space-y-4 lg:col-span-1">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="serif text-xl font-semibold tracking-tight text-stone-800 dark:text-stone-100 block">
                    <?php bloginfo( 'name' ); ?>
                </a>
                <p class="text-sm text-stone-600 dark:text-stone-400 leading-relaxed pr-4">
                    <?php bloginfo( 'description' ); ?> Um espaço de reflexão, cultura e fé prática.
                </p>
                <div class="flex space-x-4 pt-2">
                    <?php 
                    $instagram = get_theme_mod( 'vida_e_graca_instagram', 'https://instagram.com/vidaegraca' );
                    $facebook  = get_theme_mod( 'vida_e_graca_facebook' );
                    $youtube   = get_theme_mod( 'vida_e_graca_youtube', 'https://youtube.com/@vidaegraca' );
                    ?>

                    <?php if ( $instagram ) : ?>
                    <!-- Instagram -->
                    <a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener noreferrer" class="text-stone-400 hover:text-stone-900 dark:hover:text-stone-100 transition-colors" aria-label="<?php esc_attr_e('Siga no Instagram', 'vida-e-graca'); ?>">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if ( $facebook ) : ?>
                    <!-- Facebook -->
                    <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" class="text-stone-400 hover:text-stone-900 dark:hover:text-stone-100 transition-colors" aria-label="<?php esc_attr_e('Siga no Facebook', 'vida-e-graca'); ?>">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if ( $youtube ) : ?>
                    <!-- YouTube -->
                    <a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" class="text-stone-400 hover:text-stone-900 dark:hover:text-stone-100 transition-colors" aria-label="<?php esc_attr_e('Siga no YouTube', 'vida-e-graca'); ?>">
                        <svg class="w-6 h-6 -mt-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 2: Editorias (Navigation) -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-widest text-stone-900 dark:text-stone-100">
                    <?php _e('Editorias', 'vida-e-graca'); ?>
                </h3>
                <div class="flex flex-col space-y-3 text-sm font-medium text-stone-500 dark:text-stone-400">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                        'walker'         => new Vida_E_Graca_Menu_Walker(),
                    ) );
                    ?>
                    <!-- Fallback if menu is empty -->
                    <?php if ( ! has_nav_menu( 'footer' ) ) : ?>
                        <a href="#" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors">Fé & Cotidiano</a>
                        <a href="#" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors">Cultura & Arte</a>
                        <a href="#" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors">Histórias Reais</a>
                        <a href="#" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors">Vida & Sociedade</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 3: A Revista -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-widest text-stone-900 dark:text-stone-100">
                    <?php _e('A Revista', 'vida-e-graca'); ?>
                </h3>
                <div class="flex flex-col space-y-3 text-sm font-medium text-stone-500 dark:text-stone-400">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_about',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                        'walker'         => new Vida_E_Graca_Menu_Walker(),
                    ) );
                    ?>
                    <?php if ( ! has_nav_menu( 'footer_about' ) ) : ?>
                        <a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Sobre Nós', 'vida-e-graca'); ?></a>
                        <a href="<?php echo esc_url( home_url( '/expediente/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Expediente', 'vida-e-graca'); ?></a>
                        <a href="<?php echo esc_url( home_url( '/contato/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Contato', 'vida-e-graca'); ?></a>
                        <a href="<?php echo esc_url( home_url( '/anuncie/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Anuncie', 'vida-e-graca'); ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 4: Edições -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-widest text-stone-900 dark:text-stone-100">
                    <?php _e('Publicações', 'vida-e-graca'); ?>
                </h3>
                <div class="flex flex-col space-y-3 text-sm font-medium text-stone-500 dark:text-stone-400">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer_publications',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                        'walker'         => new Vida_E_Graca_Menu_Walker(),
                    ) );
                    ?>
                    <?php if ( ! has_nav_menu( 'footer_publications' ) ) : ?>
                        <a href="<?php echo esc_url( home_url( '/edicao-atual/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Edição Atual', 'vida-e-graca'); ?></a>
                        <a href="<?php echo esc_url( home_url( '/edicoes-anteriores/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Edições Anteriores', 'vida-e-graca'); ?></a>
                        <a href="<?php echo esc_url( home_url( '/colunistas/' ) ); ?>" class="hover:text-stone-900 dark:hover:text-stone-100 transition-colors"><?php _e('Colunistas', 'vida-e-graca'); ?></a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- Base / Legal -->
        <div class="max-w-6xl mx-auto pt-8 border-t border-stone-200 dark:border-stone-800 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs font-medium text-stone-400 dark:text-stone-500">
            <div>
                © <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php _e('Todos os direitos reservados.', 'vida-e-graca'); ?>
            </div>
            <div class="flex space-x-4">
                <?php
                if ( has_nav_menu( 'footer_legal' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer_legal',
                        'container'      => false,
                        'items_wrap'     => '%3$s',
                        'fallback_cb'    => false,
                        'walker'         => new Vida_E_Graca_Menu_Walker(),
                    ) );
                } else {
                ?>
                    <a href="<?php echo esc_url( home_url( '/privacidade/' ) ); ?>" class="hover:text-stone-800 dark:hover:text-stone-200 transition-colors"><?php _e('Política de Privacidade', 'vida-e-graca'); ?></a>
                    <span>&bull;</span>
                    <a href="<?php echo esc_url( home_url( '/termos/' ) ); ?>" class="hover:text-stone-800 dark:hover:text-stone-200 transition-colors"><?php _e('Termos de Uso', 'vida-e-graca'); ?></a>
                <?php } ?>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
