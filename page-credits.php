

<?php get_header(); ?>

<main class="credits">
  <section class="equipe">
    <h2>Équipe de l'exposition TIM</h2>
    <p>Voici l'équipe qui a contribué à la création du site de cette exposition.</p>
    <div class="liste-equipe">
      <?php
      // Récupère les membres depuis le Customizer (fonctions définies dans functions/customizer.php)
      $membres = function_exists('expo_get_membres_equipe') ? expo_get_membres_equipe() : array();

      if (! empty($membres)) :
        foreach ($membres as $membre) :
          $nom  = isset($membre['nom']) ? $membre['nom'] : '';
          $image = isset($membre['image']) ? $membre['image'] : '';
          $lien = isset($membre['lien']) ? $membre['lien'] : '';
          ?>
          <div class="membre">
            <?php if (! empty($image)) : ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($nom ?: 'Membre'); ?>">
            <?php else : ?>
              <!-- Image par défaut si aucune photo -->
              <img src="<?php echo esc_url(get_template_directory_uri() . '/images/cartes/placeholder.png'); ?>" alt="<?php echo esc_attr($nom ?: 'Membre'); ?>">
            <?php endif; ?>
            <div class="infos_membre">
              <p class="nom"><?php echo esc_html($nom); ?></p>
              <?php if (! empty($lien)) : ?>
                <a class="lien" href="<?php echo esc_url($lien); ?>" target="_blank" rel="noopener">Voir le profil</a>
              <?php else : ?>
                <span>Pas de lien disponible</span>
              <?php endif; ?>
            </div>
          </div>
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