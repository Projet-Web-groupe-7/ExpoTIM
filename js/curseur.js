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

/* --- TRAÎNÉE ÉNERGIQUE ROUGE --- */

const TRAIL_COUNT = 14;
const trail = [];

// Dégradé rouge énergique (intensité → fade)
const colors = [];
for (let i = 0; i < TRAIL_COUNT; i++) {
    const ratio = i / TRAIL_COUNT;
    colors.push(`rgba(255, 50, 50, ${0.45 - ratio * 0.40})`); 
}

for (let i = 0; i < TRAIL_COUNT; i++) {
    const el = document.createElement("div");
    el.classList.add("trail");

    el.style.background = colors[i];

    // Tailles dynamiques, plus petites vers la fin
    const size = 1.8 - i * 0.1;
    el.style.width = `${size}rem`;
    el.style.height = `${size}rem`;

    // Glow énergie rouge
    el.style.boxShadow = `0 0 ${10 - i * 0.5}px rgba(255, 0, 0, ${0.6 - i * 0.05})`;

    document.body.appendChild(el);

    trail.push({
        el,
        x: 0,
        y: 0,
        opacity: 1
    });
}

let mouseX = 0, mouseY = 0;

// Position de la souris
document.addEventListener("mousemove", (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

// Animation du suivi + dissolution lente
function animateTrail() {
    let prevX = mouseX;
    let prevY = mouseY;

    trail.forEach((t, i) => {
        // interpolation rapide → fluide
        t.x += (prevX - t.x) * 0.20;
        t.y += (prevY - t.y) * 0.20;

        t.el.style.left = t.x + "px";
        t.el.style.top = t.y + "px";

        // Dissolution lente
        const fade = 1 - i / TRAIL_COUNT;
        t.el.style.opacity = fade;

        // Léger agrandissement dynamique → effet énergétique
        t.el.style.transform = `translate(-50%, -50%) scale(${1 + fade * 0.3})`;

        prevX = t.x;
        prevY = t.y;
    });

    requestAnimationFrame(animateTrail);
}

animateTrail();


