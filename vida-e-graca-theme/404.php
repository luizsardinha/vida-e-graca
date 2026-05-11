<?php get_header(); ?>

<section class="py-24 sm:py-32 px-4 text-center space-y-8 bg-stone-50 dark:bg-stone-950 min-h-[60vh] flex flex-col justify-center">
    <div class="max-w-2xl mx-auto">
        <h1 class="serif text-6xl sm:text-8xl font-medium text-stone-200 dark:text-stone-800 absolute left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 -z-10 select-none">404</h1>
        <h2 class="serif text-3xl sm:text-4xl font-medium text-stone-900 dark:text-stone-100">
            <?php _e('Página não encontrada', 'vida-e-graca'); ?>
        </h2>
        <p class="text-lg text-stone-600 dark:text-stone-400 font-light mt-4">
            <?php _e('O conteúdo que você procura parece ter se movido ou não existe mais.', 'vida-e-graca'); ?>
        </p>
        <div class="pt-8">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">
                <?php _e('Voltar para a Início', 'vida-e-graca'); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
