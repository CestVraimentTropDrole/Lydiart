<?php
    /*
        Template Name: Portfolio
    */
    
    /*Section En-tête*/
    $header = fetchData(get_field(selector: 'header'));

    /*Collections*/
    $collections = get_terms(['taxonomy' => 'collection','hide_empty' => false,]);

    /*Section Avis*/
    $testimonials = get_field(selector: 'testimonials');

    //Boucle qui supprime tous les éléments vides de la section
    $testimonials = array_filter($testimonials, function ($value) {
        return !empty($value); // Supprime les chaînes vides
    });
?>

<?php get_header(); ?>

        <pre><?php
        ?></pre>
    
        <!--Section En-tête-->
        <section id="header" class="w-full h-fit flex flex-col px-5 py-12 gap-16 items-center text-center">
            <h4><?php echo($header['title']); ?></h4>

            <div class="w-3/5 flex flex-col gap-9 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse" class="w-[40px]">
                <p class="font-poppins font-light"><?php echo($header['description']); ?></p>
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
                                <a class="button text-xs" href="<?php echo home_url(); ?>/me-contacter/" target="_self">Acquérir</a>
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

                <!--Affiche le nom de la collection-->
                <h2>"<?php echo($collections[1]->name); ?>"</p>
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

            <div class="main-carousel avis-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false, "wrapAround": true }'>
                
                <!--Boucle qui affiche chaque commentaire-->
                <?php
                    foreach ($testimonials as $key => $review) {
                        $name = $review['name'];
                        $message = $review['message'];

                        echo("<div class='carousel-cell w-auto bg-comm'>
                                <div class='inner-cell flex flex-col items-start p-7 gap-10'>
                                    <p class='font-poppins text-xl'>". $name ."</p>
                                    <p class='font-poppins font-light'>". $message ."</p>
                                </div>
                            </div>");
                    }
                ?>

            </div>
        </section>

        <?php get_footer(); ?>