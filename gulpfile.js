/**
 * @Filename: gulpfile.js
 * @Description: config gulp builder
 */

// ----------------------------------------------------------------------------- DEPENDENCIES

const gulp = require('gulp');
const prompt = require('gulp-prompt');
const template = require('gulp-template');
const rename = require('gulp-rename');
const changeCase = require('change-case');
const gutil = require("gulp-util");

// ----------------------------------------------------------------------------- PATHS

/**
 * project Paths
 */

const root = './';

path = {

    // skeletons folder
    skeletons: root + 'config/skeletons/',

    // Path to components
    components: root + 'src/project/components/',

    // Path to pages
    pages: root + 'src/project/pages/',

    // Path to config
    env: root + 'config/env/',
};

// ----------------------------------------------------------------------------- SCAFF TASK


let DOMTsTemplate = path.skeletons + 'dom/tsTemplate';
let DOMLessTemplate = path.skeletons + 'dom/scssTemplate';
let DOMTWIGTemplate = path.skeletons + 'dom/twigTemplate';
let wpPageTemplate = path.skeletons + 'dom/wpPageTemplate';
// let DOMPHPTemplate = path.skeletons + 'dom/phpTemplate';


gulp.task('scaff', () => {

    gulp.src(DOMTsTemplate)

        .pipe(prompt.prompt([

            // question 2 : type page / component
            {
                type: 'list',
                name: 'type',
                message: 'Type of scaffolding ?',
                choices: ['Component', 'Page']
            },
            // question 3 : name
            {
                type: 'input',
                name: 'name',
                message: 'What\'s your component name (camelCase) ?'
            }

        ], function (res) {

            // change case of name
            let formatName = changeCase.camelCase(res.name); // debut lowerCase
            let wpPageFormatName = changeCase.paramCase(res.name); //  ma-page.php

            // ----------------------------------------------------------------- DOM (2 files)


            // ---- JS template
            gulp.src(DOMTsTemplate)

                // config
                .pipe(template({name: formatName}))
                // rename file with response name
                .pipe(rename(formatName + '.ts'))
                // define Dest
                .pipe(gulp.dest((res.type === 'Component' ? path.components : path.pages) + formatName));


            // ---- LESS template
            gulp.src(DOMLessTemplate)

                // config
                .pipe(template({name: formatName}))
                // rename file with response name
                .pipe(rename(formatName + '.scss'))
                // define Dest
                .pipe(gulp.dest((res.type === 'Component' ? path.components : path.pages) + formatName));


            // ---- TWIG View template
            gulp.src(DOMTWIGTemplate)
            // config
                .pipe(template({name: formatName}))
                // rename file with response name
                .pipe(rename(formatName + '.twig'))
                // define Dest
                .pipe(gulp.dest((res.type === 'Component' ? path.components : path.pages) + formatName));

            /**
             * Seulement si c'est une page  :
             * Créer un template de page type "WP" à la racine du projet
             * dans lequel on inclu le composant page
             */
            // if (res.type === 'Page')
            // {
            //     // ---- PHP page template
            //     gulp.src(wpPageTemplate)
            //     // config
            //         .pipe(template({name: formatName}))
            //         // rename file with response name
            //         .pipe(rename(wpPageFormatName + '.php'))
            //         // define Dest
            //         .pipe(gulp.dest( root ));
            // }


            // ----------------------------------------------------------------- END - console message

            gutil.log(
                gutil.colors.yellow('Your ' + (res.type === 'Component' ? 'component' : 'pages')),
                gutil.colors.cyan(formatName),
                gutil.colors.yellow('has just been built in'),
                gutil.colors.cyan(res.type === 'Component' ? 'src/project/components/' : 'src/project/pages/'),
                gutil.colors.yellow('folder :)')
            );

        }));


});

// ----------------------------------------------------------------------------- ENV

/**
 * Define Env Scaffolder
 * @type {string}
 */

let envTemplate = path.skeletons + 'config/env';
let envPropertiesTemplate = path.skeletons + 'config/properties';

gulp.task('env', () => {

    gulp.src(envTemplate)

        .pipe(prompt.prompt([

            // question 1 : name
            {
                type: 'input',
                name: 'name',
                message: 'What\'s your name ? (ex: john)'
            }

        ], function (res) {

            // change case of name
            let formatName = changeCase.camelCase(res.name);

            // ----------------------------------------------------------------- ENV SCAFFOLDER

            // env file
            gulp.src(envTemplate)

            // config
                .pipe(template({name: formatName}))
                // rename file with response name
                .pipe(rename('env.js'))
                // define Dest
                .pipe(gulp.dest(path.env));


            // properties file
            gulp.src(envPropertiesTemplate)

            // config
                .pipe(template({name: formatName}))
                // rename file with response name
                .pipe(rename(formatName + '.properties.js'))
                // define Dest
                .pipe(gulp.dest(path.env));

            // ----------------------------------------------------------------- END - console message

            gutil.log(
                gutil.colors.yellow('Env is now define with the name'),
                gutil.colors.cyan(formatName + ' !'),
                gutil.colors.yellow('Change your locale Paths variable in'),
                gutil.colors.cyan('config/env/' + formatName + '.properties.js'),
            );

        }));


});

