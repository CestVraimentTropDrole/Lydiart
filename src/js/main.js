document.addEventListener('DOMContentLoaded', function () {
    // Sélectionne toutes les cellules du carousel
    const carouselCells = document.querySelectorAll('.main-carousel .carousel-cell');

    // Vérifie si carouselCells existe et est une NodeList
    if (carouselCells.length) {
        carouselCells.forEach((cell) => {
            const img = cell.querySelector('img');
            const cartel = cell.querySelector('.cartel');

            if (img && cartel) {  // S'assurer que img et cartel existent
                img.addEventListener('click', () => {
                    // Si l'image est déjà floue (classe "blurred" présente), on inverse les animations
                    if (cell.classList.contains('selected')) {
                        // Supprime la classe "selected", le flou et cache le cartel
                        cell.classList.remove('selected');
                        img.classList.remove('blurred');
                        cartel.classList.remove('visible');
                    } else {
                        // Sinon, applique la classe "selected" et le flou
                        carouselCells.forEach((otherCell) => {
                            const otherImg = otherCell.querySelector('img');
                            const otherCartel = otherCell.querySelector('.cartel');
                            if (otherCell !== cell) {
                                otherCell.classList.remove('selected'); // Retirer "selected" des autres cellules
                                otherImg.classList.remove('blurred'); // Enlever le flou des autres images
                                otherCartel.classList.remove('visible'); // Cacher le cartel des autres
                            }
                        });

                        // Ajoute la classe "selected" à la cellule cliquée
                        cell.classList.add('selected');
                        img.classList.add('blurred');
                        cartel.classList.add('visible');
                    }
                });
            }
        });
    }
});
