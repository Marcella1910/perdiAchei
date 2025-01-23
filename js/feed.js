
// Abre o modal de deletar post 
function openModal() {
    document.getElementById('deleteModal').style.display = 'flex';
}

// Fecha o modal de deletar post 
function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

// Confirma se o email foi enviado 
function confirmSenha() {
    alert("Email enviado!");
    closeModal();
}

// Função para abrir o segundo popup (formulário) e fechar o primeiro
function openFormPopup() {
    // Obtém o postId do dataset do elemento de confirmação
    const postId = document.getElementById('confirmModal').dataset.postId;
    console.log("Debug: postId passado para o formulário: " + postId); // Mensagem de depuração
    // Define o valor do postId no campo oculto do formulário
    document.querySelector('#contactForm input[name="postId"]').value = postId;
    // Esconde a confirmação e exibe o formulário de contato
    document.getElementById("confirmModal").style.display = "none";
    document.getElementById("formModal").style.display = "flex";
}

// Função para fechar o segundo popup (formulário)
function closeFormPopup() {
    document.getElementById('formModal').style.display = 'none';
    document.getElementById('contactReason').value = ''; // Limpa o conteúdo do textarea
    removerFoto(); // Chama a função para limpar a foto selecionada
}

// Função para abrir o modal
function openReportForm(postId) {

    console.log("Debug: postId passado para o formulário: " + postId); // Mensagem de depuração
    // Define o valor do postId no campo oculto do formulário
    document.querySelector('#reportForm input[name="postId"]').value = postId;
    // Esconde a confirmação e exibe o formulário de contato
    const reportModal = document.getElementById('reportModal');
    if (reportModal) {
        reportModal.style.display = 'flex';
    }
}

// Função para fechar o modal e limpar a textarea
function closeReportForm() {
    const reportModal = document.getElementById('reportModal');
    const reportReason = document.getElementById('reportReason');

    if (reportModal) {
        reportModal.style.display = 'none';
    }
    if (reportReason) {
        reportReason.value = ''; // Limpa o conteúdo da textarea
    }
}

// Verifica se o elemento 'file-upload' existe antes de adicionar o evento
const fileUploadElement = document.getElementById('file-upload');

if (fileUploadElement) {
    fileUploadElement.addEventListener('change', function (event) {
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
                if (previewImage) {
                    previewImage.src = imageUrl;
                    previewImage.style.display = 'block';
                }
                if (previewVideo) previewVideo.style.display = 'none';
                if (previewContainer) previewContainer.style.display = 'block';
            } else if (fileType.startsWith('video/')) {
                // Se for um vídeo
                const videoUrl = URL.createObjectURL(file);
                if (previewVideo) {
                    previewVideo.src = videoUrl;
                    previewVideo.style.display = 'block';
                }
                if (previewImage) previewImage.style.display = 'none';
                if (previewContainer) previewContainer.style.display = 'block';
            } else {
                // Se o tipo de arquivo não for suportado
                alert('Formato de arquivo não suportado!');
            }
        }

        if (cancelButton) {
            cancelButton.addEventListener('click', () => {
                if (fileInput) fileInput.value = ''; // Limpa o valor do input
                if (previewImage) previewImage.src = ''; // Limpa a imagem de pré-visualização
                if (previewContainer) previewContainer.style.display = 'none'; // Esconde o contêiner de pré-visualização
            });
        }
    });
}

const toggleButtons = document.querySelectorAll('.toggle-button');

toggleButtons.forEach(button => {
    button.addEventListener('click', function () {
        toggleButtons.forEach(b => b.classList.remove('active')); // Remove 'active' de todos
        this.classList.add('active'); // Adiciona 'active' ao botão clicado
    });
});

// Seleciona todos os botões de menu
const menuButtons = document.querySelectorAll('.menu-button');

