function validarForm() {
  var mat = document.getElementById("mat").value.trim();
  var user = document.getElementById("user").value.trim();
  var email = document.getElementById("email").value.trim();
  var senha = document.getElementById("senha").value.trim();
  var cnfsenha = document.getElementById("cnfsenha").value.trim();

  if (mat === "") {
      mostraErro("mat", "Matrícula deve ser preenchida.");
      return false;
  } else {
      removeErro("mat");
  }

  if (user === "") {
      mostraErro("user", "Nome de usuário deve ser preenchido.");
      return false;
  } else {
      removeErro("user");
  }

  if (email === "") {
      mostraErro("email", "Email deve ser preenchido.");
      return false;
  } else {
      removeErro("email");
  }

  if (senha === "") {
      mostraErro("senha", "Senha deve ser preenchida.");
      return false;
  } else if (senha.length < 6 || senha.length > 30) {
      mostraErro("senha", "Senha deve ter entre 6 e 30 caracteres.");
      return false;
  } else {
      removeErro("senha");
  }

  if (cnfsenha === "") {
      mostraErro("cnfsenha", "Confirme sua senha.");
      return false;
  } else if (senha !== cnfsenha) {
      mostraErro("cnfsenha", "As senhas não coincidem.");
      return false;
  } else {
      removeErro("cnfsenha");
  }

  // Se todas as validações passarem, redireciona para "feed.html"
  window.location.href = "feed.html";
  return false; // Para evitar que o formulário seja enviado antes do redirecionamento
}

function mostraErro(id, mensagem) {
  var small = document.getElementById(id + "-error");
  small.innerText = mensagem;
  small.style.visibility = "visible";
  var input = document.getElementById(id);
  input.classList.add("error");
}

function removeErro(id) {
  var small = document.getElementById(id + "-error");
  small.innerText = "";
  small.style.visibility = "hidden";
  var input = document.getElementById(id);
  input.classList.remove("error");
}
