<?php 


get_header();

$args= array(
    'posts_per_page'  => -1,
    'post_type'       => 'projets-arcade',
);



$the_query = new WP_Query($args);

if($the_query->have_posts() ):?>
<ul>
    <?php  while($the_query->have_posts()): $the_query -> the_post(); ?>
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
    <li>
        <a href="<?php  the_permalink(); ?>">
            <?php  if  ($projet_arcade_nom): ?>
                <?php  echo $projet_arcade_nom ; ?>
            <?php  endif; ?>
            <?php  if  ($projet_arcade_image): ?>
            <div>
                <img src="<?php  echo $projet_arcade_image ['url'] ?>" alt="<?php $projet_arcade_nom?>" style="height: 500px; width: 500px;">
            </div>
            <?php  endif; ?>
        </a>
    </li>
    <?php  endwhile; ?>
</ul>
<?php  endif; 
wp_reset_query();
?>

