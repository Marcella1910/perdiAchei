// Toggle dos olhos na password 

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
