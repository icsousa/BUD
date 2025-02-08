let swiperCards = new Swiper('.card__content', {
  // Optional parameters
  loop: true,
  spaceBetween: 32,
  grabCursor: true,


  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true,
  },

});