        <footer class="w-full flex flex-col items-center px-10 py-9 gap-12 bg-gris z-10">
            <div class="w-full flex flex-col items-center gap-4">
                <a class="flex items-center gap-2" href="https://www.instagram.com/lydiafize_art/" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_insta_blanc.svg" alt="Instagram" class="w-10">
                    <h2 class="text-blanc_full">@lydiafize_art</h2>
                </a>
                <?php echo do_shortcode('[insta-gallery id="0"]'); ?>
            </div>
            <div class="flex gap-4 flex-col lg:flex-row">
                <div class="flex gap-28 px-8 py-6 flex-col lg:flex-row">
                    <div class="flex flex-col gap-2 items-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_blanc.png" alt="Logo" class="w-28 h-32">
                        <h2 class="text-blanc_full text-3xl">Lydia Fize</h2>
                    </div>
                    <div class="flex flex-col gap-6">
                        <div class="flex gap-2">
                            <p class="font-poppins font-bold text-xl text-blanc_full">L'atelier</p>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_location.svg" alt="Location" class="w-7">
                        </div>
                        <div class="flex flex-col gap-3">
                            <p class="font-poppins text-blanc_full text-base">14 Rue des Gentianes</p> 
                            <p class="font-poppins text-blanc_full text-base">38500 Voiron</p> 
                            <p class="font-poppins text-blanc_full text-base">FRANCE</p>
                        </div>
                        <div class="flex gap-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_phone.svg" alt="Téléphone" class="w-7">
                            <p class="font-poppins text-blanc_full">06 84 56 21 43</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-4 py-6">
                    <p class="font-poppins text-blanc_full">Visite de l'atelier sur demande</p>
                    <a class="button text-base" href="<?php echo home_url(); ?>/me-contacter/" target="_self">Me contacter</a>
                </div>
            </div>
        </footer>
    </div>

    <?php wp_footer(); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var animations = document.querySelectorAll(".lottie-animation"); // Sélectionne tous les conteneurs d'animation

            animations.forEach(function (animationContainer) {
                var animationPath = animationContainer.getAttribute("data-lottie"); // Récupère le chemin JSON

                var animation = lottie.loadAnimation({
                    container: animationContainer,
                    renderer: "svg",
                    loop: false, // Empêche la répétition
                    autoplay: false, // Désactive l'autoplay au chargement
                    path: animationPath // Charge l'animation spécifique
                });

                // Observer pour détecter quand l'animation est visible à l'écran
                var observer = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            console.log("Animation visible : ", animationPath);
                            animation.play(); // Joue l'animation
                            observer.unobserve(animationContainer); // Arrête d'observer après la lecture
                        }
                    });
                }, { threshold: 0.5 }); // Se déclenche quand 50% du conteneur est visible

                observer.observe(animationContainer);
            });
        });
    </script>
</body>
</html>