import gsap from "gsap"
import MorphSVGPlugin from "gsap/MorphSVGPlugin"

gsap.registerPlugin(MorphSVGPlugin)

const initAccordion = element => {

    const items = element.querySelectorAll('.accordion-item')
    items.forEach(item => {
        const content = item.querySelector('.accordion-content')
        const open = item.querySelector('.open path')
        const close = item.querySelector('.close path')
        const svg = item.querySelector('.default path')
        item.addEventListener('click', () => {
            if(item.classList.contains('active')) {
                // gsap.to(open, {
                //     display: 'none'
                // })
                // gsap.to(close, {
                //     display: 'block'
                // })
                gsap.to(svg, {
                    morphSVG: close
                })
                item.classList.remove('active')
                gsap.to(content, {
                    height: 0
                })
            } else {
                item.classList.add('active')
                gsap.to(svg, {
                    morphSVG: open
                })
                gsap.to(content, {
                    height: 'auto'
                })
            }
        })
    })

}
export {initAccordion}