<?php
/**
 * Template Part: Tags (Minimalistas)
 */
?>

<?php if ( has_tag() ) : ?>
<div class="flex flex-wrap items-center gap-1.5 mb-8">
    <svg class="w-3.5 h-3.5 text-stone-300 dark:text-stone-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
    <?php 
    $post_tags = get_the_tags();
    if ($post_tags) {
        $tag_links = array();
        foreach ($post_tags as $tag) {
            $tag_links[] = '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="text-[10px] text-stone-500 hover:text-stone-900 dark:text-stone-400 dark:hover:text-stone-100 transition-colors uppercase tracking-widest font-semibold">' . esc_html( $tag->name ) . '</a>';
        }
        echo implode('<span class="text-stone-300 dark:text-stone-700 mx-1">•</span>', $tag_links);
    }
    ?>
</div>
<?php endif; ?>
