// web/app/themes/localdy/views/pages/homepage.js

// Scroll function header
document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", (e) => {
        const link = e.target.closest("[data-scroll]");
        if (!link) return;

        const targetId = link.getAttribute("data-scroll");
        if (!targetId) return;

        const target = document.getElementById(targetId);
        if (!target) return;

        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
    });
});


// Header Black/White switch - base.twig & base.scss
document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".header");
    const hero = document.querySelector(".homepage__heading");

    if (!header || !hero) return;

    const heroHeight = hero.offsetHeight;

    window.addEventListener("scroll", () => {
        if (window.scrollY > heroHeight - 80) {
            header.classList.remove("header--light");
            header.classList.add("header--dark");
        } else {
            header.classList.remove("header--dark");
            header.classList.add("header--light");
        }
    });
});
