var swiper = new Swiper(".header-slider", {
  loop: true,
  autoplay: true,
  speed: 1500,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var homeSwiper = new Swiper(".header-slider2", {
  loop: true,
  autoplay: true,
  speed: 1500,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".home-slider", {
  loop: true,
  autoplay: true,
  speed: 1500,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiper = new Swiper(".product-slider", {
  loop: true,
  autoplay: true,
  speed: 1500,

  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next-unique",
    prevEl: ".swiper-button-prev-unique",
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
  },
});

var swiper = new Swiper(".shop-slider", {
  speed: 1500,
  loop: true,
  spaceBetween: 20,
  slidesPerGroup: 2,
  autoplay: {
    delay: 5000,
  },
  grabCursor: true,
  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".insta-slider", {
  speed: 1500,
  loop: true,
  spaceBetween: 20,
  slidesPerGroup: 2,
  autoplay: {
    delay: 5000,
  },
  grabCursor: true,
  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 5,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".trending-slider", {
  speed: 1500,
  loop: true,
  spaceBetween: 20,
  slidesPerGroup: 2,
  autoplay: {
    delay: 5000,
  },
  grabCursor: true,
  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 4,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".perfume-slider", {
  speed: 1500,
  loop: true,
  spaceBetween: 20,
  slidesPerGroup: 2,
  autoplay: {
    delay: 5000,
  },
  grabCursor: true,
  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 2,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiper = new Swiper(".category-slider", {
  speed: 1500,
  loop: true,
  spaceBetween: 10,
  slidesPerGroup: 2,
  autoplay: {
    delay: 5000,
  },
  grabCursor: true,
  breakpoints: {
    320: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 6,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

var swiper = new Swiper(".product-slider", {
  speed: 1500,
  loop: true,
  spaceBetween: 10,
  slidesPerGroup: 2,
  autoplay: {
    delay: 5000,
  },
  grabCursor: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    1024: {
      slidesPerView: 4,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  autoplay: true,
  speed: 1500,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next-unique",
    prevEl: ".swiper-button-prev-unique",
  },
  thumbs: {
    swiper: swiper,
  },
});

var swiper = new Swiper(".review_slider", {
  spaceBetween: 10,
  autoplay: true,
  grabCursor: true,
  breakpoints: {
    640: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 4,
    },
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-review-next",
    prevEl: ".swiper-review-prev",
  },
});
