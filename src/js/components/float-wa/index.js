import gsap from "gsap"

const initFloatWa = element => {

    const buttonSelector = element.querySelector('#float-wa')
    const choicesWrapper = element.querySelector('.choices-wrapper')
    gsap.set(choicesWrapper, {
        height: 0
    })

    buttonSelector.addEventListener('click', () => {
        if(choicesWrapper.classList.contains('active')) {
            choicesWrapper.classList.remove('active')
            gsap.to(choicesWrapper, {
                height: 0
            })
            return
        }
        choicesWrapper.classList.add('active')
        gsap.to(choicesWrapper, {
            height: 'auto'
        })
        return 
    })

}

export {initFloatWa}