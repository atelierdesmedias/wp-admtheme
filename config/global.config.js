/**
 * Global Config
 *
 * Webpack compilation depend of the process.env.NODE_ENV using in scripts
 * (specially if you need to respect a special url using in DataBase)
 *
 * @type {{devServer: {url: string, base: string}, stagingServer: {url: string, base: string}, prodServer: {url: string, base: string}}}
 */

/**
 * "name.properties.js" qui dépend de env.js (env.js n'étant pas versionné)
 */

// ----------------------------------------------------------------------------- IMPORTS

// get env name
import {env} from './env/env.js';

// get relative env properties depend of env.js configuration
let customEnv = require('./env/'+env+'.properties.js');

// ----------------------------------------------------------------------------- EXPORTS

/**
 * Global Config
 * DO NOT TOUCH !
 */
const globalConfig = {

    /**
     * Dev Server Informations
     */
    devServer: {

        /**
         * Application base
         * Depend of env Name configuration
         * Need to create a new user env ?
         * $ npm run env
         */
        base: customEnv.base,

        // local devServer port
        port: 4321,

        // Application webpack devServer url (default webpack url)
        url: 'http://localhost:4321/'

    },

};

export default globalConfig;