import Swiper from "swiper"
import { Pagination } from "swiper/modules"

const initLogoCarousel = (element) => {

    const swiperSelector = element.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1,
        spaceBetween: 12,
        modules: [Pagination],
        pagination: {
            el: element.querySelector('.swiper-pagination'),
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 18
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 24
            }
        }
    })
}

export {initLogoCarousel}