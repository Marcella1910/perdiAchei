

function openModal() {
    document.getElementById('deleteModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function confirmSenha() {
    alert("Email enviado!");
    closeModal();
}

// Função para abrir o modal
function openReportForm() {
    const reportModal = document.getElementById('reportModal');
    if (reportModal) {
        reportModal.style.display = 'flex';
    }
}

// Função para fechar o modal e limpar a textarea
function closeReportForm() {
    const reportModal = document.getElementById('reportModal');
    const reportReason = document.getElementById('reportReason');
    if (reportModal && reportReason) {
        reportModal.style.display = 'none';
        reportReason.value = ''; // Limpa o conteúdo da textarea
    }
}


// Verifique se o formulário de denúncia existe antes de adicionar o listener
const reportForm = document.getElementById('reportForm');
if (reportForm) {
    reportForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const reportReason = document.getElementById('reportReason').value;

        if (reportReason.trim() !== "") {
            alert("Denúncia enviada com sucesso!");
            closeReportForm(); // Fechar o modal após o envio
        } else {
            alert("Por favor, descreva o motivo da denúncia.");
        }
    });
}


document.getElementById('file-upload').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Obter o arquivo selecionado
    const fileInput = document.getElementById('file-upload');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-image');
    const previewVideo = document.getElementById('preview-video');
    const cancelButton = document.getElementById('cancel-button');

    if (file) {
        const fileType = file.type;

        // Verifica se o arquivo é uma imagem ou um vídeo
        if (fileType.startsWith('image/')) {
            // Se for uma imagem
            const imageUrl = URL.createObjectURL(file);
            previewImage.src = imageUrl;
            previewImage.style.display = 'block';
            previewVideo.style.display = 'none';
            previewContainer.style.display = 'block';
        } else if (fileType.startsWith('video/')) {
            // Se for um vídeo
            const videoUrl = URL.createObjectURL(file);
            previewVideo.src = videoUrl;
            previewVideo.style.display = 'block';
            previewImage.style.display = 'none';
            previewContainer.style.display = 'block';
        } else {
            // Se o tipo de arquivo não for suportado
            alert('Formato de arquivo não suportado!');
        }
    }

    cancelButton.addEventListener('click', () => {
        fileInput.value = ''; // Limpa o valor do input
        previewImage.src = ''; // Limpa a imagem de pré-visualização
        previewContainer.style.display = 'none'; // Esconde o contêiner de pré-visualização
    });
});

document.getElementById('file-upload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    console.log(file); // Adicione isso para verificar se o arquivo está sendo selecionado corretamente
});


const toggleButtons = document.querySelectorAll('.toggle-button');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            toggleButtons.forEach(b => b.classList.remove('active')); // Remove 'active' de todos
            this.classList.add('active'); // Adiciona 'active' ao botão clicado
        });
});

// Seleciona todos os botões de menu
const menuButtons = document.querySelectorAll('.menu-button');

menuButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Encontra o dropdown correspondente ao botão clicado
        const dropdownMenu = this.nextElementSibling;

        // Fecha todos os outros menus dropdown antes de abrir o atual
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if (menu !== dropdownMenu) {
                menu.style.display = 'none';
            }
        });

        // Alterna a exibição do menu dropdown atual
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });
});

// Fecha o menu dropdown se clicar fora dele
document.addEventListener('click', function(e) {
    if (!e.target.closest('.menu-button')) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.style.display = 'none';
        });
    }
});


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


// Seleciona todos os elementos clicáveis (foto de perfil, nome e username)
const clickableElements = document.querySelectorAll('.clickable-profile');

// Adiciona um evento de clique em cada um deles
clickableElements.forEach(element => {
    element.addEventListener('click', function() {
        // Redireciona para a página meuperfil.php
        window.location.href = 'meuperfil.php';
    });
});

// Seleciona todos os elementos clicáveis (foto de perfil, nome e username)
const clickableElementsPerfil = document.querySelectorAll('.clickable-profile-alheio');

// Adiciona um evento de clique em cada um deles
clickableElementsPerfil.forEach(element => {
    element.addEventListener('click', function() {
        // Redireciona para a página perfil-alheio.php
        window.location.href = 'perfil-alheio.php';
    });
});


function showSectionPerfil(sectionId) {
    // Remove a classe 'active' de todas as seções
    const sections = document.querySelectorAll('.section-tipo');
    sections.forEach(section => {
        section.classList.remove('active');
    });

    // Remove a classe 'active' de todos os botões
    const buttons = document.querySelectorAll('.menu-btn');
    buttons.forEach(button => {
        button.classList.remove('active');
    });

    // Adiciona a classe 'active' na seção e no botão clicado
    document.getElementById(sectionId).classList.add('active');
    document.querySelector(`.menu-btn[onclick="showSectionPerfil('${sectionId}')"]`).classList.add('active');
}

function showSection(sectionId) {
    // Remove a classe 'active' de todas as seções
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => section.classList.remove('active'));

    // Remove a classe 'active' de todos os botões de tag
    const tags = document.querySelectorAll('.tag');
    tags.forEach(tag => tag.classList.remove('active'));

    // Adiciona a classe 'active' na seção e no botão clicado
    document.getElementById(sectionId).classList.add('active');
    document.querySelector(`.tag[data-section="${sectionId}"]`).classList.add('active');
}

