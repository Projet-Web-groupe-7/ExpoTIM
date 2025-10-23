<?php
function theme_tp_enqueue_styles() { 
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css'); 
    wp_enqueue_style('main-style', get_stylesheet_uri()); 
    // fichiers css
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css'); 
    wp_enqueue_style('main-gallerie', get_template_directory_uri() . '/css/gallerie.css'); 


    wp_enqueue_script(
        'cartes',
        get_template_directory_uri() . '/js/cartes.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/cartes.js'),
        true
    );
} 
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');
?>