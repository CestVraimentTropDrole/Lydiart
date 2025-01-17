document.addEventListener('DOMContentLoaded', function () {
    const carouselCells = document.querySelectorAll('.main-carousel .carousel-cell');
    if (!carouselCells.length) return;

    carouselCells.forEach((cell) => {
        const img = cell.querySelector('img');
        const cartel = cell.querySelector('.cartel');
        if (!img || !cartel) return;

        img.addEventListener('click', () => handleClick(cell, img, cartel, carouselCells));
    });
});

function handleClick(cell, img, cartel, carouselCells) {
    if (cell.classList.contains('selected')) {
        clearSelection(cell, img, cartel);
        return;
    }

    clearAllSelections(carouselCells);
    setSelection(cell, img, cartel);
}

function clearSelection(cell, img, cartel) {
    cell.classList.remove('selected');
    img.classList.remove('blurred');
    cartel.classList.remove('visible');
}

function setSelection(cell, img, cartel) {
    cell.classList.add('selected');
    img.classList.add('blurred');
    cartel.classList.add('visible');
}

function clearAllSelections(carouselCells) {
    carouselCells.forEach(otherCell => {
        const otherImg = otherCell.querySelector('img');
        const otherCartel = otherCell.querySelector('.cartel');
        if (!otherImg || !otherCartel) return;
        
        clearSelection(otherCell, otherImg, otherCartel);
    });
}

document.addEventListener('input', function (event) {
    if (event.target.tagName.toLowerCase() === 'textarea') {
        const textarea = event.target;

        // Réinitialise la hauteur pour recalculer correctement
        textarea.style.height = 'auto';

        // Ajuste la hauteur en fonction du défilement
        textarea.style.height = `${textarea.scrollHeight}px`;
    }
});