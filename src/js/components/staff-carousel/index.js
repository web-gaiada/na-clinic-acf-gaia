import Swiper from "swiper"
import { Pagination } from "swiper/modules"
const initStaffCarousel = element => {

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
                spaceBetween: 24,
                slidesPerView: 2,
            },
            1024: {
                spaceBetween: 40,
                slidesPerView: 3,
            }
        }
    })

}

export {initStaffCarousel}