function irAvaliar() {
    window.location.href = "avaliar.html";
}
function criarPost() {
    window.location.href = "postagemAlerta.html";
}

// menu do feed

function abrirMenu() {
    document.querySelector(".avalie-nos").style.transition = ".2s";
    document.querySelector(".main-container").style.transition = ".2s";
    document.querySelector(".main-container").style.gridTemplateColumns = "19vw auto 20vw";
    document.querySelector(".menuFechar").style.display = "flex";
    document.querySelector(".menuFechar").style.float = "right";
    document.querySelector(".menuExpandir").style.opacity = 0;
    document.querySelector(".avalie-nos").style.display = "flex";
    
}

function fecharMenu() {
    document.querySelector(".main-container").style.gridTemplateColumns = "80px auto 20vw";
    document.querySelector(".menuFechar").style.display = "none";
    document.querySelector(".menuExpandir").style.opacity = 1;
    document.querySelector(".avalie-nos").style.display = "none";
    document.querySelector(".avalie-nos").style.transition = ".2s";
}

// menu da pagina de minhas postagens

function abrirMenuMeusPosts() {
    document.querySelector(".avalie-nos").style.transition = ".2s";
    document.querySelector(".main-container-my-posts").style.transition = ".2s";
    document.querySelector(".main-container-my-posts").style.gridTemplateColumns = "19vw auto";
    document.querySelector(".menuFechar").style.display = "flex";
    document.querySelector(".menuFechar").style.float = "right";
    document.querySelector(".menuExpandir").style.opacity = 0;
    document.querySelector(".avalie-nos").style.display = "flex";
}

function fecharMenuMeusPosts() {
    document.querySelector(".main-container-my-posts").style.gridTemplateColumns = "80px auto";
    document.querySelector(".menuFechar").style.display = "none";
    document.querySelector(".menuExpandir").style.opacity = 1;
    document.querySelector(".avalie-nos").style.display = "none";
    document.querySelector(".avalie-nos").style.transition = ".2s";
}

// menu da pagina de chats

function abrirMenuChats() {
    document.querySelector(".avalie-nos").style.transition = ".2s";
    document.querySelector(".main-container-chats").style.transition = ".2s";
    document.querySelector(".main-container-chats").style.gridTemplateColumns = "19vw auto 105vh";
    document.querySelector(".menuFechar").style.display = "flex";
    document.querySelector(".menuFechar").style.float = "right";
    document.querySelector(".menuExpandir").style.opacity = 0;
    document.querySelector(".avalie-nos").style.display = "flex";
}

function fecharMenuChats() {
    document.querySelector(".main-container-chats").style.gridTemplateColumns = "80px auto 105vh";
    document.querySelector(".menuFechar").style.display = "none";
    document.querySelector(".menuExpandir").style.opacity = 1;
    document.querySelector(".avalie-nos").style.display = "none";
    document.querySelector(".avalie-nos").style.transition = ".2s";
}

// menu das paginas de configuracao

function abrirMenuConfigs() {
    document.querySelector(".avalie-nos").style.transition = ".2s";
    document.querySelector(".main-container-config").style.transition = ".2s";
    document.querySelector(".main-container-config").style.gridTemplateColumns = "19vw auto";
    document.querySelector(".menuFechar").style.display = "flex";
    document.querySelector(".menuFechar").style.float = "right";
    document.querySelector(".menuExpandir").style.opacity = 0;
    document.querySelector(".avalie-nos").style.display = "flex";
}

function fecharMenuConfigs() {
    document.querySelector(".main-container-config").style.gridTemplateColumns = "80px auto";
    document.querySelector(".menuFechar").style.display = "none";
    document.querySelector(".menuExpandir").style.opacity = 1;
    document.querySelector(".avalie-nos").style.display = "none";
    document.querySelector(".avalie-nos").style.transition = ".2s";
}

// menu da pagina de avaliacao

function abrirMenuAvaliar() {
    document.querySelector(".avalie-nos").style.transition = ".2s";
    document.querySelector(".main-container-feedback").style.transition = ".2s";
    document.querySelector(".main-container-feedback").style.gridTemplateColumns = "19vw auto";
    document.querySelector(".menuFechar").style.display = "flex";
    document.querySelector(".menuFechar").style.float = "right";
    document.querySelector(".menuExpandir").style.opacity = 0;
    document.querySelector(".avalie-nos").style.display = "flex";
}

function fecharMenuAvaliar() {
    document.querySelector(".main-container-feedback").style.gridTemplateColumns = "80px auto";
    document.querySelector(".menuFechar").style.display = "none";
    document.querySelector(".menuExpandir").style.opacity = 1;
    document.querySelector(".avalie-nos").style.display = "none";
    document.querySelector(".avalie-nos").style.transition = ".2s";
}


// menu da pagina de perfil

function abrirMenuMeuPerfil() {
    document.querySelector(".avalie-nos").style.transition = ".2s";
    document.querySelector(".main-container-meuperfil").style.transition = ".2s";
    document.querySelector(".main-container-meuperfil").style.gridTemplateColumns = "19vw auto 80vh";
    document.querySelector(".menuFechar").style.display = "flex";
    document.querySelector(".menuFechar").style.float = "right";
    document.querySelector(".menuExpandir").style.opacity = 0;
    document.querySelector(".avalie-nos").style.display = "flex";
}

function fecharMenuMeuPerfil() {
    document.querySelector(".main-container-meuperfil").style.gridTemplateColumns = "80px auto 80vh";
    document.querySelector(".menuFechar").style.display = "none";
    document.querySelector(".menuExpandir").style.opacity = 1;
    document.querySelector(".avalie-nos").style.display = "none";
    document.querySelector(".avalie-nos").style.transition = ".2s";
}
