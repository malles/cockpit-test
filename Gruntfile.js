var path = require('path');

module.exports = function (grunt) {

    // Configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Metadata
        meta: {
            web: 'default',
            js: 'default/src/js',
            template: 'default/template',
            assets: 'default/assets',
            langs: ['nl-NL']
        },
        requirejs: {
            compile: {
                options: require(path.join(__dirname, 'tools', 'build.js'))
            }
        },
        less: {
            theme: {
                options: {
                    compress: true
                },
                files: {
                    "<%= meta.assets %>/css/theme.css": "<%= meta.template %>/less/base.less"
                }
            }
        },
        watch: {
            less: {
                files: [
                    '<%= meta.template %>/less/**/*.less'
                ],
                tasks: ['less'],
                options: {
                    nospawn: true
                }
            },
            js: {
                files: [
                    '<%= meta.js %>/**/*.js'
                ],
                tasks: ['requirejs'],
                options: {
                    nospawn: true
                }
            }
        },
        bower: {
            target: {
                rjsConfig: path.join(__dirname, 'default', 'src', 'js', 'app.js')
            }
        }
    });

    // Load plugins here
    require('load-grunt-tasks')(grunt);

    // Define your tasks here
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['less', 'requirejs']);


};