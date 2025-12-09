document.addEventListener('DOMContentLoaded', () => {

    const intro = document.querySelector('.intro-expo');
    const chars = document.querySelectorAll('.intro-texte .char');
    const bouton = document.querySelector('.intro-bouton');

    if (!chars.length) return;

    // Animation d'entrée
    const tl = gsap.timeline();

    tl.from(chars, {
        x: -40,
        opacity: 0,
        duration: .5,
        ease: "power3.out",
        stagger: .015
    });

    tl.fromTo(bouton,
        { opacity: 0, y: 20 },
        {
            opacity: 1,
            y: 0,
            duration: .6,
            ease: "back.out(1.4)"
        }, "-=0.3"
    );


    // Click → disparition + scroll fluide
    bouton.addEventListener("click", e => {
        e.preventDefault();

        gsap.to(intro, {
            opacity: 0,
            y: -50,
            duration: .7,
            ease: "power2.inOut",
            onComplete: () => {
                intro.style.display = "none";

                // Scroll ultra smooth
                gsap.to(window, {
                    scrollTo: {
                        y: "#main"
                    },
                    duration: 1,
                    ease: "power2.out"
                });
            }
        });

    });


    

});
