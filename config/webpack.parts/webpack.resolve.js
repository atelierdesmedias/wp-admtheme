/**
 * Webpack Resolve
 */

// ----------------------------------------------------------------------------- IMPORTS

const path = require('path');
import globalPath from "../global.path";
const isDev = process.env.NODE_ENV === 'dev';


// ----------------------------------------------------------------------------- EXPORT

const resolve = {

    resolve: {

        // extentions preference order
        extensions: [
            '.ts', '.js'
        ],


        // alias
        alias: {

        },

        modules: [
            globalPath.PATHS.src,
            path.resolve('./node_modules'),
            path.resolve('./'),
        ]

    },

};

export default resolve;