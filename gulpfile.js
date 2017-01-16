var gulp = require('gulp'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify');

var jsFiles = '_scripts/**/*.js',
    jsDest = 'js';

gulp.task('scripts', function () {
  return gulp.src(jsFiles)
    .pipe(concat('main.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(jsDest));
});

gulp.task('watch-js', function () {
  return watch('_scripts/**/*.js', { ignoreInitial: false }, function () {
    gulp.start('scripts');
  });
});
