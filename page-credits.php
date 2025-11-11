

<?php get_header(); ?>

<main class="credits">
  <section class="equipe">
    <h2>Équipe de l'exposition TIM</h2>
    <div class="liste-equipe">
      <?php
      // Récupère les membres depuis le Customizer (fonctions définies dans functions/customizer.php)
      $membres = function_exists('expo_get_membres_equipe') ? expo_get_membres_equipe() : array();

      if (! empty($membres)) :
        foreach ($membres as $membre) :
          $nom  = isset($membre['nom']) ? $membre['nom'] : '';
          $image = isset($membre['image']) ? $membre['image'] : '';
          ?>
          <span class="membre">
            <?php if (! empty($image)) : ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($nom ?: 'Membre'); ?>">
            <?php else : ?>
              <!-- <img src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder-member.png'); ?>" alt="<?php echo esc_attr($nom ?: 'Membre'); ?>"> -->
            <?php endif; ?>
            <p><?php echo esc_html($nom); ?></p>
          </span>
        <?php
        endforeach;
      else :
        // Aucun membre configuré : message fallback
        ?>
        <span class="membre">
          <p><?php echo esc_html__('Aucun membre configuré', 'theme_31w'); ?></p>
        </span>
      <?php endif; ?>
    </div>
  </section>
</main>

 <?php get_footer(); ?>