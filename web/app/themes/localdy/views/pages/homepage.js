// web/app/themes/localdy/views/pages/homepage.js

// Scroll from Contact Btn to Contact Form
document.addEventListener("DOMContentLoaded", () => {
    const btns = document.querySelectorAll('[data-scroll="contact"]');
    const target = document.getElementById("contact");

    if (!btns.length || !target) return;

    btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            target.scrollIntoView({ behavior: "smooth", block: "start" });
        });
    });
});


// Scroll from Localisation Btn to Localisation
document.addEventListener("DOMContentLoaded", () => {
    const btns = document.querySelectorAll('[data-scroll="localisation"]');
    const target = document.getElementById("localisation");

    if (!btns.length || !target) return;

    btns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            target.scrollIntoView({ behavior: "smooth", block: "start" });
        });
    });
});
