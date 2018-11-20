'use strict';

// modules
var browserSync = require('browser-sync');
var csso = require('gulp-csso');
var del = require('del');
var fs = require('fs');
var glob = require('glob');
var gap = require('gulp-append-prepend');
var replace = require('replace-in-file');
var gulp = require('gulp');
var argv = require('minimist')(process.argv.slice(2));
var gulpif = require('gulp-if');
var prefix = require('gulp-autoprefixer');
var reload = browserSync.reload;
var rename = require('gulp-rename');
var runSequence = require('run-sequence');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var watch = require('gulp-watch');


var packages = require('./package.json');

// configuration
var config = {
    all : [], // must always be empty

    /* Command Line Arguments */
    dev: argv['dev'],
    build: argv['b'],
    syncOnly: argv['sync-only'],
    proxy: argv['p'],
    install: argv['i'],
    
    /* Source file locations */
    src: {
        styles: {
            style_uni: 'interface/themes/style_*.scss',
            style_color: 'interface/themes/colors/*.scss',
            rtl: 'interface/themes/rtl.scss',
            directional: 'interface/themes/directional.scss',
            all: 'public/themes/**/*style_*.css',
        }
    },
    dist: {
        assets: './public/assets/', // vendor assets dir
        fonts: './public/fonts/',
        storybook: '.docs/.out/'
    },
    dest: {
        themes: 'public/themes'
    }
};

/**
 * Clean up lingering static assets 
 */
gulp.task('clean', function () {
    if (config.dev) {
        let ignore = "!" + config.dist.storybook + '.gitignore';
        del.sync([config.dist.storybook + "*", ignore]);
    }

    return del.sync([config.dest.themes + "/*"]);
});


/**
 * Parses command line arguments
 */
gulp.task('ingest', function() {
    if (config.dev && typeof config.dev !== "boolean") {
        // allows for custom proxy to be passed into script
        config.proxy = config.dev;
        config.dev = true;
    }
});


/**
 * Will start browser sync and/or watch changes to scss
 * - Runs task(styles) first
 * - Includes hack to dump fontawesome to the storybook dist
 */
gulp.task('sync', ['ingest', 'styles'], function() {
    if (config.proxy) {
        browserSync.init({
            proxy: "127.0.0.1:" + config.proxy
        });
    }

    if (config.dev) {
        // if building storybook, grab the public folder
        gulp.src(['./public/**/*'], {"base" : "."})
            .pipe(gulp.dest(config.dist.storybook));
    }
    // copy all leftover root-level components to the theme directory
    // hoping this is only temporary
    gulp.src(['interface/themes/*.{css,php}'])
        .pipe(gulp.dest(config.dest.themes));
});

// definition of header for all compiled css
var autoGeneratedHeader = `
/*! This style sheet was autogenerated using gulp + scss
 *  For usage instructions, see: https://github.com/openemr/openemr/blob/master/interface/README.md
 */
`;


// START style task definitions

/**
 * universal css compilcation
 */
gulp.task('styles:style_uni', function () {
    return gulp.src(config.src.styles.style_uni)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix('last 1 version'))
        .pipe(gap.prependText(autoGeneratedHeader))
        .pipe(gulpif(!config.dev, csso()))
        .pipe(gulpif(!config.dev,sourcemaps.write()))
        .pipe(gulp.dest(config.dest.themes))
        .pipe(gulpif(config.dev && config.build, gulp.dest(config.dist.storybook + config.dest.themes)))
        .pipe(gulpif(config.dev, reload({stream:true})));
});

gulp.task('rtl:style_uni', function() {
    return gulp.src(config.src.styles.style_uni)
        .pipe(gap.prependText('@import "./rtl.scss";\n')) // watch out for this relative path!
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix('last 1 version'))
        .pipe(gap.prependText(autoGeneratedHeader))
        .pipe(gulpif(!config.dev, csso()))
        .pipe(gulpif(!config.dev,sourcemaps.write()))
        .pipe(rename({ prefix: "rtl_"}))
        .pipe(gulp.dest(config.dest.themes))
        .pipe(gulpif(config.dev && config.build, gulp.dest(config.dist.storybook + config.dest.themes)))
        .pipe(gulpif(config.dev, reload({stream:true})));
})

/**
 * color compilation for colored themes
 */
