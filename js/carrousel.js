(function () {

    const slides = document.querySelectorAll(".carrousel-slide");
    if (!slides.length) return;

    let index = 0;

    function appliquerClasses() {
        slides.forEach(s => {
            s.classList.remove("active","prev","depth1","depth2","other");
        });

        const total = slides.length;

        const i0 = index % total;
        const i1 = (index - 1 + total) % total;
        const i2 = (index - 2 + total) % total;
        const i3 = (index - 3 + total) % total;

        slides[i0].classList.add("active");
        slides[i1].classList.add("prev");
        slides[i2].classList.add("depth1");
        slides[i3].classList.add("depth2");

        slides.forEach((s,i)=>{
            if (![i0,i1,i2,i3].includes(i)) {
                s.classList.add("other");
            }
        });
    }

    function next() {
        index = (index + 1) % slides.length;
        appliquerClasses();
    }

    function prev() {
        index = (index - 1 + slides.length) % slides.length;
        appliquerClasses();
    }

    // clicks
    document.querySelector(".carrousel-btn--next")?.addEventListener("click", next);
    document.querySelector(".carrousel-btn--prev")?.addEventListener("click", prev);

    // autoplay
    setInterval(next, 5000);

    appliquerClasses();

})();
