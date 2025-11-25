<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DG Consultoria</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    {{-- ALTERADO: Caminho do CSS usando asset() --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 

    
</head>
<body class="login-body">
    <div class="login-container">
        <div class="login-box">
            <div class="logo-area">
                {{-- ALTERADO: Caminho da imagem usando asset() --}}
                <img src="{{ asset('images/LOGO.png') }}" alt="DG Consultoria Logo" class="login-logo">
                <div class="logo-text">
                    <span class="logo-title">DG CONSULTORIA</span>
                </div>
            </div>

            <h2>Login</h2>
            
            {{-- BLOCO NOVO: Exibição de erros (ex: credenciais inválidas) --}}
            @if ($errors->any())
                <div class="alert alert-danger" style="color: red; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ALTERADO: Form action aponta para a rota 'login' com método POST --}}
            <form id="login-form" class="login-form" method="POST" action="{{ route('login') }}">
                @csrf {{-- OBRIGATÓRIO: Token de segurança do Laravel --}}
                
                <div class="input-group">
                    <label for="email">Usuário (E-mail)</label>
                    {{-- ALTERADO: name para 'email', o padrão do Laravel Auth --}}
                    <input type="email" id="email" name="email" placeholder="seu.email@email.com.br" required value="{{ old('email') }}">
                </div>

                <div class="input-group">
                    <label for="password">Senha</label>
                    {{-- name já está como 'password', o padrão do Laravel Auth --}}
                    <input type="password" id="password" name="password" placeholder="********" required>
                </div>
                
                <p id="error-message" class="error-message"></p>

                <button type="submit" class="btn-login">Entrar</button>
                
                <a href="{{ route('password.request') }}" class="forgot-password">Esqueceu sua senha?</a>
            </form>
            
            <div class="separator">ou</div>
            {{-- ALTERADO: Link de criação de conta usando a rota nomeada 'register' --}}
            <a href="{{ route('register') }}" class="btn-secondary-link">Criar Conta</a>
        </div>
    </div>
    
    {{-- ALTERADO: Caminho do JavaScript usando asset() --}}
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>