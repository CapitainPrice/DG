<!DOCTYPE html>
<html lang="pt-br" class="light-mode">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos NR | Plataforma de Treinamentos</title>
    
    <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
</head>
<body>
    <div class="main-container">
        <!-- Header -->
        <header class="main-header">
            <div class="header-content">
                <div class="header-left">
                    <button class="theme-toggle" id="themeToggle" aria-label="Alternar tema">
                        <i class="fas fa-sun theme-icon"></i>
                    </button>
                </div>
                
                <div class="header-center">
                    <img class="logo" src="{{ asset('images/LOGO.png') }}" alt="Logo da Empresa">
                    <div class="logo-text">
                        <h1 class="site-title">Cursos NR</h1>
                        <p class="site-subtitle">Treinamentos Técnicos Profissionais</p>
                    </div>
                </div>
                
                <div class="header-right">
                    <nav class="header-nav">
                        <a href="{{ route('home') }}" class="nav-link" title="Página Inicial">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Home</span>
                        </a>
                        <a href="{{ route('login') }}" class="nav-link" title="Área do Aluno">
                            <i class="fas fa-user-circle"></i>
                            <span class="nav-text">Login</span>
                        </a>
                        <a href="#" class="nav-link" title="Contato">
                            <i class="fas fa-envelope"></i>
                            <span class="nav-text">Contato</span>
                        </a>
                    </nav>
                </div>
            </div>
            
            <div class="header-divider"></div>
        </header>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <div class="page-header">
                <div class="page-title-container">
                    <h2 class="page-title">
                        <i class="fas fa-book-open title-icon"></i>
                        Cursos Disponíveis
                    </h2>
                    <p class="page-subtitle">Treinamentos técnicos em Normas Regulamentadoras para segurança no trabalho</p>
                </div>
                
                <div class="page-info">
                    <div class="info-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>Certificação Reconhecida</span>
                    </div>
                    <div class="info-badge">
                        <i class="fas fa-clock"></i>
                        <span>Carga Horária Variada</span>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="filters-section">
                <div class="filter-tags">
                    <button class="filter-tag active">Todos</button>
                    <button class="filter-tag">NR-5 a NR-10</button>
                    <button class="filter-tag">NR-11 a NR-20</button>
                    <button class="filter-tag">Reciclagem</button>
                    <button class="filter-tag">Formação Inicial</button>
                </div>
                
                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Buscar curso...">
                </div>
            </div>

            <!-- Grid de Cursos -->
            <section class="cursos-grid">
                <!-- Curso 1 -->
                <article class="curso-card">
                    <div class="card-badge">NR-5</div>
                    <div class="curso-img">
                        <img src="https://wordpress-cms-revista-prod-assets.quero.space/uploads/2024/12/CIPA-1.jpg" alt="Curso CIPA">
                        <div class="img-overlay">
                            <button class="quick-view" aria-label="Visualizar detalhes">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="curso-info">
                        <div class="curso-header">
                            <h3 class="curso-title">CIPA - Comissão Interna de Prevenção de Acidentes</h3>
                            <div class="curso-meta">
                                <span class="meta-item">
                                    <i class="fas fa-clock"></i> 20h
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-user-graduate"></i> Certificado
                                </span>
                            </div>
                        </div>
                        
                        <div class="curso-content">
                            <p class="curso-desc">Treinamento voltado para capacitar membros da CIPA na prevenção de acidentes, identificação de riscos e promoção da saúde dentro da empresa.</p>
                            
                            <div class="curso-features">
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Prevenção de acidentes</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Identificação de riscos</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="curso-footer">
                            <div class="curso-price">
                                <span class="price-label">Investimento:</span>
                                <span class="price-value">R$ 299,90</span>
                            </div>
                            <button class="curso-button">
                                <span>Saiba Mais</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Curso 2 -->
                <article class="curso-card">
                    <div class="card-badge">NR-6</div>
                    <div class="curso-img">
                        <img src="https://cdn.wilsonsons.com.br/wp-content/uploads/2021/10/epis-scaled.jpeg" alt="Equipamentos de Proteção Individual">
                        <div class="img-overlay">
                            <button class="quick-view" aria-label="Visualizar detalhes">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="curso-info">
                        <div class="curso-header">
                            <h3 class="curso-title">EPI - Equipamentos de Proteção Individual</h3>
                            <div class="curso-meta">
                                <span class="meta-item">
                                    <i class="fas fa-clock"></i> 16h
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-user-graduate"></i> Certificado
                                </span>
                            </div>
                        </div>
                        
                        <div class="curso-content">
                            <p class="curso-desc">Curso que orienta os colaboradores sobre o uso correto, conservação e responsabilidades no manuseio dos EPIs, garantindo proteção e conformidade legal.</p>
                            
                            <div class="curso-features">
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Uso correto de EPIs</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Conservação e manutenção</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="curso-footer">
                            <div class="curso-price">
                                <span class="price-label">Investimento:</span>
                                <span class="price-value">R$ 249,90</span>
                            </div>
                            <button class="curso-button">
                                <span>Saiba Mais</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Curso 3 -->
                <article class="curso-card">
                    <div class="card-badge">NR-10</div>
                    <div class="curso-img">
                        <img src="https://prolifeengenharia.com.br/wp-content/uploads/2025/01/image-1-1024x682.png" alt="Segurança em Eletricidade">
                        <div class="img-overlay">
                            <button class="quick-view" aria-label="Visualizar detalhes">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="curso-info">
                        <div class="curso-header">
                            <h3 class="curso-title">Segurança em Instalações e Serviços com Eletricidade</h3>
                            <div class="curso-meta">
                                <span class="meta-item">
                                    <i class="fas fa-clock"></i> 40h
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-user-graduate"></i> Certificado
                                </span>
                            </div>
                        </div>
                        
                        <div class="curso-content">
                            <p class="curso-desc">Capacitação essencial para profissionais que atuam com eletricidade, focando em prevenção, procedimentos seguros e redução de riscos elétricos.</p>
                            
                            <div class="curso-features">
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Procedimentos seguros</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Prevenção de riscos elétricos</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="curso-footer">
                            <div class="curso-price">
                                <span class="price-label">Investimento:</span>
                                <span class="price-value">R$ 399,90</span>
                            </div>
                            <button class="curso-button">
                                <span>Saiba Mais</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </article>

                <!-- Curso 4 -->
                <article class="curso-card">
                    <div class="card-badge">NR-12</div>
                    <div class="curso-img">
                        <img src="https://www.cobli.co/wp-content/uploads/2022/02/NR-12_A-NR-12-garante-que-o-trabalho-em-maquinas-e-equipamentos-seja-seguro.2-1-scaled.jpeg" alt="Segurança em Máquinas">
                        <div class="img-overlay">
                            <button class="quick-view" aria-label="Visualizar detalhes">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="curso-info">
                        <div class="curso-header">
                            <h3 class="curso-title">Segurança em Máquinas e Equipamentos</h3>
                            <div class="curso-meta">
                                <span class="meta-item">
                                    <i class="fas fa-clock"></i> 32h
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-user-graduate"></i> Certificado
                                </span>
                            </div>
                        </div>
                        
                        <div class="curso-content">
                            <p class="curso-desc">Treinamento direcionado a operadores e mantenedores, abordando práticas seguras de operação, análise de riscos e prevenção de acidentes com máquinas.</p>
                            
                            <div class="curso-features">
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Análise de riscos</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Prevenção de acidentes</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="curso-footer">
                            <div class="curso-price">
                                <span class="price-label">Investimento:</span>
                                <span class="price-value">R$ 349,90</span>
                            </div>
                            <button class="curso-button">
                                <span>Saiba Mais</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </article>
            </section>

            <!-- CTA Section -->
            <div class="cta-section">
                <div class="cta-content">
                    <h3 class="cta-title">Precisa de um treinamento personalizado para sua empresa?</h3>
                    <p class="cta-text">Entre em contato conosco para desenvolvermos um programa específico para suas necessidades.</p>
                    <button class="cta-button">
                        <span>Solicitar Orçamento</span>
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="footer-content">
                <div class="footer-section">
                    <img class="footer-logo" src="{{ asset('images/LOGO.png') }}" alt="Logo da Empresa">
                    <p class="footer-text">Especialistas em treinamentos técnicos e segurança do trabalho desde 2010.</p>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-title">Links Rápidos</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Todos os Cursos</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-title">Contato</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-phone"></i> (11) 9999-9999</p>
                        <p><i class="fas fa-envelope"></i> contato@cursosnr.com.br</p>
                        <p><i class="fas fa-map-marker-alt"></i> São Paulo, SP</p>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 DG Consultoria. Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/cursos.js') }}"></script>
</body>
</html>