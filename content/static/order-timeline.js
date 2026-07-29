let ascending = true;

document.getElementById("toggleOrderBtn").addEventListener("click", () => {
	const container = document.getElementById("timelineContainer");
	const items = Array.from(container.querySelectorAll(".timeline-item"));

	// Remove os itens do container
	items.forEach(item => container.removeChild(item));

	// Ordena os itens com base no número do data-key nos títulos
	items.sort((a, b) => {
		const aNum = getTimelineIndex(a);
		const bNum = getTimelineIndex(b);
		return ascending ? bNum - aNum : aNum - bNum;
	});

	// Adiciona de volta na nova ordem
	items.forEach(item => container.appendChild(item));

	// Alterna para próxima ordem
	ascending = !ascending;
});

// Função para extrair o número final do data-key, ex: timeline_titulo3 => 3
function getTimelineIndex(item) {
	const elem = item.querySelector("h3[data-key]") || item.querySelector("h3 div");
	if (!elem) return 0;
	const key = elem.getAttribute("data-key");
	const match = key && key.match(/\d+$/);
	return match ? parseInt(match[0]) : 0;
}
