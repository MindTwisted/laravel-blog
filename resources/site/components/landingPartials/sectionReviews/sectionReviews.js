function init() {
    // Get DOM elements
    let $container = $('.sectionReviews__carousel');

    // Init carousel if container exists
    if ($container.length > 0) {
        $container.owlCarousel({
            loop: true,
            items: 1
        });
    }
}

export default init;