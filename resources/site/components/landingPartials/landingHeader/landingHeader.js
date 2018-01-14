function init() {
    // Get DOM elements
    let $container = $('.landingHeader__carousel');

    // Custom nav markup
    let $prevNavHTML = `<svg>
                          <use xlink:href="#angle-left"></use>
                       </svg>`;
    let $nextNavHTML = `<svg>
                          <use xlink:href="#angle-right"></use>
                       </svg>`;

    // Init carousel if container exists
    if ($container.length > 0) {
        $container.owlCarousel({
            loop: true,
            items: 1,
            autoplay: true,
            smartSpeed: 750,
            nav: true,
            navText: [$prevNavHTML, $nextNavHTML]
        });
    }
}

export default init;