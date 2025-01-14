<?php
    /*
        Template Name: Portfolio
    */    
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-16">
        <!--Section En-tête-->
        <section id="header" class="w-full h-fit flex flex-col px-5 py-12 gap-20 items-center text-center">
            <h4>Portfolio</h4>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse" class="w-[40px]">
                <p>Mes œuvres sont des prétextes pour me relier aux autres. La peinture fixe une trace, celle d'un geste guidé par l'émotion. À travers elle, je parle de mes peurs, mes joies et mes espoirs. Ce que vous voyez dans mes tableaux parle aussi de vous : ils deviennent des miroirs de vos propres mouvements d'âme, tandis que je ne suis qu'une interprète qui les rend visibles.</p>
            </div>

            <div class="w-full h-auto flex flex-col gap-8 items-center">
                <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "wrapAround": true, "draggable": false, "pageDots": false, "lazyLoad": true }'>
                    <div class="carousel-cell">
                        <img class="w-full aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/L'éléphant.jpg" alt="L'éléphant">
                            <div class="cartel w-fit px-3 py-4 shadow-frame bg-blanc_full flex flex-row gap-2 items-end">
                                <div class="flex flex-col items-start gap-2">
                                    <p>L'éléphant</p>
                                    <div class="flex flex-col gap-1 items-start">
                                        <p>Gorille de face aux couleurs vibrantes</p>
                                        <p>1200 x 889 cm</p>
                                        <p>Peinture au couteau</p>
                                    </div>
                                </div>
                                <a class="button text-base" href="http://localhost/lydia_fize/index.php/me-contacter/" target="_self">Acquérir</a>
                            </div>
                    </div>
                    <div class="carousel-cell">
                        <img class="w-full aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/La grue.jpg" alt="La grue">
                        <div>
                            <div class="cartel w-fit px-3 py-4 shadow-frame bg-blanc_full">Cartel</div>
                        </div>
                    </div>
                    <div class="carousel-cell">
                        <img class="w-full aspect-4/3 object-cover shadow-frame" src="<?php echo get_template_directory_uri(); ?>/assets/images/Le bioù.jpg" alt="Le bioù">
                        <div>
                            <div class="cartel w-fit px-3 py-4 shadow-frame bg-blanc_full">Cartel</div>
                        </div>
                    </div>
                </div>
                <h2>"Animaux totem"</p>
            </div>
        </section>

        <?php get_footer(); ?>