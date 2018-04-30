/**
 * Webpack Plugins
 */

// ----------------------------------------------------------------------------- IMPORTS

import globalPath from "../global.path";

const webpack = require('webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const FriendlyErrors = require('friendly-errors-webpack-plugin');
const notifier = require('node-notifier');


// ----------------------------------------------------------------------------- PROVIDE

/**
 * Provide Plugin
 * define default libs you want to import in the project
 *
 * @type {{plugins: *[]}}
 */
exports.ProvidePlugin = {

    plugins: [
        new webpack.ProvidePlugin({
            $: 'zepto-webpack'
        })
    ],

};


// ----------------------------------------------------------------------------- ENV

/**
 * Permet de definir différents environnements à la compilation
 */
exports.defineEnvPlugin = {

    plugins: [
        new webpack.DefinePlugin({
            'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV)
        }),
    ]
};


// ----------------------------------------------------------------------------- CLEAN ASSETS

/**
 *
 * Clean Webpack Plugins
 * remove assets/ folder each compilations
 *
 */

exports.CleanWebpackPlugin = {

    plugins: [

        new CleanWebpackPlugin(globalPath.PATHS.assets, {

            // Absolute path to your webpack root folder (paths appended to this)
            // Default: root of your package
            root: globalPath.PATHS.dist,

            // Write logs to console.
            verbose: true,

            // Use boolean "true" to test/emulate delete. (will not remove files).
            // Default: false - remove files
            dry: false,

            // allow the plugin to clean folders outside of the webpack root.
            // Default: false - don't allow clean folder outside of the webpack root
            allowExternal: false
        }),
    ]
};


// ----------------------------------------------------------------------------- CONSOLE FORMAT
/**
 * Friendly Errors Plugin
 * Console formater
 *
 * @type {{plugins: *[]}}
 */
exports.FriendlyErrorsPlugin = {

    plugins: [
        /**
         * Console formater
         * (dev + prod)
         */
        new FriendlyErrors({
            onErrors: function (severity, errors) {
                if (severity !== 'error') {
                    return;
                }
                const error = errors[0];
                notifier.notify({
                    title: "Webpack error",
                    message: severity + ': ' + error.name,
                    subtitle: error.file || '',
                    sound: 'Pop',
                    // icon: ICON
                })
            },
            clearConsole: true,
        }),

    ]
};


// ----------------------------------------------------------------------------- MANIFESTE

/**
 * Manifeste Plugins
 * @type {{plugins: *[]}}
 */
exports.manifestePlugin = {

    plugins: [
        new ManifestPlugin()
    ]

};


// ----------------------------------------------------------------------------- UGLIFY

/**
 * Uglify Plugin
 * (encore besoin depuis webpack 4 ?)
 */
exports.uglifyPlugin = {

    plugins: [
        new UglifyJsPlugin({
            uglifyOptions: {
                sourceMap: false,
                comments: false,
                mangle: false,
                // keep_classnames: true,
            }
        })
    ]

};

