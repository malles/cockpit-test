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
            var $this = this;
            console.log('ja' + this.options.page);
        }
    });

    return UI.bixcockpit;
}));

