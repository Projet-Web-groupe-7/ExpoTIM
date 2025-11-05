<?php
/**
 *  Pour l'ajout d'options à notre thème
 */

  function mon_theme_supports() {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_image_size('logo', 75, 75, true);
    add_theme_support('custom-logo', array(
      'height'      => 150,
      'width'       => 150,
      'flex-height' => true,
      'flex-width'  => true,
    ));
  }
      
  add_action( 'after_setup_theme', 'mon_theme_supports' );


  function theme_tp_enqueue_styles() { 
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css'); 
    wp_enqueue_style('main-style', get_stylesheet_uri()); 
    // fichiers css
    wp_enqueue_style('expo-header-style', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('expo-main-style', get_template_directory_uri() . '/css/main.css'); 
    wp_enqueue_style('expo-front-page-style', get_template_directory_uri() . '/css/front-page.css');
    wp_enqueue_style('expo-footer-style', get_template_directory_uri() . '/css/footer.css');
    wp_enqueue_style('expo-galerie-style', get_template_directory_uri() . '/css/galerie.css');

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

  /**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */
function custom_search_projects_by_member( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
        global $wpdb;

        $search_term = trim( $query->get( 's' ) );

        if ( ! empty( $search_term ) ) {
            $search_terms = array_filter( array_map( 'trim', explode( ' ', $search_term ) ) );

            $where_like = [];
            foreach ( $search_terms as $term ) {
                $where_like[] = $wpdb->prepare( "meta_value LIKE %s", '%' . $wpdb->esc_like( $term ) . '%' );
            }
            $where_clause = implode( ' AND ', $where_like );

            $matching_posts = $wpdb->get_col(
                "
                SELECT DISTINCT post_id
                FROM $wpdb->postmeta
                WHERE meta_key LIKE '%membre%'
                AND $where_clause
                "
            );

            if ( ! empty( $matching_posts ) ) {
                $query->set( 'post__in', $matching_posts );
                // keep the display query for the template
                $query->set( 'custom_search_display', $search_term );
                $query->set( 's', '' ); // prevent default search filtering
            }
        }
    }
}
add_action( 'pre_get_posts', 'custom_search_projects_by_member' );


?>