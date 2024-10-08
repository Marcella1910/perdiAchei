// Recuperar dados do localStorage
let users = JSON.parse(localStorage.getItem('users')) || [];
let emails = JSON.parse(localStorage.getItem('emails')) || [];
let senhas = JSON.parse(localStorage.getItem('senhas')) || [];

const btnLogin = document.querySelector(".btnCad");
btnLogin.addEventListener("click", validarLogin);

function validarLogin(event) {
  event.preventDefault(); // Previne o comportamento padrão do botão

  var user = document.querySelector(".user").value.trim();
  var email = document.querySelector(".email").value.trim();
  var senha = document.querySelector(".senha").value.trim();

  // Verificar se o usuário, email e senha estão nas listas correspondentes
  let userIndex = users.indexOf(user);
  let emailIndex = emails.indexOf(email);
  let senhaIndex = senhas.indexOf(senha);

  if (userIndex !== -1 && emailIndex !== -1 && senhaIndex !== -1) {
    // Verificar se os índices são iguais, ou seja, pertencem à mesma pessoa
    if (userIndex === emailIndex && emailIndex === senhaIndex) {
      // Redirecionar para a página "feed.html"
      window.location.href = "feed.html";
    } 
    else {
      mostraErro("Usuário não identificado. Verifique suas credenciais.");
    }
  } 
  else {
    mostraErro("Usuário não identificado. Verifique suas credenciais.");
  }
}

function mostraErro(mensagem) {
  var small = document.getElementById("erro");
  small.innerText = mensagem;
  small.style.visibility = "visible";
}

const togglePassword1 = document.getElementById('togglePassword1');
const password1 = document.getElementById('senha');

togglePassword1.addEventListener('click', function () {
    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash'); // Alterna entre os ícones
});

// Alternar visibilidade do segundo campo de senha
const togglePassword2 = document.getElementById('togglePassword2');
const password2 = document.getElementById('cnfsenha');

togglePassword2.addEventListener('click', function () {
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash'); // Alterna entre os ícones
});

