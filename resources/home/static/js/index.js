// Note: you don't need to import Popper, Util
// and jQuery as they are already autoload in webpack.mix.js

// Bootstrap 4
import 'bootstrap/js/dist/dropdown';
import 'bootstrap/js/dist/collapse';

// Custom components
import notification from '../../components/notification/notification';
import homePage from '../../pages/homePage';
import postsPage from '../../pages/posts/postsPage';

// Adding csrf token to every ajax request
jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Wait for page loading
$(document).ready(function () {
    notification.autoRemoveNotification(5000);
    homePage();
    postsPage();
});