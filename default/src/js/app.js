/* *
 *  cockpit-test
 *  common.js
 *  Created on 7-1-2015 21:21
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

requirejs.config({
    baseUrl: "src/js",
    paths: {
        app: "app",
        requirejs: "../../vendor/requirejs/require",
        jquery: "../../vendor/jquery/dist/jquery",
        uikit: "../../vendor/uikit/js/uikit",
        bixie: "components/bixie"
    },
    shim: {
        uikit: {
            deps: [
                "jquery"
            ]
        },
        bixie: {
            deps: [
                "uikit"
            ]
        }
    },
    config: {
        uikit: {
            base: "../../vendor/uikit/js"
        }
    },
    packages: [

    ]
});

// Load the main app module to start the app
requirejs(["app/main"]);

