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
                    echo 'Arquivos do Autor: ' . get_the_author();
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
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    </article>
                    <?php
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
