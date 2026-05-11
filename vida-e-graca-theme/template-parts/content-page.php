<?php
/**
 * Template part for displaying single pages
 * Orquestrador: chama sub-componentes modulares.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('py-12 sm:py-20'); ?>>
    <?php get_template_part('template-parts/page/header'); ?>
    <?php get_template_part('template-parts/page/featured-image'); ?>
    <?php get_template_part('template-parts/page/content'); ?>
</article>
