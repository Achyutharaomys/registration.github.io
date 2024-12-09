$(document).ready(function () {
    $('#applicationForm').on('submit', function (event) {
        // Example of simple validation or interaction
        const fullName = $('#fullName').val();
        const email = $('#email').val();

        if (fullName === '' || email === '') {
            alert('Please fill out all required fields.');
            event.preventDefault();
        } else {
            alert('Form submitted successfully!');
        }
    });
});
