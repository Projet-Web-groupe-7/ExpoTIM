<?php
  // Ajouter l'image de la carte comme arrière-plan des éléments de menu dans le menu 'exposition'
  add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
      if ($args->menu === 'exposition') {
          $image = get_field('image_de_carte', $item);
          if ($image) {
              $atts['style'] = 'background-image: url(' . esc_url($image['url']) . '); background-size: cover; background-position: center;';
          }
      }
      return $atts;
  }, 10, 3);
