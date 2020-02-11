jQuery(document).ready(function ($) {
    var ctx = $('.mod-navigation');
    var burger = $('.burger-button', ctx);
    var searchButton = $('.search-icon', ctx);
    var searchFormClose = $('.search-form-close', ctx);

    $(burger).on('click', function (e) {
        $('body').toggleClass('menu-active');
    });

    $(searchButton).on('click', function (e) {
        $('body').toggleClass('search-active');
        $('#s').focus();
    });

    $(document).on('click', '.search-form-close', function (e) {
        e.preventDefault()
        $('body').removeClass('search-active');
    });

    $(document).keyup(function (e) {
        if (e.key === "Escape") {
            $('body').removeClass('search-active');
            $('body').removeClass('menu-active');
        }
    });
});

