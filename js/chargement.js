window.addEventListener("load", () => {
    const loader = document.getElementById("chargement");

    loader.style.opacity = 0;
    setTimeout(() => {
        loader.style.display = "none";
    }, 400); // 0.4s pour disparaître
});
