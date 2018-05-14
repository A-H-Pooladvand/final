try {
    window.$ = global.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {
}

// Bootstrap-Select
import bootstrap_select from 'bootstrap-select';

// Importing persian language.
require('bootstrap-select/js/i18n/defaults-fa_IR');

// Initializing bootstrap-select
$('.bootstrap-select').selectpicker({
    style: 'btn-default',
    width: '100%'
});

// Animate.css
$.fn.extend({
    animateCss: function(animationName, callback) {
        let animationEnd = (function(el) {
            let animations = {
                animation: 'animationend',
                OAnimation: 'oAnimationEnd',
                MozAnimation: 'mozAnimationEnd',
                WebkitAnimation: 'webkitAnimationEnd',
            };

            for (let t in animations) {
                if (el.style[t] !== undefined) {
                    return animations[t];
                }
            }
        })(document.createElement('div'));

        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);

            if (typeof callback === 'function') callback();
        });

        return this;
    },
});