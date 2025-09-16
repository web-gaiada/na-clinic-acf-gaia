import gsap from "gsap"
const initVideo = (element) => {

    const videoSelector = element.querySelector('.video-wrapper')
    const videoElement = element.querySelector('video')
    const playButton = element.querySelector('.play-button')

    videoSelector.addEventListener('click', () => {
        videoElement.play()
    })

    videoElement.addEventListener('play', () => {
        playButton.style.display = 'none'
        videoElement.loop = true
        videoElement.controls = true
    })
    videoElement.addEventListener('pause', () => {
        playButton.style.display = 'flex'
    })
    videoSelector.addEventListener('mouseenter', () => {
        gsap.to(playButton, {
            scale: 1.1,
            duration: .2
        })
    })
    videoSelector.addEventListener('mouseleave', () => {
        gsap.to(playButton, {
            scale: 1,
            duration: .2
        })
    })

    const mobileRatio = element.dataset.mobileRatio
    const desktopRatio = element.dataset.desktopRatio
    const setStyle = (style) => {
        element.style.setProperty('--ratio', window.innerWidth < 768 ? mobileRatio : desktopRatio)
    }
    setStyle()
    window.addEventListener('resize', setStyle)
}

export {initVideo}