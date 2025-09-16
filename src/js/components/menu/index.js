import gsap from "gsap"
import { disableScroll, enableScroll } from "@/utils/scrolls"

const initMenu = element => {
    const hamburgerSelector = element.querySelector('.hamburger')
    const menuWrapper = document.querySelector('aside')
    const closeButton = document.querySelectorAll('.close-button')
    const mobileMenuWrapper = menuWrapper.querySelector('.menu-wrapper')
    hamburgerSelector.querySelectorAll('span').forEach((span, i) => {
        gsap.set(span, {
            width: () => {
                if(i == 1) {
                    return 32
                }
                return 24
            }
        })
    })
    hamburgerSelector.addEventListener('mouseenter', () => {
        hamburgerSelector.querySelectorAll('span').forEach((span, i) => {
            gsap.to(span, {
                duration: .3,
                width: 32
            })
        })
    })
    hamburgerSelector.addEventListener('mouseleave', () => {
        hamburgerSelector.querySelectorAll('span').forEach((span, i) => {
            gsap.to(span, {
                duration: .3,
                width: () => {
                    if(i == 1) {
                        return 32
                    }
                    return 24
                }
            })
        })
    })
    const openMenu = () => {
        if(window.innerHeight < mobileMenuWrapper.clientHeight) {
            mobileMenuWrapper.style.textAlign = 'center'
            mobileMenuWrapper.style.overflow = 'scroll'
            mobileMenuWrapper.style.paddingTop = '2rem'
            mobileMenuWrapper.style.paddingBottom = '2rem'
            mobileMenuWrapper.style.height = 'min-content'
        } else {
            mobileMenuWrapper.style.textAlign = 'center'
            mobileMenuWrapper.style.overflow = 'scroll'
            mobileMenuWrapper.style.paddingTop = '0'
            mobileMenuWrapper.style.paddingBottom = '0'
            mobileMenuWrapper.style.height = '100%'
        }
        gsap.to(menuWrapper, {
            translateX: 0
        })
        
        disableScroll()
    }
    const closeMenu = () => {
        mobileMenuWrapper.style.height = 'min-content'
        gsap.to(menuWrapper, {
            translateX: "101%"
        })
        enableScroll()
    }
    gsap.set(menuWrapper, {
        translateX: '101%'
    })
    hamburgerSelector.addEventListener('click', openMenu)
    closeButton.forEach(close => {
        close.addEventListener('click', closeMenu)
    })
}

export {initMenu}