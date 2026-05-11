<?php
/**
 * Template Part: Related Posts (Continue Lendo)
 */
?>

<?php
$categories = get_the_category();
if ( ! empty( $categories ) ) {
    $category_id = $categories[0]->term_id;
    $related_args = array(
        'cat'            => $category_id,
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => 2,
    );
    $related_query = new WP_Query( $related_args );
    if ( $related_query->have_posts() ) :
        ?>
        <div class="mt-12 pt-8 border-t border-stone-100 dark:border-stone-800">
            <h3 class="font-serif text-2xl font-medium text-stone-900 dark:text-stone-100 mb-8 flex items-center gap-4">
                <?php _e('Continue lendo', 'vida-e-graca'); ?>
                <span class="flex-1 h-px bg-stone-100 dark:bg-stone-800"></span>
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="group block space-y-3">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="aspect-[16/9] rounded-sm bg-stone-100 dark:bg-stone-800 overflow-hidden">
                                <?php the_post_thumbnail('medium_large', array('class' => 'object-cover w-full h-full group-hover:scale-105 transition-transform duration-500')); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="font-serif font-medium text-lg leading-snug text-stone-900 dark:text-stone-100 group-hover:text-stone-600 dark:group-hover:text-stone-400 transition-colors">
                            <?php the_title(); ?>
                        </h4>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        wp_reset_postdata();
    endif;
}
?>
