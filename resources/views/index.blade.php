<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DG - Consultoria e Treinamento em Segurança do Trabalho</title>
    {{-- ALTERADO: Caminho do CSS usando asset() --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            {{-- ALTERADO: Link Home usando route('home') --}}
            <a href="{{ route('home') }}" class="logo">
                {{-- ALTERADO: Caminho da imagem usando asset() --}}
                <img src="{{ asset('images/LOGO.png') }}" alt="DG Consultoria Logo">
                <div class="logo-text">
                    <span class="logo-title">CONSULTORIA</span>
                    <span class="logo-subtitle">E TREINAMENTOS EM SEGURANÇA DO TRABALHO</span>
                </div>
            </a>
            <nav class="nav">
                <a href="#servicos">Serviços</a>
                {{-- O link 'Cursos' na nav deve apontar para a seção, mas o botão no rodapé aponta para a página de cursos --}}
                <a href="#cursos">Cursos</a> 
                <a href="#contato">Contato</a>
                
                {{-- ALTERADO: Caminho da imagem usando asset() --}}
                <img id="btn-tema" src="{{ asset('images/sunny.png') }}" alt="Mudar Tema" class="icon-tema" title="Alternar Tema">

                {{-- NOVO BLOCO: Verificação de autenticação do Laravel --}}
                @auth 
                    {{-- Usuário logado: Exibe um link para a área de cursos e um formulário de logout --}}
                    <a href="{{ route('cursos') }}" class="btn-profile">Cursos/Perfil</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button onclick="logout()" style="background:none;border:none;padding:0;cursor:pointer;">
                            <img  src="images/door.png" alt="Logout" width="28" alt="Mudar Tema" class="icon-tema" title="Alternar Tema" >
                        </button>                        
                    </form>
                @else
                    {{-- Usuário deslogado: Exibe o link para Login/Cadastro --}}
                    <a href="{{ route('login') }}" class="btn-primary-nav">Login/Cadastro</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            {{-- Mantido o link externo para a imagem de fundo --}}
            <img class="fundo" src="https://grupobrmed.com.br/blog/wp-content/uploads/elementor/thumbs/Artigo-23-Capa-Seguranca-do-Trabalho-Dicas-r0tz1amxutww1o2z3458mjrjgnuphtus4w24qijm9m.jpg" alt="Fundo Hero">
            
            <div class="container">
                <h1>Segurança do Trabalho com Excelência</h1>
                <h2>DG Consultoria e Treinamentos</h2>
                <p>Proteção, Prevenção e Conformidade Legal para sua empresa.</p>
                <a href="#contato" class="btn-primary">Solicite um Orçamento</a>
            </div>
        </section>

        <section id="servicos" class="section-servicos">
            {{-- ... Conteúdo da seção Serviços mantido ... --}}
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
                {{-- ALTERADO: Link para a página de cursos usando route('cursos') --}}
                <a href="{{ route('cursos') }}" class="btn-outline">Ver Todos os Cursos</a>
            </div>
        </section>

        <section id="contato" class="section-contato">
            <div class="container">
                <h2>Fale Conosco</h2>
                <p>Entre em contato para orçamentos, dúvidas ou para conhecer nosso escritório.</p>
                <form class="contato-form">
                    {{-- Um formulário de contato real precisaria de @csrf e um action/method POST no Laravel --}}
                    <input type="text" placeholder="Seu Nome Completo" required>
                    <input type="email" placeholder="Seu E-mail" required>
                    <textarea placeholder="Como podemos ajudar sua empresa?" required></textarea>
                    <button type="submit" class="btn-primary">Enviar Mensagem</button>
                </form>
                <div class="info-contato">
                    <h2>Contato</h2>
                    <p>Telefone: (12) 99713-4860</p>
                    <p>Endereço: R. Prudente de Morães, 41 - Itagaçaba, Cruzeiro - SP</p>
                    {{-- ALTERADO: Caminho da imagem usando asset() --}}
                    <a href="https://www.google.com/maps?q=R.+Prudente+de+Mor%C3%A3es,+41+-+Itaga%C3%A7aba,+Cruzeiro+-+SP" target="_blank" rel="noopener noreferrer">
                        <img class="pin" src="{{ asset('https://cdn-icons-png.flaticon.com/512/484/484167.png') }}" alt="Localização no Maps">
                    </a>
                    {{-- ALTERADO: Caminho da imagem usando asset() --}}
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
    
    {{-- ALTERADO: Caminho do JavaScript usando asset() --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>