const swiper = new Swiper('.swiper', {
     // Optional parameters
     loop: true,
     centeredSlides: true,
     // Navigation arrows
     navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
     },
     breakpoints: {
          // when window width is >= 320px
          425: {
               slidesPerView: 2,
               spaceBetween: 20
          },
          768: {
               slidesPerView: 3,
               spaceBetween: 30
          },
     }
});