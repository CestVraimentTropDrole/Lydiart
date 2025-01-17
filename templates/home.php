<?php
    /*
        Template Name: Home
    */

    /*Section Presentation*/
    $presentation = fetchData(get_field(selector: 'presentation'));

    /*Section Selection*/
    $selection = get_field(selector: 'selection');
    $group = $selection['group'];

    foreach ($group as $key => $value) {
        if (!is_null($value)) {
            $frame[] = $value;
        }
    }

    /*Section Citation*/
    $citation = fetchData(get_field(selector: 'citation'));

    /*Section Atelier*/
    $atelier = fetchData(get_field(selector: 'atelier'));
?>

<?php get_header(); ?>
    
        <!--Section Présentation-->
        <section id="presentation" class="w-full h-dvh flex flex-row justify-between">
            <img class="w-1/2 h-full object-cover" src="<?php echo($presentation['src']); ?>" alt="<?php echo($presentation['alt']); ?>">
            <div class="w-1/2 flex flex-col justify-center px-24 gap-6">
                <div class="flex flex-col gap-3">
                    <h2><?php echo($presentation['title']); ?></h2>
                    <h1><?php echo($presentation['description']); ?></h2>
                </div>
                <a class="button text-base" href="<?php echo esc_url($presentation['url']); ?>" target="<?php echo esc_attr($presentation['target']); ?>"><?php echo esc_html($presentation['but_title']); ?></a>
            </div>
        </section>

        <!--Section Sélection-->
        <section id="selection" class="w-full flex flex-col gap-12 p-10 items-center">
            <h3><?php echo($selection['title']); ?></h3>

            <div class='w-full flex gap-4 justify-between'>
                <!--Affiche le contenu pour chaque groupe de champs de la section-->
                <?php
                    for ($i=0;$i<count($frame);$i++) {
                        $selection[$i] = fetchData($frame[$i]);

                        echo("<div class='w-1/3 flex flex-col gap-6 items-center'>
                                <img class='w-full aspect-4/3 object-cover shadow-frame' src=". $selection[$i]['src'] ." alt=". $selection[$i]['alt'] .">
                                <div>
                                    <p class='font-playfair text-base'>". $selection[$i]['title'] ."</p>
                                    <p class='font-poppins text-xs text-center'>". $selection[$i]['dimensions'] ."</p>
                                </div>
                            </div>");
                    }
                ?>
            </div>

            <a class='button text-base' href="<?php echo esc_url($selection['button']['url']); ?>" target="<?php echo esc_attr($selection['button']['target']); ?>"><?php echo esc_html($selection['button']['title']); ?></a>
        </section>

        <!--Section Citation-->
        <section class="flex gap-8 px-16 py-24 bg-creme justify-center items-center">
            <div class="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse">
            </div>
            <div class="text-center flex flex-col gap-12 w-4/5 justify-between">
                <h3><?php echo($citation['title']); ?></h3>
                <p class="font-poppins font-xs font-light"><?php echo($citation['content']); ?></p>
            </div>
            <div class="origin-center rotate-180">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse">
            </div>
        </section>

        <!--Section Atelier-->
        <section class="flex flex-col py-4 px-10 items-center">
            <div class="flex flex-col gap-7 items-center">            
                <h3 class="text-center"><?php echo($atelier['title']); ?></h3>
                <p class="text-center font-poppins font-light"><?php echo($atelier['content']); ?></p>
                <img class="shadow-frame" src="<?php echo($atelier['src']); ?>" alt="<?php echo($atelier['alt']); ?>">
                <a class="button text-base" href="<?php echo esc_url($atelier['url']); ?>" target="<?php echo esc_attr($atelier['target']); ?>"><?php echo esc_html($atelier['but_title']); ?></a>
            </div>
        </section>

        <?php get_footer(); ?>