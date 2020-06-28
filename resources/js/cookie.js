$('#cookie-consent-accept').click(function () {
    document.cookie = "cookies=accepted"
    $('#cookie-consent').hide()
})

$(document).ready(function () {
    if (!document.cookie.includes("cookies=accepted")) {
        $('#cookie-consent').show()
    }
});
