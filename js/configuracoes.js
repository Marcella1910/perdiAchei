function openModal() {
    document.getElementById('deleteModal').style.display = 'flex';
}

function openModalDeleteAccount() {
    document.getElementById('deleteAccountModal').style.display = 'flex';
}

function closeModalDeleteAccount() {
    document.getElementById('deleteAccountModal').style.display = 'none';
}


function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function confirmSenha() {
    alert("Email enviado!");
    closeModal();
}

const activityButton = document.querySelector('.menu-item-notifications');
const activityDropdown = document.querySelector('.notification-panel');

activityButton.addEventListener('click', function(e) {
    e.stopPropagation(); // Evita o fechamento imediato

    if (activityDropdown.classList.contains('show')) {
        // Se o painel está visível, oculta-o com uma animação de fade out
        activityDropdown.style.opacity = '0'; // Inicia o fade-out
        setTimeout(() => {
            activityDropdown.classList.remove('show'); // Após a animação, oculta completamente
        }, 300); // O tempo deve corresponder ao da transição definida no CSS (0.3s)
    } else {
        // Se o painel está oculto, exibe-o com fade-in
        activityDropdown.classList.add('show'); // Mostra o painel
        setTimeout(() => {
            activityDropdown.style.opacity = '1'; // Aplica o fade-in
        }, 10); // Pequeno atraso para garantir a transição de opacity
    }
});

// Fecha o painel de notificações ao clicar fora dele
document.addEventListener('click', function(e) {
    if (!e.target.closest('.menu-item-notifications') && !e.target.closest('.notification-panel')) {
        activityDropdown.style.opacity = '0'; // Inicia o fade-out
        setTimeout(() => {
            activityDropdown.classList.remove('show'); // Oculta o painel após o fade-out
        }, 300); // O tempo deve coincidir com a duração da transição (0.3s)
    }
});






