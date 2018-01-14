function init() {
    let $container = $('.mainNavbar');

    if ($container.length > 0) {
        $(document).on('scroll', toggleNavbarVisibility);
        $(document).ready(toggleNavbarVisibility);
    }

    function toggleNavbarVisibility() {
        if ($(document).scrollTop() > 250) {
            $container.addClass('mainNavbar--isVisible');
        } else {
            $container.removeClass('mainNavbar--isVisible');
        }
    }
}

export default init;