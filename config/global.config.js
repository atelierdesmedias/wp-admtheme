/**
 * Global Config
 *
 * Webpack compilation depend of the process.env.NODE_ENV using in scripts
 * (specially if you need to respect a special url using in DataBase)
 *
 * @type {{devServer: {url: string, base: string}, stagingServer: {url: string, base: string}, prodServer: {url: string, base: string}}}
 */

/**
 * TODO : faire pointer les propriétés du tableaux vers celles qui sont définie dans
 * "name.properties.js" qui dépend de env.js (env.js n'étant pas versionné)
 */

// ----------------------------------------------------------------------------- IMPORTS

import {env} from './env/env.js';

// ----------------------------------------------------------------------------- EXPORTS

/**
 *
 * @type {{devServer: {url: string, base: string, env: string}}}
 */
const globalConfig = {


    /**
     * Dev Server Informations
     */
    devServer: {

        /**
         * Application url.
         * Set url of your local server
         *
         */
        url: 'http://localhost:8080',

        /**
         * Application base.
         *
         * - Set path from domain name to application. Starting and ending with slash.
         * - ex :
         * 		If application is installed here : http://domain.com/my-sub-folder/my-app/
         * 		Base should be : "/my-sub-folder/my-app/"
         * - ex :
         * 		If application is installed here : http://domain.com/
         * 		Base should be : "/"
         */

        base: '/',

        env : env,



    },

    // /**
    //  * Staging Server Informations
    //  */
    // stagingServer: {
    //
    //     url: 'http://',
    //     base: '/',
    //
    // },
    //
    // /**
    //  * Prod Server Informations
    //  */
    // prodServer: {
    //
    //     url: 'http://',
    //     base: '/',
    // },

};

export default globalConfig;