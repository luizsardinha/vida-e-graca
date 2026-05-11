/**
 * Tema Vida & Graça — Scripts Globais
 * Carregado em TODAS as páginas (dark mode, sticky header, Swup router)
 */

document.addEventListener('DOMContentLoaded', () => {

    // --- MODO ESCURO (THEME TOGGLE) ---
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleBtn = document.getElementById('theme-toggle');

    if (themeToggleDarkIcon && themeToggleLightIcon && themeToggleBtn) {
        // Inicialização dos ícones
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        // Evento de clique
        themeToggleBtn.addEventListener('click', function () {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (localStorage.getItem('theme')) {
                if (localStorage.getItem('theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }
        });
    }

    // --- HEADER INTELIGENTE (STICKY SCROLL) ---
    const header = document.getElementById('site-header');

    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 40) {
                header.classList.add('py-3', 'shadow-sm', 'bg-white/95', 'dark:bg-stone-950/95');
                header.classList.remove('py-5', 'bg-white/90', 'dark:bg-stone-950/90');
            } else {
                header.classList.add('py-5', 'bg-white/90', 'dark:bg-stone-950/90');
                header.classList.remove('py-3', 'shadow-sm', 'bg-white/95', 'dark:bg-stone-950/95');
            }
        });
    }

    // --- MENU MOBILE ---
    // Placeholder para a lógica do menu mobile off-canvas ou dropdown.
    // Futura expansão.

    // --- SWUP ROUTER (App-like Feel) ---
    if (typeof Swup !== 'undefined') {
        const swup = new Swup({
            containers: ['#swup'],
            cache: true
        });

        // Re-inicializar scripts de single post após navegação AJAX
        swup.hooks.on('page:view', () => {
            window.scrollTo(0, 0);

            // Dispara evento customizado para que single-post.js re-inicialize
            document.dispatchEvent(new CustomEvent('swup:pageview'));
        });
    }

});
