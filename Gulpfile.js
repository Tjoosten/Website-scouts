//
// Gulp assets manager.
// =============================================================
var gulp       = require('gulp-help')(require('gulp'));
var jshint     = require('gulp-jshint');
var less       = require('gulp-less');
var args       = require('yargs').argv;
var sourcemaps = require('gulp-sourcemaps');
var minifyCss  = require('gulp-minify-css');
var gulpif     = require('gulp-if');
var concat     = require('gulp-concat');
var lesshint   = require('gulp-lesshint');
var chmod      = require('gulp-chmod');

//
// Gulp Flag variables.
// =======================================================================
var isProduction  = args.env === 'prod';        // Used: compile-less
var isSourcemaps  = args.sourcemaps === 'true'; // Used: compile-less

// Gulp help descriptions.
var help = [
    "Compile all the LESS and JS resources.",
    "The default task.",
    "Compile all the JS resources.",
    "Compile all the LESS resources.",
    "Validate your LESS files.",
    "Validate your JS files.",
    "Copy all the fonts to his destination.",
    "Lint all the LESS and JS resources."
];

//
// Gulp global tasks
// =============================================================
gulp.task('default', help[1], function() {
    // There is no default task.
    // So why we don't call the,
    // Help section of this asset manager.
    gulp.start('help');
});

gulp.task('compile', help[0], function() {
    gulp.start('compile-less', 'compile-js');
});

gulp.task('lint', help[6], function() {
   gulp.start('lint-less', 'lint-js');
});

//
// Gulp specific task.
// =============================================================
gulp.task('compile-js', help[2], function() {
    gulp.src('resources/js/bootstrap/*.js')
        .pipe(concat('bootstrap.js'))
        .pipe(gulpif(isSourcemaps, sourcemaps.init()))
        .pipe(gulpif(isSourcemaps, sourcemaps.write('./maps')))
        .pipe(gulp.dest('assets/js'));
}, {
    options: {
        'sourcemaps=true' : 'Compile-js -> Enable sourcemaps',
    }
});

// Flags:
// -----------------------------------------
// --env:        The environment variable.
// --sourcemaps: Enable sourcemaps or not.
gulp.task('compile-less', help[3], function() {
    gulp.src('resources/less/bootstrap/bootstrap.less')
        .pipe(chmod({
            owner:  { read: true,  write: true,   execute: false },
            group:  { read: true,  write: false,  execute: false },
            others: { read: false, write: false,  execute: false }
        }))
        .pipe(gulpif(isSourcemaps, sourcemaps.init()))
        .pipe(less())
        .pipe(gulpif(isProduction, minifyCss()))
        .pipe(gulpif(isSourcemaps, sourcemaps.write('./maps')))
        .pipe(gulp.dest('assets/css'));

    gulp.src('resources/less/costum/costum.less')
        .pipe(chmod({
            owner:  { read: true,  write: true,   execute: false },
            group:  { read: true,  write: false,  execute: false },
            others: { read: false, write: false,  execute: false }
        }))
        .pipe(gulpif(isSourcemaps, sourcemaps.init()))
        .pipe(less())
        .pipe(gulpif(isProduction, minifyCss()))
        .pipe(gulpif(isSourcemaps, sourcemaps.write('./maps')))
        .pipe(gulp.dest('assets/css'));

}, {
    options: {
        'env=prod'        : 'Compile-less -> Minify the css files.',
        'sourcemaps=true' : 'Compile-less -> Enable sourcemaps',
    }
});

gulp.task('lint-less', help[3], function() {
    // Bootstrap LESS
    gulp.src('resources/less/bootstrap/*.less')
        .pipe(lesshint({
            // Options
        }));

    // Costum LESS
    gulp.src('resources/less/costum/*;less')
        .pipe(lesshint({
            // Options
        }));
});

gulp.task('lint-js', help[4], function() {
    gulp.src('resources/js/bootstrap/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('copy-fonts', help[7], function() {
    gulp.src('resources/fonts/bootstrap/*')
        .pipe(gulp.dest('assets/fonts'));
});

gulp.task('copy-img', help[7], function() {
    gulp.src('resources/img/*')
        .pipe(gulp.dest('assets/img'));
});