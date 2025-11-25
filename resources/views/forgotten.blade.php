<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Recuperar Senha - DG Consultoria</title>

    <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}">
</head>

<body class="forgot-body">
    <div class="forgot-container">
        <div class="forgot-box">

            <div class="logo-area">
                <img src="{{ asset('images/LOGO.png') }}" class="forgot-logo">
                <div class="logo-text">
                    <span class="logo-title">RECUPERAR SENHA</span>
                </div>
            </div>

            <h2>Esqueceu a senha?</h2>
            <p class="subtitle">Digite seu e-mail para receber o link de redefinição.</p>

            <form id="forgot-form">
                @csrf

                <div class="input-group">
                    <label for="email">Seu E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <p id="error-message" class="error-message"></p>
                <p id="success-message" class="success-message"></p>

                <button type="submit" class="btn-submit">Enviar Link</button>

                <a href="{{ route('login') }}" class="link-back">Voltar ao Login</a>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/forgot-password.js') }}"></script>
</body>
</html>
