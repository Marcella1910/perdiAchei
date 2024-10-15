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
