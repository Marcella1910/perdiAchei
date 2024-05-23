
let form = document.querySelector("inputs");
let txtmatricula = document.getElementById("mat");
let txtusuario = document.getElementById("user");
let txtemail = document.getElementById("email");
let txtsenha = document.getElementById("senha");
let txtcnfsenha = document.getElementById("cnfsenha");


// Aplica evento na submissão do formulário
form.addEventListener("submit", (e) => {
  e.preventDefault();
  validaEntrada();
});


function validaEntrada() {
  // Valores dos elementos
  let matriculaValor = txtmatricula.trim();
  let usuarioValor = txtusuario.value.trim();
  let emailValor = txtemail.trim();
  let senhaValor = txtsenha.value.trim();
  let cnfsenhaValor = txtcnfsenha.value.trim();
  
  //Verificando campos
  if (matriculaValor === "") {
    MostraErro(txtmatricula, "Matrícula deve ser preenchida!");
  } else {
    MostraSucesso(txtmatricula);
  }
  if (usuarioValor === "") {
    MostraErro(txtusuario, "Usuário deve ser preenchido!");
  } else {
    MostraSucesso(txtusuario);
  }
  if (emailValor === "") {
    MostraErro(txtemail, "E-mail deve ser preenchido!");
  } else {
    MostraSucesso(txtemail);
  }


  //Verificando senha
  if (senhaValor === "") {
    MostraErro(txtsenha, "Senha deve ser preenchida");
  } else if (senhaValor.length < 6 || senhaValor.length > 30) {
    MostraErro(txtsenha, "Senha deve ter entre  6 a 30 caracteres");
  } else {
    MostraSucesso(txtsenha);
  }
  

}

// Se existe algum erro, então apresenta na tela.
function MostraErro(input, message) {
  let formControl = input.parentElement;
  formControl.className = "form-control error";
  let small = formControl.querySelector("small");
  small.innerText = message;

}

// Se NÃO existe erro, então apresenta na tela.
function MostraSucesso(input) {
  let formControl = input.parentElement;
  formControl.className = "form-control success";
}
