const cadastroForm = document.getElementById('cadastro-form');
const nomeInput = document.getElementById('nome');
const emailInput = document.getElementById('email');
const senhaInput = document.getElementById('senha');
const confirmaSenhaInput = document.getElementById('confirma-senha');
const errorMessage = document.getElementById('error-message');

cadastroForm.addEventListener('submit', (event) => {
    event.preventDefault();
    errorMessage.textContent = '';

    const nome = nomeInput.value.trim();
    const email = emailInput.value.trim();
    const senha = senhaInput.value;
    const confirmaSenha = confirmaSenhaInput.value;

    if (!nome || !email || !senha || !confirmaSenha) {
        errorMessage.textContent = 'Preencha todos os campos.';
        return;
    }

    if (senha !== confirmaSenha) {
        errorMessage.textContent = 'As senhas não coincidem.';
        return;
    }

    if (senha.length < 6) {
        errorMessage.textContent = 'A senha deve ter no mínimo 6 caracteres.';
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const dados = {
        name: nome,
        email: email,
        password: senha,
        password_confirmation: confirmaSenha
    };

    const submitButton = cadastroForm.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.textContent = 'Processando...';

    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(dados)
    })
    .then(async response => {
        if (!response.ok) {
            const data = await response.json();
            throw data;
        }
        return response.json();
    })
    .then(data => {
        alert('Cadastro realizado com sucesso!');
        window.location.href = data.redirect;
    })
    .catch(error => {
        if (error.errors) {
            const firstError = Object.values(error.errors)[0][0];
            errorMessage.textContent = firstError;
        } else {
            errorMessage.textContent = 'Erro inesperado. Tente novamente.';
        }
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = 'Cadastrar';
    });
});
