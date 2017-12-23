import $ from 'jquery';

function renderNotification(message, type) {
    let content =
        `<div class="notification">
           <div class="alert alert-${type}">
                 ${message}
           </div>
        </div>`;

    $('body').append(content);
}

function removeNotification() {
    let $container = $('.notification');

    $container.fadeOut(500);
}

function autoRemoveNotification(time = 1000) {
    let $container = $('.notification');

    if ($container.length > 0) {
        setTimeout(removeNotification, time);
    }
}

function addNotification(message, type, time = 1000) {
    renderNotification(message, type);

    autoRemoveNotification(time);
}

export default {
    autoRemoveNotification,
    addNotification
}