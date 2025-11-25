const form = document.getElementById("forgot-form");
const msgError = document.getElementById("error-message");
const msgSuccess = document.getElementById("success-message");

form.addEventListener("submit", function (e) {
    e.preventDefault();

    msgError.textContent = "";
    msgSuccess.textContent = "";

    const email = document.getElementById("email").value.trim();
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    if (!email) {
        msgError.textContent = "Digite seu e-mail.";
        return;
    }

    const btn = form.querySelector("button");
    btn.disabled = true;
    btn.textContent = "Enviando...";

    fetch("/forgot-password", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrf,
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify({ email })
    })
    .then(async response => {
        const data = await response.json();

        if (!response.ok) {
            throw data;
        }

        return data;
    })
    .then(data => {
        msgSuccess.textContent = data.message || "Link enviado para seu e-mail!";
    })
    .catch(err => {
        if (err.errors) {
            msgError.textContent = Object.values(err.errors)[0][0];
        } else {
            msgError.textContent = err.message || "Erro ao enviar o link.";
        }
    })
    .finally(() => {
        btn.disabled = false;
        btn.textContent = "Enviar Link";
    });
});
