// jQuery
import 'jquery/src/jquery';
// Owl Carousel
import 'owl.carousel';
// Parallax JS
import 'jquery-parallax.js';

// Bootstrap 4
import util from 'bootstrap/js/src/util';
import dropdown from 'bootstrap/js/src/dropdown';
import collapse from 'bootstrap/js/src/collapse';

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

$(document).ready(function () {
    landingHeader();
    mainNavbar();
    sectionBlog();
    sectionReviews();
    sectionContacts();
    sectionMap();
});
