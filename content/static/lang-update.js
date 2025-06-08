document.addEventListener("DOMContentLoaded", function () {
const checkbox = document.getElementById("lang");

function atualizarTextos() {
    const idioma = checkbox.checked ? "en" : "pt";

    fetch("content/static/lang.json")
    .then(response => response.json())
    .then(data => {
        const textos = document.querySelectorAll("[data-key]");
        textos.forEach(el => {
        const chave = el.getAttribute("data-key");
        if (data[idioma][chave]) {
            el.innerHTML = data[idioma][chave];
        }
        });
    })
    .catch(error => console.error("Erro ao carregar idioma:", error));
}
atualizarTextos();
checkbox.addEventListener("change", atualizarTextos);
});