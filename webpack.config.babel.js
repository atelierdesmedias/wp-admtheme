
/**
 * Webpack configuration :
 * - development
 * - production
 */

// ----------------------------------------------------------------------------- IMPORTS

import output from './config/webpack.parts/webpack.output'
import entry from './config/webpack.parts/webpack.entry'
import resolve from './config/webpack.parts/webpack.resolve'

import {
    tsModule,
    fontsModule,
    imagesModule,
    cssExtractModule, cssMiniExtractModule
} from './config/webpack.parts/webpack.modules'

import {
    sourceMapTool,
    devServerTool, stateTool
} from "./config/webpack.parts/webpack.tools";
import {
    CleanWebpackPlugin,
    defineEnvPlugin, FriendlyErrorsPlugin, manifestePlugin,
    ProvidePlugin, uglifyPlugin
} from "./config/webpack.parts/webpack.plugins";

const merge = require('webpack-merge');
const isDev = process.env.NODE_ENV === 'dev';

// -----------------------------------------------------------------------------  DEV CONFIG


/**
 * Development webpack configuraton
 */
const devConfig = merge([

    // base config
    entry,
    output,
    resolve,

    // module
    tsModule,
    cssExtractModule,
    imagesModule,
    fontsModule,

    // dev spec
    sourceMapTool,
    devServerTool,
    stateTool,

    // plugins
    defineEnvPlugin,
    ProvidePlugin,
    CleanWebpackPlugin,
    FriendlyErrorsPlugin,

]);

exports.devConfig = devConfig;

// ----------------------------------------------------------------------------- PROD CONFIG

/**
 * Production webpack configuraton
 */
const prodConfig = merge([

    // base config
    entry,
    output,
    resolve,

    // module
    tsModule,
    cssExtractModule,
    imagesModule,
    fontsModule,

    // tools
    stateTool,

    // plugins
    ProvidePlugin,
    defineEnvPlugin,
    CleanWebpackPlugin,
    FriendlyErrorsPlugin,
    manifestePlugin,
    uglifyPlugin,

]);

exports.prodConfig = prodConfig;

// ----------------------------------------------------------------------------- EXPORT

// config export depend of env
module.exports.default = isDev
    ? devConfig
    : prodConfig;
