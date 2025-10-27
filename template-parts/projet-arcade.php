<?php 
    $projet_arcade_nom= get_field('projet-arcade_nom');
    $projet_arcade_description= get_field('projet-arcade_description');
    $projet_arcade_image= get_field('projet-arcade_image');
    $projet_arcade_membre1= get_field('projet-arcade_membre-1');
    $projet_arcade_membre2= get_field('projet-arcade_membre-2');
    $projet_arcade_membre3= get_field('projet-arcade_membre-3');
    $projet_arcade_membre4= get_field('projet-arcade_membre-4');
    $projet_arcade_membre5= get_field('projet-arcade_membre-5');
    $projet_arcade_annee= get_field('projet-arcade_annee');


?>

<article>
    <?php  if  ($projet_arcade_nom): ?>
        <h1><?php  echo $projet_arcade_nom ; ?></h1>
    <?php  endif; ?>
    <?php  if  ( $projet_arcade_description): ?>
        <h3><?php  echo  $projet_arcade_description ; ?></h3>
    <?php  endif; ?>
    <?php  if  ($projet_arcade_image): ?>
        <div>
            <img src="<?php  echo $projet_arcade_image ['url'] ?>" alt="<?php $projet_arcade_nom?>" style="height: 500px; width: 500px;">
        </div>
    <?php  endif; ?>
    <?php  if  ($projet_arcade_membre1): ?>
        <p><?php  echo $projet_arcade_membre1 ; ?></p>
    <?php  endif; ?>
    <?php  if  ($projet_arcade_membre2): ?>
        <p><?php  echo $projet_arcade_membre2 ; ?></p>
    <?php  endif; ?>
    <?php  if  ($projet_arcade_membre3): ?>
        <p><?php  echo $projet_arcade_membre3 ; ?></p>
    <?php  endif; ?>
    <?php  if  ($projet_arcade_membre4): ?>
        <p><?php  echo $projet_arcade_membre4 ; ?></p>
    <?php  endif; ?>
    <?php  if  ($projet_arcade_membre5): ?>
        <p><?php  echo $projet_arcade_membre5 ; ?></p>
    <?php  endif; ?>
</article>
    
