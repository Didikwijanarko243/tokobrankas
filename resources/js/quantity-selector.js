export function initQuantitySelector() {
    const wrapper = document.getElementById('quantity-selector');
    if (!wrapper) return;

    const input = document.getElementById('quantity-input');
    const decrementBtn = wrapper.querySelector('.qty-decrement');
    const incrementBtn = wrapper.querySelector('.qty-increment');
    const max = parseInt(wrapper.dataset.max) || 99;
    const min = 1;

    decrementBtn.addEventListener('click', () => {
        let value = parseInt(input.value) || min;
        if (value > min) {
            input.value = value - 1;
        }
    });

    incrementBtn.addEventListener('click', () => {
        let value = parseInt(input.value) || min;
        if (value < max) {
            input.value = value + 1;
        }
    });

    // Validasi saat user ketik manual
    input.addEventListener('change', () => {
        let value = parseInt(input.value);

        if (isNaN(value) || value < min) {
            value = min;
        } else if (value > max) {
            value = max;
        }

        input.value = value;
    });
}

export function initWhatsappBuyButton() {
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('.whatsapp-buy-btn');
        if (!btn) return;

        const qtyTargetId = btn.dataset.qtyTarget;
        const input = qtyTargetId ? document.getElementById(qtyTargetId) : null;
        const qty = input ? (parseInt(input.value) || 1) : 1;

        const productName = btn.dataset.productName;
        const productUrl = btn.dataset.productUrl;
        const waNumber = btn.dataset.waNumber;

        let message = `Halo, saya ingin membeli produk:\n\n`;
        message += `*${productName}*\n`;
        message += `Jumlah: ${qty}\n`;
        if (productUrl) {
            message += `Link: ${productUrl}\n`;
        }
        message += `\nApakah produk ini masih tersedia?`;

        const encodedMessage = encodeURIComponent(message);
        const waUrl = `https://wa.me/${waNumber}?text=${encodedMessage}`;

        window.open(waUrl, '_blank');
    });
}