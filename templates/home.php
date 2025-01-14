<?php
    /*
        Template Name: Home
    */

    /*Section Presentation*/
    $presentation = get_field(selector: 'presentation');
    $link = $presentation['button'];
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif; 
    $image = $presentation['image'];
    $src1 = $image['url'];
    $alt1 = $image['title'];

    /*Section Selection*/
    $selection = get_field(selector: 'selection');
    $group = $selection['group'];
    $frame = [];
    $link2 = $selection['button'];
    if( $link2 ): 
        $link2_url = $link2['url'];
        $link2_title = $link2['title'];
        $link2_target = $link2['target'] ? $link2['target'] : '_self';
    endif; 

    foreach ($group as $key => $value) {
        if (!is_null($value)) {
            $frame[] = $value;
        }
    }

    $image = [];
    $src = [];
    $alt = [];
    for ($i=0; $i<3; $i++) {
        $image = $frame[$i]['image'];
        $src[$i] = $image['url'];
        $alt[$i] = $image['title'];
    }

    /*Section Citation*/
    $citation = get_field(selector: 'citation');
    $title3 = $citation['title'];
    $content3 = $citation['content'];

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
            <img class="w-1/2 h-full object-cover" src="<?php echo($src1); ?>" alt="<?php echo($alt1); ?>">
            <div class="w-1/2 flex flex-col justify-center px-24 gap-6">
                <div class="flex flex-col gap-3">
                    <h2><?php echo($presentation['title']); ?></h2>
                    <h1><?php echo($presentation['description']); ?></h2>
                </div>
                <a class="button text-base" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        </section>

        <!--Section Sélection-->
        <section id="selection" class="w-full flex flex-col gap-12 p-10 items-center">
            <h3><?php echo($selection['title']); ?></h3>
            <div class="w-full flex gap-4 justify-between">
                <div class=" w-1/3 flex flex-col gap-6 items-center">
                    <img class="w-full aspect-4/3 object-cover" src="<?php echo($src[0]); ?>" alt="<?php echo($alt[0]); ?>">
                    <div>
                        <p class="font-playfair text-base"><?php echo($frame[0]['title']); ?></p>
                        <p class="font-poppins text-xs text-center"><?php echo($frame[0]['dimensions']); ?></p>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col gap-6 items-center">
                    <img class="w-full aspect-4/3 object-cover" src="<?php echo($src[1]); ?>" alt="<?php echo($alt[1]); ?>">
                    <div>                        
                        <p class="font-playfair text-base"><?php echo($frame[1]['title']); ?></p>
                        <p class="font-poppins text-xs text-center"><?php echo($frame[1]['dimensions']); ?></p>
                    </div>
                </div>
                <div class="w-1/3 flex flex-col gap-6 items-center">
                    <img class="w-full aspect-4/3 object-cover" src="<?php echo($src[2]); ?>" alt="<?php echo($alt[2]); ?>">
                    <div> 
                        <p class="font-playfair text-base"><?php echo($frame[2]['title']); ?></p>
                        <p class="font-poppins text-xs text-center"><?php echo($frame[2]['dimensions']); ?></p>
                    </div>
                </div>
            </div>
            <a class="button text-base" href="<?php echo esc_url( $link2_url ); ?>" target="<?php echo esc_attr( $link2_target ); ?>"><?php echo esc_html( $link2_title ); ?></a>
        </section>

        <!--Section Citation-->
        <section class="flex gap-8 px-16 py-24 bg-creme justify-center items-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse">
            <div class="text-center flex flex-col gap-12">
                <h3><?php echo($title3); ?></h3>
                <p class="font-poppins font-xs font-light"><?php echo($content3); ?></p>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/format_quote.svg" alt="Parenthèse">
        </section>

        <!--Section Atelier-->
        <section class="flex flex-col py-4 px-10 items-center">
            <div class="flex flex-col gap-7 items-center">            
                <h3 class="text-center"><?php echo($title4); ?></h3>
                <p class="text-center font-poppins font-light"><?php echo($content4); ?></p>
                <img class="" src="<?php echo($src4); ?>" alt="<?php echo($alt4); ?>">
                <a class="button text-base" href="<?php echo esc_url( $link_url4 ); ?>" target="<?php echo esc_attr( $link_target4 ); ?>"><?php echo esc_html( $link_title4 ); ?></a>
            </div>
        </section>

        <?php get_footer(); ?>