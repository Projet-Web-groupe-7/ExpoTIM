//console.log("cartes.js");
if(document.querySelector("section#gallerie-cartes") != null){
    dealAll();
    //set les symboles
    resetSymboles();
    // event listner
    window.addEventListener("resize", resetSymboles);

    fitresFinissants();
    //console.log("1")
} else if(document.querySelector("section.projet-random .cartes-random") != null){
    //console.log("2")
    centrerCartes();
    Randomlistner();
    resizeListener();
} else {
    //console.log("3")
}


function dealAll() {
    let cartes = document.querySelectorAll(".carte.hidden:not(.filtered-out)");
    let delay = 30;
    let i = 0;
    let frame = 0;

    function dealAllRAF(){
        if(i >= cartes.length){
            return
        }

        if(frame == 0){
            deal();
            i++;
        }

        frame++;
        //loop back to 0
        if(frame >= delay){
            frame = 0;
        }
        requestAnimationFrame(dealAllRAF);
    }
    requestAnimationFrame(dealAllRAF);
}


//fonction pour faire apparaitre les cartes
function deal(){
    let cartes = document.querySelectorAll(".carte.hidden:not(.filtered-out)");
    ////cartes choisies alléatoirement
    // let i = Math.random() * cartes.length;
    // i = Math.floor(i);

    //pas random
    i = 0;
    
    cartes[i].classList.remove("hidden")

    //sortir les cartes du paquet
    //let section = document.querySelector("section");
    //section.append(cartes[i]);

    // deplacer les cartes
    let paq = document.querySelector(".paquet");
    vroom(cartes[i], paq);

    // retourner les cartes automatiquement
    setTimeout(function(){
        cartes[i].classList.add("turned");
    }, "700");
}


// fonction pour deplacer les cartes
function vroom(elm1, elm2){
    let p1 = {
        x: elm1.getBoundingClientRect().x,
        y: elm1.getBoundingClientRect().y
    };
    let p2 = {
        x: elm2.getBoundingClientRect().x,
        y: elm2.getBoundingClientRect().y
    };

    //déplacer les cartes au paquet sanstransition
    elm1.classList.add("carte-no-transit");
    elm1.style.transform = `translate(${p2.x - p1.x}px,${p2.y - p1.y}px)`;

    // raporter les cartes ou elles doivent etre avec une transition
    //delay
    setTimeout(function() {
        elm1.classList.remove("carte-no-transit");
        elm1.style.transform = `translate(${0}px,${0}px)`;
    }, "1");
}


// changer symbols on resize 
// la fonction qui change les styles des cartes
function resetSymboles() {
    let symboles;
    if(window.innerWidth > 1280){
        //syboles défaut (grid 4)
        symboles = ["heart", "spade", "diamond", "club", "club", "diamond", "spade", "heart"];
    } else if(window.innerWidth > 950){
        //syboles défaut (grid 3)
        symboles = ["heart", "spade", "diamond", "club"];
    } else if(window.innerWidth > 680){
        //symboles mobiles (grid 2)
        symboles = ["heart", "spade", "club", "diamond"];
    } else {
        symboles = ["heart", "spade", "diamond", "club"];
    }
    let syIndex = 0;

    let lesCartes = document.querySelectorAll("section#gallerie-cartes .carte:not(.filtered-out)");
    for(let i = 0; i<= lesCartes.length-1; i++){
        //clear la classe
        lesCartes[i].classList.remove("heart");
        lesCartes[i].classList.remove("spade");
        lesCartes[i].classList.remove("diamond");
        lesCartes[i].classList.remove("club");
        // rajouter la bonne classe
        lesCartes[i].classList.add(symboles[syIndex]);
        
        // alterner sybole
        syIndex++;
        syIndex = syIndex % symboles.length;
    }
}

