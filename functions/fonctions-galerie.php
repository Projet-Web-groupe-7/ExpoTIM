<?php
    function galerie_set_args($case){
        // retourner des arguemnt differents dépendamentb du cas,
        // pour etre utilisés dans le query plus bas
        $args;
        switch ($case) {
            case 'arcade':
                $args =  array(
                    'posts_per_page'  => -1,
                    'post_type'       => 'projets-arcade',
                );
            break;

            case 'jour-de-la-terre':
                $args =  array(
                    'posts_per_page'  => -1,
                    'post_type'       => 'projets-jour-terre',
                );
            break;
        }
        return $args;
    }

    // ne pas oublier de rajouter les cas ici, necessaire pour
    // la fonction section_projet_random()
    $allCases = ['arcade', 'jour-de-la-terre'];



    // la section hero
    function galerie_hero() {
?>
    <div class="hero">
        <!-- <h2>Galerie projets Arcade - 2ème année</h2> -->
        <!-- <h3>L’Arcade de l’expoTIM présente les prototypes de jeux vidéo créés par les étudiants de deuxième année en Technique d’intégration multimédia. Réalisés dans le cadre du cours Création de jeu en équipe, ces projets sont le fruit d’un processus de production complet : de la conception et la planification à la création des médias, de la programmation aux tests de qualité jusqu’au produit fini.
        </h3> -->
        <?= get_the_content(); ?>
    </div>
<?php
    }



    
    //code pour alterner le symbole de la carte
    // $index est nécésaire mais le reste du code est dans la fonction classSymbole()
    $index = 0;


    // le code PHP de la carte
    function galerie_get_cartes($args, $case) {
?>
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
    <a href="<?php  the_permalink(); ?>" class="carte hiddeneeeeeeeee turned <?= classSymbole(); ?>">
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






<?php
    // fonction pour alterner les symboles des cartes
    function classSymbole(){
        global $index;
        // $symboles = ["heart", "spade", "diamond", "club"];
        $symboles = ["heart", "spade", "diamond", "club", "club", "diamond", "spade", "heart"];
        $suit = $symboles[$index];

        $index+=1;
        if($index > 7){
            $index = 0;
        }

        return $suit;
    }







    // css pour cartes
    function galerie_carte_css(){
?>
<?php
    // symbols 
    // cartes differentes
    $imgHeart = get_field("heart_symbol");
    $imgSpade = get_field("spade_symbol");
    $imgDiamond = get_field("diamond_symbol");
    $imgclub = get_field("club_symbol");

    //dos des cartes
    $dosRouge = get_field("derriere_cartes_rouge");
    $dosBleu = get_field("derriere_cartes_bleu");

//     echo '<!-- Debug symbols: ';
// var_dump($imgHeart, $imgSpade, $imgDiamond, $imgClub);
// echo ' -->';
?>
<style>
    /* coeur */
    .carte.heart .container .front, .carte.diamond .container .front, .carte.heart .container .back, .carte.diamond .container .back{
        border: 6px solid red;
    }
    .carte.heart .container .back, .carte.diamond .container .back{
        /* background-color: rgb(156, 0, 0); */
        background-image: url(<?= $dosRouge ['url']?>);
    }
    .carte.spade .container .front, .carte.club .container .front, .carte.spade .container .back, .carte.club .container .back{
        border: 6px solid blue;
    }
    .carte.spade .container .back, .carte.club .container .back{
        /* background-color: rgb(0, 4, 130); */
        background-image: url(<?= $dosBleu ['url']?>);
    }

    /* symboles */
    .carte.heart .container .front .symbole{
        background-image: url("<?= $imgHeart?>");
        /* background-color:red; */
        
    }
    .carte.diamond .container .front .symbole{
        background-image: url("<?= $imgDiamond?>");
        /* background-color:blue; */
    }
    .carte.spade .container .front .symbole{
        background-image: url("<?= $imgSpade?>");
        /* background-color:grey; */
    }
    .carte.club .container .front .symbole{
        background-image: url("<?= $imgclub?>");
        /* background-color:black; */
    }
</style>
<?php } ?>





<?php
    //cartes random
    function section_projet_random(){
        global $allCases;
?>
    <section class="projet-random">
        <h2>Choisis un projet au hasard</h2>
        <div class="cartes-random">
            <div class="paquet" style="color:white;">
                
            </div>
            <?php
                    foreach($allCases as $case){
                        // print($case);
                        $query_args = galerie_set_args($case);
                        galerie_get_cartes($query_args, $case);
                    }
                ?>
        </div>
    </section>
<?php } ?>