menuButtons.forEach(button => {
    button.addEventListener('click', function () {
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
document.addEventListener('click', function (e) {
    if (!e.target.closest('.menu-button')) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.style.display = 'none';
        });
    }
});





// Seleciona todos os elementos clicáveis (foto de perfil, nome e username)
const clickableElements = document.querySelectorAll('.clickable-profile');

// Adiciona um evento de clique em cada um deles
clickableElements.forEach(element => {
    element.addEventListener('click', function () {
        // Redireciona para a página meuperfil.php
        window.location.href = 'meuperfil.php';
    });
});

// Seleciona todos os elementos clicáveis (foto de perfil, nome e username)
const clickableElementsPerfil = document.querySelectorAll('.clickable-profile-alheio');

// Adiciona um evento de clique em cada um deles
clickableElementsPerfil.forEach(element => {
    element.addEventListener('click', function () {
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

        leitor.onload = function (e) {
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



function openConfirmPopup(postId) {
    console.log("Debug: postId recebido: " + postId); // Mensagem de depuração
    // Defina o valor do postId no campo oculto do formulário e exiba a confirmação
    document.getElementById('confirmModal').style.display = 'flex';
    document.getElementById('confirmModal').dataset.postId = postId; // Armazena o postId como um dataset no elemento de confirmação
}

// Função para fechar o primeiro popup
function closeConfirmPopup() {
    document.getElementById('confirmModal').style.display = 'none';
}



const contactForm = document.getElementById('contactForm');
const contactReasonInput = document.getElementById('contactReason');

if (contactForm && contactReasonInput) {  // Verifica se ambos os elementos existem
    contactForm.addEventListener('submit', function (event) {
        const contactReason = contactReasonInput.value;

        if (contactReason.trim() === "") {
            event.preventDefault(); // Impede o envio se a validação falhar
            alert("Por favor, insira as informações necessárias.");
        } else {
            // Deixa o formulário ser enviado normalmente
            console.log("Formulário validado e enviado.");
        }
    });
}


function openEditPost(postId) {
    // Faz uma requisição AJAX para carregar os dados da postagem
    fetch(`get_post_data.php?id=${postId}`)
        .then(response => response.json())
        .then(data => {
            if (data) {
                // Verifica se os dados foram carregados corretamente
                console.log("Dados recebidos para edição:", data);

                // Preenche os campos do modal com os dados da postagem
                document.getElementById("postTitle").value = data.titulo || "";
                document.getElementById("postContent").value = data.descricao || "";
                document.getElementById("editarCategorias").value = data.categoria || "";

                // Preenche o toggle do status
                if (data.status === "perdido") {
                    console.log(data.status);
                    document.getElementById("editPerdido").checked = true;
                } else if (data.status === "encontrado") {
                    console.log(data.status);
                    document.getElementById("editEncontrado").checked = true;
                }

                // Define o ID da postagem no campo hidden
                document.querySelector("input[name='post_id']").value = data.id;

                const previewContainer = document.getElementById("editPreviewContainer");
                const previewImage = document.getElementById("editPreviewImage");
                const previewVideo = document.getElementById("editPreviewVideo");

                if (data.imagem) {
                    const tipoImagem = data.tipo_imagem;

                    if (tipoImagem.includes("image")) {
                        previewImage.src = 'data:' + tipoImagem + ';base64,' + data.imagem;
                        previewImage.style.display = "block";
                        previewContainer.style.display = "block";
                    } else if (tipoImagem.includes("video")) {
                        const videoBlob = new Blob([new Uint8Array(data.imagem)], { type: tipoImagem });
                        const videoUrl = URL.createObjectURL(videoBlob);
                        previewVideo.src = videoUrl;
                        previewVideo.style.display = "block";
                        previewContainer.style.display = "block";
                    }
                }

                // Restaura o valor de mantenha_midia para true
                document.getElementById("mantenhaMidia").value = "true";

                // Exibe o modal
                document.getElementById("editModal").style.display = "flex";
            } else {
                console.warn("Nenhum dado encontrado para a postagem.");
            }
        })
        .catch(error => {
            console.error("Erro ao carregar os dados da postagem:", error);
        });
}

function saveEditPost() {
    const form = document.getElementById("editPostForm");
    const formData = new FormData(form);

    // Verificar o valor do status antes de enviar
    console.log("Valor do status enviado:", formData.get("status"));

    fetch("atualizar_post.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.text())
        .then(result => {
            console.log(result); // Mostra a resposta do servidor
            closeEditPost(); // Fecha o modal após salvar
            location.reload(); // Atualiza o feed
        })
        .catch(error => {
            console.error("Erro ao salvar a postagem:", error);
        });
}

// Função para fechar o modal
function closeEditPost() {
    document.getElementById("editModal").style.display = "none";
}


const fileUpload = document.getElementById("editFileUpload");
const previewContainer = document.getElementById("editPreviewContainer");
const previewImage = document.getElementById("editPreviewImage");
const previewVideo = document.getElementById("editPreviewVideo");
const cancelPreviewButton = document.getElementById("editCancelPreview");

if (fileUpload && previewContainer && previewImage && previewVideo && cancelPreviewButton) {
    fileUpload.addEventListener("change", function () {
        const file = fileUpload.files[0];
        if (file) {
            const fileType = file.type;

            // Verifica o tipo de arquivo (imagem ou vídeo)
            if (fileType.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "flex";
                    previewVideo.style.display = "none";
                    previewContainer.style.display = "flex";
                };
                reader.readAsDataURL(file);
            } else if (fileType.startsWith("video/")) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewVideo.src = e.target.result;
                    previewVideo.style.display = "flex";
                    previewImage.style.display = "none";
                    previewContainer.style.display = "flex";
                };
                reader.readAsDataURL(file);
            }
        }
    });

    cancelPreviewButton.addEventListener("click", function () {
        resetPreview();
    });
}

// Função para limpar a pré-visualização
function resetPreview() {
    if (previewImage && previewVideo && previewContainer) {
        previewImage.src = "";
        previewVideo.src = "";
        previewImage.style.display = "none";
        previewVideo.style.display = "none";
        previewContainer.style.display = "none";
    }
}


if (cancelPreviewButton) { // Verifica se o botão existe
    cancelPreviewButton.addEventListener("click", function () {
        resetPreview();
    });
}


function resetPreview() {
    previewImage.src = "";
    previewVideo.src = "";
    previewImage.style.display = "none";
    previewVideo.style.display = "none";
    previewContainer.style.display = "none";
}


// Função para fechar o modal apenas ao clicar no botão "Cancelar"
function closeFormPopup() {
    document.getElementById('formModal').style.display = 'none';
    document.getElementById('contactReason').value = ''; // Limpa o conteúdo do textarea
    removerFoto(); // Chama a função para limpar a foto selecionada
}


// Abrir/fechar o dropdown sem fechar o modal
document.querySelectorAll('.dropdown-btn-tags').forEach(button => {
    button.addEventListener('click', function (event) {
        event.stopPropagation(); // Evitar que o clique feche o modal

        // Obter o dropdown correspondente ao botão clicado
        const dropdownContent = this.nextElementSibling;

        // Fechar outros dropdowns abertos antes de abrir o atual
        document.querySelectorAll('.dropdown-content-tags').forEach(dropdown => {
            if (dropdown !== dropdownContent) {
                dropdown.classList.remove('show');
            }
        });

        // Alterna a visibilidade do dropdown atual
        dropdownContent.classList.toggle('show');
    });
});

// Evitar que o clique dentro do dropdown feche o modal
document.querySelectorAll('.dropdown-content-tags').forEach(dropdown => {
    dropdown.addEventListener('click', function (event) {
        event.stopPropagation(); // Impede que cliques dentro do dropdown fechem o modal
    });
});

// Fechar o dropdown ao clicar fora, sem fechar o modal
document.addEventListener('click', function (event) {
    document.querySelectorAll('.dropdown-content-tags').forEach(dropdown => {
        const dropdownBtn = dropdown.previousElementSibling; // O botão relacionado ao dropdown

        if (!dropdown.contains(event.target) && !dropdownBtn.contains(event.target)) {
            dropdown.classList.remove('show'); // Fecha o dropdown se clicar fora dele
        }
    });
});


// Fechar o modal apenas quando o botão "Cancelar" for clicado
document.querySelectorAll('.cancel-button').forEach(button => {
    button.addEventListener('click', function (event) {
        if (this.closest('#formModal')) {
            closeFormPopup();
        } else if (this.closest('#editModal')) {
            closeEditPost();
        }
    });
});

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

const profileUpload = document.getElementById("profile-upload");
const profileImage = document.getElementById("profile-image");

if (profileUpload && profileImage) { // Verifica se ambos os elementos existem
    profileUpload.addEventListener("change", function () {
        const file = profileUpload.files[0]; // Obtém o arquivo selecionado
        if (file && file.type.startsWith("image/")) { // Verifica se é uma imagem
            const reader = new FileReader();
            reader.onload = function (e) {
                profileImage.src = e.target.result; // Atualiza a imagem de visualização
            };
            reader.readAsDataURL(file); // Lê o arquivo como uma URL de dados
        } else {
            console.error("Por favor, selecione um arquivo de imagem.");
        }
    });
} else {
    console.error("Elemento 'profile-upload' ou 'profile-image' não encontrado.");
}


function openDeletePostModal(postId) {
    console.log("ID da postagem a ser excluída:", postId);  // Teste se o ID está correto
    const modal = document.getElementById('deletePostModal');
    const postIdInput = document.getElementById('postIdToDelete');

    if (postIdInput) {
        postIdInput.value = postId;
    }

    modal.style.display = 'flex';
}


function closeDeletePost() {
    const modal = document.getElementById('deletePostModal');
    modal.style.display = 'none';
}

function handleDeletePost(event) {
    const postId = document.getElementById('postIdToDelete').value;

    if (!postId) {
        event.preventDefault();
        alert("Erro: Nenhuma postagem foi selecionada para exclusão.");
        return false;
    }
    return true;
}


function openConfirmPopupItemPerdido(postId) {
    console.log("Debug: postId recebido: " + postId); // Mensagem de depuração
    // Defina o valor do postId no campo oculto do formulário e exiba a confirmação
    document.querySelector('#confirmModalItemPerdido').style.display = 'flex';
    document.getElementById('confirmModalItemPerdido').dataset.postId = postId; // Armazena o postId como um dataset no elemento de confirmação
}


// Função para abrir o modal de formulário após confirmar no modal de confirmação
function openFormPopupItemPerdido() {
    // Obtém o postId do dataset do elemento de confirmação
    const postId = document.getElementById('confirmModalItemPerdido').dataset.postId;
    console.log("Debug: postId passado para o formulário: " + postId); // Mensagem de depuração
    // Define o valor do postId no campo oculto do formulário
    document.querySelector('#contactFormItemPerdido input[name="postId"]').value = postId;
    // Esconde a confirmação e exibe o formulário de contato
    document.getElementById("confirmModalItemPerdido").style.display = "none";
    document.getElementById("formModalItemPerdido").style.display = "flex";
}

// Função para fechar o modal de confirmação
function closeConfirmPopupItemPerdido() {
    document.getElementById("confirmModalItemPerdido").style.display = "none";
}

// Função para fechar o modal de formulário
function closeFormPopupItemPerdido() {
    document.getElementById("formModalItemPerdido").style.display = "none";
}

// Função para exibir a foto ao fazer upload
function exibirFotoItemPerdido(event) {
    const preview = document.getElementById("preview-foto-item-perdido");
    const removerBtn = document.getElementById("botao-remover-foto-item-perdido");
    const containerPreviewFotoItemPerdido = document.getElementById("container-preview-foto-item-perdido");

    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = "block";
    removerBtn.style.display = "flex";
    containerPreviewFotoItemPerdido.style.display = 'flex';
}

// Função para excluir a foto
function excluirFotoItemPerdido() {
    const inputFile = document.getElementById("input-upload-foto-item-perdido");
    const preview = document.getElementById("preview-foto-item-perdido");
    const removerBtn = document.getElementById("botao-remover-foto-item-perdido");

    inputFile.value = "";
    preview.src = "#";
    preview.style.display = "none";
    removerBtn.style.display = "none";
}

function openConfirmModalMarcarComoEncontrado(postId) {
    document.getElementById("confirmModalMarcarComoEncontrado").style.display = "flex";
    console.log("Debug: postId recebido: " + postId); // Mensagem de depuração
    document.querySelector('#formMarcarComoEncontrado input[name="postId"]').value = postId;
}

function closeConfirmModalMarcarComoEncontrado() {
    document.getElementById("confirmModalMarcarComoEncontrado").style.display = "none";
}

function openConfirmModalMarcarComoReivindicado(postId) {
    document.getElementById("confirmModalMarcarComoReivindicado").style.display = "flex";
    console.log("Debug: postId recebido: " + postId); // Mensagem de depuração
    document.getElementById('confirmModalMarcarComoReivindicado').dataset.postId = postId; // Armazena o postId como um dataset no elemento de confirmação

}

function closeConfirmModalMarcarComoReivindicado() {
    document.getElementById("confirmModalMarcarComoReivindicado").style.display = "none";
}

function openFormModalMarcarComoReivindicado() {
    document.getElementById("confirmModalMarcarComoReivindicado").style.display = "none";
    document.getElementById("formModalMarcarComoReivindicado").style.display = "flex";
    const postId = document.getElementById('confirmModalMarcarComoReivindicado').dataset.postId;
    console.log("Debug: postId passado para o formulário: " + postId); // Mensagem de depuração
    document.querySelector('#formMarcarComoReivindicado input[name="postId"]').value = postId;
}

function closeFormModalMarcarComoReivindicado() {
    document.getElementById("formModalMarcarComoReivindicado").style.display = "none";
}

document.addEventListener('DOMContentLoaded', () => {
    const inputEmail = document.getElementById('emailReclamante');
    const suggestions = document.getElementById('suggestions');

    // Atualiza as sugestões com base no input
    inputEmail.addEventListener('input', function () {
        const query = this.value.trim();

        if (query.length > 1) {
            fetch(`buscarEmails.php?q=${encodeURIComponent(query)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao buscar sugestões.');
                    }
                    return response.json();
                })
                .then(data => {
                    suggestions.innerHTML = '';

                    if (Array.isArray(data)) {
                        if (data.length > 0) {
                            data.forEach(email => {
                                const suggestion = document.createElement('div');
                                suggestion.textContent = email;
                                suggestion.classList.add('suggestion-item');
                                suggestion.onclick = function () {
                                    inputEmail.value = email;
                                    suggestions.innerHTML = '';
                                };
                                suggestions.appendChild(suggestion);
                            });
                        } else {
                            suggestions.innerHTML = '<div class="no-suggestions">Nenhuma sugestão encontrada</div>';
                        }
                    } else if (data.error) {
                        console.error(data.error);
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
        } else {
            suggestions.innerHTML = '';
        }
    });

    // Esconde as sugestões ao clicar fora do campo de input e das sugestões
    document.addEventListener('click', function (event) {
        if (!inputEmail.contains(event.target) && !suggestions.contains(event.target)) {
            suggestions.innerHTML = '';
        }
    });
});


function showSuggestions(profiles) {
    suggestionsContainer.innerHTML = ""; // Limpa sugestões anteriores

    if (profiles.length > 0) {
        profiles.forEach(profile => {
            const suggestionItem = document.createElement("div");
            suggestionItem.classList.add("suggestion-item");
            suggestionItem.textContent = profile;
            suggestionItem.onclick = () => selectProfile(profile);
            suggestionsContainer.appendChild(suggestionItem);
        });
        suggestionsContainer.style.display = "block";
    } else {
        suggestionsContainer.style.display = "none";
    }
}

function selectProfile(profile) {
    const words = textarea.value.split(" ");
    words.pop(); // Remove a última palavra que estava sendo digitada
    words.push(profile); // Adiciona o perfil selecionado
    textarea.value = words.join(" ") + " ";
    suggestionsContainer.style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);

    // Exibe mensagem de sucesso
    if (params.has("success") && params.get("success") === "email_sent") {
        alert("Email enviado com sucesso!");
        window.history.replaceState(null, null, window.location.pathname); // Remove parâmetros da URL
    }

    // Exibe mensagem de erro, se houver
    if (params.has("error")) {
        const errorMessages = {
            session: "Sessão não iniciada ou e-mail do usuário não definido.",
            db_connection: "Erro de conexão com o banco de dados.",
            missing_data: "Dados do formulário estão faltando.",
            empty_message: "Por favor, insira uma mensagem válida.",
            query_preparation: "Erro ao preparar a consulta ao banco de dados.",
            no_recipient: "Não foi possível encontrar o destinatário para este post.",
            email_failure: "Erro ao enviar o e-mail.",
            email_exception: "Ocorreu um problema ao tentar enviar o e-mail.",
            email_not_registered: "O email fornecido não está registrado. Por favor, tente novamente."

        };

        const errorKey = params.get("error");
        const errorMessage = errorMessages[errorKey] || "Erro desconhecido.";
        alert(`Ocorreu um erro: ${errorMessage}`);
        window.history.replaceState(null, null, window.location.pathname); // Remove parâmetros da URL
    }
});

const searchInput = document.getElementById('search-input');
const suggestionsBox = document.getElementById('suggestions-box');

searchInput.addEventListener('input', function () {
    const query = this.value.trim();

    if (query.length > 0) {
        fetch(`suggestions.php?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                suggestionsBox.innerHTML = '';
                data.forEach(suggestion => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.className = 'suggestion-item';
                    suggestionItem.textContent = suggestion;

                    suggestionItem.addEventListener('click', () => {
                        searchInput.value = suggestion;
                        document.getElementById('search-form').submit();
                    });

                    suggestionsBox.appendChild(suggestionItem);
                });
                suggestionsBox.style.display = 'block';
            })
            .catch(err => {
                console.error('Erro ao buscar sugestões:', err);
                suggestionsBox.innerHTML = '<p>Erro ao carregar sugestões</p>';
            });
    } else {
        suggestionsBox.style.display = 'none';
    }
});

document.addEventListener('click', (e) => {
    if (!suggestionsBox.contains(e.target) && e.target !== searchInput) {
        suggestionsBox.style.display = 'none';
    }
});
