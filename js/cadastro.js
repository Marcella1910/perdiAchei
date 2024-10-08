//recuperar dados do localStorage
let nomes = JSON.parse(localStorage.getItem('nomes')) || [];
let users = JSON.parse(localStorage.getItem('users')) || [];
let emails = JSON.parse(localStorage.getItem('emails')) || [];
let senhas = JSON.parse(localStorage.getItem('senhas')) || [];


const botao = document.getElementById("btnCad");
botao.addEventListener("click", validarForm);



function validarForm() {


  var nome = document.getElementById("nome").value.trim();
  var user = document.getElementById("user").value.trim();
  var email = document.getElementById("email").value.trim();
  var senha = document.getElementById("senha").value.trim();
  var cnfsenha = document.getElementById("cnfsenha").value.trim();

  

  if(nome === ""){
    mostraErro("Nome deve ser preenchido");
    return false;
  }

  if (user === "") {
      mostraErro("Nome de usuário deve ser preenchido.");
      return false;
  } else if (users.includes(user)) { //checa se o nome de usuário escolhido já é utilizado, verificando sua existência na lista
      mostraErro("Nome de usuário já existe. Por favor, escolha outro.");
      return false;
}

  if (email === "") {
      mostraErro("Email deve ser preenchido.");
      return false;
  } else if (emails.includes(email)) { //checa se o email já é utilizado, verificando sua existência na lista
      mostraErro("E-mail já vinculado a uma conta. Por favor, escolha outro.");
      return false;
  }

  if (senha === "") {
      mostraErro("Senha deve ser preenchida.");
      return false;
  } else if (senha.length < 6 || senha.length > 30) {
      mostraErro("Senha deve ter entre 6 e 30 caracteres.");
      return false;
  }

  if (cnfsenha === "") {
      mostraErro("Confirme sua senha.");
      return false;
  } else if (senha !== cnfsenha) {
      mostraErro("As senhas não coincidem.");
      return false;
  } 

  // armazenando as informações em listas

  nomes.push(nome);
  users.push(user);
  emails.push(email);
  senhas.push(senha);

  // armazenando no localStorage
  localStorage.setItem('nomes', JSON.stringify(nomes));
  localStorage.setItem('users', JSON.stringify(users));
  localStorage.setItem('emails', JSON.stringify(emails));
  localStorage.setItem('senhas', JSON.stringify(senhas));

  // Imprimindo as listas no console para facilitar acompanhamento
  console.log("Nomes: ", nomes);
  console.log("Users: ", users);
  console.log("Emails: ", emails);
  console.log("Senhas: ", senhas);


  // Se todas as validações passarem, redireciona para "feed.html"
  window.location.href = "feed.html";
  return false; // Para evitar que o formulário seja enviado antes do redirecionamento
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
