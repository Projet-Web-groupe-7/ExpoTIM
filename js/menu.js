let lastScrollTop = 0;
const header = document.querySelector("header");

if (header) {

  // Met à jour la hauteur du header et la variable CSS
  let resizeTimeout;
  function updateHeaderHeight() {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
      const h = header.offsetHeight;

      document.documentElement.style.setProperty("--header-height", `${h}px`);
      document.documentElement.style.setProperty("--header-gap", `calc(${h}px + 2rem)`);
    }, 50); // 50ms de délai pour le debounce
  }

  // --- Gestion du scroll pour cacher/montrer le header
  function gererLeDefilement() {
    const currentScroll = window.scrollY || window.pageYOffset;
    const headerHeight = header.offsetHeight;

    if (currentScroll <= headerHeight) {
      header.style.transform = "translateY(0)";
      lastScrollTop = currentScroll;
      return;
    }

    // Applique le transform seulement si nécessaire pour éviter les clignotements
    if ((currentScroll > lastScrollTop && header.style.transform !== "translateY(-100%)") ||
        (currentScroll < lastScrollTop && header.style.transform !== "translateY(0)")) {
      header.style.transform = currentScroll > lastScrollTop
        ? "translateY(-100%)"
        : "translateY(0)";
    }

    lastScrollTop = currentScroll;
  }

  // Listeners
  window.addEventListener("load", updateHeaderHeight);
  window.addEventListener("resize", updateHeaderHeight);
  window.addEventListener("scroll", gererLeDefilement);

  // Observer pour changements dynamiques de la hauteur du header
  if ("ResizeObserver" in window) {
    new ResizeObserver(updateHeaderHeight).observe(header);
  }

  // Initial call
  updateHeaderHeight();
}