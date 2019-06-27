
module.exports = function(grunt) {
	
	grunt.initConfig({
		
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				options: {
					style: 'expanded',
					require: 'compass',
					includePaths: require('node-bourbon').includePaths
				},
				files: {
					'css/style.css': 'sass/style.sass',
					
				}
			}
		},

		cssmin: {
			css:{
				src: 'css/style.css',
				dest: 'css/style.min.css'
			}
		},

		jshint: {
			beforeconcat: ['js/*.js']
		},

		concat: {
			dist: {
				src: [
					'js/jquery-1.10.2.min.js',
					'js/includes/*',
					'js/app/angular.js',
					'js/app/angular-base64.min.js',
					'js/app/angular-cookies.js',
					'js/app/angular-http-batcher/dist/angular-http-batch.min.js',
					'js/app/angular-route.js',
					'js/app/angular-resource.min.js',
					'js/app/app.js',
					'js/app/widgets/services.js',
					'js/app/widgets/controllers.js'
				],
				dest: 'js/production.js'
			}
		},

		uglify: {
			my_target: {
				options: {
					sourceMap: true,
					sourceMapName: 'js/sourcemap.map'
				},
				files: {
					'js/production.min.js': ['js/production.js']
				}
			}
		},

		copy: {
			main: {
				files :[{
					expand: true,
					cwd: 'node_modules/font-awesome/fonts/',
					src: '*',
					dest: 'fonts/'
				}]
			}
		},

		autoprefixer: {
			options: {
				browsers: ['last 6 versions']
			},
			dist: {
				files: {
					'css/style.css': 'css/style.css'
				}
			}
		},

		watch: {
			options: {
				livereload: true,
			},
			scripts: {
				files: ['js/includes/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				}
			},
			css: {
				files: ['sass/*.sass'],
				tasks: ['sass', 'autoprefixer', 'cssmin'],
				options: {
					spawn: false,
				}
			},
			php: {
				files: ['*.php', 'modules/*.php', 'rate_group/*.php'],
				options: {
					spawn: false
				}
			},
		},

		connect: {
			server: {
				options: {
					port: 8000,
					base: './'
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['copy', 'watch']);
};