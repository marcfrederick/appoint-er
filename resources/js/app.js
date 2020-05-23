require('./bootstrap');

let confirmableLinks = document.querySelectorAll('.confirmable');

for (let i = 0; i < confirmableLinks.length; i++) {
    confirmableLinks[i].addEventListener('click', function (event) {
        event.preventDefault();

        let choice = confirm(this.getAttribute('data-confirm'));
        if (choice) {
            window.location.href = this.getAttribute('href');
        }
    });
}

// Enable toasts.
$(document).ready(function () {
    $('.toast').toast('show');
});
