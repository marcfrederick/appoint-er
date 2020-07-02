import {ajaxSearch} from "./search";

require('./bootstrap');
require('./cookie');

// Confirmation handlers
$('.confirmable').click(function () {
    const message = $(this).attr('data-confirm');
    confirm(message);
})

// Toast handlers
$(document).ready(() => $('.toast').toast('show'));

// Ajax handlers
$(window).on("load", ajaxSearch)
$('#ajaxInputName').keyup(ajaxSearch)
$('#ajaxInputCategories').change(ajaxSearch)
