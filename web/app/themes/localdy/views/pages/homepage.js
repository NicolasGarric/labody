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
        target.scrollIntoView({ behavior: "smooth", block: "center", inline: "nearest" });
    });
});
