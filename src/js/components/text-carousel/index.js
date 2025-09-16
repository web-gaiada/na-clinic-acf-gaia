import Swiper from "swiper";
import { Pagination, EffectFade } from "swiper/modules";

const initTextCarousel = element => {

    const swiperSelector = element.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1,
        modules: [Pagination, EffectFade],
        pagination: {
            el: element.querySelector('.swiper-pagination'),
            clickable: true
        },
        effect: "fade"
    })

}

export {initTextCarousel}