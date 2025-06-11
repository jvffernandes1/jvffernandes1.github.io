const whoami = document.getElementById('whoami');

whoami.addEventListener('mousemove', (e) => {
    const rect = whoami.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    whoami.style.setProperty('--x', `${x}px`);
    whoami.style.setProperty('--y', `${y}px`);
    whoami.style.setProperty('opacity', '1'); // mostra o brilho
});

whoami.addEventListener('mouseleave', () => {
    whoami.style.setProperty('opacity', '0'); // esconde o brilho
});
