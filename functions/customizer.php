<?php
/**
 * ///////////////////////////// PERSONNALISATION //////////////////////////*
 */

function theme_31w_customize_register($wp_customize) {

    ///////////////////////////////////////////////////////////// Section hero
    $wp_customize->add_section('hero_section', array(
        'title' => __('Section hero', 'theme_31w'),
        'priority' => 30,
    ));

    ///////////////////////////////////////////////////////////// Description du site dans la section hero
    $wp_customize->add_setting('hero_desc', array(
        'default' => __('Bienvenue sur le site de l\'exposition des travaux des étudiants du programme TIM', 'theme_31w'),
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    $wp_customize->add_control('hero_desc', array(
        'label' => __('Description', 'theme_31w'),
        'section' => 'hero_section',
        'type' => 'textarea'
    ));
    
    ///////////////////////////////////////////////////////////// Section footer
    $wp_customize->add_section('footer_section', array(
      'title' => __('Pied de page', 'theme_31w'),
      'priority' => 30,
    ));

    ///////////////////////////////////////////////////////// Couleur de fond de la section footer
    $wp_customize->add_setting('footer_couleur_arriere', array(
      'default' => '#080730',
      'sanitize_callback' => 'esc_url_raw',
    ));
        
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_couleur_arriere', array(
      'label' => __('Couleur du Pied de page', 'theme_31w'),
      'section' => 'footer_section',
    )));

    ///////////////////////////////////////////////////////// Couleur du texte de la section footer
    $wp_customize->add_setting('footer_couleur_texte', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_couleur_texte', array(
      'label' => __('Couleur du texte du pied de page', 'theme_31w'),
      'section' => 'footer_section',
    )));


    /////////////////////////////////////////////////////////// Changer le nombre de commenditaire
    $wp_customize->add_setting('footer_nombre_commenditaire', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('footer_nombre_commenditaire', array(
      'label' => __('Nombre_commenditaire', 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

    ////////////////////////////////////////////////////////// Commenditaire de la section footer

    $footer_nombre_commenditaire = get_theme_mod('footer_nombre_commenditaire', 3);

    for($k=0; $k<  $footer_nombre_commenditaire; $k++)
    {
      $wp_customize->add_setting('nom_commenditaire_' . $k, array(
        'default' => __('', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field'
      ));
    
      $wp_customize->add_control('nom_commenditaire_'. $k , array(
        'label' => __('Nom du commenditaire ' . ($k+1), 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'text',
      ));


    $wp_customize->add_setting('lien_commenditaire_' . $k, array(
      'default' => __('', 'theme_31w'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('lien_commenditaire_'. $k, array(
      'label' => __('Adresse du site commenditaire ' . ($k+1), 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

  }


    /////////////////////////////////////////////////////////// Changer le nombre d'icone dans la section footer

    $wp_customize->add_setting('footer_nombre_icone', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('footer_nombre_icone', array(
      'label' => __('Nombre_icone', 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

    ////////////////////////////////////////////////////////// Icone de la section footer

    $footer_nombre_icone = get_theme_mod('footer_nombre_icone', 3);

    for($k=0; $k<  $footer_nombre_icone; $k++)
    {
      $wp_customize->add_setting('nom_icone_' . $k, array(
        'default' => __('', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field'
      ));
    
      $wp_customize->add_control('nom_icone_'. $k , array(
        'label' => __('Nom site social ' . ($k+1), 'theme_31w'),
        'section' => 'footer_section',
        'type' => 'text',
      ));


    $wp_customize->add_setting('lien_icone_' . $k, array(
      'default' => __('', 'theme_31w'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('lien_icone_'. $k, array(
      'label' => __('Adresse du site social ' . ($k+1), 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

  }

    //////////////////////////////////////////////////////////////// Courriel
    $wp_customize->add_setting('footer_courriel', array(
      'default' => __('cmaisonneuve@info.qc.ca', 'theme_31w'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('footer_courriel', array(
      'label' => __('Courriel', 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

    //////////////////////////////////////////////////////////////// Adresse
    $wp_customize->add_setting('footer_adresse', array(
      'default' => __('3800 R. Sherbrooke E, Montréal', 'theme_31w'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('footer_adresse', array(
      'label' => __('adresse', 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

    //////////////////////////////////////////////////////////////// Téléphone
    $wp_customize->add_setting('footer_telephone', array(
      'default' => __('514-254-7131', 'theme_31w'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
  
    $wp_customize->add_control('footer_telephone', array(
      'label' => __('téléphone', 'theme_31w'),
      'section' => 'footer_section',
      'type' => 'text',
    ));

    ///////////////////////////////////////////////////////////// Section crédits
    $wp_customize->add_section('credits_section', array(
        'title' => __('Section crédits', 'theme_31w'),
        'priority' => 30,
    ));

    ///////////////////////////////////////////////////////////// Gérer le nombre de membres dans la section crédits
    $wp_customize->add_setting('credits_nb_membres', array(
        'default' => 3,
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('credits_nb_membres', array(
        'label' => __('Nombre de membres', 'theme_31w'),
        'section' => 'credits_section',
        'type' => 'number',
        'input_attrs' => array('min' => 0, 'max' => 20),
    ));

    // Générer dynamiquement les réglages pour chaque membre
    $nb_membres = get_theme_mod('credits_nb_membres', 3);
    if (! $nb_membres || $nb_membres < 0) {
      $nb_membres = 0;
    }

    for ($i = 1; $i <= $nb_membres; $i++) {
      // Nom du membre
      $wp_customize->add_setting('credits_membre_nom' . $i, array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
  
      $wp_customize->add_control('credits_membre_nom' . $i, array(
        'label' => sprintf(__('Nom du membre %d', 'theme_31w'), $i),
        'section' => 'credits_section',
        'type' => 'text',
      ));
  
      // Image du membre (utilise le contrôle d'image du Customizer)
      $wp_customize->add_setting('credits_membre_image' . $i, array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
  
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'credits_membre_image' . $i, array(
        'label' => sprintf(__('Image du membre %d', 'theme_31w'), $i),
        'section' => 'credits_section',
        'settings' => 'credits_membre_image' . $i,
      )));

      // Lien du membre
      $wp_customize->add_setting('credits_membre_lien' . $i, array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control('credits_membre_lien' . $i, array(
        'label' => sprintf(__('Lien du membre %d', 'theme_31w'), $i),
        'section' => 'credits_section',
        'type' => 'url',
      ));
    }
    
    
    ////////////////////////////////////////////////////////////////// cartes
      $wp_customize->add_section('section_cartes', array(
        'title' => __('cartes', 'theme_31w'),
        'priority' => 30,
      ));

      //////////////couleur dos cartes
      $wp_customize->add_setting('cartes_rouge', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartes_rouge', array(
        'label' => __('dos cartes rouges', 'theme_31w'),
        'section' => 'section_cartes',
      )));

      $wp_customize->add_setting('cartes_bleu', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartes_bleu', array(
        'label' => __('dos cartes bleus', 'theme_31w'),
        'section' => 'section_cartes',
      )));

      ///////////////// symboles cartes
      $wp_customize->add_setting('cartes_hearts', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartes_hearts', array(
        'label' => __('symbole cartes coeurs', 'theme_31w'),
        'section' => 'section_cartes',
      )));

      $wp_customize->add_setting('cartes_spades', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartes_spades', array(
        'label' => __('symbole cartes pics', 'theme_31w'),
        'section' => 'section_cartes',
      )));

      $wp_customize->add_setting('cartes_diamonds', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartes_diamonds', array(
        'label' => __('symbole cartes carreaux', 'theme_31w'),
        'section' => 'section_cartes',
      )));

      $wp_customize->add_setting('cartes_clubs', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartes_clubs', array(
        'label' => __('symbole cartes trefles', 'theme_31w'),
        'section' => 'section_cartes',
      )));
  }
  
  add_action('customize_register', 'theme_31w_customize_register'); 


/**
   * Récupère le tableau des membres configurés dans le Customizer.
   * Retourne un tableau d'items ['nom' => string, 'image' => url]
   */
  function expo_get_membres_equipe() {
    $membres = array();
    $nb_membres = get_theme_mod('credits_nb_membres', 3);
    if (! $nb_membres || $nb_membres < 1) {
      return $membres;
    }

    for ($i = 1; $i <= $nb_membres; $i++) {
      $nom = get_theme_mod('credits_membre_nom' . $i, '');
      $image = get_theme_mod('credits_membre_image' . $i, '');
      $lien = get_theme_mod('credits_membre_lien' . $i, '');
      $membres[] = array(
        'nom' => $nom,
        'image' => $image,
        'lien' => $lien,
      );
    }

  return $membres;
  }