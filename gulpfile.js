/**
  * @Filename: gulpfile.js
  * @Description: config gulp builder
*/

// ----------------------------------------------------------------------------- DEPENDENCIES

let gulp            = require('gulp');

// ----------------------------------------------------------------------------- PATHS

/**
 * project Paths
 */

let root = '';

path = {

    // template folder
    template : root + 'config/templates/',

    // Path to components
    components  : root + 'src/project/components/',

    // Path to pages
    pages       : root + 'src/project/pages/'

};


// Require all tasks
// requireDir( path.config );


// ----------------------------------------------------------------------------- SCAFF TASK

let prompt                  = require('gulp-prompt');
let template                = require('gulp-template');
let rename                  = require('gulp-rename');
let changeCase              = require('change-case');
let gutil                   = require("gulp-util");

let DOMTsTemplate           = path.template + 'dom/tsTemplate';
let DOMLessTemplate         = path.template + 'dom/scssTemplate';



gulp.task('scaff', () =>  {

    gulp.src( DOMTsTemplate )

        .pipe(prompt.prompt([

        // question 1 : techno
        // {
        //     type: 'list',
        //     name: 'techno',
        //     message: 'Techno ?',
        //     choices: [
        //         'dom'
        //     ]
        // },

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


            // ----------------------------------------------------------------- dom (2 files)


                // ---- JS template
                gulp.src( DOMTsTemplate )

                // config
                    .pipe(template({ name: formatName }))
                    // rename file with response name
                    .pipe(rename(formatName +'.ts'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));


                // ---- LESS template
                gulp.src( DOMLessTemplate )

                // config
                    .pipe(template({ name: formatName }))
                    // rename file with response name
                    .pipe(rename(formatName +'.scss'))
                    // define Dest
                    .pipe(gulp.dest( (res.type === 'Component' ? path.components : path.pages) + formatName ));



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

