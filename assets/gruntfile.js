module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),			
		watch: {
			files: ['css/*.scss', 'js/*.js'],
			tasks: ['sass', 'uglify', 'autoprefixer']
		},	
		uglify: {
			dist: {
				//src: ['js/'],
				//dest: 'js/main.min.js'
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
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.registerTask('default', ['watch',  'uglify', 'sass', 'autoprefixer', 'imagemin']);
};