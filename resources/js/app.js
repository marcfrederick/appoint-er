require('./bootstrap');
require('./cookie');

$('.confirmable').click(function () {
    const message = $(this).attr('data-confirm')
    confirm(message)
})

// Enable toasts.
$(document).ready(function () {
    $('.toast').toast('show');
});
