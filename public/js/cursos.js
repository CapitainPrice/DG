// =========================================
// CONFIGURAÇÃO DO MODO ESCURO
// =========================================

class ThemeManager {
    constructor() {
        this.themeToggle = document.getElementById('themeToggle');
        this.themeIcon = document.querySelector('.theme-icon');
        this.htmlElement = document.documentElement;
        this.prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
        this.currentTheme = localStorage.getItem('theme') || 'light';
        
        this.init();
    }
    
    init() {
        // Aplicar tema salvo
        this.applyTheme(this.currentTheme);
        
        // Configurar listener do botão
        if (this.themeToggle) {
            this.themeToggle.addEventListener('click', () => this.toggleTheme());
        }
        
        // Configurar listener para mudança de preferência do sistema
        this.prefersDarkScheme.addEventListener('change', (e) => {
            if (!localStorage.getItem('theme')) {
                this.applyTheme(e.matches ? 'dark' : 'light');
            }
        });
        
        // Configurar animação de hover nos cards
        this.setupCardAnimations();
        
        // Configurar filtros de curso
        this.setupFilters();
        
        // Configurar funcionalidade de busca
        this.setupSearch();
        
        // Configurar botões de visualização rápida
        this.setupQuickView();
        
        // Configurar animações de entrada
        this.setupAnimations();
    }
    
    applyTheme(theme) {
        if (theme === 'dark') {
            this.htmlElement.classList.remove('light-mode');
            this.htmlElement.classList.add('dark-mode');
            this.themeIcon.classList.remove('fa-sun');
            this.themeIcon.classList.add('fa-moon');
            localStorage.setItem('theme', 'dark');
        } else {
            this.htmlElement.classList.remove('dark-mode');
            this.htmlElement.classList.add('light-mode');
            this.themeIcon.classList.remove('fa-moon');
            this.themeIcon.classList.add('fa-sun');
            localStorage.setItem('theme', 'light');
        }
    }
    
    toggleTheme() {
        const isDark = this.htmlElement.classList.contains('dark-mode');
        this.applyTheme(isDark ? 'light' : 'dark');
        
        // Efeito de animação no botão
        this.themeToggle.style.transform = 'scale(0.95)';
        setTimeout(() => {
            this.themeToggle.style.transform = '';
        }, 150);
    }
    
    // =========================================
    // ANIMAÇÕES DOS CARDS
    // =========================================
    
