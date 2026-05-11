<?php
/**
 * Template part for displaying single posts
 * Orquestrador: chama sub-componentes modulares.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('py-12 sm:py-20'); ?>>
    <?php get_template_part('template-parts/single/header'); ?>
    <?php get_template_part('template-parts/single/featured-image'); ?>
    <?php get_template_part('template-parts/single/content'); ?>
    <?php /* get_template_part('template-parts/single/cta-newsletter'); */ ?>
    
    <footer class="max-w-5xl mx-auto px-4 sm:px-8 mt-12 pt-8 border-t border-stone-100 dark:border-stone-800">
        <?php get_template_part('template-parts/single/author-bio'); ?>
        <?php get_template_part('template-parts/single/tags'); ?>
        <?php get_template_part('template-parts/single/related-posts'); ?>
    </footer>
</article>
