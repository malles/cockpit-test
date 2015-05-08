/* *
 *  cockpit-test
 *  common.js
 *  Created on 7-1-2015 21:21
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

(function (addon) {
    "use strict";

    var component;

    if (window.UIkit) {
        component = addon(UIkit.$, UIkit);
    }

    if (typeof define === "function" && define.amd) {
        define("uikit-bixcockpit", ["uikit"], function () {
            return component || addon(UIkit.$, UIkit);
        });
    }

}(function ($, UI) {
    "use strict";

    UI.component('bixcockpit', {

        defaults: {
            page: ''
        },

        boot: function () {
            UI.ready(function (context) {
                $("[data-bix-cockpit]", context).each(function () {
                    var $ele = $(this);
                    if (!$ele.data("bixcockpit")) {
                        UI.bixcockpit($ele, UI.Utils.options($ele.attr('data-bix-cockpit')));
                    }
                });
            });
        },

        init: function () {
            this.find('[href="http://www.bixie.nl"]').bind("contextmenu", function () {
                (function () {
                    var s = document.createElement('style');
                    s.innerHTML = '@-webkit-keyframes roll {from { -webkit-transform: rotate(0deg) } to { -webkit-transform: rotate(360deg) }}' +
                    ' @-moz-keyframes roll { from { -moz-transform: rotate(0deg) } to { -moz-transform: rotate(360deg) }}' +
                    ' @keyframes roll {from { transform: rotate(0deg) } to { transform: rotate(360deg) }}' +
                    ' body { -moz-animation-name: roll; -moz-animation-duration: 4s; -moz-animation-iteration-count: 1; ' +
                    '-webkit-animation-name: roll; -webkit-animation-duration: 4s; -webkit-animation-iteration-count: 1;}';
                    document.getElementsByTagName('head')[0].appendChild(s);
                }());
                return false;
            });
        }
    });

    return UI.bixcockpit;
}));

