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
    wp_enqueue_style('expo-credits-style', get_template_directory_uri() . '/css/credits.css');
    wp_enqueue_style('expo-search-style', get_template_directory_uri() . '/css/search.css');
    wp_enqueue_style('expo-projet-solo-style', get_template_directory_uri() . '/css/projet-solo.css');
    wp_enqueue_style('expo-division-style', get_template_directory_uri() . '/css/division.css');
    wp_enqueue_style('expo-animationGASP-style', get_template_directory_uri() . '/css/animationGASP.css');
      
      

    wp_enqueue_script(
        'cartes',
        get_template_directory_uri() . '/js/cartes.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/cartes.js'),
        true
    );
     
      if (is_search()) {
        wp_enqueue_script(
            'search-animations',
            get_template_directory_uri() . '/js/search-animations.js',
            array('cartes'), // optionally depend on cartes.js
            filemtime(get_template_directory() . '/js/search-animations.js'),
            true
        );
    }


    wp_enqueue_script(
        'carrousel',
        get_template_directory_uri() . '/js/carrousel.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/carrousel.js'),
        true
    );
      
    wp_enqueue_script(
        'menu',
        get_template_directory_uri() . '/js/menu.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/menu.js'),
        true
    );
    wp_enqueue_script(
        'defilementFondu',
        get_template_directory_uri() . '/js/defilementFondu.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/defilementFondu.js'),
        true
    );
    
    wp_enqueue_script(
        'curseur',
        get_template_directory_uri() . '/js/curseur.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/curseur.js'),
        true
    );

    wp_enqueue_script(
        'chargement',
        get_template_directory_uri() . '/js/chargement.js',
        array(),
        filemtime(get_template_directory() . 
        '/js/chargement.js'),
        true
    );

    /* Animation GSAP pour l'intro */
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        array(),
        null,
        true
    );
    

    wp_enqueue_script(
        'intro-gsap',
        get_template_directory_uri() . '/js/intro.js',
        array('gsap'),
        filemtime(get_template_directory() . '/js/intro.js'),
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
//function modifie_requete_principal( $query ) {
 //   if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
 //     $query->set( 'category_name', 'populaire' );
  //    $query->set( 'orderby', 'title' );
  //    $query->set( 'order', 'ASC' );
  //    }
  //   }
 //    add_action( 'pre_get_posts', 'modifie_requete_principal' );
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