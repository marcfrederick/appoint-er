function makeResultCardHTML(result) {
    return `
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
}

function successCallback(data) {
    let html;
    if (data.length === 0) {
        html = '<p> Nothing found </p>';
    } else {
        html = data.map(makeResultCardHTML).join("\n")
    }
    $('#ajax-search-results').html(html)
}

function errorCallback() {
    console.error("Something went wrong during the AJAX call.")
}

export function ajaxSearch() {
    const inputCat = $("#ajaxInputCategories").val();
    const inputName = $("#ajaxInputName").val();

    $.ajax({
        dataType: "json",
        url: `/api/locations/ajax-search?query=${inputName}&category=${inputCat}`,
        success: successCallback,
        error: errorCallback,
    })
}
