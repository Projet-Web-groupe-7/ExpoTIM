<?php 
    $projet_finissant_nom= get_field('projet-finissant_nom');
    $projet_finissant_description= get_field('projet-finissant_description');
    $projet_finissant_image= get_field('projet-finissant_image');
    $projet_finissant_membre1= get_field('projet-finissant_membre-1');
    $projet_finissant_annee= get_field('projet-finissant_annee');
    $projet_finissant_url= get_field('projet-finissant_url');
    $projet_finissant_categorie= get_field('projet-finissant_categorie');
?>

<article class="projet-container">


    <div class="projet-container-haut">
    
        <?php if ($projet_finissant_image): ?>

                
                <img class="projet-bg" 
                    src="<?php echo esc_url($projet_finissant_image['url']); ?>" 
                    alt="" />

            
                <img class="projet-poster" 
                    src="<?php echo esc_url($projet_finissant_image['url']); ?>" 
                    alt="<?php echo esc_attr($projet_finissant_image['alt']); ?>" />

            <?php endif; ?>

            <?php if ($projet_finissant_nom): ?>
                <h1><?php echo $projet_finissant_nom; ?></h1>
        <?php endif; ?>

    </div>

    

    
    <div class="projet-container-bas">
        <div class="carrousel">
            <?php 
                $images = [];
                for ($i = 1; $i <= 10; $i++) {
                    $image = get_field("projet-finissant_carrousel_image-{$i}");
                    if ($image) $images[] = $image;
                }

                if (!empty($images)): 
            ?>
                <div class="carrousel-images">
                    <?php foreach ($images as $index => $image): ?>
                        <div class="carrousel-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Flèches de navigation -->
                <button class="carrousel-btn carrousel-btn--prev">&#10094;</button>
                <button class="carrousel-btn carrousel-btn--next">&#10095;</button>
                
            <?php else: ?>
                <p>Aucune image disponible pour ce carrousel.</p>
            <?php endif; ?>
        </div>

        <div class="projet-container-bas-droite fondu-en-bas">
            <div>
                <h2>Équipe/Auteur</h2>
                <?php  if  ($projet_finissant_membre1): ?>
                    <h3><?php  echo $projet_finissant_membre1 ; ?></h3>
                <?php  endif; ?>
            </div>
            
            <div>
                <h2>Résumé du projet</h2>
                <?php  if  ( $projet_finissant_description): ?>
                    <h3><?php  echo  $projet_finissant_description ; ?></h3>
                <?php  endif; ?>
            </div>

            <div>
                <h2>Catégorie du projet</h2>
                <?php  if  ( $projet_finissant_categorie): ?>
                    <h3><?php  echo  $projet_finissant_categorie ; ?></h3>
                <?php  endif; ?>
            </div>

            <div>
                <h2>Année de production</h2>
                <?php  if  ( $projet_finissant_annee): ?>
                    <h3><?php  echo  $projet_finissant_annee ; ?></h3>
                <?php  endif; ?>
            </div>

            <div>
                <h2>Lien du projet</h2>
                <?php  if  ( $projet_finissant_url): ?>
                    <a href="<?php echo $projet_finissant_url; ?>">
                        <?php echo $projet_finissant_url; ?>
                    </a>
                <?php  endif; ?>
            
            </div>
            
        </div>

        
    </div>

    
    
   
</article>


<div class="projet-solo-random">
    <?php section_projet_random(); ?>
</div>



<?php get_footer(); ?>