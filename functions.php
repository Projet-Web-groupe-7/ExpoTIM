<?php
function theme_tp_enqueue_styles() { 
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css'); 
    wp_enqueue_style('main-style', get_stylesheet_uri()); 
    // fichiers css
    wp_enqueue_style('style', get_template_directory_uri() . '/css/main.css'); 
} 
add_action('wp_enqueue_scripts', 'theme_tp_enqueue_styles');

// Chemin vers le dossier functions
  $functions_dir = get_template_directory() . '/functions/';

  // Liste des fichiers à inclure
  $function_files = array(
      'customizer.php',
  );

  // Boucle pour inclure tous les fichiers
  foreach ($function_files as $file) {
      include_once $functions_dir . $file;
  }
?>