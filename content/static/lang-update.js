document.addEventListener("DOMContentLoaded", () => {
  // Seleciona os dois check‑boxes de idioma
  const checkboxes = document.querySelectorAll("#lang, #lang2");

  function atualizarTextos() {
    // Se pelo menos um estiver marcado → inglês, senão → português
    const idioma = Array.from(checkboxes).some(cb => cb.checked) ? "en" : "pt";

    fetch("content/static/lang.json")
      .then(r => r.json())
      .then(data => {
        document.querySelectorAll("[data-key]").forEach(el => {
          const chave = el.getAttribute("data-key");
          if (data[idioma][chave]) {
            el.innerHTML = data[idioma][chave];
          }
        });
      })
      .catch(e => console.error("Erro ao carregar idioma:", e));
  }

  // Chama uma vez no carregamento
  atualizarTextos();

  // Escuta mudanças em ambos
  checkboxes.forEach(cb => cb.addEventListener("change", atualizarTextos));
});
