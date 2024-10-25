function openEditProfile() {
    const modal = document.getElementById('editPerfilModal');
    if (modal) {  // Verifica se o modal existe
        modal.style.display = 'flex';
    }
}

function closeEditProfile() {
    const modal = document.getElementById('editPerfilModal');
    if (modal) {  // Verifica se o modal existe
        modal.style.display = 'none';
    }
}