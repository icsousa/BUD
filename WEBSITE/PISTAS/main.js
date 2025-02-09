let swiperCards = new Swiper('.card__content', {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,

  breakpoints: {
    600:{
      slidesPerView: 2,
    },
    1220:{
      slidesPerView: 3,
    },
  },

});