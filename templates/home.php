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
    $atelier = get_field(selector: 'atelier');
    $title4 = $atelier['title'];
    $content4 = $atelier['content'];
    $image4 = $atelier['image'];
    $src4 = $image4['url'];
    $alt4 = $image4['title'];
    $link4 = $atelier['button'];
    if( $link4 ): 
        $link_url4 = $link4['url'];
        $link_title4 = $link4['title'];
        $link_target4 = $link4['target'] ? $link4['target'] : '_self';
    endif; 
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-16">
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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse">
            <div class="text-center flex flex-col gap-12">
                <h3><?php echo($citation['title']); ?></h3>
                <p class="font-poppins font-xs font-light"><?php echo($citation['content']); ?></p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse">
        </section>

        <!--Section Atelier-->
        <section class="flex flex-col py-4 px-10 items-center">
            <div class="flex flex-col gap-7 items-center">            
                <h3 class="text-center"><?php echo($title4); ?></h3>
                <p class="text-center font-poppins font-light"><?php echo($content4); ?></p>
                <img class="shadow-frame" src="<?php echo($src4); ?>" alt="<?php echo($alt4); ?>">
                <a class="button text-base" href="<?php echo esc_url( $link_url4 ); ?>" target="<?php echo esc_attr( $link_target4 ); ?>"><?php echo esc_html( $link_title4 ); ?></a>
            </div>
        </section>

        <?php get_footer(); ?>