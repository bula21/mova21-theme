jQuery(document).ready(function ($) {
    var module = '.mod-animation';
    var path = config.themeUrl + '/animation/';

    // Safari 3.0+ "[object HTMLElementConstructor]"
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && window['safari'].pushNotification));

    $(module).each(function (id, ctx) {
        var animationName = $(ctx).data('animation');
        var hover = $(ctx).data('hover') ? true : false; // we need real bools
        var autoplay = $(ctx).data('autoplay') ? true : false;
        var loop = $(ctx).data('loop') ? true : false;

        if(isSafari) {
            $(ctx).append('<img src="'+path + animationName +'/images/fallback.png">');
        } else {
            var animation = lottie.loadAnimation({
                container: $(ctx).get(0),
                renderer: 'svg',
                loop: loop,
                autoplay: autoplay,
                path: path + animationName + '/data.json'
            });
        }

        if (hover) {
            $(ctx).hover(function () {
                animation.play();
            }, function () {
                animation.pause();
            })
        }
        console.log('test123');
        $('svg').each(function(id, item) {
            //$(item).attr('xlink:href', $(item).attr('href'));
            console.log('test');
        });
    });
});