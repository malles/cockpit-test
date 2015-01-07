/**
 * @see http://requirejs.org/docs/optimization.html
 */
var path = require('path');

module.exports = {
    //abs path to the javascript dir
    appDir: path.join(__dirname, '..', 'default', 'src', 'js'),
    baseUrl: './',
    mainConfigFile: path.join(__dirname, '..', 'default', 'src', 'js', 'app.js'),

    //set to "none" for raw outpout
    optimize: "uglify2",

    //output directory
    dir: path.join(__dirname, '..', 'default', 'assets', 'js'),
    modules: [{
        name: "app",
        include: [
            'requirejs',
            'jquery',
            'uikit'
        ]
    }]
};