//recuperar dados do localStorage
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
  }

  if (email === "") {
      mostraErro("Email deve ser preenchido.");
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
  users.push(user);
  emails.push(email);
  senhas.push(senha);

  // armazenando no localStorage
  localStorage.setItem('users', JSON.stringify(users));
  localStorage.setItem('emails', JSON.stringify(emails));
  localStorage.setItem('senhas', JSON.stringify(senhas));


  // Se todas as validações passarem, redireciona para "feed.html"
  window.location.href = "feed.html";
  return false; // Para evitar que o formulário seja enviado antes do redirecionamento
}

function mostraErro(mensagem) {
  var small = document.getElementById("erro");
  small.innerText = mensagem;
  small.style.visibility = "visible";
  
  
}


