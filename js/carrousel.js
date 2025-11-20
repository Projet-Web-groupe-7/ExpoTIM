(function(){
    console.log("carrousel.js");

    const slides = document.querySelectorAll(".carrousel-slide");
    const prevBtn = document.querySelector(".carrousel-btn--prev");
    const nextBtn = document.querySelector(".carrousel-btn--next");

    if (slides.length === 0) return;

    let indexActuel = 0;
    const total = slides.length;

    function afficherSlide(index) {
        slides.forEach(s => s.classList.remove("active"));
        slides[index].classList.add("active");
    }

    function suivant() {
        indexActuel = (indexActuel + 1) % total;
        afficherSlide(indexActuel);
    }

    function precedent() {
        indexActuel = (indexActuel - 1 + total) % total;
        afficherSlide(indexActuel);
    }

    // Flèches
    if (nextBtn) nextBtn.addEventListener("click", suivant);
    if (prevBtn) prevBtn.addEventListener("click", precedent);

    // Défilement automatique toutes les 5 secondes
    setInterval(suivant, 5000);

    afficherSlide(indexActuel);
})();


document.addEventListener("DOMContentLoaded", () => {
    const elements = document.querySelectorAll(".scroll-reveal");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
                observer.unobserve(entry.target); // animate only once
            }
        });
    }, { 
        threshold: 0.3 // trigger when 30% of element is visible
    });

    elements.forEach(el => observer.observe(el));
});


