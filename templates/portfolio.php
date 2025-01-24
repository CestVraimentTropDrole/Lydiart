<?php
    /*
        Template Name: Portfolio
    */
    
    /*Section En-tête*/
    $header = fetchData(get_field(selector: 'header'));

    /*Section Collections*/

    //Récupère toutes les données des collections
    $data_collec = get_terms(['taxonomy' => 'collection','hide_empty' => false,]);
    
    //Tableau qui récupère les infos importantes de chaque collection
    $collections = array();

    //Boucle qui parcourt chaque collection pour récupérer ses données
    for ($i=0; $i<count($data_collec); $i++) {
        $collections[$i]['name'] = $data_collec[$i]->name;
        $collections[$i]['id'] = $data_collec[$i]->term_id;
        $placeholder = "<img src='". get_template_directory_uri() ."/assets/images/Le bioù.jpg' alt='Placeholder'/>";

        //Récupère toutes les oeuvres d'une collections
        $collections[$i]['image'] = fetchPost($collections[$i]['id']);

        //Si la collection ne possède pas d'oeuvre avec une image, affiche un placeholder à la place
        $collections[$i]['image'] = $collections[$i]['image'] ? get_the_post_thumbnail($collections[$i]['image'][0]->ID) : $placeholder;
    }

    $idmain_collec = 0; //Variable de l'id de la collection affichée dans le carousel
    $oeuvres_array = fetchPost($collections[$idmain_collec]['id']); //Récupère toutes les oeuvres de la collection affichée

    /*Section Avis*/
    $testimonials = get_field('testimonials');

    //Boucle qui supprime tous les éléments vides de la section
    $testimonials = array_filter($testimonials, function ($value) {
        return !empty($value); // Supprime les chaînes vides
    });
?>

<?php get_header(); ?>

        <pre><?php
        ?></pre>
    
        <!--Section En-tête-->
        <section id="header" class="w-full h-fit flex flex-col px-5 py-10 gap-16 items-center text-center">
            <h4><?php echo($header['title']); ?></h4>

            <div class="w-3/5 flex flex-col gap-9 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse" class="w-[40px]">
                <p class="font-poppins font-light"><?php echo($header['description']); ?></p>
            </div>

            <div class="w-full h-auto flex flex-col gap-8 items-center">
                <div id="slider" class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true, "draggable": false, "pageDots": false, "lazyLoad": true }'>
                    
                    <?php
                        for ($i=0; $i<count($oeuvres_array); $i++) {
                            $title = get_the_title($oeuvres_array[$i]); //Nom de l'oeuvre
                            $image = get_the_post_thumbnail($oeuvres_array[$i]); //Image de l'oeuvre
                            $content = get_fields($oeuvres_array[$i]->ID); //Récupérer les champs ACF

                            echo("<div class='carousel-cell flex justify-center'>
                                    <div class='w-3/4 aspect-4/3 object-cover shadow-frame'>". $image ."</div>
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
                <h2>"<?php echo($collections[0]['name']); ?>"</p>
            </div>
        </section>

        <!--Section Collection-->
        <section id="collection" class="flex flex-col items-center px-5 py-6 gap-12">
            <div class="collection-row w-full flex px-20 justify-center items-center">

                <?php
                    $path = get_template_directory_uri();
                    for ($i=1; $i<count($collections); $i++) {

                        echo("<div class='collection-frame flex flex-col items-center gap-4'>
                                <div class='w-3/4 aspect-4/3 object-cover shadow-frame'>". $collections[$i]['image'] ."</div>
                                <h2>". $collections[$i]['name'] ."</h2>
                                <a class='button text-base' data-id=". $collections[$i]['id'] ." href='http://localhost/lydia_fize/index.php/portfolio/' target='_self'>Voir plus</a>
                            </div>");

                        if ($i%2==0) {
                            echo("</div><div class='collection-row w-full flex px-20 justify-center items-center'>");
                        }
                    }
                ?>

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