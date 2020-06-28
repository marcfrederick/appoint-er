require('./bootstrap');
require('./cookie');

$('.confirmable').click(function () {
    const message = $(this).attr('data-confirm')
    confirm(message)
})

$('#ajax-search').keyup(function (event) {
    const query = $('#ajax-search').val()
    $.ajax({
        dataType: "json",
        url: `/locations/ajax-search?query=${query}`,
        success: function (data) {
            let out = ''
            data.forEach(result => {
                out += `
<div class="card">
    <div class="card-body">
        <a href="/locations/${result.id}" class="card-title">${result.title}</a>
        <p class="card-text">${result.description}</p>
    </div>
    <div class="card-footer text-center">
        <a class="btn btn-outline-primary" data-toggle="modal"
           data-target="#bookingNotImplementedModal">Termin Vereinbaren</a>
    </div>
</div>`
            })
            $('#ajax-search-results').html(out)
        }
    })
})

// Enable toasts.
$(document).ready(function () {
    $('.toast').toast('show');
});