// ///////////////////////////////////////////////////////////////////////////////////////////////// filtres
function fitresFinissants(){
    if(document.querySelector(".gallerie .hero .filtre") != null){
        let lastFilter;
        if(new URLSearchParams(window.location.search).get("fl") == null){
            lastFilter = "none";
        } else {
            lastFilter = new URLSearchParams(window.location.search).get("fl");
        }
        
        let options = document.querySelectorAll(".gallerie .hero .filtre h3");
        gererClasse();
        filtrer();



        // event listener
        for(let option of options){
            option.addEventListener("click", function(evt){
                let url = new URL(window.location);
                url.searchParams.set("fl", evt.target.dataset.fl);
                window.history.replaceState({}, "", url);

                gererClasse();
                filtrer();

                //define filter
                let filter;
                if(new URLSearchParams(window.location.search).get("fl") == null){
                    filter = "none";
                } else {
                    filter = new URLSearchParams(window.location.search).get("fl");
                }
                //re deal cards if filter changes
                if(filter != lastFilter){
                    let lesCartes = document.querySelectorAll("section#gallerie-cartes .carte");
                    lesCartes.forEach((carte)=>{carte.classList.add("hidden")});
                    dealAll();
                }

                lastFilter = new URLSearchParams(window.location.search).get("fl");
            })
        }

        //gerer les classes qui changent
        function gererClasse(){
            // définir au cas ou ce nest pas défini
            let searchParam;
            if(new URLSearchParams(window.location.search).get("fl") == null){
                searchParam = "none";
            } else {
                searchParam = new URLSearchParams(window.location.search).get("fl");
            }
            // donner la class a celui qui correspond
            for(let option of options){
                option.classList.remove("actif");
                if(option.dataset.fl == searchParam){
                    option.classList.add("actif");
                } else {
                    option.classList.remove("actif");
                }
            }
        }

        function filtrer(){
            let filtre = new URLSearchParams(window.location.search).get("fl");
            if(filtre != null){
                filtre = filtre.toLowerCase();
            } else {
                filtre = "none";
            }

            let lesCartes = document.querySelectorAll("section#gallerie-cartes .carte");
            for(let carte of lesCartes){
                let cat = carte.dataset.cat;
                cat = cat.toLowerCase();

                if(cat.includes(filtre) || filtre == "none"){
                    // alert(cat);
                    carte.classList.remove("filtered-out");
                } else {
                    carte.classList.add("filtered-out");
                }
            }

            // remetre les symbolles en ordre
            resetSymboles();
        }
    }
}




// ///////////////////////////////////////////////////////////////////////////////////////////////// aleatoire

//fonction pour centrer les cartes dans la section projet aleatoire
function centrerCartes(){
    let cartesCentrer = document.querySelectorAll("section.projet-random .cartes-random .carte-anim");

    //trouver la larger
    let x1 = cartesCentrer[0].getBoundingClientRect().left;
    let x2 = trouverDerniereCarte(cartesCentrer).getBoundingClientRect().right;
    let largeur = x2-x1;
    //console.log(largeur);

    //ajuster la largeur du contenant
    let contenant = document.querySelector("section.projet-random .cartes-random");
    contenant.style.width = largeur.toString() + "px";
}
function trouverDerniereCarte(lesCartes){
    //trouver derniere carte active
    for(i = lesCartes.length-1; i>=0; i--){
        let leStyle = window.getComputedStyle(lesCartes[i], null);
        let laValeur = leStyle.getPropertyValue("display");
        //quiter la loop des quon trouve le premier pas display:none
        if(laValeur != "none"){
            // lesCartes[i].style.scale = "0.5";
            return lesCartes[i];
        }
    }
}

function animateRandomShuffle(){
    let lesCartes = document.querySelectorAll("section.projet-random .cartes-random .carte-anim");
    let nbCartes = 2;

    //si un a la classe, les autres devraient aussi
    if(!lesCartes[0].classList.contains("shuffled")){
        for(let carte of lesCartes){
            carte.classList.add("shuffled");
        }

        setTimeout(function(){
            dealAllRandom(nbCartes);
        }, "600");
    } else{
        //reshuffle
        for(let carte of lesCartes){
            carte.classList.remove("shuffled");

            setTimeout(function(){
                centrerCartes();
                carte.classList.add("shuffled");
            }, "400");
        }
        let carteCacher = document.querySelectorAll("section.projet-random .cartes-random .carte");
        for(let carte of carteCacher){
            carte.classList.add("hidden")
            carte.classList.remove("turned")
            let paquet = document.querySelector("section.projet-random .cartes-random .paquet");
            paquet.append(carte);
        }
        
        setTimeout(function(){
            dealAllRandom(nbCartes);
        }, "950");
    }
}
//addeventloistener
function Randomlistner(){
    let lesCartes = document.querySelectorAll("section.projet-random .cartes-random .carte-anim");
    for (let carte of lesCartes) {
        carte.addEventListener("click", animateRandomShuffle);
    }
}

