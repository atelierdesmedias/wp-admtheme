/**
 * Webpack Tools
 * out of modules and plugins
 */

// ----------------------------------------------------------------------------- IMPORTS

import globalPath from "../global.path";

// ----------------------------------------------------------------------------- DEV SERVER

/**
 * Dev Server
 */
exports.devServerTool = {

    devServer: {

        // content base to serve local dev project
        contentBase: globalPath.PATHS.dist,

        // display error overlay on screen
        overlay: true,

        // config
        stats: {
            colors: true,
            hash: false,
            version: true,
            timings: true,
            assets: true,
            chunks: false,
            modules: false,
            reasons: false,
            children: false,
            source: false,
            errors: false,
            errorDetails: false,
            warnings: false,
            publicPath: false
        },

        // IMPORTANT
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET",
            "Access-Control-Allow-Headers": "X-Requested-With, content-type, Authorization",
            "Access-Control-Allow-Credentials": "true"
        },
    },

};

// ----------------------------------------------------------------------------- SOURCE MAP

/**
 * Source Map
 * @type {{devtool: *}}
 */
exports.sourceMapTool = {

    devtool: "cheap-module-eval-source-map"

};

// ----------------------------------------------------------------------------- STATS

/**
 * stats information display
 * @type {{stats: {entrypoints: boolean}}}
 * https://webpack.js.org/configuration/stats/
 */
exports.stateTool = {
    stats: {
        // Display the entry points with the corresponding bundles
        entrypoints: false,

        // Add --env information
        env: true,

        // Add children information
        children: false,

        // yellow warning
        warnings: false,

        // Add errors
        errors: true,

        // Add details to errors (like resolving log)
        errorDetails: true,

    }
};
