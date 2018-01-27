import {showNotification} from '../../components/notification/notification';

// Define variables form jquery instances of form fields
let $postField, $nameField, $emailField, $messageField;
// Define variable for jquery instance of form submit button
let $submitButton;
// Input invalid class name
let invalidClassName = 'is-invalid';

// Reset form input fields
function resetInputFields() {
    $nameField.val('');
    $emailField.val('');
    $messageField.val('');
}

// Reset form errors state
function resetErrors() {
    $nameField.removeClass(invalidClassName);
    $emailField.removeClass(invalidClassName);
    $messageField.removeClass(invalidClassName);
}

// Get error response and set error state on provided form fields
function handleErrors(errors) {
    if (errors.author_name) {
        $nameField.addClass(invalidClassName);

        errors.author_name.map((error) => {
            $nameField.siblings('.invalid-feedback').text(error);
        })
    }

    if (errors.author_email) {
        $emailField.addClass(invalidClassName);

        errors.author_email.map((error) => {
            $emailField.siblings('.invalid-feedback').text(error);
        })
    }

    if (errors.body) {
        $messageField.addClass(invalidClassName);

        errors.body.map((error) => {
            $messageField.siblings('.invalid-feedback').text(error);
        })
    }
}

// Disable submit button
function disableButton() {
    $submitButton.attr('disabled', true);
    $submitButton.text('Loading ...')
}

// Enable submit button
function enableButton() {
    $submitButton.attr('disabled', false);
    $submitButton.text('SUBMIT');
}

// Init comment form
function initCommentForm() {
    let $form = $('.postPage__commentForm');

    // Handle form submitting if form exists on the page
    if ($form.length > 0) {
        $form.on('submit', function submitCommentForm(e) {
            // Prevent default form submit behavior
            e.preventDefault();

            // Get form action URL
            let URL = $form.attr('action');

            // Get form input fields jquery instances
            $postField = $form.find(".form-control[name='post']");
            $nameField = $form.find(".form-control[name='author_name']");
            $emailField = $form.find(".form-control[name='author_email']");
            $messageField = $form.find(".form-control[name='body']");

            // Get submit button jquery instance
            $submitButton = $form.find("button[type='submit']");

            // Get form input fields data
            let postData = $postField.val();
            let nameData = $nameField.val();
            let emailData = $emailField.val();
            let messageData = $messageField.val();

            // Disable submit button until response from server will be received
            disableButton();

            $.ajax(
                // Request URL
                URL,
                // Request options object
                {
                    // Set request method
                    method: 'POST',
                    // Set data which request will send
                    data: {
                        post: postData,
                        author_name: nameData,
                        author_email: emailData,
                        body: messageData
                    }
                })
                .done(function (data) {
                    // Handle success ajax response

                    // Show success notification
                    showNotification('SUCCESS', data);
                    // Reset form errors state
                    resetErrors();
                    // Enable submit button after server response received
                    enableButton();
                    // Reset input fields
                    resetInputFields();
                })
                .fail(function (error) {
                    // Handle error ajax response
                    let errors = error.responseJSON.errors;
                    let message = error.responseJSON.message;

                    // Reset form errors state
                    resetErrors();
                    // Show error notification
                    showNotification('ERROR', message);
                    // Add form invalid state
                    handleErrors(errors);
                    // Enable submit button after server response received
                    enableButton();
                });
        })
    }
}

// Init related posts carousel
function initRelatedPostsCarousel() {
    // Get DOM elements
    let $container = $('.postPage__relatedPostsCarousel');

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
            autoplay: false,
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
                900: {
                    items: 2
                }
            }
        });
    }
}

export default {
    initCommentForm,
    initRelatedPostsCarousel
};