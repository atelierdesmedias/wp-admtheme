/**
 * Webpack entry file
 * @returns {{entry: {apps: *}}}
 */

// ----------------------------------------------------------------------------- IMPORTS

import globalPath from "../global.path";

// ----------------------------------------------------------------------------- ENTRY

const entry = {

    entry: {
        "apps": globalPath.PATHS.jsEntryFile,
    },

};

export default entry;