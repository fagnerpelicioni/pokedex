var gulp = require('gulp');
var styles = require('gulp-sass');
var images = require('gulp-imagemin');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var flatten = require('gulp-flatten');
var sourcemaps = require('gulp-sourcemaps');
var watch = require('gulp-watch');

// task para o sass
gulp.task('styles', function() {
    return gulp.src([
                    'src/**/*.scss',
                    /*'bower_components/font-awesome/web-fonts-with-css/scss/*.scss'*/
                    ])
        .pipe(sourcemaps.init({largeFile: true}))
        .pipe(styles({outputStyle: 'compressed'}).on('error', styles.logError))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist'));
});

//task para minificar imagem
gulp.task('images', function() {
    return gulp.src('src/images/*')
        .pipe(images())
        .pipe(gulp.dest('dist/images'))
});

//task para scripts
gulp.task('scripts', function() {
    return gulp.src([
                    'node_modules/jquery/dist/jquery.js',
                    'node_modules/popper.js/dist/umd/popper.min.js',
                    'node_modules/bootstrap/dist/js/bootstrap.bundle.js',
                    'src/**/*.js',
                    ])
        .pipe(sourcemaps.init({largeFile: true}))
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist/scripts'))
});

//task para fonts
gulp.task('fonts', function() {
    return gulp.src([
                    'src/webfonts/*.{ttf,woff,eof,svg}',
                    'node_modules/@fortawesome/fontawesome-free/**/*.{ttf,woff,eof,svg}'
                    ])
        .pipe(flatten())
        .pipe(gulp.dest('dist/webfonts'))
});

//task para dar watch
gulp.task('watch', function() {
    gulp.run('default');

    gulp.watch('src/styles/**/*.scss', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        gulp.run('styles');
    });

    gulp.watch('src/scripts/**/*.js', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        gulp.run('scripts');
    });

    gulp.watch('src/images/**/*', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        gulp.run('images');
    });

    gulp.watch('src/fonts/**/*', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
        gulp.run('fonts');
    });
});

// task default gulp
gulp.task('default', ['styles', 'images', 'scripts', 'fonts']);