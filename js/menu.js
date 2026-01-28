let lastScrollTop = 0;
const header = document.querySelector("header");

function updateHeaderHeight() {
  const h = header.offsetHeight;
  document.documentElement.style.setProperty(
    "--header-height",
    `${h}px`
  );
}

function gererLeDefilement() {
  const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

  // Toujours visible au top
  if (currentScroll < header.offsetHeight) {
    header.style.transform = "translateY(0)";
    lastScrollTop = currentScroll;
    return;
  }

  if (currentScroll > lastScrollTop) {
    header.style.transform = "translateY(-100%)";
  } else {
    header.style.transform = "translateY(0)";
  }

  lastScrollTop = Math.max(currentScroll, 0);
}

// Init
window.addEventListener("DOMContentLoaded", updateHeaderHeight);
window.addEventListener("resize", updateHeaderHeight);
window.addEventListener("scroll", gererLeDefilement);
