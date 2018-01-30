import OnScreen from 'onscreen';

function initSlowScroll() {
    // Add slow scroll animation on #id links
    $('a.slowScroll[href*="#"]').on('click', function (e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500, 'linear');
    });
}

function initScrollSpy() {
    // Add bootstrap scroll spy if mainNavbar exists on the page
    if ($('#mainNavbar').length > 0) {
        $('body').scrollspy({target: '#mainNavbar'});
    }
}

function initScrollAnimations() {
    const os = new OnScreen({
        debounce: 0
    });

    const rubberBandAnimationAdd = (element) => {
        element.classList.add('animated', 'rubberBand');
    };

    const rubberBandAnimationRemove = (element) => {
        element.classList.remove('animated', 'rubberBand');
    };

    os.on('enter', '.sectionHeading', rubberBandAnimationAdd);
    os.on('leave', '.sectionHeading', rubberBandAnimationRemove);
}

export default {
    initSlowScroll,
    initScrollSpy,
    initScrollAnimations
};