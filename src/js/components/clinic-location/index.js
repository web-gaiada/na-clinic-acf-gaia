import gsap from "gsap"

const initClinicLocation = element => {
    const wrapper = element.querySelector('.image-wrapper')
    const overlay = element.querySelector('.overlay')
    if(!wrapper.classList.contains('is--anim')) return
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
}

export {initClinicLocation}