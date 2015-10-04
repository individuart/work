module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            js : {
                src : [
                    'js/**/*.js',
                    '!js/libraries/noconcat/**/*.js'
                ],
                dest : 'js/work.min.js'
            },
            css : {
                src : [
                    'js/libraries/**/*.css',
                    '!js/libraries/noconcat/**/*.css'
                ],
                dest : 'sass/_libraries.scss'
            }            
        },
        uglify : {
            js: {
                files: {
                    'js/work.min.js' : [ 'js/work.js' ]
                }
            }
        }       
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.registerTask('default', [ 'concat:css', 'cssmin:css', 'concat:js', 'uglify:js' ]);    
};