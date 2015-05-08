/* *
 *  Bixie
 *  bixtools.js
 *  Created on 8-5-2015 13:19
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

(function ($, UI) {
    "use strict";

    var BixTools;

    /**
     * BixTools!
     * @constructor
     */
    BixTools = function () {

        this.options = $.extend({}, BixTools.defaults);

    };

    $.extend(BixTools.prototype, {
    });

    BixTools.defaults = {
        language: 'nl-NL',
        chosenOptions: {
            disable_search_threshold: 10,
            allow_single_deselect: true,
            placeholder_text_multiple: 'Selecteer enkele opties',
            placeholder_text_single: 'Selecteer een optie',
            no_results_text: 'Geen overeenkomende resultaten'
        }
    };

    UI.BixTools = BixTools;

    UI.bixTools = new BixTools();

}(UIkit.$, UIkit));

