<?php

//Ajout d'une feuille CSS
function add_style() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css', false);
} //Hook
add_action( 'wp_enqueue_scripts', 'add_style' );

//Ajout d'un fichier JS
function add_script() {
    wp_enqueue_script('main-js', get_template_directory_uri() . '/main.js', array(), false, true);
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

?>