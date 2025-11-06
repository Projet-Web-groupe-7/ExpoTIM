<?php
    // le code PHP de la carte
    function galerie_get_cartes($args, $case) {
        ?>
        <div class="paquet" style="color:white;"></div>
            <?php
                
        
                // $args= array(
                //     'posts_per_page'  => -1,
                //     'post_type'       => 'projets-arcade',
                // );
                $the_query = new WP_Query($args);
        
                if($the_query->have_posts()){
                    while($the_query->have_posts()): $the_query -> the_post();
        
                    //définir les champs
                    $post_name;
                    $post_img;
                    switch ($case) {
                        case 'arcade':
                            $post_name = get_field('projet-arcade_nom');
                            $post_img = get_field('projet-arcade_image');
                        break;
        
                        case 'jour-de-la-terre':
                            $post_name = get_field('projet-jour-terre_nom');
                            $post_img = get_field('projet-jour-terre_image');
                        break;
                    }
            ?>
        
            <!-- lien projet -->
            <a href="<?php  the_permalink(); ?>" class="carte hidden <?= classSymbole(); ?>">
                <div class="container">
                    <div class="front">
                        <div class="premier-etage">
                            <!-- nom projet -->
                            <p><?php if($post_name){echo $post_name;} else {echo "Nom du projet";}?></p>
                            <div class="symbole"></div>
                        </div>
                        <!-- img projet -->
                        <img src="<?php if($post_img){echo $post_img ['url'];}?>" alt="<?php if($post_name){echo $post_name;} else {echo "Nom du projet";}?>">
                        <div class="symbole"></div>
                    </div>
        
        
                    <div class="back"></div>
                </div>
            </a>
            <?php
                    endwhile;
                } else {
            ?>
            <h1>Oops! <br> Aucun projet...</h1>
            <?php 
                }
                // tres important!!
                wp_reset_postdata();
            ?>
        <?php } ?>