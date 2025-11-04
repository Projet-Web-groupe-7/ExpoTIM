let laSection = document.querySelector("section#gallerie-cartes");
if(laSection == null){
    //console.log("va chier");
} else {
    //console.log("bonne page");
    dealAll();
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
    let section = document.querySelector("section");
    section.append(cartes[i]);

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