    setupCardAnimations() {
        const cards = document.querySelectorAll('.curso-card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', (e) => {
                const cardRect = card.getBoundingClientRect();
                const mouseX = e.clientX - cardRect.left;
                const mouseY = e.clientY - cardRect.top;
                
                const centerX = cardRect.width / 2;
                const centerY = cardRect.height / 2;
                
                const rotateY = ((mouseX - centerX) / centerX) * 5;
                const rotateX = ((centerY - mouseY) / centerY) * 5;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                setTimeout(() => {
                    card.style.transform = '';
                }, 300);
            });
        });
    }
    
    // =========================================
    // FILTROS DE CURSO
    // =========================================
    
    setupFilters() {
        const filterTags = document.querySelectorAll('.filter-tag');
        const courseCards = document.querySelectorAll('.curso-card');
        
        filterTags.forEach(tag => {
            tag.addEventListener('click', () => {
                // Remover classe active de todas as tags
                filterTags.forEach(t => t.classList.remove('active'));
                
                // Adicionar classe active à tag clicada
                tag.classList.add('active');
                
                // Obter o filtro selecionado
                const filter = tag.textContent.toLowerCase();
                
                // Filtrar cards
                courseCards.forEach(card => {
                    const cardBadge = card.querySelector('.card-badge').textContent.toLowerCase();
                    
                    if (filter === 'todos' || cardBadge.includes(filter.replace('nr-', ''))) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
                
                // Efeito de clique
                tag.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    tag.style.transform = '';
                }, 150);
            });
        });
    }
    
    // =========================================
    // FUNCIONALIDADE DE BUSCA
    // =========================================
    
    setupSearch() {
        const searchInput = document.querySelector('.search-input');
        const courseCards = document.querySelectorAll('.curso-card');
        
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase().trim();
                
                courseCards.forEach(card => {
                    const title = card.querySelector('.curso-title').textContent.toLowerCase();
                    const description = card.querySelector('.curso-desc').textContent.toLowerCase();
                    const badge = card.querySelector('.card-badge').textContent.toLowerCase();
                    
                    if (searchTerm === '' || 
                        title.includes(searchTerm) || 
                        description.includes(searchTerm) ||
                        badge.includes(searchTerm)) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        }
    }
    
    // =========================================
    // VISUALIZAÇÃO RÁPIDA
    // =========================================
    
    setupQuickView() {
        const quickViewButtons = document.querySelectorAll('.quick-view');
        
        quickViewButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                
                const card = button.closest('.curso-card');
                const title = card.querySelector('.curso-title').textContent;
                const description = card.querySelector('.curso-desc').textContent;
                const price = card.querySelector('.price-value').textContent;
                
                // Criar modal de visualização rápida
                this.showQuickViewModal({ title, description, price });
            });
        });
    }
    
    showQuickViewModal(course) {
        // Remover modal existente
        const existingModal = document.querySelector('.quick-view-modal');
        if (existingModal) {
            existingModal.remove();
        }
        
        // Criar modal
        const modal = document.createElement('div');
        modal.className = 'quick-view-modal';
        modal.innerHTML = `
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <h3>${course.title}</h3>
                    <button class="modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>${course.description}</p>
                    <div class="modal-price">
                        <span>Investimento:</span>
                        <strong>${course.price}</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="modal-button secondary">Fechar</button>
                    <button class="modal-button primary">Inscrever-se</button>
                </div>
            </div>
        `;
        
        // Adicionar ao DOM
        document.body.appendChild(modal);
        
        // Adicionar estilos dinamicamente
        const style = document.createElement('style');
        style.textContent = `
            .quick-view-modal {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: center;
                animation: fadeIn 0.3s ease;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            
            .modal-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(4px);
            }
            
            .modal-content {
                background: var(--gray-50);
                border-radius: var(--radius-xl);
                width: 90%;
                max-width: 500px;
                z-index: 1;
                box-shadow: var(--shadow-xl);
                animation: slideUp 0.3s ease;
                border: 1px solid var(--gray-200);
            }
            
            .dark-mode .modal-content {
                background: var(--gray-100);
                border-color: var(--gray-300);
            }
            
            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .modal-header {
                padding: var(--space-xl);
                border-bottom: 1px solid var(--gray-200);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            
            .dark-mode .modal-header {
                border-bottom-color: var(--gray-300);
            }
            
            .modal-header h3 {
                font-family: var(--font-secondary);
                font-size: 1.25rem;
                color: var(--gray-900);
                margin: 0;
            }
            
            .dark-mode .modal-header h3 {
                color: var(--gray-800);
            }
            
            .modal-close {
                background: transparent;
                border: none;
                color: var(--gray-600);
                cursor: pointer;
                font-size: 1.25rem;
                padding: var(--space-xs);
                border-radius: var(--radius-sm);
                transition: all var(--transition-fast);
            }
            
            .modal-close:hover {
                color: var(--primary-green);
                background: var(--gray-200);
            }
            
            .modal-body {
                padding: var(--space-xl);
            }
            
            .modal-body p {
                color: var(--gray-700);
                margin-bottom: var(--space-lg);
                line-height: 1.6;
            }
            
            .dark-mode .modal-body p {
                color: var(--gray-600);
            }
            
            .modal-price {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: var(--space-lg);
                background: var(--gray-100);
                border-radius: var(--radius-lg);
                border: 1px solid var(--gray-200);
            }
            
            .dark-mode .modal-price {
                background: var(--gray-200);
                border-color: var(--gray-300);
            }
            
            .modal-price span {
                color: var(--gray-600);
                font-size: 0.875rem;
            }
            
            .dark-mode .modal-price span {
                color: var(--gray-500);
            }
            
            .modal-price strong {
                color: var(--primary-green);
                font-size: 1.5rem;
                font-weight: 700;
            }
            
            .modal-footer {
                padding: var(--space-xl);
                border-top: 1px solid var(--gray-200);
                display: flex;
                gap: var(--space-md);
                justify-content: flex-end;
            }
            
            .dark-mode .modal-footer {
                border-top-color: var(--gray-300);
            }
            
            .modal-button {
                padding: var(--space-md) var(--space-xl);
                border-radius: var(--radius-lg);
                font-family: var(--font-primary);
                font-weight: 600;
                font-size: 0.875rem;
                cursor: pointer;
                transition: all var(--transition-base);
                border: 2px solid transparent;
            }
            
            .modal-button.secondary {
                background: var(--gray-200);
                color: var(--gray-700);
                border-color: var(--gray-300);
            }
            
            .modal-button.secondary:hover {
                background: var(--gray-300);
            }
            
            .modal-button.primary {
                background: var(--primary-blue);
                color: white;
            }
            
            .modal-button.primary:hover {
                background: var(--primary-blue-light);
                transform: translateY(-2px);
                box-shadow: var(--shadow-md);
            }
        `;
        
        document.head.appendChild(style);
        
        // Configurar eventos do modal
        const closeButton = modal.querySelector('.modal-close');
        const secondaryButton = modal.querySelector('.modal-button.secondary');
        const overlay = modal.querySelector('.modal-overlay');
        
        const closeModal = () => {
            modal.style.opacity = '0';
            modal.style.transform = 'scale(0.95)';
            setTimeout(() => {
                modal.remove();
                style.remove();
            }, 200);
        };
        
        closeButton.addEventListener('click', closeModal);
        secondaryButton.addEventListener('click', closeModal);
        overlay.addEventListener('click', closeModal);
        
        // Impedir que o clique no conteúdo feche o modal
        modal.querySelector('.modal-content').addEventListener('click', (e) => {
            e.stopPropagation();
        });
        
        // Configurar botão de inscrever-se
        const primaryButton = modal.querySelector('.modal-button.primary');
        primaryButton.addEventListener('click', () => {
            alert('Inscrição realizada com sucesso! Em breve entraremos em contato.');
            closeModal();
        });
        
        // Fechar com ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    }
    
    // =========================================
    // ANIMAÇÕES DE ENTRADA
    // =========================================
    
    setupAnimations() {
        // Observer para animações de entrada
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);
        
        // Observar elementos para animação
        document.querySelectorAll('.curso-card, .cta-section').forEach(el => {
            observer.observe(el);
        });
        
        // Adicionar classe de animação
        const style = document.createElement('style');
        style.textContent = `
            .curso-card, .cta-section {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.5s ease, transform 0.5s ease;
            }
            
            .curso-card.animate-in, .cta-section.animate-in {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
    }
}

// =========================================
// INICIALIZAÇÃO
// =========================================

document.addEventListener('DOMContentLoaded', () => {
    // Inicializar gerenciador de tema
    const themeManager = new ThemeManager();
    
    // Configurar botões de curso
    const courseButtons = document.querySelectorAll('.curso-button');
    courseButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            
            const card = button.closest('.curso-card');
            const title = card.querySelector('.curso-title').textContent;
            
            // Efeito de clique
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = '';
            }, 150);
            
            // Simular ação de inscrição
            setTimeout(() => {
                alert(`Você será redirecionado para a página de inscrição do curso: ${title}`);
            }, 300);
        });
    });
    
    // Configurar botão CTA
    const ctaButton = document.querySelector('.cta-button');
    if (ctaButton) {
        ctaButton.addEventListener('click', () => {
            ctaButton.style.transform = 'scale(0.95)';
            setTimeout(() => {
                ctaButton.style.transform = '';
                alert('Formulário de orçamento será aberto em breve!');
            }, 150);
        });
    }
    
    // Configurar links do footer
    const footerLinks = document.querySelectorAll('.footer-links a');
    footerLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            if (link.getAttribute('href') === '#') {
                e.preventDefault();
                alert('Página em desenvolvimento!');
            }
        });
    });
    
    // Log de inicialização
    console.log('Sistema de Cursos NR inicializado com sucesso!');
});

// =========================================
// COMPATIBILIDADE COM LARAVEL
// =========================================

// Funções auxiliares para compatibilidade
if (typeof window.laravelHelpers === 'undefined') {
    window.laravelHelpers = {
        asset: function(path) {
            // Em ambiente Laravel, esta função será substituída
            return path;
        },
        route: function(name) {
            // Em ambiente Laravel, esta função será substituída
            return '#';
        }
    };
}