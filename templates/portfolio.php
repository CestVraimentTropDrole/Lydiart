<?php
    /*
        Template Name: Portfolio
    */

    //Récupère l'id de la collection dans le tableau de collections si elle est définie dans l'URL
    if (isset($_GET['idmain_collec'])) {
        $idmain_collec = $_GET['idmain_collec'];
    } else {
        $idmain_collec = 0; //Sinon afficher la première collection par défaut
    }
    

    /*Section En-tête*/
    $header = fetchData(get_field(selector: 'header'));


    /*Section Collections*/
    $data_collec = get_terms(['taxonomy' => 'collection','hide_empty' => false,]); //Récupère toutes les données des collections
    
    //Tableau qui récupère les infos importantes de chaque collection
    $collections = array();

    //Boucle qui parcourt chaque collection pour récupérer ses données
    for ($i=0; $i<count($data_collec); $i++) {
        $collections[$i]['name'] = $data_collec[$i]->name; //Nom de la collection
        $collections[$i]['id'] = $data_collec[$i]->term_id; //Id de la collection dans Wordpress
        $collections[$i]['order'] = $i; //Ordre de la collection dans Wordpress
        $placeholder = "<img src='". get_template_directory_uri() ."/assets/images/Le bioù.jpg' alt='Placeholder'/>";
    
        //Récupère toutes les oeuvres d'une collections
        $collections[$i]['image'] = fetchPost($collections[$i]['id']);
    
        //Si la collection ne possède pas d'oeuvre avec une image, affiche un placeholder à la place
        $collections[$i]['image'] = $collections[$i]['image'] ? get_the_post_thumbnail($collections[$i]['image'][0]->ID) : $placeholder;
    }

    // Crée un nouveau tableau avec la collection de l'index idmain_collec en premier
    $ordered_collections = array();
    if ($idmain_collec >= 0 && $idmain_collec < count($collections)) {
        // Ajoute la collection de l'index idmain_collec en premier
        $ordered_collections[] = $collections[$idmain_collec];

        // Ajoute toutes les autres collections, sauf celle qui est déjà ajoutée
        foreach ($collections as $key => $collection) {
            if ($key != $idmain_collec) {
                $ordered_collections[] = $collection;
            }
        }
    } else {
        // Si l'index idmain_collec est invalide, on garde l'ordre d'origine
        $ordered_collections = $collections;
    }

    $oeuvres_array = fetchPost($ordered_collections[0]['id']); // Récupère toutes les œuvres de la première collection


    /*Section Avis*/
    $testimonials = get_field('testimonials');

    //Boucle qui supprime tous les éléments vides de la section
    $testimonials = array_filter($testimonials, function ($value) {
        return !empty($value); // Supprime les chaînes vides
    });
?>

<?php get_header(); ?>

        <!--Section En-tête-->
        <section id="header" class="w-full h-fit flex flex-col px-5 py-10 gap-16 items-center text-center">
            <h4><?php echo($header['title']); ?></h4>

            <div class="w-3/5 flex flex-col gap-9 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse" class="w-[40px]">
                <p class="font-poppins font-light"><?php echo($header['description']); ?></p>
            </div>

            <div class="w-full h-auto flex flex-col gap-8 items-center">
                <div class="hidden lg:absolute lg:block overflow-hidden z-0 right-0 h-[50vh] w-[100dvw]">
                    <div class="lottie-animation absolute w-full h-full" data-lottie="<?php echo get_template_directory_uri(); ?>/assets/images/trait.json"></div>
                </div>

                <div id="slider" class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false, "lazyLoad": true }'>
                    
                    <?php
                        for ($i=0; $i<count($oeuvres_array); $i++) {
                            $title = get_the_title($oeuvres_array[$i]); //Nom de l'oeuvre
                            $image = get_the_post_thumbnail($oeuvres_array[$i]); //Image de l'oeuvre
                            $content = get_fields($oeuvres_array[$i]->ID); //Récupérer les champs ACF

                            echo("<div class='carousel-cell flex justify-center'>
                                    <div class='image-container w-3/4 object-cover shadow-frame overflow-visible'>". $image ."</div>
                                    
                                    <div class='cartel w-fit px-3 py-4 shadow-frame bg-blanc_full flex flex-row gap-2 items-end'>
                                        <div class='flex flex-col items-start gap-2'>
                                            <p class='font-playfair font-medium text-lg'>". $title ."</p>
                                            <div class='flex flex-col gap-1 items-start'>
                                                <p class='font-poppins text-xs'>". $content['description'] ."</p>
                                                <p class='font-poppins text-xs'>". $content['dimensions']."</p>
                                                <p class='font-poppins text-xs'>". $content['type'] ."</p>
                                            </div>
                                        </div>
                                        <a class='button text-xs' href=". home_url() ."/me-contacter/' target='_self'>Acquérir</a>
                                    </div>
                                </div>");
                        }
                    ?>

                </div>

                <!--Affiche le nom de la collection-->
                <h2>"<?php echo($ordered_collections[0]['name']); ?>"</p>
            </div>
        </section>

        <!--Section Collection-->
        <section id="collection" class="flex flex-col items-center px-5 py-6 gap-12 z-10">
            <div class="collection-row w-full flex flex-col lg:flex-row lg:px-20 lg:justify-around items-center gap-6 lg:gap-0">

                <?php
                    $path = home_url();
                    for ($i=1; $i<count($ordered_collections); $i++) {

                        echo("<div class='collection-frame w-full lg:w-1/2 flex flex-col items-center gap-4'>
                                <div class='collection-image w-full lg:w-3/4 aspect-3/4 object-cover shadow-frame'>". $ordered_collections[$i]['image'] ."</div>
                                <h2>". $ordered_collections[$i]['name'] ."</h2>
                                <a class='button collection-button text-base' href='". $path ."/portfolio?idmain_collec=". $ordered_collections[$i]['order'] ."'>Voir plus</a>
                            </div>");

                        if ($i%2==0) {
                            echo("</div><div class='collection-row w-full flex flex-col lg:flex-row lg:px-20 lg:justify-around items-center gap-6 lg:gap-0'>");
                        }
                    }
                ?>

            </div>
        </section>

        <!--Section Avis-->
        <section id="testimonials" class="flex flex-col items-center gap-6 p-6 lg:p-0">
            <h3>Quelques avis :</h3>

            <div class="main-carousel avis-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false, "wrapAround": true, "autoPlay": true }'>
                
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