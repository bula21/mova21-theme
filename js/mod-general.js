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
            },
        });
    });
});
