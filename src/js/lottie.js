document.addEventListener("DOMContentLoaded", function () {
    const player = document.querySelector("dotlottie-player");

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            player.play(); // Démarre l'animation
          } else {
            player.stop(); // Stoppe l'animation si elle sort de l'écran (optionnel)
          }
        });
      },
      { threshold: 0.7 } // L'animation démarre quand au moins 50% de l'élément est visible
    );

    observer.observe(player);
  });