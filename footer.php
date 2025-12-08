<?php
function hexToRgba($hex, $alpha = 0){
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
    return "rgba($r, $g, $b, $alpha)";
}

$footer_couleur_arriere = get_theme_mod('footer_couleur_arriere', '#080730');
$footer_couleur_texte = get_theme_mod('footer_couleur_texte', '#B6B7C1');
$footer_transparent = hexToRgba($footer_couleur_arriere, 0);
?>

<footer style="background: linear-gradient(to bottom, <?= $footer_transparent ?> 0%, <?= $footer_couleur_arriere ?> 40%, <?= $footer_couleur_arriere ?> 100%); color: <?= $footer_couleur_texte ?>;">



<div class="footer contenu">


    <div class="footer commanditaire">
        <h4>Commanditaires</h4>
         <?php 
            commanditaires();
            ?>
    </div>
    <div class="footer adresse">
        <h4>Adresse</h4>

            <a href="">
                <?php echo $footer_courriel = get_theme_mod('footer_courriel', 'Default Title'); ?>
            </a>

            <a href="">
                <?php echo $footer_adresse = get_theme_mod('footer_adresse', 'Default Title'); ?>
            </a>

            <a href="">
                <?php echo $footer_telephone = get_theme_mod('footer_telephone', 'Default Title'); ?>
            </a>
    </div>

    
</div>

<div class="footer reseaux">
    <?php 
        icones_sociaux();
    ?>
</div>

<div class="footer menuExt">
    <?php wp_nav_menu(array(
                        "menu"=>"principal",
                        "container"=>"nav",
                        "container_class"=>"piedpage__s1__externe"
                    ));?>
</div>

<div class="footer credits">
    <p>© 2025 LesAsDuTim. Tous droits réservés.</p>
</div>

</footer>
                
<?php wp_footer() ?>                
</body>
</html>