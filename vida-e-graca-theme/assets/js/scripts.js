/**
 * Tema Vida & Graça - Scripts Principais
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

    // --- LEITURA (PROGRESS BAR) ---
    // Injeta uma barra de progresso de leitura no topo da tela para engajamento em artigos
    const article = document.querySelector('article.post');
    if (article) {
        const progressBar = document.createElement('div');
        progressBar.id = 'reading-progress';
        progressBar.className = 'fixed top-0 left-0 h-1 bg-amber-500 z-[60] transition-all duration-150 ease-out origin-left';
        progressBar.style.width = '0%';
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', () => {
            const articleHeight = article.offsetHeight;
            const articleOffset = article.offsetTop;
            const windowHeight = window.innerHeight;
            const scrollY = window.scrollY;

            let progress = 0;
            if (scrollY > articleOffset) {
                const scrolled = scrollY - articleOffset;
                const scrollable = articleHeight - windowHeight;
                if (scrollable > 0) {
                    progress = Math.min(100, Math.max(0, (scrolled / scrollable) * 100));
                } else {
                    progress = 100;
                }
            }
            progressBar.style.width = `${progress}%`;
        });
    }

    // --- HIGHLIGHT TO SHARE (Medium-Like) ---
    // Faz o binding de evento para quando o usuário seleciona um texto.
    const theArticle = document.querySelector('.prose'); // Pega apenas a área de conteúdo
    if (theArticle) {

        // Criar o botão flutuante escondido
        const tooltip = document.createElement('div');
        tooltip.id = 'highlight-tooltip';
        tooltip.className = 'absolute hidden z-50 bg-stone-900 text-white rounded-md shadow-lg py-1.5 px-3 flex items-center space-x-3 text-sm -translate-x-1/2 -mt-10 pointer-events-none transition-opacity duration-200 opacity-0';

        // Ícones SVG minimalistas (Patter Tailwind)
        tooltip.innerHTML = `
            <span class="text-stone-300 font-medium mr-2">Compartilhe:</span>
            <a href="#" id="share-x" target="_blank" class="hover:text-amber-400 transition-colors pointer-events-auto cursor-pointer flex items-center" aria-label="Share on X">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
            </a>
            <div class="w-px h-4 bg-stone-700"></div>
            <a href="#" id="share-wa" target="_blank" class="hover:text-green-400 transition-colors pointer-events-auto cursor-pointer flex items-center" aria-label="Share on WA">
               <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zM12 21.841c-1.6 0-3.167-.43-4.538-1.246l-.326-.193-3.37.883.905-3.284-.213-.34A9.85 9.85 0 0 1 2.152 12C2.152 6.57 6.574 2.152 12 2.152S21.848 6.57 21.848 12 17.426 21.841 12 21.841z"></path></svg>
            </a>
            <div class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-2 h-2 bg-stone-900 rotate-45 border-r border-b border-stone-800 pointer-events-none"></div>
        `;
        document.body.appendChild(tooltip);

        // Funções para pegar a área do documento selecionado e a string selecionada
        document.addEventListener('selectionchange', () => {
            const selection = window.getSelection();
            const text = selection.toString().trim();

            // Requisito Mínimo (Evitar tooltip abrindo em clique acidental)
            if (text.length > 20 && selection.rangeCount > 0) {
                // Posicionamento Dinâmico (Lógica de Geometria)
                const range = selection.getRangeAt(0);
                const rect = range.getBoundingClientRect();

                // Posição no Eixo Y compensando o document scroll
                tooltip.style.left = `${rect.left + (rect.width / 2)}px`;
                tooltip.style.top = `${rect.top + window.scrollY - 10}px`;

                tooltip.classList.remove('hidden');

                // Pequeno delay para a opacidade animar sutilmente (UX)
                setTimeout(() => tooltip.classList.remove('opacity-0'), 10);

                // Atualizar Hrefs dinamicamente
                const url = encodeURIComponent(window.location.href);
                // Regex para "limpar" trechos que podem quebrar a URL
                const cleanQuote = encodeURIComponent('"' + text.substring(0, 150) + '..."\n\n');

                document.getElementById('share-x').href = `https://twitter.com/intent/tweet?text=${cleanQuote}&url=${url}`;
                document.getElementById('share-wa').href = `https://api.whatsapp.com/send?text=${cleanQuote}${url}`;

            } else {
                tooltip.classList.add('opacity-0');
                // Esconder totalmente depois do fade
                setTimeout(() => {
                    if (tooltip.classList.contains('opacity-0')) tooltip.classList.add('hidden');
                }, 200);
            }
        });
    }

    // --- ÍNDICE DINÂMICO (Table of Contents Fixo) ---
    // Executa apenas em telas médias/grandes (onde há espaço lateral) e se o artigo for longo (tem H2s)
    if (theArticle && window.innerWidth >= 1024) {
        const headings = theArticle.querySelectorAll('h2, h3');

        // Só cria o TOC se o post for rico (mais de 2 subtítulos)
        if (headings.length > 2) {

            // Container do TOC (Ficará fixed ou sticky na lateral direita)
            // Em um tema real com Sidebar, injetaríamos isso na Sidebar. Aqui, vamos criar flutuante.
            const tocWrapper = document.createElement('div');
            tocWrapper.id = 'article-toc';
            tocWrapper.className = 'fixed top-32 right-8 xl:right-16 w-64 p-5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded-lg shadow-sm z-40 max-h-[70vh] overflow-y-auto hidden lg:block opacity-0 transition-opacity duration-300';

            const tocTitle = document.createElement('h5');
            tocTitle.className = 'text-xs font-bold uppercase tracking-widest text-stone-500 mb-4';
            tocTitle.innerText = 'Nesta página';
            tocWrapper.appendChild(tocTitle);

            const tocList = document.createElement('ul');
            tocList.className = 'space-y-3 text-sm';
            tocWrapper.appendChild(tocList);

            // Loop para criar os links based nos headings do Gutenberg
            headings.forEach((heading, index) => {
                // Gutenberg às vezes não põe ID, então a gente cria se precisar
                if (!heading.id) {
                    heading.id = `heading-toc-${index}`;
                }

                const listItem = document.createElement('li');
                // Indenta H3 levemente para hierarquia
                if (heading.tagName.toLowerCase() === 'h3') {
                    listItem.className = 'ml-4 opacity-80';
                }

                const link = document.createElement('a');
                link.href = `#${heading.id}`;
                link.className = 'text-stone-600 dark:text-stone-400 hover:text-amber-600 dark:hover:text-amber-500 transition-colors block leading-tight toc-link';
                link.innerText = heading.innerText;

                // Animação suave no clique
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    window.scrollTo({
                        top: heading.offsetTop - 100, // Compensação do header sticky
                        behavior: 'smooth'
                    });
                });

                listItem.appendChild(link);
                tocList.appendChild(listItem);
            });

            document.body.appendChild(tocWrapper);

            // Intersection Observer para acender os links conforme o scroll (ScrollSpy)
            const tocLinks = document.querySelectorAll('.toc-link');

            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -60% 0px', // Aciona o trigger na metade de cima da tela
                threshold: 0.1
            };

            // Mostrar TOC apenas depois que rolar o cabeçalho do artigo
            setTimeout(() => tocWrapper.classList.remove('opacity-0'), 1000);

            const headingObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Reseta todos
                        tocLinks.forEach(l => {
                            l.classList.remove('text-amber-600', 'font-medium', 'translate-x-1');
                            l.classList.add('text-stone-600', 'dark:text-stone-400');
                        });

                        // Acende o atual
                        const activeLink = document.querySelector(`.toc-link[href="#${entry.target.id}"]`);
                        if (activeLink) {
                            activeLink.classList.remove('text-stone-600', 'dark:text-stone-400');
                            activeLink.classList.add('text-amber-600', 'font-medium', 'translate-x-1');
                        }
                    }
                });
            }, observerOptions);

            headings.forEach(h => headingObserver.observe(h));
        }
    }

});
