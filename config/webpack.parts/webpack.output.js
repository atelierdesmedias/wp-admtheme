/**
 * webpack Output
 *
 */

// ----------------------------------------------------------------------------- IMPORTS

import globalConfig from "../global.config";
import globalPath from '../global.path';

const isDev = process.env.NODE_ENV === 'dev';

// ----------------------------------------------------------------------------- OUTPUT

const output = {

    output: {

        // path de sortie
        path: globalPath.PATHS.assets,

        // nom du fichier
        filename: isDev
            ? '[name].js'
            : '[name].[chunkhash:8].js',

        // pas de public path en prod, on ne récupère que le nom du fichier dans le manifeste
        publicPath: isDev
            ? globalConfig.devServer.url + globalPath.DIRNAME.assets
            : '',
    },

};

export default output;
