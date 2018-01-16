// Note: you don't need to import Popper, Util
// and jQuery as they are already autoload in webpack.mix.js

// Owl Carousel
import 'owl.carousel';
// Parallax JS
import 'jquery-parallax.js';

// Bootstrap 4
require('bootstrap/js/dist/dropdown');
require('bootstrap/js/dist/collapse');
require('bootstrap/js/dist/scrollspy');

// Adding csrf token to every ajax request
jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Components
import landingHeader from '../../components/landingPartials/landingHeader/landingHeader';
import mainNavbar from '../../components/mainNavbar/mainNavbar';
import sectionBlog from '../../components/landingPartials/sectionBlog/sectionBlog';
import sectionReviews from '../../components/landingPartials/sectionReviews/sectionReviews';
import sectionContacts from '../../components/landingPartials/sectionContacts/sectionContacts';
import sectionMap from '../../components/landingPartials/sectionMap/sectionMap';
import indexPage from '../../pages/indexPage/indexPage';

$(document).ready(function () {
    landingHeader();
    mainNavbar();
    sectionBlog();
    sectionReviews();
    sectionContacts();
    sectionMap();
    indexPage();
});
