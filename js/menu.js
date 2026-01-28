let lastScrollTop = 0;
const header = document.querySelector("header");
if (!header) return;

function updateHeaderHeight() {
  const h = header.offsetHeight;

  document.documentElement.style.setProperty(
    "--header-height",
    `${h}px`
  );

  // gap = header + espace visuel (2rem ici)
  document.documentElement.style.setProperty(
    "--header-gap",
    `calc(${h}px + 2rem)`
  );
}

function gererLeDefilement() {
  const currentScroll = window.scrollY;

  if (currentScroll <= header.offsetHeight) {
    header.style.transform = "translateY(0)";
    lastScrollTop = currentScroll;
    return;
  }

  header.style.transform =
    currentScroll > lastScrollTop
      ? "translateY(-100%)"
      : "translateY(0)";

  lastScrollTop = currentScroll;
}

window.addEventListener("load", updateHeaderHeight);
window.addEventListener("resize", updateHeaderHeight);
window.addEventListener("scroll", gererLeDefilement);

new ResizeObserver(updateHeaderHeight).observe(header);
