/*******************************************************************************
    Curseur personnalisé
*******************************************************************************/

// Saisir l'élément HTML de la page qui représente le curseur personnalisé
let curseur = document.querySelector('.curseur');


// Saisir l'élément HTML de la page qui représente la racine du document
// sur lequel sont définies les propriétées personnalisées de position du 
// curseur.
let racine = document.querySelector(':root');


// Ajouter à l'objet window l'écouteur de *mouvement* de la souris qui appellera 
// la fonction qui gère le déplacement du curseur personnalisé (bougerCurseur)
document.addEventListener("mousemove", bougerCurseur);
document.addEventListener("mouseover", changerCurseurBouton);
document.addEventListener("mouseout", changerCurseurBouton);
window.addEventListener("mouseout", basculerAffichageCurseur);
window.addEventListener("mouseover", basculerAffichageCurseur);



/**
 * Déplacer le curseur personnalisé pour suivre la position du pointeur de souris
 * @param {Event} event : objet Event de l'événement en cours 
 */
function bougerCurseur(event) {
    // Modifiez les valeurs des propriétés personnalisées définis sur la racine 
    // du document HTML
    racine.style.setProperty("--mouse-x", event.clientX + "px");
	racine.style.setProperty("--mouse-y", event.clientY + "px");

}

/**
 * Modifier la forme du curseur personnalisé lorsqu'on survole un "bouton"
 * @param {Event} event : objet Event de l'événement en cours 
 */
 function changerCurseurBouton(event) {
    // Selon le type d'événement, on veut ajouter ou enlever la classe 'c-bouton'
    // du curseur, et modifier son contenu textuel en conséquence (voir la démo)
    if (event.type === "mouseover" && event.target.closest(".entete-menu a")){
        curseur.classList.add('c-bouton');
    }

    else {
        curseur.classList.remove('c-bouton');
    }
    
}


/**
 * Cacher ou afficher le curseur personnalisé lorsque le pointeur de souris
 * sort de la zone de la fenêtre du navigateur ou y rentre.
 * @param {Event} event : objet Event de l'événement en cours 
 */
function basculerAffichageCurseur(event) {
    if (event.type == 'mouseout') {
        curseur.classList.add('inactif');
    } else {
        curseur.classList.remove('inactif');
    }
}
