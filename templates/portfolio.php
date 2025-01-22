<?php
    /*
        Template Name: Portfolio
    */

    function fetchPost($cat_id) {
        $posts_array = get_posts( //Récupère toutes les oeuvres de la catégorie affichée catégorie
            array(
                'posts_per_page' => -1,
                'post_type' => 'artwork',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'collection',
                        'field' => 'term_id',
                        'terms' => $cat_id
                    )
                )
            )
        );
        return $posts_array;
    }
    
    /*Section En-tête*/
    $header = fetchData(get_field(selector: 'header'));

    /*Collections*/
    $data = get_terms(['taxonomy' => 'collection','hide_empty' => false,]);
    $collections = array();
    $collec_img = array();

    for ($i=0; $i<count($data); $i++) {
        $collections[$i]['name'] = $data[$i]->name;
        $collections[$i]['id'] = $data[$i]->term_id;

        $collec_img[$i] = fetchPost($collections[$i]['id']);

        $collec_img[$i][0] = $collec_img[$i] ? get_the_post_thumbnail($collec_img[$i][0]->ID) : "vide";
    }

    $posts_array = fetchPost($collections[0]['id']);

    /*Section Avis*/
    $testimonials = get_field('testimonials');

    //Boucle qui supprime tous les éléments vides de la section
    $testimonials = array_filter($testimonials, function ($value) {
        return !empty($value); // Supprime les chaînes vides
    });
?>

<?php get_header(); ?>

        <pre><?php
            //var_dump($collec_img);
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
                        for ($i=0; $i<count($posts_array); $i++) {
                            $title = get_the_title($posts_array[$i]); //Nom de l'oeuvre
                            $image = get_the_post_thumbnail($posts_array[$i]); //Image de l'oeuvre
                            $content = get_fields($posts_array[$i]->ID); //Récupérer les champs ACF

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
                                        <a class='button text-xs' href='<?php echo home_url(); ?>/me-contacter/' target='_self'>Acquérir</a>
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
                                <div class='w-3/4 aspect-4/3 object-cover shadow-frame'>". $collec_img[$i][0] ."</div>
                                <h2>". $collections[$i]['name'] ."</h2>
                                <a class='button text-base' href='http://localhost/lydia_fize/index.php/portfolio/' target='_self'>Voir plus</a>
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