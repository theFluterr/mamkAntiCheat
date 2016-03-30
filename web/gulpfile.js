var gulp        = require('gulp'),
rename = require('gulp-rename'),
minifycss = require('gulp-minify-css'),
browserSync = require('browser-sync').create(),
sass = require('gulp-sass');

gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./dist"
    });

    gulp.watch("dist/src/stylesheets/sass/*.scss", ['sass']);
    gulp.watch("dist/*.html").on('change', browserSync.reload);
});

gulp.task('sass', function() {
    return gulp.src("dist/src/stylesheets/sass/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("dist/src/stylesheets"))
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss())
        .pipe(gulp.dest("dist/src/stylesheets"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);








