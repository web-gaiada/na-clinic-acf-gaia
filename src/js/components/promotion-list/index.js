import gsap from "gsap"
import Swiper from "swiper"
import { EffectFade } from "swiper/modules"

const initPromotionList = element => {
    const swiperSelector = element.querySelector('.swiper')
    const tabButtons = element.querySelectorAll('.tab button')
    // const ctaButtons = element.querySelectorAll('.cta-button')
    const swiper = new Swiper(swiperSelector, {
        slidesPerView: 1,
        modules: [EffectFade],
        effect: "fade",
        allowTouchMove: false,
        fadeEffect: {
            crossFade: true
        }
    })

    const resetButtonActive = () => {
        tabButtons.forEach(button => {
            button.classList.remove('active')
            gsap.to(button, {
                '--tab-left': '50%',
                '--tab-width': '0%'
            })
        })
    }

    tabButtons.forEach((button, i) => {
        if(!i) {
            gsap.set(button, {
                '--tab-left': '0%',
                '--tab-width': '100%'
            })
        }

        button.addEventListener('mouseenter', () => {
            if(button.classList.contains('active')) return
            gsap.to(button, {
                '--tab-left': '25%',
                '--tab-width': '50%'
            })
        })
        button.addEventListener('mouseleave', () => {
            if(button.classList.contains('active')) return
            gsap.to(button, {
                '--tab-left': '50%',
                '--tab-width': '0%'
            })
        })

        button.addEventListener('click', () => {
            if(swiper.activeIndex == button.dataset.index) return 

            resetButtonActive()
            swiper.slideTo(parseInt(button.dataset.index))
            gsap.to(button, {
                '--tab-left': '0%',
                '--tab-width': '100%'
            })
            button.classList.add('active')
        })
    })

    // ctaButtons.forEach(el => {
    //     const initColor =  getComputedStyle(el).color
    //     const initBg = getComputedStyle(el).background == 'none' ? 'transparent' : getComputedStyle(el).background

    //     el.addEventListener('mouseenter', () => {
    //         gsap.to(el, {
    //             color: '#1C1915',
    //             background: 'linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888)'
    //         })
    //     })
    //     el.addEventListener('mouseleave', () => {
    //         gsap.to(el, {
    //             color: initColor,
    //             background: initBg
    //         })
    //     })
    // })

}

export {initPromotionList}