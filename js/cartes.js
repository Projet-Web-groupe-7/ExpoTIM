//console.log("cartes.js");
if(document.querySelector("section#gallerie-cartes") != null){
    dealAll();
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
    let cartes = document.querySelectorAll(".carte.hidden");
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
    let cartes = document.querySelectorAll(".carte.hidden");
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