jQuery(document).ready(function ($) {
    var module = '.mod-animation';
    var path = config.themeUrl + '/animation/';

    $(module).each(function (id, ctx) {
        var animationName = $(ctx).data('animation');
        var hover = $(ctx).data('hover') ? true : false; // we need real bools
        var autoplay = $(ctx).data('autoplay') ? true : false;
        var animation = lottie.loadAnimation({
            container: $(ctx).get(0),
            renderer: 'svg',
            loop: true,
            autoplay: autoplay,
            path: path + animationName + '/data.json'
        });
        if (hover) {
            $(ctx).hover(function () {
                animation.play();
            }, function () {
                animation.pause();
            })
        }
    });
});