gulp.task('styles:style_color', function () {
    return gulp.src(config.src.styles.style_color)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix('last 1 version'))
        .pipe(gap.prependText(autoGeneratedHeader))
        .pipe(gulpif(!config.dev, csso()))
        .pipe(gulpif(!config.dev,sourcemaps.write()))
        .pipe(gulp.dest(config.dest.themes))
        .pipe(gulpif(config.dev && config.build, gulp.dest(config.dist.storybook + config.dest.themes)))
        .pipe(gulpif(config.dev, reload({stream:true})));
});

gulp.task('rtl:style_color', function() {
    return gulp.src(config.src.styles.style_color)
        .pipe(gap.prependText('@import "../rtl.scss";\n')) // watch out for this relative path!
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(prefix('last 1 version'))
        .pipe(gap.prependText(autoGeneratedHeader))
        .pipe(gulpif(!config.dev, csso()))
        .pipe(gulpif(!config.dev,sourcemaps.write()))
        .pipe(rename({ prefix: "rtl_"}))
        .pipe(gulp.dest(config.dest.themes))
        .pipe(gulpif(config.dev && config.build, gulp.dest(config.dist.storybook + config.dest.themes)))
        .pipe(gulpif(config.dev, reload({stream:true})));
})

gulp.task('styles', ['styles:style_uni', 'styles:style_color']);

gulp.task('rtl_styles', ['rtl:style_uni', 'rtl:style_color']);

/**
 * append rtl css to all style themes
 * also, create list of all themes for style_list to use
 */
gulp.task('rtl:setup', function(callback) {
    var uni = glob.sync(config.src.styles.style_uni);
    var colors = glob.sync(config.src.styles.style_color);
    config.all = uni.concat(colors);

    // backup and update directional file
    fs.copyFile(config.src.styles.directional, config.src.styles.directional + '.temp', (err) => {
        if (err) throw err;
        replace({
            files: config.src.styles.directional,
            from: /ltr \!default/g,
            to: 'rtl !default',
        }).then(callback());
    });
});

gulp.task('rtl:teardown', function(callback) {
    replace({
        files: config.src.styles.directional,
        from: /rtl \!default/g,
        to: 'ltr !default',
    }).then(function () {
        fs.unlink(config.src.styles.directional + '.temp', (err) => {
            if (err) throw err;
            callback();
        });
    });
})

// END style task definitions

/*
* Create a JSON for storybook to use
*/
gulp.task('style_list', function () {
    if (config.dev) {
        var style_list = [];
        for (var i=0; i<config.all.length; i++) {
            var theme_name = "style_" + config.all[i].split('style_')[1].slice(0,-5);
            style_list.push(theme_name);
            style_list.push('rtl_' + theme_name);
        }
        fs.writeFileSync('.storybook/themeOptions.json', JSON.stringify(style_list), 'utf8');
    }
});


/**
 * Copies node_modules to ./public
 */
gulp.task('install', function() {

    // combine dependencies and napa sources into one object
    var dependencies = packages.dependencies;
    for (var key in packages.napa) {
        if (packages.napa.hasOwnProperty(key)) {
            dependencies[key] = packages.napa[key];
        }
    }

    for (var key in dependencies) {
        // check if the property/key is defined in the object itself, not in parent
        if (dependencies.hasOwnProperty(key)) {
            // only copy dist directory, if it exists
            // skip this if for dwv dependency
            if (key != 'dwv' && fs.existsSync('node_modules/' + key + '/dist')) {
                gulp.src('node_modules/' + key + '/dist/**/*')
                    .pipe(gulp.dest(config.dist.assets + key + '/dist'));
            } else {
                gulp.src('node_modules/' + key + '/**/*')
                    .pipe(gulp.dest(config.dist.assets + key));
            }
        }
    }
});

gulp.task('watch', function() {
    // watch all changes and re-run styles
    gulp.watch('./interface/**/*.scss', {interval: 1000, mode: 'poll'}, ['styles']);

    // watch all changes to css/php files in themes and copy to public  
    return watch('./interface/themes/*.{css,php}', { ignoreInitial: false })
        .pipe(gulp.dest(config.dest.themes)); 
});

gulp.task('sync-only', function () {
    browserSync.init({
        proxy: "127.0.0.1:" + config.proxy,
        open: false
    });
})

 /**
 * Default config
 * - runs by default when `gulp` is called from CLI
 */
if (config.install) {
    gulp.task('default', [ 'install' ]);
} else if (config.syncOnly && config.proxy) {
    gulp.task('default', ['sync-only', 'watch']);
} else {
    gulp.task('default', function (callback) {
        runSequence('clean', ['sync'], 'rtl:setup', 'rtl_styles', 'rtl:teardown', 'style_list', callback);
    });
}

