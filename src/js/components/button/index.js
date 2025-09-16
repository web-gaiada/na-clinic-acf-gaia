import gsap from "gsap"

const initButton = element => {
    const dataset = element.dataset
    const initTextColor = dataset.textColor
    const initBgColor = dataset.bgColor
    // const hoverBgColor = dataset.hoverBgColor
    // const hoverTextColor = dataset.hoverTextColor

    const buttonSelector = element.querySelector('a.button-el')
    buttonSelector.addEventListener('mouseenter', () => {
        gsap.to(buttonSelector, {
            background: 'linear-gradient(90deg, #D4B888, #F9EBCB, #D4B888)',
            color: '#1C1915'
        })
    })

    buttonSelector.addEventListener('mouseleave', () => {
        gsap.to(buttonSelector, {
            background: initBgColor,
            color: initTextColor
        })
    })
}

export {initButton}