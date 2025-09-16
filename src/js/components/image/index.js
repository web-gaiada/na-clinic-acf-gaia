const initImage = element => {
    const mobileRatio = element.dataset.mobileRatio
    const desktopRatio = element.dataset.desktopRatio
    const setStyle = (style) => {
        element.style.setProperty('--ratio', window.innerWidth < 768 ? mobileRatio : desktopRatio)
    }
    setStyle()
    window.addEventListener('resize', setStyle)
}

export {initImage}