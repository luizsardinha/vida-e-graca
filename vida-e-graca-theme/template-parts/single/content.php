<?php
/**
 * Template Part: Gutenberg Content Area
 * Wrapper externo controla largura | Wrapper interno (prose) controla tipografia
 */
?>

<div class="max-w-5xl mx-auto px-4 sm:px-8">
    <div class="prose prose-stone dark:prose-invert prose-lg max-w-none prose-headings:font-serif prose-headings:font-medium prose-a:text-amber-600 hover:prose-a:text-amber-700 prose-blockquote:border-l-amber-500 prose-blockquote:bg-stone-50 dark:prose-blockquote:bg-stone-900/40 prose-blockquote:py-2 prose-blockquote:px-6 prose-blockquote:rounded-r-sm prose-img:rounded-md selection:bg-stone-200 dark:selection:bg-stone-700">
        <?php the_content(); ?>
    </div>
</div>
