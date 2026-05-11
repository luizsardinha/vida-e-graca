<?php
/**
 * Template Part: Featured Image
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
    <div class="max-w-5xl mx-auto px-4 sm:px-8 mb-12">
        <div class="aspect-video sm:aspect-[21/9] rounded-sm overflow-hidden bg-stone-100 dark:bg-stone-800">
            <?php the_post_thumbnail('full', array(
                'class' => 'object-cover w-full h-full',
                'fetchpriority' => 'high',
                'loading' => 'eager',
            )); ?>
        </div>
        <?php if ( get_the_post_thumbnail_caption() ) : ?>
            <p class="mt-3 text-center text-sm text-stone-500 dark:text-stone-400 italic">
                <?php the_post_thumbnail_caption(); ?>
            </p>
        <?php endif; ?>
    </div>
<?php endif; ?>
