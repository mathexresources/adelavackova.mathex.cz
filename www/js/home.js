document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.swiper-home', {
        slidesPerView: 'auto',
        spaceBetween: 2,
        loop: true,
        speed: 4000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        freeMode: true,
    });
});
