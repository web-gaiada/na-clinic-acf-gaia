import Swiper from "swiper"
import gsap from "gsap"

const initHeroHome = (element) => {
    const spacerSelector = element.querySelector('.spacer')
    const swiperSelector = element.querySelector('.swiper')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1.4,
        spaceBetween: 24,
        centeredSlides: true,
        // initialSlide: loop,
        loop: true,
        breakpoints: {
            480: {
                slidesPerView: 2.2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 5,
                initialSlide: 0,
                loop: false,
                spaceBetween: 40,
                centeredSlides: false
            }
        }
    })

    const setSpacerHeight = () => {
        const height = swiperSelector.querySelector('.swiper-slide .image-wrapper').getClientRects()[0].height / 2
        spacerSelector.style.height = `${height}px`
    }

    setSpacerHeight()
    window.addEventListener('resize', setSpacerHeight)

    swiperSelector.querySelectorAll('.image-wrapper').forEach(el => {
        el.addEventListener('mouseenter', () => {
            gsap.to(el.querySelector('.overlay'), {
                '--tw-bg-opacity': .5
            })
            gsap.to(el.querySelector('.text-wrapper'), {
                bottom: '4.5rem'
            })
        })
        el.addEventListener('mouseleave', () => {
            gsap.to(el.querySelector('.overlay'), {
                '--tw-bg-opacity': .3
            })
            gsap.to(el.querySelector('.text-wrapper'), {
                bottom: '4rem'
            })
        })
    })
}

export {initHeroHome}