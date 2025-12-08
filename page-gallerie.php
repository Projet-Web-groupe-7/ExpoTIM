<?php get_header(); ?>

    <main class="gallerie">
        <div class="hero">
            <h2>Gallerie projets Jour de la Terre - 1ère année</h2>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum officia possimus
                eius esse voluptatum sequi totam illo adipisci explicabo numquam aperiam exercitationem 
                praesentium nemo tempore ea maxime culpa, consequuntur nam cum voluptatem 
                repellendus tenetur. Perferendis porro iste hic? Molestias inventore sunt perferendis 
                doloremque possimus quod debitis fuga eius qui unde?
            </h3>

            <nav class = nav-gallerie>
                <a href="gallerieFinissants">Finissants</a>
                <a href="gallerieArcade">Arcade</a>
                <a href="gallerieTerre">Jour de la Terre</a>
            </nav>
        </div>

        <section id="gallerie-cartes">
            <div class="paquet" style="color:white;"></div>
            <?php
                //code pour alterner le symbole de la carte
                $index = 0;
                $nbCartes = 32;

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

                //loop instancier les cartes
                for ($i = 0; $i <= $nbCartes; $i++) {
                    //echo "..." . classSymbole();
            ?>

                <div class="carte hidden <?= classSymbole(); ?>">
                    <div class="container">
                        <div class="front">
                            <div class="premier-etage">
                                <p>Nom du projet</p>
                                <div class="symbole"></div>
                            </div>
                            <img src="" alt="image du projet">
                            <div class="symbole"></div>
                        </div>


                        <div class="back"></div>
                    </div>
                </div>
                <?php } ?>
        </section>
    </main>
    
    <?php get_footer(); ?>


<!-- cartes differentes -->
<?php
    // symbols 
    $imgHeart = get_field("heart_symbol");
    $imgSpade = get_field("spade_symbol");
    $imgDiamond = get_field("diamond_symbol");
    $imgclub = get_field("club_symbol");

    //dos des cartes
    $dosRouge = get_field("derriere_cartes_rouge");
    $dosBleu = get_field("derriere_cartes_bleu");
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