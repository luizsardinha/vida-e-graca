<?php
/**
 * Template Part: Page Featured Image
 * Imagem destacada da página (se houver).
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
<figure class="max-w-5xl mx-auto px-4 sm:px-8 mb-10">
    <?php the_post_thumbnail( 'full', array(
        'class'         => 'w-full h-auto rounded-md',
        'loading'       => 'eager',
        'fetchpriority' => 'high',
    ) ); ?>
    <?php if ( get_the_post_thumbnail_caption() ) : ?>
    <figcaption class="text-xs text-stone-400 dark:text-stone-500 mt-3 text-center italic">
        <?php the_post_thumbnail_caption(); ?>
    </figcaption>
    <?php endif; ?>
</figure>
<?php endif; ?>
