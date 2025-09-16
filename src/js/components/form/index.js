import gsap from "gsap"

const initForm = element => {
    const submitSelector = element.querySelector('.wpcf7-submit')
    const initColor = getComputedStyle(submitSelector).color
    const initBg = getComputedStyle(submitSelector).background
    submitSelector.addEventListener('mouseenter', () => {
        gsap.to(submitSelector, {
            background: 'linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888)',
            color: '#1C1915'
        })
    })
    submitSelector.addEventListener('mouseleave', () => {
        gsap.to(submitSelector, {
            background: initBg,
            color: initColor
        })
    })

}

export {initForm}