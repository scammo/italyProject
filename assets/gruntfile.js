module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),			
		watch: {
			files: ['css/*.scss', 'js/*.js'],
			tasks: ['sass', 'uglify']
		},	
		uglify: {
			dist: {
				src: ['js/jquery-1.11.0.min.js', 'js/bxslider.min.js', 'js/bxslider.config.js'],
				dest: 'js/main.min.js'
			}
		},
		sass: {
			dist: {
				options: {
					style: 'compressed'
			},
			files: {
				'css/style.min.css' : 'css/base.scss',
				}
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.registerTask('default', ['watch',  'uglify', 'sass']);
};