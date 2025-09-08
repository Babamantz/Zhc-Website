import './bootstrap';

document.addEventListener("DOMContentLoaded", async () => {
    const carouselEl = document.querySelector("[x-data^='carousel']");
    if (carouselEl) {
        const carouselModule = await import('./carousel.js');
        window.carousel = carouselModule.default;
    }
});
