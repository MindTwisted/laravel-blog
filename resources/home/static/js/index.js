// Bootstrap 4
import util from 'bootstrap/js/src/util';
import dropdown from 'bootstrap/js/src/dropdown';
import collapse from 'bootstrap/js/src/collapse';

// jQuery lib
import $ from 'jquery';

// Custom components
import notification from '../../components/notification/notification';
import homePage from '../../pages/homePage';
import postsPage from '../../pages/posts/postsPage';

// Adding csrf token to every ajax request
$.ajaxSetup({
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