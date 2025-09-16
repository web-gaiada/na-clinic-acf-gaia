import gsap from "gsap"
import Choices from "choices.js"
import datepicker from "js-datepicker"
import { disableScroll, enableScroll } from "@/utils/scrolls"


const initPopupForm = element => {

    const openTrigger = document.querySelectorAll('.open-popup-form')
    const closeTrigger = element.querySelectorAll('.close-button-form')

    const treatmentSelector = element.querySelector('.treatment-wrapper select')
    const clinicSelector = element.querySelector('.clinic-wrapper select')
    const dateSelector = element.querySelector('.date-wrapper input')

    function getDistance(lat1, lon1, lat2, lon2) {
        console.log(lat1, 'getDistance')
        const R = 6371e3; // Earth radius in meters
        const toRad = x => x * Math.PI / 180;
    
        const φ1 = toRad(lat1);
        const φ2 = toRad(lat2);
        const Δφ = toRad(lat2 - lat1);
        const Δλ = toRad(lon2 - lon1);
    
        const a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                  Math.cos(φ1) * Math.cos(φ2) *
                  Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    
        return R * c; // distance in meters
    }

    function compareLocations(userLat, userLon) {
        const sanur = { lat: -8.6848315, lon: 115.2606434 };
        const renon = { lat: -8.6734339, lon: 115.2297462 };
    
        const toSanur = getDistance(userLat, userLon, sanur.lat, sanur.lon);
        const toRenon = getDistance(userLat, userLon, renon.lat, renon.lon);
    
        if (toSanur < toRenon) {
            // clinicSelector.value = ''
            return 'NA Clinic Sanur'
        } else {
            return 'NA Clinic Renon'
        }
    }
    

    element.openForm = () => {
        gsap.to(element, {
            autoAlpha: 1,
            zIndex: 101,
        })
        disableScroll()
    }

    element.closeForm = () => {
        gsap.to(element, {
            autoAlpha: 0,
            zIndex: -1
        })
        enableScroll()
    }

    const treatmentInput = new Choices(treatmentSelector, {
        searchEnabled: false,
        
    })
    const clinicInput = new Choices(clinicSelector, {
        searchEnabled: false
    })

    clinicSelector.addEventListener('change', e => {
        console.log(e.target.value, 'treatmentInput')
        if(e.target.value != 'Locate NA Clinic Near Me') return
        navigator.geolocation.getCurrentPosition(pos => {
            const userLat = pos.coords.latitude;
            const userLon = pos.coords.longitude;
            clinicInput.setChoiceByValue(compareLocations(userLat, userLon))

        }, async err => {
            const getIp = await fetch('http://ip-api.com/json/')
            const data = getIp.json()
            data.then(res => {
                clinicInput.setChoiceByValue(compareLocations(res.lat, res.lon))
            })
        }, {
            timeout: 5000
        });
    })

    const dateInput = datepicker(dateSelector)

    openTrigger.forEach(trigger => {
        trigger.addEventListener("click", element.openForm)
    })
    console.log(closeTrigger)
    closeTrigger.forEach(el => {
        console.log(el)
        el.addEventListener('click', element.closeForm)
    })
}

export { initPopupForm }