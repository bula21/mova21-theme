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
});