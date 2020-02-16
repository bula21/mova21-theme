jQuery(document).ready(function ($) {
    var module = '.mod-animation';
    var path = config.themeUrl + '/animation/';

    $(module).each(function (id, ctx) {
        var animationName = $(ctx).data('animation');
        lottie.loadAnimation({
            container: $(ctx).get(0),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: path + animationName + '/data.json'
        });
    });
});