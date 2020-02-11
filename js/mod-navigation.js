jQuery(document).ready(function ($) {
    var ctx = $('.mod-navigation');
    var burger = $('.burger-button', ctx);
    var menu = $('.navigation-wrapper', ctx);

    $(burger).on('click', function (e) {
        $('body').toggleClass('menu-active');

    });
});

