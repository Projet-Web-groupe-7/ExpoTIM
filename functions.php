<?php
function theme_tp_enqueue_styles() { 
wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css'); 
wp_enqueue_style('main-style', get_stylesheet_uri()); 
} 
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');
?>