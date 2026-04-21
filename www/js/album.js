let swiper = null;
const modal = document.getElementById('photoModal');

modal.addEventListener('show.bs.modal', function (event) {
    const img = event.relatedTarget;
    modal._targetIndex = parseInt(img.getAttribute('data-index') || '0');
});

modal.addEventListener('shown.bs.modal', function () {
    if (swiper) {
        swiper.destroy(true, true);
    }
    swiper = new Swiper('.mySwiper', {
        initialSlide: modal._targetIndex || 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        grabCursor: true
    });
});

modal.addEventListener('hidden.bs.modal', function () {
    if (swiper) {
        swiper.destroy(true, true);
        swiper = null;
    }
});
