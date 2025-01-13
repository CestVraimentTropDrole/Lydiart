<?php
    /*
        Template Name: Accueil
    */
    $presentation = get_field(selector: 'presentation');
    $content = $presentation['content'];
    $link = $content['button'];
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
    endif; 
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit border-2 border-black border-solid">
        <section id="presentation" class="w-full">
            <div class="w-1/2 border-2 border-black border-solid">
                <h2><?php echo($content['title']); ?></h2>
                <h1><?php echo($content['description']); ?></h2>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            </div>
        </section>
    </div>

<?php get_footer(); ?>