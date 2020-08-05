const {series, src, dest, parallel} = require('gulp');
const browserSync = require('browser-sync').create();
const {watch} = require('gulp');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const cleanCSS = require('gulp-clean-css');
const babel = require('gulp-babel');
const plumber = require('gulp-plumber');

function transpileJs(cb) {
    src('./assets/src/js/main.js')
    // Stop the process if an error is thrown.
        .pipe(plumber())
        // Transpile the JS code using Babel's preset-env.
        .pipe(babel({
            presets: [
                ['@babel/env', {
                    modules: false
                }]
            ]
        }))
        // Save each component as a separate file in dist.
        .pipe(dest('./assets/js'));

    cb();
}

function liveServer(cb) {
    browserSync.init({
        proxy: 'manifest.local/'
    });
    watch(['./assets/src/sass/**/*.scss']).on('change', series(sassCompile, cssConcat));
    watch(['./**/*.php']).on('change', function (path, stats) {
        browserSync.reload();
    });
    watch(['./assets/src/js/main.js']).on('change', function (path, stats) {
        transpileJs();
    });
    cb();
}

function sassCompile(cb) {
    src('./assets/src/sass/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('./assets/src/css'))
        .pipe(browserSync.stream());
    cb();
}

function bundleJs(cb) {
    src(['./node_modules/flickity/dist/flickity.pkgd.js'])
        .pipe(concat('vendor.min.js'))
        .pipe(dest('./assets/js'))
        .pipe(browserSync.stream());
    cb();
}

function cssConcat(cb) {
    src(['./node_modules/flickity/dist/flickity.css', './assets/src/css/main.css'])
        .pipe(concat('main.min.css'))
        .pipe(dest('./assets/css'))
        .pipe(browserSync.stream());
    cb();
}

function minifyJs(cb) {
    src(['./assets/js/main.min.js'])
        .pipe(uglify())
        .pipe(dest('./assets/js'));
    cb();
}

function minifyCss(cb) {
    src(['./assets/css/main.min.css'])
        .pipe(cleanCSS())
        .pipe(dest('./assets/css'));

    src(['./assets/css/main-mobile.css'])
        .pipe(cleanCSS())
        .pipe(dest('./assets/css'));
    cb();
}

exports.default = parallel(series(sassCompile, cssConcat, liveServer), bundleJs, transpileJs);
exports.production = parallel(minifyJs, minifyCss);
exports.sass = sassCompile;
