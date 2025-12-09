<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DG - Consultoria e Treinamento em Segurança do Trabalho</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('images/LOGO.png') }}" alt="DG Consultoria Logo">
                <div class="logo-text">
                    <span class="logo-title">CONSULTORIA</span>
                    <span class="logo-subtitle">E TREINAMENTOS EM SEGURANÇA DO TRABALHO</span>
                </div>
            </a>
            <nav class="nav">
                <a href="#servicos">Serviços</a>
                <a href="#cursos">Cursos</a> 
                <a href="#contato">Contato</a>

                @auth 
                    <a href="{{ route('cursos') }}" class="btn-profile">Cursos/Perfil</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button onclick="logout()" style="background:none;border:none;padding:0;cursor:pointer;">
                            <img src="images/door.png" alt="Sair" width="28" class="icon-tema" title="Sair">
                        </button>                        
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-primary-nav">Login/Cadastro</a>
                @endauth

                <img id="btn-tema" src="{{ asset('images/sunny.png') }}" alt="Mudar Tema" class="icon-tema" title="Alternar Tema">
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <img class="fundo" src="https://grupobrmed.com.br/blog/wp-content/uploads/elementor/thumbs/Artigo-23-Capa-Seguranca-do-Trabalho-Dicas-r0tz1amxutww1o2z3458mjrjgnuphtus4w24qijm9m.jpg" alt="Fundo Hero">
            <div class="container">
                <h1>Segurança do Trabalho com Excelência</h1>
                <h2>DG Consultoria e Treinamentos</h2>
                <p>Proteção, Prevenção e Conformidade Legal para sua empresa.</p>
                <a href="#contato" class="btn-primary">Solicite um Orçamento</a>
            </div>
        </section>

        <section id="servicos" class="section-servicos">
            <div class="container">
                <h2>Nossos Serviços</h2>
                <div class="servicos-grid">
                    <div class="servico-card">
                        <h3>Consultoria Especializada</h3>
                        <p>Elaboração de laudos, programas (PGR, PCMSO) e documentos exigidos pelas NRs.</p>
                        <div class="foto-servico">
                            <img src="https://consultoriamult.com.br/blog/wp-content/uploads/2020/06/consultoria-especi-1024x481.jpg" alt="Consultoria">
                        </div>
                    </div>
                    <div class="servico-card">
                        <h3>Treinamentos In Company</h3>
                        <p>Capacitação e formação de equipes em diversas Normas Regulamentadoras (NRs).</p>
                        <div class="foto-servico">
                            <img src="https://www.previnsa.com.br/wp-content/uploads/2018/10/232989-aprenda-como-organizar-um-treinamento-in-company-na-sua-empresa.jpg" alt="Treinamento">
                        </div>
                    </div>
                    <div class="servico-card">
                        <h3>Gestão de eSocial</h3>
                        <p>Apoio completo no envio de eventos de SST para o Sistema de Escrituração Digital.</p>
                        <div class="foto-servico">
                            <img src="https://priorityseg.com.br/wp-content/uploads/2025/08/Como-estao-os-envios-dos-eventos-de-SST-no-eSocial.jpg" alt="eSocial">
                        </div>
                    </div>
                    <div class="servico-card">
                        <h3>Consultoria em Saúde e Segurança do Trabalho</h3>
                        <p>Serviço especializado em auxiliar as empresas a protegerem a saúde e a integridade física dos seus colaboradores</p>
                        <div class="foto-servico">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQV-5g6_NQlMreouqF4tut_kyV7zgX9HVVbw&s" alt="Saude">
                        </div>
                    </div>
                    <div class="servico-card">
                        <h3>Elaboração de documentos de SST</h3>
                        <p>Serviço técnico que consiste em criar e gerenciar os registros formais obrigatórios (como PGR, PCMSO e LTCAT) que as empresas devem manter para identificar, controlar e monitorar os riscos ocupacionais</p>
                        <div class="foto-servico">
                            <img src="https://grupobrmed.com.br/wp-content/uploads/2025/04/docSST-1024x683.webp" alt="SST">
                        </div>
                    </div>
                    <div class="servico-card">
                        <h3>Treinamentos Normativos (presencial e EAD através da plataforma de Treinamentos Esocial Brasil)</h3>
                        <p>Capacitação de colaboradores em Saúde e Segurança do Trabalho (SST), focado no cumprimento das Normas Regulamentadoras (NRs)</p>
                        <div class="foto-servico">
                            <img src="https://cdn.bitrix24.com.br/b13297687/landing/81b/81b6e412850c062697f2f73ae0ad1c10/nps_2x_1x_1x.png" alt="Normativos">
                        </div>
                    </div>
                    <div class="servico-card">
                        <h3>Assistência Técnica em Perícias Trabalhista</h3>
                        <p>Especialização de um profissional onde (o Assistente Técnico) é contratado por uma das partes (empresa ou trabalhador) para acompanhar e contestar o laudo do Perito Judicial</p>
                        <div class="foto-servico">
                            <img src="https://ehsconsultoria.com.br/informacoes/images/assistente-tecnico-para-pericias-trabalhistas.webp" alt="Assistencia">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="cursos" class="section-cursos">
            <div class="container">
                <h2>Cursos Online e Presenciais</h2>
                <p class="intro">Nossa vitrine de cursos para capacitação rápida e eficiente.</p>
                <div class="cursos-grid">
                    <div class="curso-card">
                        <div class="curso-header">NR 35 - Trabalho em Altura</div>
                        <p>Curso obrigatório para qualquer atividade acima de 2 metros de altura.</p>
                        <a href="{{ route('cursos') }}" class="btn-secondary">Ver Detalhes</a>
                    </div>
                    <div class="curso-card">
                        <div class="curso-header">CIPA - NR 05</div>
                        <p>Formação para membros da Comissão Interna de Prevenção de Acidentes.</p>
                        <a href="{{ route('cursos') }}" class="btn-secondary">Ver Detalhes</a>
                    </div>
                    <div class="curso-card">
                        <div class="curso-header">Primeiros Socorros</div>
                        <p>Capacitação em procedimentos de emergência e atendimento inicial a vítimas.</p>
                        <a href="{{ route('cursos') }}" class="btn-secondary">Ver Detalhes</a>
                    </div>
                </div>
                <a href="{{ route('cursos') }}" class="btn-outline">Ver Todos os Cursos</a>
            </div>
        </section>

        <section id="contato" class="section-contato">
            <div class="container">
                <h2>Fale Conosco</h2>
                <p>Entre em contato para orçamentos, dúvidas ou para conhecer nosso escritório.</p>
                <form class="contato-form">
                    <input type="text" placeholder="Seu Nome Completo" required>
                    <input type="email" placeholder="Seu E-mail" required>
                    <textarea placeholder="Como podemos ajudar sua empresa?" required></textarea>
                    <button type="submit" class="btn-primary">Enviar Mensagem</button>
                </form>
                <div class="info-contato">
                    <h2>Contato</h2>
                    <p>Telefone: (12) 99713-4860</p>
                    <p>Endereço: R. Prudente de Morães, 41 - Itagaçaba, Cruzeiro - SP</p>
                    <a href="https://www.google.com/maps?q=R.+Prudente+de+Mor%C3%A3es,+41+-+Itaga%C3%A7aba,+Cruzeiro+-+SP" target="_blank" rel="noopener noreferrer">
                        <img class="pin" src="{{ asset('https://cdn-icons-png.flaticon.com/512/484/484167.png') }}" alt="Localização no Maps">
                    </a>
                    <a href="https://wa.me/5512997134860" target="_blank" rel="noopener noreferrer">
                        <img class="zap" src="{{ asset('https://images.freeimages.com/fic/images/icons/2779/simple_icons/4096/whatsapp_4096_black.png') }}" alt="WhatsApp">
                    </a>
                </div>
            </div>
        </section>
    </main>
        
    <footer class="footer">
        <div class="container">
            <p>© 2025 DG Consultoria. Todos os direitos reservados.</p>
        </div>
    </footer>
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>