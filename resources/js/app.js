require('./bootstrap');
require('./cookie');

// Confirmation handlers
$('.confirmable').click(function() {
    const message = $(this).attr('data-confirm');
    return confirm(message);
});

// Toast handlers
$(document).ready(() => $('.toast').toast('show'));
