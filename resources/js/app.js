import './bootstrap';
import Swiper from 'swiper';
import { Autoplay, Pagination, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

// Inisialisasi Swiper setelah DOM siap
window.initHeroSwiper = function() {
    Swiper.use([Autoplay, Pagination, EffectFade]);
    new Swiper('.heroSwiper', {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        speed: 1000,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
    });
}
