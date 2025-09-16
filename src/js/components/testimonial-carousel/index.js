import Swiper from "swiper"
import { Pagination } from "swiper/modules"

const initTestimonialCarousel = (element) => {

    const swiperSelector = element.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1,
        spaceBetween: 24,
        autoHeight: true,
        modules: [Pagination],
        pagination: {
            el: element.querySelector('.swiper-pagination'),
            clickable: true,
        },
        breakpoints: {
            768: {
                spaceBetween: 32,
                slidesPerView: 2,
                centeredSlides: true,
                initialSlide: 1,
                autoHeight: false
            },
            1024: {
                spaceBetween: 48,
                slidesPerView: 3,
                centeredSlides: true,
                initialSlide: 1,
                autoHeight: false
            }
        }
    })

    swiperSelector.addEventListener('click', (e) => {
        if (e.target.closest('.swiper-slide-next')) {
            swiper.slideNext();
        }
        if (e.target.closest('.swiper-slide-prev')) {
            swiper.slidePrev();
        }
    });


}

export {initTestimonialCarousel}