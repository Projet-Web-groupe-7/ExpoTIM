<?php

function icones_sociaux() {
    /*** Zone des ICONES ***/  
    $icone_couleur = ltrim(get_theme_mod('icone_couleur', '#fff'), '#'); 
    $footer_nombre_icone = get_theme_mod('footer_nombre_icone', 3);

    $tab_nom_icone = [];
    $tab_lien = [];

    for ($k = 0; $k < $footer_nombre_icone; $k++) {
        $tab_nom_icone[$k] = get_theme_mod("nom_icone_$k", 'link'); // 'link' par défaut
        $tab_lien[$k] = get_theme_mod("lien_icone_$k", '#');
    }

    echo '<div class="hero__icone-app icone__couleur">';
    for ($k = 0; $k < $footer_nombre_icone; $k++) {
        echo '<a href="' . esc_url($tab_lien[$k]) . '" target="_blank">';
        echo '<img src="https://s2.svgbox.net/social.svg?ic=' . esc_attr($tab_nom_icone[$k]) . '&color=' . esc_attr($icone_couleur) . '" width="32" height="32">';

        echo '</a>';
    }
    echo '</div>';
}


function commanditaires() {
    /*** Zone des COMMANDITAIRES ***/  
    $footer_nombre_commenditaire = get_theme_mod('footer_nombre_commenditaire', 3);

    $tab_nom_commenditaire = [];
    $tab_lien_commenditaire = [];

    for ($k = 0; $k < $footer_nombre_commenditaire; $k++) {
        $tab_nom_commenditaire[$k] = get_theme_mod("nom_commenditaire_$k", 'link'); // 'link' par défaut
        $tab_lien_commenditaire[$k] = get_theme_mod("lien_commenditaire_$k", '#');
    }

    echo '<div class="footer__commenditaire commenditaire__couleur">';
    for ($k = 0; $k < $footer_nombre_commenditaire; $k++) {
        echo '<a href="' . esc_url($tab_lien_commenditaire[$k]) . '" target="_blank">';
        echo '<p>' . esc_attr($tab_nom_commenditaire[$k]) . '</p>';

        echo '</a>';
    }
    echo '</div>';
}




