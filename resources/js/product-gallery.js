export function initProductGallery() {
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');

    if (!mainImage || thumbnails.length === 0) return;

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function () {
            mainImage.src = this.dataset.full;

            thumbnails.forEach(t => {
                t.classList.remove('border-blue-600');
                t.classList.add('border-transparent');
            });

            this.classList.remove('border-transparent');
            this.classList.add('border-blue-600');
        });
    });
}

