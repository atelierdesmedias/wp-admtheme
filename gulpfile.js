/**
  * @Filename: gulpfile.js
  * @Description: config gulp builder
*/

// ----------------------------------------------------------------------------- DEPENDENCIES

let gulp            = require('gulp');
// let requireDir      = require('require-dir'); // split tasks in diferents scripts
// let runSequence     = require('run-sequence');  // launch an order of sequences

// ----------------------------------------------------------------------------- PATHS

/**
 * project Paths
 */

let root = '';

path = {

    // Path to config
    build       : root + 'build',

    // Path to tasks
    tasks       : root + 'config/tasks/',

    // Path to components
    components  : root + 'src/project/components/',

    // Path to pages
    pages       : root + 'src/project/pages/',

    // Path to helpers
    whelpers    : root + 'node_modules/whelpers/',

};


// Require all tasks
// requireDir( path.config );


// ----------------------------------------------------------------------------- SCAFF TASK

// let gulp                 = require('gulp');
let prompt                  = require('gulp-prompt');
let template                = require('gulp-template');
let rename                  = require('gulp-rename');
let changeCase              = require('change-case');
let gutil                   = require("gulp-util");


let vueJsTemplate           = path.whelpers + 'templates/vue/jsTemplate';
let vueLessTemplate         = path.whelpers + 'templates/vue/lessTemplate';
let vueHtmlTemplate         = path.whelpers + 'templates/vue/vueTemplate';

let vueSingleFileTemplate   = path.whelpers + 'templates/vue-singleFileComponent/vueTemplate';

let DOMJsTemplate           = path.whelpers + 'templates/jquery/jsTemplate';
let DOMLessTemplate         = path.whelpers + 'templates/jquery/lessTemplate';


gulp.task('scaff', () =>  {

    gulp.src( vueJsTemplate )

        .pipe(prompt.prompt([

        // question 1 : techno
        {
            type: 'list',
            name: 'techno',
            message: 'Techno ?',
            choices: [
                'Vue',
                'Vue single file',
                'DOM'
            ]
        },

        // question 2 : type page / component
        {
            type: 'list',
            name: 'type',
            message: 'Type of scaffolding ?',
            choices: ['Page', 'Component']
        },
        // question 3 : name
        {
            type:'input',
            name: 'name',
            message: 'What\'s your component name (camelCase) ?'
        }

        ], function(res){

            // change case of name
            let formatName = changeCase.camelCase(res.name); // debut lowerCase


            // ----------------------------------------------------------------- VUE (3 files)

            // test techno
            // if vue
            if (res.techno === 'Vue')
            {

                // ----- JS template
                gulp.src( vueJsTemplate )

                // config
                    .pipe(template({ name: formatName }))
                    // rename file with response name
                    .pipe(rename(formatName +'.js'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));

                // ----- LESS template
                gulp.src( vueLessTemplate )

                // config
                    .pipe(template({ name: formatName }))
                    // rename file with response name
                    .pipe(rename(formatName +'.less'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));


                // ----- HTML
                gulp.src(vueHtmlTemplate)

                // config
                    .pipe(template({name: formatName}))
                    // rename file with response name
                    .pipe(rename(formatName + '.vue'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));
            }


            // ----------------------------------------------------------------- VUE single file template (1 file)


            // if vue single File
            if (res.techno === 'Vue single file')
            {

                // VUE template
                gulp.src( vueSingleFileTemplate )

                // config
                    .pipe(template({name: formatName}))
                    // rename file with response name
                    .pipe(rename(formatName + '.vue'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));

            }

            // ----------------------------------------------------------------- DOM (2 files)

            // if DOM
            if (res.techno === 'DOM')
            {

                // ---- JS template
                gulp.src( DOMJsTemplate )

                // config
                    .pipe(template({ name: formatName }))
                    // rename file with response name
                    .pipe(rename(formatName +'.js'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));


                // ---- LESS template
                gulp.src( DOMLessTemplate )

                // config
                    .pipe(template({ name: formatName }))
                    // rename file with response name
                    .pipe(rename(formatName +'.less'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));


            }



            // ----------------------------------------------------------------- END - console message

            gutil.log(
                gutil.colors.yellow('Your ' + (res.type === 'Component' ? 'component' : 'pages')),
                gutil.colors.cyan(formatName),
                gutil.colors.yellow('has just been built in'),
                gutil.colors.cyan( res.type === 'Component' ? 'src/project/components/' : 'src/project/pages/'),
                gutil.colors.yellow('folder :)')
            );

        }));


});

