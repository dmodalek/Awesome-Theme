'use strict';

module.exports = function (grunt) {

	// Dynamically load npm tasks

	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		// Banner

		banner: '\n/*\n * Generated with Grunt on <%= grunt.template.today("dd.mm.yyyy") %> at <%= grunt.template.today("H:MM:ss") %>\n */\n',


		///////////////////////////////////////////////////////////

		// Directories

		project: {

			// built

			built: 'built',

			// Scripts

			scripts: [
				'bower_components/jquery/dist/jquery.js',
				'bower_components/modernizr/modernizr.js',
				'bower_components/terrificjs/dist/terrific.js',
				'bower_components/terrific-extensions/terrific-extensions.js',

				'js/*.js',
				'modules/*/*.js',
				'modules/*/skins/*.js',
			],

			scriptsLint: [
				'modules/*/*.js',
				'modules/*/skins/*.js'
			],

			// Styles

			styles: [
				'bower_components/normalize.css/normalize.css',
				'css/*.less',
				'modules/*/*.less',
				'modules/*/skins/*.less'
			],

			// Markup

			markup: [
				'*.php',
				'*.phtml',
				'modules/*/*.phtml'
			]
		},


		///////////////////////////////////////////////////////////

		// Styles

		less_imports: {
			all: {
				src : '<%= project.styles %>',
				dest : '<%= project.built %>/less-imports.less'
			}
		},

		less: {
			options: {
				sourceMap: true,
				sourceMapFilename: '<%= project.built %>/styles.css.map',
				sourceMapRootpath: '../',
				sourceMapBasepath: ''
			}

			,all: {
				src : '<%= project.built %>/less-imports.less',
				dest : '<%= project.built %>/styles.css'
			}
		},

		/**
		 * https://github.com/nDmitry/grunt-autoprefixer
		 */
		autoprefixer: {
			options: {
				cascade: true,
				map: true
			},
			all: {
				src: '<%= project.built %>/styles.css',
				dest: '<%= project.built %>/styles.css'
			}
		},

		/**
		 * CSSMin
		 * CSS minification
		 * https://github.com/gruntjs/grunt-contrib-cssmin
		 */
		cssmin: {
			min: {
				options: {
					banner: '<%= banner %>'
				},
				files: {
					'<%= project.built %>/styles.css': '<%= project.built %>/styles.css'
				}
			}
		},


		///////////////////////////////////////////////////////////

		// Scripts

		jshint: {
			files: '<%=project.scriptsLint%>'
		},

		uglify: {

			dev: {

				options: {
					banner: '<%= banner %>',
					preserveComments: 'all',
					mangle: false,
					beautify: true,
					sourceMap: true,
				    sourceMapName: '<%=project.built%>/scripts.js.map'
				},

				files: {
					'<%=project.built%>/scripts.js': ['<%=project.scripts%>']
				}
			},

			min: {
				options: {
					banner: '<%= banner %>',
					sourceMap: '<%=project.built%>/scripts.js.map',
					sourceMapRoot: '../',
					sourceMappingURL: 'scripts.min.js.map'
				},

				files: {
					'<%=project.built%>/scripts.js': ['<%=project.scripts%>']
				}
			}
		},

		///////////////////////////////////////////////////////////

		clean: ['<%=project.built%>/less-imports.less'],

		///////////////////////////////////////////////////////////

		// Watch

		watch: {
			scripts: {
				files: ['Gruntfile.js', '<%= project.scripts %>'],
				tasks: ['scripts-dev']
			},
			styles: {
				files: '<%= project.styles %>',
				tasks: ['styles-dev']
			},
			livereload: {
				options: {
					livereload: 35729
				},
				files: [
					'Gruntfile.js',
					'<%= project.built %>/styles.css',
					'<%= project.built %>/scripts.js',
					'<%= project.markup %>',
				]
			}
		}
	});


	///////////////////////////////////////////////////////////

	// This task is run by Yeoman automatically

	grunt.registerTask('setup', function() {
		var done = this.async();
		var bower = require('bower').commands;
		bower.install().on('end', function(data) {
			console.log('Setup complete. Run $ grunt to build your assets.').
			done();
		}).on('data', function(data) {
			console.log(data);
		}).on('error', function(err) {
			console.error(err);
			done();
		});
	});

	// Default - Dev Task

	grunt.registerTask('default', [
		'styles-dev',
		'scripts-dev',
		'watch'
	]);


	// Min - Build Task

	grunt.registerTask('min', [
		'styles-min',
		'scripts-min'
	]);


	///////////////////////////////////////////////////////////

	// Sub Tasks

	grunt.registerTask('styles-dev', [
		'less_imports',
		'less',
		'autoprefixer',
		'clean'
	]);

	grunt.registerTask('styles-min', [
		'less_imports',
		'less',
		'autoprefixer',
		'clean',
		'cssmin'
	]);

	grunt.registerTask('scripts-dev', [
		'jshint',
		'uglify:dev'
	]);

	grunt.registerTask('scripts-min', [
		'jshint',
		'uglify:dev',
		'uglify:min'
	]);
};
