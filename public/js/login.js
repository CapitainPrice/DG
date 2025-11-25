// Acessa o formulário e a área de mensagem
const loginForm = document.getElementById('login-form');
const errorMessage = document.getElementById('error-message');

// Removidas as variáveis emailInput e passwordInput não utilizadas

loginForm.addEventListener('submit', (event) => {
    event.preventDefault();

    // Limpa qualquer mensagem de erro anterior
    errorMessage.textContent = ''; 
    errorMessage.style.display = 'none'; // Garante que a mensagem esteja oculta por padrão

    const email = document.getElementById('email').value.trim(); 
    const password = document.getElementById('password').value;

    // Validação básica
    if (email === '' || password === '') {
        errorMessage.textContent = 'Por favor, preencha todos os campos.';
        errorMessage.style.display = 'block';
        return;
    }

    // 1. Prepara os dados (Laravel espera 'email' e 'password')
    const dados = {
        email: email,
        password: password
    };

    // Pega o token CSRF
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenElement ? csrfTokenElement.getAttribute('content') : '';

    if (!csrfToken) {
        // Erro CRÍTICO: Token faltando (causa 419 Page Expired ou 403)
        errorMessage.textContent = 'Erro de segurança: Token CSRF não encontrado no HTML. Atualize a página.';
        errorMessage.style.display = 'block';
        return;
    }

    const submitButton = loginForm.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.textContent = 'Verificando...';

    // 2. Envia a requisição POST para a rota /login
    fetch('/login', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            // ESSENCIAL: Sinaliza ao Laravel que a requisição é AJAX e que esperamos JSON
            'X-Requested-With': 'XMLHttpRequest' 
        },
        body: JSON.stringify(dados)
    })
    .then(async response => {
        let data;
        try {
            data = await response.json();
        } catch (e) {
            // Se a resposta NÃO for JSON (ex: HTML de erro do servidor), captura aqui.
            // Isso evita o erro "Unexpected token '<'..."
            console.error('Resposta não é JSON. Status:', response.status);
            throw new Error('Erro de comunicação. O servidor não retornou uma resposta válida. (Talvez erro 419, tente limpar o cache)');
        }
        
        if (!response.ok) {
            // Se o status for 401 (Não Autorizado) ou 422 (Validação), o login falhou
            let errorMsg;
            if (data.message && response.status === 401) {
                // Captura a mensagem de erro do AuthController (Ex: 'As credenciais fornecidas...')
                errorMsg = data.message;
            } else if (data.errors) {
                // Captura erros de validação (422)
                errorMsg = Object.values(data.errors)[0][0];
            } else {
                errorMsg = 'Falha no login ou erro desconhecido.';
            }
            throw new Error(errorMsg);
        }
        return data;
    })
    .then(data => {
        // 3. Login bem-sucedido
        alert('Login bem-sucedido! Redirecionando...');
        // Redireciona para a página principal
        window.location.href = data.redirect || '/'; 
    })
    .catch(error => {
        // 4. Lida com erros
        console.error('Erro de Login:', error);
        // Exibe a mensagem capturada no bloco .then ou a mensagem padrão
        errorMessage.textContent = error.message || 'Usuário ou senha incorretos. Tente novamente.';
        errorMessage.style.display = 'block';
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = 'Entrar';
        document.getElementById('password').value = ''; // Limpa a senha
    });
});