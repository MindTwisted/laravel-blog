function init() {
    let $container = $('.indexPage__postsCarousel');

    $container.owlCarousel({
        loop: true,
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
}

export default init;