module.exports = function( grunt ) {
	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		sass: {
			core: {
				files: {
					'content/themes/wpgists/assets/stylesheets/core.css': 'content/themes/wpgists/assets/stylesheets/sass/core.scss'
				}
			}
		},

		watch: {
			sass: {
				files: ['content/themes/wpgists/assets/stylesheets/sass/*.scss'],
				tasks: ['sass'],
			},
			livereload: {
				options: { livereload: true },
				files: [
					'content/themes/wpgists/assets/stylesheets/*'
				],
			}
		}
	});

	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-sass' );

	grunt.registerTask( 'build', ['sass'] );
	grunt.registerTask( 'default', ['build'] );
};