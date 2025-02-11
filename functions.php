<?php

//Ajout d'une feuille CSS
function add_style() {
    wp_enqueue_style('flickity', get_template_directory_uri() . '/css/flickity.css', false);
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', false);
    wp_enqueue_style('input-style', get_template_directory_uri() . '/css/input.css', false);
    wp_enqueue_style('portfolio-style', get_template_directory_uri() . '/css/portfolio.css', false);
    wp_enqueue_style('form-style', get_template_directory_uri() . '/css/form.css', false);
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/footer.css', false);
} //Hook
add_action( 'wp_enqueue_scripts', 'add_style' );

//Ajout d'un fichier JS
function add_script() {
    wp_enqueue_script('flickity', get_template_directory_uri() . '/src/js/flickity.pkgd.min.js', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/src/js/main.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'add_script' );

//Ajout d'un menu
function custom_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => 'Menu principal',
    ) );
}
add_action( 'after_setup_theme', 'custom_register_nav_menu', 0 );

//Ajout d'une image à la une
add_theme_support( 'post-thumbnails' );


add_image_size('custom-size', 190, 190, true);


//Fonction qui récupère les données d'ACF
function fetchData($section) {
    $data = array();
    if (isset($section['image'])) { //S'il y a une image
        $data['src'] = $section['image']['url'];
        $data['alt'] = $section['image']['title'];
    }
    if (isset($section['title'])) { $data['title'] = $section['title']; }
    if (isset($section['description'])) { $data['description'] = $section['description']; }
    if (isset($section['content'])) { $data['content'] = $section['content']; }
    
    if (isset($section['button'])) {
        $data['url'] = $section['button']['url'];
        $data['but_title'] = $section['button']['title'];
        $data['target'] = $section['button']['target'] ? $section['button']['target'] : '_self';
    }
    if (isset($section['dimensions'])) { $data['dimensions'] = $section['dimensions']; }
    return($data);
}

//Fonction qui cherche les oeuvres des collections selon leur id
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

?>