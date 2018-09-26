var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');

// task para o sass
gulp.task('sass', function() {
    return gulp.src('assets/**/*.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('dist'));
});

// task para watch
gulp.task('watch', function(){
	gulp.watch('assets/**/*.scss', ['sass']);
});

// task default gulp
gulp.task('default', ['sass', 'watch']);