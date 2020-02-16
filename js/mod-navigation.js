jQuery(document).ready(function ($) {
    var ctx = $('.mod-navigation');
    var burger = $('.burger-button', ctx);
    var searchButton = $('.search-icon', ctx);

    $(burger).on('click', function (e) {
        $('body').toggleClass('menu-active');
    });

    $(searchButton).on('click', function (e) {
        $('body').toggleClass('search-active');
        $('#s').focus();
    });

    $(document).on('click', '.search-form-close', function (e) {
        e.preventDefault();
        $('body').removeClass('search-active');
    });

    $(document).keyup(function (e) {
        if (e.key === "Escape") {
            $('body').removeClass('search-active');
            $('body').removeClass('menu-active');
        }
    });

    var lastScrollTop = 0;
    document.addEventListener('scroll', function (event) {
        var st = window.pageYOffset || document.documentElement.scrollTop;
        if (st > lastScrollTop && st > 100) {
            $('body').removeClass('navigation-visible');
        } else {
            $('body').addClass('navigation-visible');
        }
        lastScrollTop = st <= 0 ? 0 : st;
    }, true);

    $(document).on('click', '.touch-device .menu > .menu-item-has-children', function (e) {
        if ($(this).hasClass('tapped')) {
            $('.tapped').removeClass('tapped');
        } else {
            $('.tapped').removeClass('tapped');
            e.preventDefault();
            $(this).addClass('tapped');
        }
    })
});

