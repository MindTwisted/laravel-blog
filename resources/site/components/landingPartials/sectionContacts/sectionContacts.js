import {showNotification} from '../../notification/notification';

// Define variables form jquery instances of form fields
let $nameField, $emailField, $subjectField, $messageField;
// Define variable for jquery instance of form submit button
let $submitButton;
// Input invalid class name
let invalidClassName = 'is-invalid';

// Reset form input fields
function resetInputFields() {
    $nameField.val('');
    $emailField.val('');
    $subjectField.val('');
    $messageField.val('');
}

// Reset form errors state
function resetErrors() {
    $nameField.removeClass(invalidClassName);
    $emailField.removeClass(invalidClassName);
    $subjectField.removeClass(invalidClassName);
    $messageField.removeClass(invalidClassName);
}

// Get error response and set error state on provided form fields
function handleErrors(errors) {
    if (errors.name) {
        $nameField.addClass(invalidClassName);

        errors.name.map((error) => {
            $nameField.siblings('.invalid-feedback').text(error);
        })
    }

    if (errors.email) {
        $emailField.addClass(invalidClassName);

        errors.email.map((error) => {
            $emailField.siblings('.invalid-feedback').text(error);
        })
    }

    if (errors.subject) {
        $subjectField.addClass(invalidClassName);

        errors.subject.map((error) => {
            $subjectField.siblings('.invalid-feedback').text(error);
        })
    }

    if (errors.message) {
        $messageField.addClass(invalidClassName);

        errors.message.map((error) => {
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

// Main
function init() {
    let $form = $('.sectionContacts__form');

    // Handle form submitting if form exists on the page
    if ($form.length > 0) {
        $form.on('submit', function submitContactForm(e) {
            // Prevent default form submit behavior
            e.preventDefault();

            // Get form action URL
            let URL = $form.attr('action');

            // Get form input fields jquery instances
            $nameField = $form.find(".form-control[name='name']");
            $emailField = $form.find(".form-control[name='email']");
            $subjectField = $form.find(".form-control[name='subject']");
            $messageField = $form.find(".form-control[name='message']");

            // Get submit button jquery instance
            $submitButton = $form.find("button[type='submit']");

            // Get form input fields data
            let nameData = $nameField.val();
            let emailData = $emailField.val();
            let subjectData = $subjectField.val();
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
                        name: nameData,
                        email: emailData,
                        subject: subjectData,
                        message: messageData
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

export default init;