/**
 * Path global to Sources & Directories
 * using by webpack
 */

// ----------------------------------------------------------------------------- CONST IMPORTANT

// @dep
const path = require('path');

// IMPORTANT : depend of this config path file location
const root = path.resolve(__dirname, '../');

// name of entry file
const jsMainName = "main.ts";

// ----------------------------------------------------------------------------- GLOBAL PATH

const globalPath = {

    PATHS : {

        // Path to the source (my project)
        src: path.resolve(__dirname, root + '/src/'),

        // Target to JS entry point
        jsEntryFile: path.resolve(__dirname, root + '/src/' + jsMainName),

        // Path to the public folder (output files pushed on the server)
        dist: path.resolve(__dirname, root),

        // IMPORTANT
        // Change assets destination only here (others paths are relative to this one)
        // Path to dist > assets
        assets: path.resolve(__dirname, root + '/assets/'),

        // // Path to dist > assets > images
        images: () =>  this.assets + 'images/',

        // Path to dist > assets > fonts
        fonts: () => this.assets + 'fonts/',

        // Path to dist > assets > css
        css: () => this.assets + 'css/',

    },

    /**
     * Directories Name
     */
    DIRNAME: {

        src: 'src/',

        css: 'css/',

        images: 'images/',

        fonts: 'fonts/',

        assets: 'assets/',

    },

};

export default globalPath;

