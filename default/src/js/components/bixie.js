/* *
 *  cockpit-test
 *  jquery.bixie.js
 *  Created on 7-1-2015 21:32
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

define(["jquery", "uikit"], function($, UI) {
    $.fn.bixie = function() {

        return this.append('<p>Bazinga!!</p>');
    };
});