/* *
 *  cockpit-test
 *  main.js.js
 *  Created on 7-1-2015 21:30
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

define(["jquery", "uikit", "bixie"], function($, UI) {
    //the jquery.alpha.js and jquery.beta.js plugins have been loaded.
    $(function() {
        $('body').bixie();
        console.log(UI);
    });
});