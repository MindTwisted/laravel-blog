function init() {
    // Add slow scroll animation on #id links
    $('a.slowScroll[href*="#"]').on('click', function (e) {
        e.preventDefault();

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500, 'linear');
    });

    // Add bootstrap scroll spy if mainNavbar exists on the page
    if ($('#mainNavbar').length > 0) {
        $('body').scrollspy({target: '#mainNavbar'});
    }
}

export default init;