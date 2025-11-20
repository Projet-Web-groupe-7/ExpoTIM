<?php 
    $projet_graphisme_nom= get_field('projet-graphisme_nom');
    $projet_graphisme_description= get_field('projet-graphisme_description');
    $projet_graphisme_image= get_field('projet-graphisme_image');
    $projet_graphisme_membre1= get_field('projet-graphisme_membre-1');
    $projet_graphisme_membre2= get_field('projet-graphisme_membre-2');
    $projet_graphisme_annee= get_field('projet-graphisme_annee');
    $projet_graphisme_url= get_field('projet-graphisme_url');


?>

<article class="projet-container">
<?php  if  ($projet_graphisme_image): ?>
    <div class="projet-container-haut">
        <div  class="background-mask" style="background-image: url('<?php echo esc_url($projet_graphisme_image['url']); ?>');"></div>
        <?php if ($projet_graphisme_nom): ?>
            <h1><?php echo $projet_graphisme_nom; ?></h1>
        <?php endif; ?> 
    </div>
    

    <?php  endif; ?>
    <div class="projet-container-bas">
        <div class="carrousel">
            <?php 
                $images = [];
                for ($i = 1; $i <= 10; $i++) {
                    $image = get_field("projet-graphisme_carrousel_image-{$i}");
                    if ($image) $images[] = $image;
                }

                if (!empty($images)): 
            ?>
                <div class="carrousel__images">
                    <?php foreach ($images as $index => $image): ?>
                        <div class="carrousel__slide <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Flèches de navigation -->
                <button class="carrousel__btn carrousel__btn--prev">&#10094;</button>
                <button class="carrousel__btn carrousel__btn--next">&#10095;</button>
                
            <?php else: ?>
                <p>Aucune image disponible pour ce carrousel.</p>
            <?php endif; ?>
    </div>

        <div class="projet-container-bas-droite">
            <div>
                <h2>Équipe/Auteur</h2>
                <?php  if  ($projet_graphisme_membre1): ?>
                    <p><?php  echo $projet_graphisme_membre1 ; ?></p>
                <?php  endif; ?>
                <?php  if  ($projet_graphisme_membre2): ?>
                    <p><?php  echo $projet_graphisme_membre2 ; ?></p>
                <?php  endif; ?>
            </div>
            
            <div>
                <h2>Résumé du projet</h2>
                <?php  if  ( $projet_graphisme_description): ?>
                    <p><?php  echo  $projet_graphisme_description ; ?></p>
                <?php  endif; ?>
            </div>

            <div>
                <h2>Lien du projet</h2>
                <?php  if  ( $projet_graphisme_url): ?>
                    <p><?php  echo  $projet_graphisme_url ; ?></p>
                <?php  endif; ?>
            
            </div>
        </div>
    </div>
   
</article>
<?php section_projet_random(); ?>
<?php get_footer(); ?>