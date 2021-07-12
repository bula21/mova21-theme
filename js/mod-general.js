jQuery(document).ready(function ($) {
    $('body').animate({
        opacity: 1
    }, 500);

    function is_touch_device() {
        try {
            document.createEvent("TouchEvent");
            return true;
        } catch (e) {
            return false;
        }
    }

    if (is_touch_device()) {
        $('body').addClass('touch-device');
    }

    $('.masonry').masonry({
        // options
        itemSelector: '.masonry-item'
    });

    $('.newsGrid').masonry({
        itemSelector: '.news-grid',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });


    $('.content-element--gallery').each(function () {
        var self = $(this);
        $(this).magnificPopup({
            delegate: '.gallery-item',
            type: 'image',
            tLoading: self.data('loading'),
            mainClass: 'mfp-img',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: self.data('error'),
                titleSrc: function (item) {
                    return item.el.attr('title');
                }
            },
        });
    });

    var countdown = $('.home-content-block-countdown').data('time');
    if (countdown) {
        setInterval(function () {
            var now = moment();
            var camp = moment.unix(countdown).subtract(2, 'hours');
            var duration = camp.diff(now);

            var d = Math.floor(moment.duration(duration).asDays());
            $('.home-content-block-countdown .days').text(d);
            duration = moment.duration(duration).subtract(d, 'days');

            var h = Math.floor(moment.duration(duration).asHours());
            $('.home-content-block-countdown .hours').text(h);
            duration = moment.duration(duration).subtract(h, 'hours');

            var i = Math.floor(moment.duration(duration).asMinutes());
            $('.home-content-block-countdown .minutes').text(i);
            duration = moment.duration(duration).subtract(i, 'minutes');

            var s = Math.floor(moment.duration(duration).asSeconds());
            $('.home-content-block-countdown .seconds').text(s);
        }, 1000);
    }
});
