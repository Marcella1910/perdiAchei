// Toggle dos olhos na password 
 
const togglePassword1 = document.getElementById('togglePassword1');
const password1 = document.getElementById('senha');

togglePassword1.addEventListener('click', function () {
    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash'); // Alterna entre os ícones
});

