function makeResultCardHTML(result) {
    const targetURL = `/locations/${result.id}`;
    console.log(result)
    return `
<div class="card">
    <div class="card-body">
        <a href="${targetURL}" class="card-title">${result.title}</a>
        <p class="card-text">${result.description}</p>

    </div>
    <div class="card-footer text-center">
        <a class="btn btn-outline-primary" href="${targetURL}">Make Appointment</a>
    </div>
</div>`;
}

function successCallback(data) {
    let html;
    if (data.length === 0) {
        html = '<p> Nothing found </p>';
    } else {
        html = data.map(makeResultCardHTML).join('\n');
    }
    $('#ajax-search-results').html(html);
}

function errorCallback() {
    console.error('Something went wrong during the AJAX call.');
}

function ajaxSearch() {
    const count = 15;
    const inputCat = $('#ajaxInputCategories').val();
    const inputName = $('#ajaxInputName').val();

    $.ajax({
        dataType: 'json',
        url: `/api/locations/search?title=${inputName}&category=${inputCat}&count=${count}`,
        success: successCallback,
        error: errorCallback,
    });
}

// Ajax handlers
$(window).on('load', ajaxSearch);
$('#ajaxInputName').keyup(ajaxSearch);
$('#ajaxInputCategories').change(ajaxSearch);
