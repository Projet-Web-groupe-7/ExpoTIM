document.addEventListener("DOMContentLoaded", () => {
    const cartes = document.querySelectorAll("main.gallerie.search-page .carte");

    cartes.forEach(carte => {
        const observer = new MutationObserver(() => {
            if (carte.classList.contains("turned") && !carte.dataset.flipped) {
                carte.dataset.flipped = "true"; // mark as already triggered

                // Add delay before confetti
                setTimeout(() => {
                    createConfetti(carte);
                }, 300); // 300ms delay (adjust as needed)
            }
        });

        observer.observe(carte, { attributes: true });
    });
});




function createConfetti(carte) {
    const numParticles = 12; // more particles
    const colors = ["#ff4d4d", "#4d79ff", "#ffd24d", "#4dff88"];

    for (let i = 0; i < numParticles; i++) {
        const particle = document.createElement("div");
        particle.className = "confetti-particle";

        // random color
        particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
        particle.style.position = "absolute";

        // slightly bigger
        const size = 8 + Math.random() * 4; // 8-12px
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.borderRadius = "50%";

        particle.style.left = `${Math.random() * carte.offsetWidth}px`;
        particle.style.top = `${Math.random() * carte.offsetHeight}px`;
        particle.style.pointerEvents = "none";
        particle.style.opacity = "1";
        particle.style.transition = "transform 0.7s ease-out, opacity 0.7s ease-out";

        carte.appendChild(particle);

        // random movement
        const dx = (Math.random() - 0.5) * 60; // wider horizontal spread
        const dy = -Math.random() * 60;        // higher vertical spread
        const rotate = Math.random() * 360;

        requestAnimationFrame(() => {
            particle.style.transform = `translate(${dx}px, ${dy}px) rotate(${rotate}deg)`;
            particle.style.opacity = "0";
        });

        setTimeout(() => particle.remove(), 900);
    }
}