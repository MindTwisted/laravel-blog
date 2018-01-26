// Get jquery instance of notification and alert dom elements
let $notification = $('.notification');
let $alert = $notification.find('.alert');

// Notification visible class name
let visibleClassName = 'notification--isVisible';

// Notification auto-hide timeout, milliseconds
let autoHideTimeout = 5000;

// Initialize timer
let timer;

// Hide notification
function hideNotification() {
    $alert.removeClass('alert-success alert-danger');
    $alert.text('');
    $notification.removeClass(visibleClassName);
}

// Show success notification with provided text message
function showSuccessNotification(text) {
    // Clear old notification if any exists
    hideNotification();
    // Reset auto-hide timer if any exists
    clearTimeout(timer);

    $alert.addClass('alert-success');
    $alert.text(text);
    $notification.addClass(visibleClassName);

    // Set auto-hide timer on notification
    timer = setTimeout(hideNotification, autoHideTimeout);
}

// Show error notification with provided text message
function showErrorNotification(text) {
    // Clear old notification if any exists
    hideNotification();
    // Reset auto-hide timer if any exists
    clearTimeout(timer);

    $alert.addClass('alert-danger');
    $alert.text(text);
    $notification.addClass(visibleClassName);

    // Set auto-hide timer on notification
    timer = setTimeout(hideNotification, autoHideTimeout);
}

// Check notification type and invoke the right show function
function showNotification(type, text) {
    switch (type) {
        case 'SUCCESS':
            showSuccessNotification(text);
            break;
        case 'ERROR':
            showErrorNotification(text);
            break;
        default:
            return false;
    }
}

export {
    showNotification
};