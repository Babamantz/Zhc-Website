export default function carousel(slidesData) {
    return {
        current: 0,
        interval: null,
        slides: slidesData,
        start() {
            if (this.slides.images.length > 1) {
                this.interval = setInterval(() => this.next(), 5000);
            }
        },
        pause() {
            clearInterval(this.interval);
        },
        resume() {
            this.start();
        },
        next() {
            this.current = (this.current + 1) % this.slides.images.length;
        },
        prev() {
            this.current = (this.current - 1 + this.slides.images.length) % this.slides.images.length;
        },
        goToSlide(index) {
            this.current = index;
        }
    };
}
