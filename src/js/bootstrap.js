import { initTwoColsContainer } from "./components/container"
import { initHeroHome } from "./components/hero-home"
import { initTestimonialCarousel } from "./components/testimonial-carousel"
import { initJournalList } from "./components/journal-list"
import { initLogoCarousel } from "./components/logo-carousel"
import { initImageOverlayCarousel } from "./components/image-overlay-carousel"
import { initVideo } from "./components/video"
import { initClinicLocation } from "./components/clinic-location"
import { initMenu } from "./components/menu"
import { initImage } from "./components/image"
import { initTextCarousel } from "./components/text-carousel"
import { initStaffCarousel } from "./components/staff-carousel"
import { initTreatmentList } from "./components/treatment-list"
import { initPopupForm } from "./components/popup-form"
import { initPromotionList } from "./components/promotion-list"
import { initForm } from "./components/form"
import { initAccordion } from "./components/accordion"
import { initButton } from "./components/button"
import { initFloatWa } from "./components/float-wa"

const componentsMap = {
    '.block-two-column-container': initTwoColsContainer,
    '.block-hero-home': initHeroHome,
    '.block-testimonial-carousel': initTestimonialCarousel,
    '.block-journal-list': initJournalList,
    '.block-logo-carousel': initLogoCarousel,
    '.block-image-overlay-carousel': initImageOverlayCarousel,
    '.block-video': initVideo,
    '.block-clinic-location': initClinicLocation,
    'header': initMenu,
    '.block-image': initImage,
    '.block-text-carousel': initTextCarousel,
    '.block-staff-carousel': initStaffCarousel,
    '.block-treatment-list': initTreatmentList,
    '#popup-form': initPopupForm,
    '.block-promotion-list': initPromotionList,
    '.form-wrapper': initForm,
    '.block-accordion': initAccordion,
    '.block-button': initButton,
    '#float': initFloatWa
}

const initComponents = () => {
    for(const selector in componentsMap) {
        const elements = document.querySelectorAll(selector)
        if(elements.length > 0) {
            elements.forEach(element => {
                componentsMap[selector](element)
            })
        }
    }
}

export {initComponents}