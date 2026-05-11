<?php get_header(); ?>

<div class="py-12 sm:py-20 px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32">
    <div class="max-w-6xl mx-auto space-y-12">
        <header class="text-center space-y-4 max-w-2xl mx-auto">
            <h1 class="serif text-3xl sm:text-4xl font-medium text-stone-900 dark:text-stone-100">
                <?php
                if ( is_category() ) {
                    single_cat_title();
                } elseif ( is_tag() ) {
                    single_tag_title();
                } elseif ( is_author() ) {
                    echo esc_html( 'Arquivos do Autor: ' . get_the_author() );
                } else {
                    _e( 'Arquivos', 'vida-e-graca' );
                }
                ?>
            </h1>
            <?php the_archive_description( '<p class="text-stone-600 dark:text-stone-400 font-light">', '</p>' ); ?>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-12">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'article' );
                endwhile;
                
                // Pagination
                echo '<div class="col-span-full pt-8 flex justify-center space-x-4">';
                the_posts_pagination( array(
                    'prev_text' => __( 'Anterior', 'vida-e-graca' ),
                    'next_text' => __( 'Próximo', 'vida-e-graca' ),
                    'class'     => 'pagination-custom',
                ) );
                echo '</div>';
                
            else :
                ?>
                <p class="text-center col-span-full"><?php _e('Nenhum artigo encontrado.', 'vida-e-graca' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
