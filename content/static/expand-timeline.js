const items = document.querySelectorAll('.timeline-clickable');

items.forEach(item => {
item.addEventListener('click', () => {
  // Fecha todos
  items.forEach(i => {
    const text = i.querySelector('.timeline-text');
    if (text) text.classList.remove('show');
  });

  // Abre o clicado
  const text = item.querySelector('.timeline-text');
  if (text) text.classList.add('show');
});
});