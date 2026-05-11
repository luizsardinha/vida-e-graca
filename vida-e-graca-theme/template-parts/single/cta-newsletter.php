<?php
/**
 * Template Part: CTA Newsletter Mid-Content
 * Aparece entre o conteúdo e o footer do artigo para máxima conversão.
 */
?>

<aside class="max-w-5xl mx-auto px-4 sm:px-8 mt-14 mb-4" aria-label="<?php esc_attr_e('Inscreva-se na newsletter', 'vida-e-graca'); ?>">
    <div class="rounded-md bg-stone-900 dark:bg-stone-800 px-6 py-10 sm:px-10 sm:py-12 text-center">
        <p class="text-amber-400 text-[11px] font-bold uppercase tracking-widest mb-3">
            <?php _e('Gostou desta reflexão?', 'vida-e-graca'); ?>
        </p>
        <h3 class="font-serif text-xl sm:text-2xl font-medium text-white leading-snug mb-3">
            <?php _e('Receba os melhores artigos da semana', 'vida-e-graca'); ?>
        </h3>
        <p class="text-stone-400 text-sm max-w-md mx-auto mb-6">
            <?php _e('Junte-se a milhares de leitores. Reflexões sobre fé, cultura e vida prática direto no seu e-mail.', 'vida-e-graca'); ?>
        </p>
        <form class="flex flex-col sm:flex-row gap-3 max-w-sm mx-auto">
            <input 
                type="email" 
                placeholder="<?php esc_attr_e('Seu melhor e-mail', 'vida-e-graca'); ?>" 
                required 
                class="flex-1 px-4 py-2.5 bg-white/10 border border-white/20 rounded-sm text-white placeholder-stone-500 text-sm focus:outline-none focus:ring-2 focus:ring-amber-500/50 focus:border-amber-500 transition-all"
            >
            <button type="submit" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-400 text-stone-900 font-bold text-sm tracking-wide rounded-sm transition-colors whitespace-nowrap">
                <?php _e('Inscrever-me', 'vida-e-graca'); ?>
            </button>
        </form>
        <p class="text-[10px] text-stone-500 mt-4">
            <?php _e('Sem spam. Cancele quando quiser.', 'vida-e-graca'); ?>
        </p>
    </div>
</aside>
