/**
 * Tema Vida & Graça — Scripts de Artigos (Single Post)
 * Carregado APENAS em is_single(). Re-inicializável via evento 'swup:pageview'.
 */

function initSinglePost() {

    // --- LEITURA (PROGRESS BAR) ---
    const article = document.querySelector('article.post');

    // Limpar progress bar anterior (caso re-inicialização via Swup)
    const existingBar = document.getElementById('reading-progress');
    if (existingBar) existingBar.remove();

    if (article) {
        const progressBar = document.createElement('div');
        progressBar.id = 'reading-progress';
        progressBar.className = 'fixed top-0 left-0 h-1 bg-amber-500 z-[60] transition-all duration-150 ease-out origin-left';
        progressBar.style.width = '0%';
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', function onScroll() {
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
    const theArticle = document.querySelector('.prose');

    // Limpar tooltip anterior
    const existingTooltip = document.getElementById('highlight-tooltip');
    if (existingTooltip) existingTooltip.remove();

    if (theArticle) {

        const tooltip = document.createElement('div');
        tooltip.id = 'highlight-tooltip';
        tooltip.className = 'absolute hidden z-50 bg-stone-900 text-white rounded-md shadow-lg py-1.5 px-3 flex items-center space-x-3 text-sm -translate-x-1/2 -mt-10 pointer-events-none transition-opacity duration-200 opacity-0';

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

        document.addEventListener('selectionchange', () => {
            const selection = window.getSelection();
            const text = selection.toString().trim();

            if (text.length > 20 && selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                const rect = range.getBoundingClientRect();

                tooltip.style.left = `${rect.left + (rect.width / 2)}px`;
                tooltip.style.top = `${rect.top + window.scrollY - 10}px`;

                tooltip.classList.remove('hidden');
                setTimeout(() => tooltip.classList.remove('opacity-0'), 10);

                const url = encodeURIComponent(window.location.href);
                const cleanQuote = encodeURIComponent('"' + text.substring(0, 150) + '..."\n\n');

                document.getElementById('share-x').href = `https://twitter.com/intent/tweet?text=${cleanQuote}&url=${url}`;
                document.getElementById('share-wa').href = `https://api.whatsapp.com/send?text=${cleanQuote}${url}`;

            } else {
                tooltip.classList.add('opacity-0');
                setTimeout(() => {
                    if (tooltip.classList.contains('opacity-0')) tooltip.classList.add('hidden');
                }, 200);
            }
        });
    }

    // --- ÍNDICE DINÂMICO (Table of Contents Fixo) ---
    // Limpar TOC anterior
    const existingToc = document.getElementById('article-toc');
    if (existingToc) existingToc.remove();

    if (theArticle && window.innerWidth >= 1024) {
        const headings = theArticle.querySelectorAll('h2, h3');

        if (headings.length > 2) {

            const tocWrapper = document.createElement('div');
            tocWrapper.id = 'article-toc';
            tocWrapper.setAttribute('role', 'navigation');
            tocWrapper.setAttribute('aria-label', 'Índice do artigo');
            tocWrapper.className = 'fixed top-32 right-8 xl:right-16 w-64 p-5 bg-white dark:bg-stone-900 border border-stone-200 dark:border-stone-800 rounded-lg shadow-sm z-40 max-h-[70vh] overflow-y-auto hidden lg:block opacity-0 transition-opacity duration-300';

            const tocTitle = document.createElement('h5');
            tocTitle.className = 'text-xs font-bold uppercase tracking-widest text-stone-500 mb-4';
            tocTitle.innerText = 'Nesta página';
            tocWrapper.appendChild(tocTitle);

            const tocList = document.createElement('ul');
            tocList.className = 'space-y-3 text-sm';
            tocWrapper.appendChild(tocList);

            headings.forEach((heading, index) => {
                if (!heading.id) {
                    heading.id = `heading-toc-${index}`;
                }

                const listItem = document.createElement('li');
                if (heading.tagName.toLowerCase() === 'h3') {
                    listItem.className = 'ml-4 opacity-80';
                }

                const link = document.createElement('a');
                link.href = `#${heading.id}`;
                link.className = 'text-stone-600 dark:text-stone-400 hover:text-amber-600 dark:hover:text-amber-500 transition-colors block leading-tight toc-link';
                link.innerText = heading.innerText;

                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    window.scrollTo({
                        top: heading.offsetTop - 100,
                        behavior: 'smooth'
                    });
                });

                listItem.appendChild(link);
                tocList.appendChild(listItem);
            });

            document.body.appendChild(tocWrapper);

            const tocLinks = document.querySelectorAll('.toc-link');

            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -60% 0px',
                threshold: 0.1
            };

            setTimeout(() => tocWrapper.classList.remove('opacity-0'), 1000);

            const headingObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        tocLinks.forEach(l => {
                            l.classList.remove('text-amber-600', 'font-medium', 'translate-x-1');
                            l.classList.add('text-stone-600', 'dark:text-stone-400');
                        });

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
}

// Inicializar na primeira carga
document.addEventListener('DOMContentLoaded', initSinglePost);

// Re-inicializar após navegação Swup (AJAX)
document.addEventListener('swup:pageview', initSinglePost);
