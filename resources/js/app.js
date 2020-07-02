require('./bootstrap');
require('./cookie');

$('.confirmable').click(function () {
    const message = $(this).attr('data-confirm')
    confirm(message)
})


function ajaxSearch(event) {

    const inputCat = $('#ajaxCategories').val();
    const inputName = $('#ajaxInput').val();
    $.ajax({
        dataType: "json",
        url: `/api/locations/ajax-search?query=${inputName}&category=${inputCat}`,
        success: function (data) {
            console.log(data)
            if (data.length === 0) {

                $('#ajax-search-results').html('<p> Nothing found </p>')
                return;
            }
            let out = ''
            data.forEach(result => {
                out += `
<div class="card">
    <div class="card-body">
        <a href="/locations/${result.location_id}" class="card-title">${result.title}</a>
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
}

$(window).on('load',ajaxSearch)

$('#ajaxInput').keyup(ajaxSearch)


$('#ajaxCategories').change(ajaxSearch)

// Enable toasts.
$(document).ready(function () {
    $('.toast').toast('show');
});
