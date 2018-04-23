/**
 * Webpack modules
 * @type {webpack}
 */

// ----------------------------------------------------------------------------- IMPORTS

import globalPath from '../global.path';
import globalConfig from "../global.config";

const webpack = require('webpack');
const isDev = process.env.NODE_ENV === 'dev';

const ExtractTextPlugin = require("extract-text-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// ----------------------------------------------------------------------------- CSS

/**
 * CSS LESS + EXTRACT TEXT PLUGIN
 * - prod : extract text plugin
 * @type {{module: {rules: *[]}, plugins: *[]}}
 */
exports.cssExtractModule = {

    module: {
        rules: [
            {
                test: /\.(css|scss)$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [

                        {
                            loader: 'css-loader',
                            options: {
                                minimize: !isDev,
                            },
                        },
                        {
                            // config in 'postcss.config.js' file
                            loader: 'postcss-loader',
                            options: {
                                config: {
                                    path: './config/postcss.config.js'
                                }
                            }
                        },
                        {
                            loader: 'sass-loader',
                        },
                    ],
                }),
            },
        ]
    },

    plugins: [

        new ExtractTextPlugin({
            filename: isDev
                ? globalPath.DIRNAME.css + '[name].css'
                : globalPath.DIRNAME.css + '[name].[hash:8].css',
            disable: isDev,
            allChunks: true
        }),

    ]
};

/**
 * CSS LESS + MINI EXTRACT TEXT PLUGIN
 * - dev : inline
 * - prod : mini extract text plugin
 *
 * alternative
 * https://github.com/webpack-contrib/mini-css-extract-plugin
 *
 */
exports.cssMiniExtractModule = {

    module: {
        rules: [
            {
                test: /\.(css|sass)$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                    },
                    {
                        loader: 'css-loader',
                        options: {
                            // minimize: !isDev,
                        },
                    },
                    {
                        // config in 'postcss.config.js' file
                        loader: 'postcss-loader',
                        options: {
                            config: {
                                path: './config/postcss.config.js'
                            }
                        }
                    },
                    {
                        loader: 'sass-loader',
                    },
                ],
            }
        ]
    },

    plugins: [
        new MiniCssExtractPlugin({

            filename: isDev
                ? globalPath.DIRNAME.css + '[name].css'
                : globalPath.DIRNAME.css + '[name].[hash:8].css',

            disable: isDev,
        })
    ]
};


// ----------------------------------------------------------------------------- TYPESCRIPT

/**
 * TypeScript
 * @type {{module: {rules: *[]}}}
 */
exports.tsModule = {

    module: {
        rules: [
            {
                test: /\.ts$/,
                use: [
                    {
                        // permet d'utiliser le "template" avec hot reload (mais perte du state)
                        loader: 'ts-vue-loader'
                    },
                    {
                        loader: 'ts-loader'
                    }

                ],
            },
            {
                test: /\.js$/,
                use: ['babel-loader'],
                exclude: /(node_modules)/,
            },
            {
                test: /\.html$/,
                use: 'vue-template-loader'
            },

        ]
    },
};

// ----------------------------------------------------------------------------- IMAGES

/**
 * Images
 * @type {{module: {test: RegExp[], use: *[]}}}
 */
exports.imagesModule = {

    module: {
        rules: [
            {
                // images & videos

                test: [/\.bmp$/, /\.gif$/, /\.jpe?g$/, /\.png$/],
                use: [
                    {
                        loader: "sizeof-loader",
                        options: {

                            // utiliser file loader pour générer des images importé dans assets (default is false)
                            useFileLoader: true,

                            name: isDev
                                ? "[name].[ext]"
                                : "[name].[hash:8].[ext]",

                            publicPath: isDev
                                ? globalConfig.devServer.url + "/" + globalPath.DIRNAME.assets + globalPath.DIRNAME.images
                                : "/" + globalPath.DIRNAME.assets + globalPath.DIRNAME.images,

                            outputPath: globalPath.DIRNAME.images

                        }
                    },
                ]
            }
        ]
    }
};


// ----------------------------------------------------------------------------- FONTS

/**
 * Fonts
 * @type {{test: RegExp, use: {loader: string, options: {name: string, publicPath: string, outputPath: string}}}}
 */
exports.fontsModule = {

    module: {
        rules: [
            {
                test: /\.(ttf|otf|eot|woff(2)?)(\?[a-z0-9]+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: isDev ? '[name].[ext]' : '[hash:8].[ext]',

                            publicPath: isDev
                                ? globalConfig.devServer.url + "/" + globalPath.DIRNAME.assets + globalPath.DIRNAME.fonts
                                : "/" + globalPath.DIRNAME.assets + globalPath.DIRNAME.fonts,

                            outputPath: globalPath.DIRNAME.fonts
                        },
                    }
                ],
            }
        ]
    }
};



