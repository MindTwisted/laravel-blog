function init() {
    // Get DOM elements
    let $container = $('.sectionBlog__carousel');

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
            autoplay: true,
            smartSpeed: 750,
            margin: 30,
            nav: true,
            navText: [$prevNavHTML, $nextNavHTML],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                800: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
}

export default init;