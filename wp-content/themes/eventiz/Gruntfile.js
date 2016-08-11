//install npm 'npm install -g grunt-cli'
module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

        dirs: {
            css: 'css',
            sass: 'sass',
            fonts: 'fonts',
            images: 'images',
            js: 'js'
        },
		compass: {
			dist: {
				options: {
                    config: 'config.rb'
				}
			}
		},
        sass: {
            compile: {
                options: {
                    style: 'expanded',
                    debugInfo: true,
                    lineNumbers: true,
                    lineComments: true,
                    noCache: true,
                    sourcemap: 'auto'
                },
                files: [{
                    expand: true,
                    cwd: '<%= dirs.sass %>/',
                    src: ['*.scss'],
                    dest: '<%= dirs.css %>/',
                    ext: '.css' 
                }]
            }
        },
		watch: {
			css: {
				files: '**/*.scss', 
				tasks: ['compass']
                //tasks: ['sass']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default',['watch']);
}