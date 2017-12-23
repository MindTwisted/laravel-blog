import $ from 'jquery';
import 'select2';
import notification from '../../components/notification/notification';

function initMultiSelectTags() {
    let $selectBox = $('.postsPage__tagsMultiSelect');

    if ($selectBox.length > 0) {
        $selectBox.select2();
    }
}

function initDeleteImageButton() {
    let $deleteImageButton = $('.postsPage__deleteImage');

    if ($deleteImageButton.length > 0) {
        $deleteImageButton.on('click', function deleteImageRequest(e) {
            e.preventDefault();
            $deleteImageButton.prop('disabled', true);
            $.ajax(`/home/posts/${$deleteImageButton.data('post-id')}/delete-image`, {
                method: 'DELETE'
            }).done(function (response) {
                $deleteImageButton.remove();
                notification.addNotification(response, 'success', 5000);
            }).fail(function (error) {
                $deleteImageButton.prop('disabled', false);
                notification.addNotification(error.statusText, 'danger', 5000);
            });
        });
    }
}

function init() {
    initMultiSelectTags();
    initDeleteImageButton();
}

export default init;