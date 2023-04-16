/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/vanila.js ***!
  \********************************/
document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper('.swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false
    }
  });
  var swiper1 = new Swiper('.swiper1', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 4,
    spaceBetween: 30,
    slideToScroll: 1,
    autoplay: {
      delay: 1500,
      disableOnInteraction: true,
      reverseDirection: true
    }
  });
  var swiper2 = new Swiper('.swiper2', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slideToScroll: 1,
    slidesPerView: 4,
    spaceBetween: 30,
    autoplay: {
      delay: 1500,
      disableOnInteraction: false
    }
  });
});
/******/ })()
;