<?php
    /*
        Template Name: Accueil
    */

    /*Section Presentation*/
    $presentation = get_field(selector: 'presentation');
    $content = $presentation['content'];
    $link = $content['button'];
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif; 
    $image = $presentation['image'];
    $src = $image['url'];
    $alt = $image['title'];

    /*Section Selection*/
    $selection = get_field(selector: 'selection');
    $group = $selection['group'];
    $frame = [];
    $link = $content['button'];
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif; 

    foreach ($group as $key => $value) {
        if (!is_null($value)) {
            $frame[] = $value;
        }
    }
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-12">
        <!--Section Présentation-->
        <section id="presentation" class="w-full h-dvh flex flex-row justify-between">
            <img class="w-1/2 h-full object-cover" src="<?php echo($src); ?>" alt="<?php echo($alt); ?>">
            <div class="w-1/2 flex flex-col justify-center px-24 gap-6">
                <div class="flex flex-col gap-3">
                    <h2><?php echo($content['title']); ?></h2>
                    <h1><?php echo($content['description']); ?></h2>
                </div>
                <a class="button text-base" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        </section>

        <!--Section Sélection-->
        <section id="selection" class="flex flex-col gap-16">
            <h3><?php echo($selection['title']); ?></h3>
            <div>
                <div>
                    <?php echo($frame[0]['title']); ?>
                </div>
                <div>
                    <?php echo($frame[1]['title']); ?>
                </div>
                <div>
                    <?php echo($frame[2]['title']); ?>
                </div>
            </div>
        </section>
    </div>

<?php get_footer(); ?>