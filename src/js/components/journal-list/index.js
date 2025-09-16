import Swiper from "swiper"
import { Pagination } from "swiper/modules"
import gsap from "gsap"
const initJournalList = (element) => {

    const swiperSelector = element.querySelector('.swiper')
    const buttons = element.querySelectorAll('.button-wrapper a')
    if(swiperSelector) {
        const swiper = new Swiper(swiperSelector, {
            slidesPerView: 1,
            spaceBetween: 20,
            init: false,
            modules: [Pagination],
            pagination: {
                el: element.querySelector('.swiper-pagination'),
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            }
        })

        const equalizeHeight = () => {
            const equalize = element.querySelectorAll('.equalize-height')
            if(equalize.length) {
                let tempHeight = 0
                if(window.innerWidth > 1024) {
                    equalize.forEach(child => {
                        if(tempHeight < child.getClientRects()[0].height) {
                            tempHeight = child.getClientRects()[0].height
                        }
                    })
                    equalize.forEach(child => {
                        child.style.height = `${tempHeight}px`
                    })
                } else {
                    equalize.forEach(child => {
                        child.style.height = `auto`
                    })
                }

            }
        }

        swiper.on('init', equalizeHeight)
        swiper.init()
    }

    buttons.forEach(button => {
        const initColor = getComputedStyle(button).background
        const initText = getComputedStyle(button).color
        button.addEventListener('mouseenter', () => {
            gsap.to(button, {
                background: 'linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888)',
                color: '#1C1915',
                duration: .3
            })
        })
        button.addEventListener('mouseleave', () => {
            gsap.to(button, {
                background: initColor,
                color: initText,
                duration: .3
            })
        })
    })

}

export {initJournalList}