// Função para pré-visualizar a foto
function visualizarFoto(event) {
    const arquivo = event.target.files[0];
    const previewFoto = document.getElementById('preview-foto');
    const containerPreviewFoto = document.getElementById('container-preview-foto');
    const botaoRemoverFoto = document.getElementById('botao-remover-foto');

    if (arquivo) {
        const leitor = new FileReader();
        
        leitor.onload = function(e) {
            previewFoto.src = e.target.result;
            previewFoto.style.display = 'block';
            containerPreviewFoto.style.display = 'flex';
            botaoRemoverFoto.style.display = 'flex';
        };
        
        leitor.readAsDataURL(arquivo); // Converte a imagem para base64 e exibe no preview
    }
}

// Função para remover a foto
function removerFoto() {
    const inputUploadFoto = document.getElementById('input-upload-foto');
    const previewFoto = document.getElementById('preview-foto');
    const containerPreviewFoto = document.getElementById('container-preview-foto');
    const botaoRemoverFoto = document.getElementById('botao-remover-foto');

    inputUploadFoto.value = ''; // Limpa o input de arquivo
    previewFoto.src = '#'; // Limpa a imagem de preview
    previewFoto.style.display = 'none';
    containerPreviewFoto.style.display = 'none';
    botaoRemoverFoto.style.display = 'none';
}

function openConfirmPopup() {
    document.getElementById('confirmModal').style.display = 'flex';
}

// Função para fechar o primeiro popup
function closeConfirmPopup() {
    document.getElementById('confirmModal').style.display = 'none';
}

// Função para abrir o segundo popup (formulário) e fechar o primeiro
function openFormPopup() {
    closeConfirmPopup();
    document.getElementById('formModal').style.display = 'flex';
}

// Função para fechar o segundo popup (formulário)
function closeFormPopup() {
    document.getElementById('formModal').style.display = 'none';
    document.getElementById('contactReason').value = ''; // Limpa o conteúdo do textarea
    removerFoto(); // Chama a função para limpar a foto selecionada
}

// Captura o evento de submit do formulário
document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    const contactReason = document.getElementById('contactReason').value;

    if (contactReason.trim() !== "") {
        alert("Email enviado!");
        closeFormPopup(); // Fecha o modal de formulário após o envio
    } else {
        alert("Por favor, insira as informações necessárias.");
    }
});




const fileUpload = document.getElementById("editFileUpload");
const previewContainer = document.getElementById("editPreviewContainer");
const previewImage = document.getElementById("editPreviewImage");
const previewVideo = document.getElementById("editPreviewVideo");
const cancelPreviewButton = document.getElementById("editCancelPreview");

fileUpload.addEventListener("change", function() {
    const file = fileUpload.files[0];
    if (file) {
        const fileType = file.type;

        // Verifica o tipo de arquivo (imagem ou vídeo)
        if (fileType.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "flex";
                previewVideo.style.display = "none";
                previewContainer.style.display = "flex";
            };
            reader.readAsDataURL(file);
        } else if (fileType.startsWith("video/")) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewVideo.src = e.target.result;
                previewVideo.style.display = "flex";
                previewImage.style.display = "none";
                previewContainer.style.display = "flex";
            };
            reader.readAsDataURL(file);
        }
    }
});

// Botão para cancelar a pré-visualização
cancelPreviewButton.addEventListener("click", function() {
    resetPreview();
});

function resetPreview() {
    previewImage.src = "";
    previewVideo.src = "";
    previewImage.style.display = "none";
    previewVideo.style.display = "none";
    previewContainer.style.display = "none";
}


// Exemplo de envio do formulário
document.getElementById("editForm").onsubmit = function(e) {
    e.preventDefault(); // Impede o comportamento padrão

    // Aqui você pode adicionar a lógica para salvar as alterações
    console.log("Título:", document.getElementById("postTitle").value);
    console.log("Descrição:", document.getElementById("postContent").value);
    
    // Fechar o modal após salvar as alterações
    closeEditPost();
};

// Função para fechar o modal apenas ao clicar no botão "Cancelar"
function closeFormPopup() {
    document.getElementById('formModal').style.display = 'none';
    document.getElementById('contactReason').value = ''; // Limpa o conteúdo do textarea
    removerFoto(); // Chama a função para limpar a foto selecionada
}

function openEditPost() {
    document.getElementById('editModal').style.display = 'flex';
}

// Função para fechar o modal de edição apenas ao clicar no botão "Cancelar"
function closeEditPost() {
    document.getElementById('editModal').style.display = 'none';
}

// Abrir/fechar o dropdown sem fechar o modal
document.querySelector('.dropdown-btn-tags').addEventListener('click', function (event) {
    event.stopPropagation(); // Evitar que o clique feche o modal
    document.querySelector('.dropdown-content-tags').classList.toggle('show');
});

document.querySelector('.dropdown-content-tags').addEventListener('click', function(event) {
    event.stopPropagation(); // Evita que o clique no dropdown feche o modal
});


// Fecha o dropdown se o usuário clicar fora dele
window.onclick = function(event) {
    if (!event.target.matches('.dropdown-btn-tags')) {
        const dropdowns = document.getElementsByClassName("dropdown-content-tags");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};

document.querySelectorAll('.cancel-button').forEach(button => {
    button.addEventListener('click', function() {
        if (this.closest('#editModal')) {
            closeEditPost();
        }
    });
});