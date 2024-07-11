import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready(function() {
    $('.bouncer').on('click', function() {
        var targetSelector = $(this).data('target');
        var element = $(targetSelector);
        element.removeClass('bounce');
        element.width();
        element.addClass('bounce');
    });
});
