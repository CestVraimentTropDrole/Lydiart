<?php
    /*
        Template Name: Portfolio
    */    
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-16">
        <!--Section En-tête-->
        <section id="header" class="w-full h-fit flex flex-col px-5 py-12 gap-16 items-center text-center">
            <h4>Portfolio</h4>
            <div class="w-3/5 flex flex-col gap-9 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse" class="w-[40px]">
                <p>Mes œuvres sont des prétextes pour me relier aux autres. La peinture fixe une trace, celle d'un geste guidé par l'émotion. À travers elle, je parle de mes peurs, mes joies et mes espoirs. Ce que vous voyez dans mes tableaux parle aussi de vous : ils deviennent des miroirs de vos propres mouvements d'âme, tandis que je ne suis qu'une interprète qui les rend visibles.</p>
            </div>

            <div class="w-full h-auto flex flex-col gap-8 items-center">
                <div id="slider" class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false, "lazyLoad": true }'>
                    <div class="carousel-cell flex justify-center">
                        <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                            <div class="cartel w-fit px-3 py-4 shadow-frame bg-blanc_full flex flex-row gap-2 items-end">
                                <div class="flex flex-col items-start gap-2">
                                    <p class="font-playfair font-medium text-lg">L'éléphant</p>
                                    <div class="flex flex-col gap-1 items-start">
                                        <p class="font-poppins text-xs">Gorille de face aux couleurs vibrantes</p>
                                        <p class="font-poppins text-xs">1200 x 889 cm</p>
                                        <p class="font-poppins text-xs">Peinture au couteau</p>
                                    </div>
                                </div>
                                <a class="button text-xs" href="http://localhost/lydia_fize/index.php/me-contacter/" target="_self">Acquérir</a>
                            </div>
                    </div>
                    <div class="carousel-cell flex justify-center">
                        <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/La grue.jpg" alt="La grue">
                        <div>
                            <div class="cartel w-fit px-3 py-4 shadow-frame bg-blanc_full">Cartel</div>
                        </div>
                    </div>
                    <div class="carousel-cell flex justify-center">
                        <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/Le bioù.jpg" alt="Le bioù">
                        <div>
                            <div class="cartel w-fit px-3 py-4 shadow-frame bg-blanc_full">Cartel</div>
                        </div>
                    </div>
                </div>
                <h2>"Animaux totem"</p>
            </div>
        </section>

        <!--Section Collection-->
        <section id="collection" class="flex flex-col items-center px-5 py-6 gap-12">
            <div class="collection-row w-full flex px-20 justify-center items-center">
                <div class="collection-frame flex flex-col items-center gap-4">
                    <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                    <h2>"Le corps"</h2>
                    <a class="button text-base" href="http://localhost/lydia_fize/index.php/portfolio/" target="_self">Voir plus</a>
                </div>
                <div class="collection-frame flex flex-col items-center gap-4">
                    <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                    <h2>"Sagesses du monde"</h2>
                    <a class="button text-base" href="http://localhost/lydia_fize/index.php/portfolio/" target="_self">Voir plus</a>
                </div>
            </div>
            <div class="collection-row w-full flex px-20 justify-center items-center">
                <div class="collection-frame flex flex-col items-center gap-4">
                    <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                    <h2>"Le corps"</h2>
                    <a class="button text-base" href="http://localhost/lydia_fize/index.php/portfolio/" target="_self">Voir plus</a>
                </div>
                <div class="collection-frame flex flex-col items-center gap-4">
                    <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                    <h2>"Sagesses du monde"</h2>
                    <a class="button text-base" href="http://localhost/lydia_fize/index.php/portfolio/" target="_self">Voir plus</a>
                </div>
            </div>
            <div class="collection-row w-full flex px-20 justify-center items-center">
                <div class="collection-frame w-1/2 flex flex-col items-center gap-4">
                    <img class="w-3/4 aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                    <h2>"Le corps"</h2>
                    <a class="button text-base" href="http://localhost/lydia_fize/index.php/portfolio/" target="_self">Voir plus</a>
                </div>
            </div>
        </section>

        <!--Section Avis-->
        <section id="testimonials" class="flex flex-col items-center gap-6">
            <h3>Quelques avis :</h3>
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false, "wrapAround": true }'>
                <div class="carousel-cell w-auto bg-comm shadow-frame">
                    <div class="inner-cell flex flex-col items-start p-7 gap-10">
                        <p class="font-poppins text-xl">Maya47</p>
                        <p class="font-poppins font-light">“Une grande sensibilité dans les oeuvres présentées” </p>
                    </div>
                </div>
                <div class="carousel-cell w-auto bg-comm shadow-frame">
                    <div class="inner-cell flex flex-col items-start p-7 gap-10">
                        <p class="font-poppins text-xl">Abdelartiste74</p>
                        <p class="font-poppins font-light">“Ces oeuvres m'ont fait réfléchir sur ma vie” </p>
                    </div>
                </div>
                <div class="carousel-cell w-auto bg-comm shadow-frame">
                    <div class="inner-cell flex flex-col items-start p-7 gap-10">
                        <p class="font-poppins text-xl">ThéoFrechetGaming</p>
                        <p class="font-poppins font-light">“J'ai adoré le tableau de captain america, car j'adore les avengers” </p>
                    </div>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>