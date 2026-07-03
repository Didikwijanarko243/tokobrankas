export function initPromoSlider() {
    const slider = document.getElementById('promo-slider');
    if (!slider) return;

    const track = document.getElementById('promo-slider-track');
    const slides = track.children;
    const totalSlides = slides.length;

    if (totalSlides <= 1) return; // tidak perlu slider kalau cuma 1 data

    const prevBtn = document.getElementById('promo-prev');
    const nextBtn = document.getElementById('promo-next');
    const dots = document.querySelectorAll('.promo-dot');

    let currentIndex = 0;
    let autoplayInterval = null;
    const AUTOPLAY_DELAY = 5000; // 5 detik

    function goToSlide(index) {
        currentIndex = (index + totalSlides) % totalSlides;
        track.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-wood-700', i === currentIndex);
            dot.classList.toggle('bg-gray-300', i !== currentIndex);
            dot.classList.toggle('dark:bg-gray-600', i !== currentIndex);
        });
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function prevSlide() {
        goToSlide(currentIndex - 1);
    }

    function startAutoplay() {
        stopAutoplay();
        autoplayInterval = setInterval(nextSlide, AUTOPLAY_DELAY);
    }

    function stopAutoplay() {
        if (autoplayInterval) clearInterval(autoplayInterval);
    }

    nextBtn?.addEventListener('click', () => {
        nextSlide();
        startAutoplay(); // reset timer saat user klik manual
    });

    prevBtn?.addEventListener('click', () => {
        prevSlide();
        startAutoplay();
    });

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.slideTo));
            startAutoplay();
        });
    });

    // Pause autoplay saat hover
    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);

    startAutoplay();
}