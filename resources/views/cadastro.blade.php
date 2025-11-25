<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cadastro - DG Consultoria</title>

    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
</head>
<body class="cadastro-body">
    <div class="cadastro-container">
        <div class="cadastro-box">
            <div class="logo-area">
                <img src="{{ asset('images/LOGO.png') }}" class="cadastro-logo">
                <div class="logo-text">
                    <span class="logo-title">DG CONSULTORIA</span>
                    <span class="logo-subtitle">Novo Usuário SST</span>
                </div>
            </div>

            <h2>Crie sua Conta</h2>

            <form id="cadastro-form" class="cadastro-form" method="POST">
                @csrf

                <div class="input-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="name" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="password" required>
                </div>

                <div class="input-group">
                    <label for="confirma-senha">Confirmar Senha</label>
                    <input type="password" id="confirma-senha" name="password_confirmation" required>
                </div>

                <p id="error-message" class="error-message"></p>

                <button type="submit" class="btn-cadastro">Cadastrar</button>

                <a href="{{ route('login') }}" class="link-login">
                    Já tem uma conta?<br>Faça Login
                </a>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/cadastro.js') }}"></script>
</body>
</html>
