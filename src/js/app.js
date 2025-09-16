import { initScroll } from "./utils/scrolls"
import { initComponents } from "./bootstrap"
import { initGlobal, initLoadingScreen } from "./global"
import { disableScroll } from "./utils/scrolls"

initScroll()
initGlobal()
document.addEventListener("DOMContentLoaded", () => {
    initComponents()
    // disableScroll()
})