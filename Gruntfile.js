var path = require('path');

module.exports = function (grunt) {

    // Configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Metadata
        meta: {
            web: 'default',
            js: 'default/src/js',
            less: 'default/src/less',
            vendor: 'default/vendor',
            template: 'default/template',
            assets: 'default/assets'
        },
        concat: {
            options: {
                separator: ';'
            },
            basejs: {
                files: {
                    '<%= meta.assets %>/js/app.js': [
                        '<%= meta.vendor %>/uikit/js/uikit.js',
                        '<%= meta.vendor %>/uikit/js/components/notify.js',
                        '<%= meta.vendor %>/uikit/js/components/sticky.js',
                        '<%= meta.vendor %>/uikit/js/components/slider.js',
                        '<%= meta.vendor %>/uikit/js/components/slideset.js',
                        '<%= meta.vendor %>/uikit/js/components/slideshow.js',
                        '<%= meta.js %>/bixtools.js',
                        '<%= meta.js %>/components/*.js'
                    ]
                }
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy H:MM:ss") %> */\n'
            },
            frontjs: {
                files: {
                    '<%= meta.assets %>/js/app.min.js': '<%= meta.assets %>/js/app.js'
                }
            }
        },
        less: {
            theme: {
                options: {
                    compress: false
                },
                files: {
                    "<%= meta.assets %>/css/theme.css": "<%= meta.less %>/base.less"
                }
            },
            themeMin: {
                options: {
                    compress: true
                },
                files: {
                    "<%= meta.assets %>/css/theme.min.css": "<%= meta.less %>/base.less"
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
                tasks: ['concat', 'uglify'],
                options: {
                    nospawn: true
                }
            }
        }
    });

    // Load plugins here
    require('load-grunt-tasks')(grunt);

    // Define your tasks here
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['less', 'concat', 'uglify']);


};