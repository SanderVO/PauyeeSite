module.exports = function(grunt) {
	
	// 1. All configuration goes here 
	grunt.initConfig({
		
		// load pkg
		pkg: grunt.file.readJSON('package.json'),
		
		// minify
		uglify: {
			dist: {
				src: 'components/js/main.js',
				dest: 'public/assets/js/main.min.js'
			}
		},

		// minify css
		cssmin: {
			target: {
				files: {
					'public/assets/css/main.min.css': 'public/assets/css/main.css'
				}
			}
		},

		// sass to css
		sass: {                
			dist: {                    
			  options: {                     
			    style: 'expanded',
			    sourcemap: true,
			  },
			  files: {                  
			    'public/assets/css/main.css': 'components/css/main.scss'
			  }
			}
		},
		
		// minify images
		imagemin: {
			pub: {
				files: [{
					expand: true,
					cwd: 'components/img/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'public/assets/images/'
				}],
			},
			blog: {
				files: [{
					expand: true,
					cwd: 'components/img/blog/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'public/assets/images/blog/'
				}]
			}
		},
		
		// watcher
		watch: {
			css: {
				files: ['components/css/*.scss'],
				tasks: ['sass', 'cssmin'],
				options: {
					spawn: false
				}
			},
			js: {
				files: ['components/js/*.js'],
				tasks: ['uglify'],
				options: {
					spawn: false
				}
			},
			img: {
				files: ['components/img/*.jpg', 'components/img/*.png'],
				tasks: ['imagemin:pub'],
				options: {
					spawn: false
				}
			},
			"img-blog": {
				files: ['components/img/blog/*.jpg', 'components/img/blog/*.png'],
				tasks: ['imagemin:blog'],
				options: {
					spawn: false
				}
			}
		}

	});
	
	// 3. Where we tell Grunt we plan to use this plug-in.
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
	grunt.registerTask('default', ['sass', 'uglify', 'cssmin', 'imagemin', 'watch']);
	
};