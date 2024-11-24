document.addEventListener("DOMContentLoaded", () => {
    const ativaBarraBtn = document.getElementById("ativa-barra");
    const barraAcessibilidade = document.getElementById("accessibility-bar");

    // Recuperar o estado do localStorage
    const isAcessibilidadeAtiva = localStorage.getItem("acessibilidadeAtiva") === "true";

    // Aplicar o estado inicial
    barraAcessibilidade.style.display = isAcessibilidadeAtiva ? "flex" : "none";

    // Alternar visibilidade ao clicar no botão
    ativaBarraBtn.addEventListener("click", () => {
        const estaAtiva = barraAcessibilidade.style.display === "flex";
        barraAcessibilidade.style.display = estaAtiva ? "none" : "flex";

        // Salvar o estado no localStorage
        localStorage.setItem("acessibilidadeAtiva", !estaAtiva);
    });
});


// Limites de tamanho de fonte
var minFontSize = 12; // tamanho mínimo da fonte em pixels
var maxFontSize = 24; // tamanho máximo da fonte em pixels

// Função para aumentar o tamanho da fonte com limite
function increaseFontSize() {
    document.querySelectorAll('.adjustable-font *').forEach((element) => {
        var style = window.getComputedStyle(element, null).getPropertyValue('font-size');
        var currentSize = parseFloat(style);
        if (currentSize < maxFontSize) {
            element.style.fontSize = (currentSize + 2) + 'px';
        }
    });
    localStorage.setItem('fontSize', 'increase'); // Salva o estado no localStorage
}

// Função para diminuir o tamanho da fonte com limite
function decreaseFontSize() {
    document.querySelectorAll('.adjustable-font *').forEach((element) => {
        var style = window.getComputedStyle(element, null).getPropertyValue('font-size');
        var currentSize = parseFloat(style);
        if (currentSize > minFontSize) {
            element.style.fontSize = (currentSize - 2) + 'px';
        }
    });
    localStorage.setItem('fontSize', 'decrease'); // Salva o estado no localStorage
}

// Função para resetar o tamanho da fonte para o original do CSS
function resetFontSize() {
    document.querySelectorAll('.adjustable-font *').forEach((element) => {
        element.style.fontSize = ''; // Remove o estilo inline, retornando ao CSS original
    });
    localStorage.removeItem('fontSize'); // Remove o estado do localStorage
}

// Função para alternar o modo de alto contraste
function toggleHighContrast() {
    var body = document.body;
    body.classList.remove('low-contrast'); // Remove baixo contraste, se estiver ativado
    body.classList.toggle('high-contrast'); // Alterna alto contraste
    localStorage.setItem('contrastMode', body.classList.contains('high-contrast') ? 'high' : 'default'); // Salva o estado no localStorage
}

// Função para alternar o modo de baixo contraste
function toggleLowContrast() {
    var body = document.body;
    body.classList.remove('high-contrast'); // Remove alto contraste, se estiver ativado
    body.classList.toggle('low-contrast'); // Alterna baixo contraste
    localStorage.setItem('contrastMode', body.classList.contains('low-contrast') ? 'low' : 'default'); // Salva o estado no localStorage
}

// Ao carregar a página, verificamos as configurações salvas no localStorage
window.onload = function () {
    // Recuperar tamanho da fonte
    const fontSizeState = localStorage.getItem('fontSize');
    if (fontSizeState === 'increase') {
        increaseFontSize();
    } else if (fontSizeState === 'decrease') {
        decreaseFontSize();
    }

    // Verificar e aplicar a fonte salva no localStorage
    if (localStorage.getItem('font') === 'alternative') {
        document.body.classList.add('alternative-font');
    }

    // Recuperar modo de contraste
    if (localStorage.getItem('contrastMode') === 'high') {
        document.body.classList.add('high-contrast');
    } else if (localStorage.getItem('contrastMode') === 'low') {
        document.body.classList.add('low-contrast');
    }

};
