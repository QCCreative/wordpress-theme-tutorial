module.exports = function(grunt) {
    var dirname = (new Date()).toUTCString();
    //Initialize grunt
    grunt.initConfig({
        //Compile less files
        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    // target.css file: source.less file
                    "style.css": "styles/style.less"
                }
            }
        }
        //Watch styles directory for changes and compile
        //With livereload browser plugin integration.
        watch: {
            less: {
                // Which files to watch (all .less files recursively in the less directory)
                files: ['styles/*.less'],
                tasks: ['less']
            },
            livereload: {
                // Browser live reloading
                // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
                options: {
                    livereload: true
                },
                files: [
                    'styles/*.less',
                    'style.css',
                    'scripts.min.js'
                    ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    	
	grunt.registerTask('default', ['less', 'watch']);
};