//animer les cartes une apres lautre
function dealAllRandom(nbCartes) {
    let delay = 30;
    let i = 0;
    let frame = 0;

    function dealAllRandomRAF(){
        if(i >= nbCartes){
            return
        }

        if(frame == 0){
            dealRandom();
            i++;
        }

        frame++;
        //loop back to 0
        if(frame >= delay){
            frame = 0;
        }
        requestAnimationFrame(dealAllRandomRAF);
    }
    requestAnimationFrame(dealAllRandomRAF);
}

//fonction pour faire apparaitre les cartes
function dealRandom(){
    let cartes = document.querySelectorAll("section.projet-random .cartes-random .paquet .carte.hidden");
    ////cartes choisies alléatoirement
    let i = Math.random() * cartes.length;
    i = Math.floor(i);
    
    cartes[i].classList.remove("hidden")

    //sortir les cartes du paquet
    let section = document.querySelector("section.projet-random .cartes-random");
    section.append(cartes[i]);
    //console.log(cartes[i]);

    // deplacer les cartes
    let paq = document.querySelector("section.projet-random .cartes-random .paquet");
    vroom(cartes[i], paq);

    // retourner les cartes automatiquement
    setTimeout(function(){
        cartes[i].classList.add("turned");
    }, "700");
}


//gerer la section adaptative quand la page change de largeur
let prevWindowSize;
function resizeListener(){
    window.addEventListener("resize", function(){
        let v1 = io(window.innerWidth);
        let v2 = io(prevWindowSize);
        // si la taille de l'ecran varie entre plus ou moins
        // que 720px (le breakpoint)
        if(v1 != v2){
            resize();
        }
        prevWindowSize = this.window.innerWidth;
    })

    function resize(){
        let lesCartes = document.querySelectorAll("section.projet-random .cartes-random .carte-anim");

        if(!lesCartes[0].classList.contains("shuffled")){
            centrerCartes();
        } else {
            animateRandomShuffle();
        }
    }

    function io(val){
        if(val <= 720){
            return true;
        } else{
            return false;
        }
    }
}


// effet hover sur cartes
document.querySelectorAll(".carte").forEach(carte => {
    carte.addEventListener("mouseenter", () => {
        carte.style.transform += " translateY(-10px) scale(1.05)";
    });
    carte.addEventListener("mouseleave", () => {
        carte.style.transform = carte.style.transform.replace(" translateY(-10px) scale(1.05)", "");
    });
});

document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('btn-membres')) {
        e.preventDefault();
        e.stopPropagation();

        const btn = e.target;
        const slide = btn.nextElementSibling;

        if (!slide) return;

        const isActive = slide.classList.toggle('active');

        // changer le texte du bouton
        btn.textContent = isActive ? 'Cacher les membres trouvés' : 'Afficher les membres trouvés';

        // accessibilité
        btn.setAttribute('aria-expanded', isActive ? 'true' : 'false');
        slide.setAttribute('aria-hidden', isActive ? 'false' : 'true');
    }

    // fermeture si clic en dehors de la carte
    if (!e.target.closest('.carte')) {
        document.querySelectorAll('.membres-slide.active').forEach(function(s) {
            s.classList.remove('active');

            const b = s.previousElementSibling;
            if (b && b.classList.contains('btn-membres')) {
                b.textContent = 'Afficher les membres'; // remettre texte par défaut
                b.setAttribute('aria-expanded', 'false');
            }

            s.setAttribute('aria-hidden', 'true');
        });
    }
});
