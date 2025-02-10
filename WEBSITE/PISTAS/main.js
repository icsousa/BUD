let swiperCards = new Swiper('.card__content', {
  loop: true,
  spaceBetween: 32,
  grabCursor: true,

  breakpoints: {
    600:{
      slidesPerView: 2,
    },
    968:{
      slidesPerView: 3,
    },
  },

});