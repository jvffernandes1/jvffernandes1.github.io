function showDetails(id) {
    // Esconde todos os detalhes e remove classe 'show'
    document.querySelectorAll('.experience-detail').forEach(detail => {
      detail.classList.remove('show');
    });

    // Adiciona classe 'show' ao selecionado
    const selected = document.getElementById(id);
    if (selected) {
      selected.classList.add('show');
    }

    // Remove destaque de todos os blocos
    document.querySelectorAll('.experience-block').forEach(block => {
      block.classList.remove('selected');
    });

    // Adiciona destaque no bloco clicado
    const allBlocks = document.querySelectorAll('.experience-block');
    allBlocks.forEach(block => {
      if (block.getAttribute("onclick").includes(id)) {
        block.classList.add("selected");
      }
    });
  }