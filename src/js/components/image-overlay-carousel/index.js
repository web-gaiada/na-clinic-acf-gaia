import Swiper from "swiper"
import { Pagination } from "swiper/modules"
import gsap from "gsap"
const initImageOverlayCarousel = (element) => {
    const wrappers = element.querySelectorAll('.image-wrapper')
    const swiperSelector = element.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1,
        spaceBetween: 15,
        modules: [Pagination],
        pagination: {
            el: element.querySelector('.swiper-pagination'),
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 28
            }
        }
    })

    wrappers.forEach(wrapper => {
        if(!wrapper.classList.contains('is--anim')) return
        const overlay = wrapper.querySelector('.overlay')
        wrapper.addEventListener('mouseenter', () => {
            gsap.to(overlay, {
                '--tw-bg-opacity': .5
            })
        })
        wrapper.addEventListener('mouseleave', () => {
            gsap.to(overlay, {
                '--tw-bg-opacity': .3
            })
        })
    })


}

export {initImageOverlayCarousel}