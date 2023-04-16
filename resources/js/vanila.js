document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        slidesPerView: 2,
        spaceBetween: 30,
        autoplay: {
            delay: 1500,
            disableOnInteraction: false,
          },
      });

    const swiper1 = new Swiper('.swiper1', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 4,
    spaceBetween: 30,
    slideToScroll: 1,
    autoplay: {
        delay: 1500,
        disableOnInteraction: true,
        reverseDirection: true,
        },
    });

    const swiper2 = new Swiper('.swiper2', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slideToScroll: 1,
    slidesPerView: 4,
    spaceBetween: 30,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
        },
    });

});