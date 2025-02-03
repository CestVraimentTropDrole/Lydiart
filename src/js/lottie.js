document.addEventListener("DOMContentLoaded", function () {
  const players = document.querySelectorAll("dotlottie-player");

  if (!players.length) return;

  let loadedPlayers = new Set(); // Stocke les animations chargées

  players.forEach((player) => {
      let hasPlayed = false; // Pour éviter de rejouer plusieurs fois

      // Observer pour détecter si l'animation est visible
      const observer = new IntersectionObserver(
          (entries) => {
              entries.forEach((entry) => {
                  if (entry.isIntersecting && loadedPlayers.has(player) && !hasPlayed) {
                      console.log("Animation visible et chargée, lancement !");
                      player.play();
                      hasPlayed = true; // On empêche qu'elle se joue plusieurs fois
                      observer.unobserve(player); // On arrête l'observation pour cet élément
                  }
              });
          },
          { threshold: 0.5 } // L'animation démarre quand au moins 50% de l'élément est visible
      );

      observer.observe(player);

      // Écouteur pour savoir si l'animation est chargée
      player.addEventListener("load", function () {
          console.log("Animation chargée !");
          loadedPlayers.add(player); // On stocke l'animation comme chargée

          // Si elle est déjà visible au chargement, on la joue tout de suite
          if (player.getBoundingClientRect().top < window.innerHeight * 0.5) {
              console.log("L'animation était déjà visible, on la joue !");
              player.play();
              hasPlayed = true;
              observer.unobserve(player);
          }
      });
  });
});
