import 'slick-carousel';
import counterUp from 'counterup2';

import './components/navigation';
import './components/function';
import './components/tabpanel';
import './components/woocommerce';
import AOS from 'aos';
import 'aos/dist/aos.css';

/* global Waypoint */
import 'waypoints/lib/jquery.waypoints.min.js';

$(document).ready(function () {
    AOS.init({
        duration: 1200,
        once: true,
        disable: 'mobile',
    });

    const el = document.querySelector('.counterUp')
    if (el === null) return;
    counterUp(el, {
        duration: 2000,
        delay: 100,
    })
});

$(document).on("load", function () { 
    AOS.refresh();
})

import './blocks/progressbar-block';
import './blocks/team-carousel';
import './blocks/events-carousel';
import './blocks/testimonials';
import './blocks/posts-slider';
import './blocks/events-listing';
import './blocks/gives-slider';
import './blocks/video-popup-actions';
import './blocks/ss-upcoming-event-video';
import './blocks/ss-text-tsm-video';
import './blocks/logo-carousel';
import './blocks/projects-grid-action';
import './blocks/counter-box';