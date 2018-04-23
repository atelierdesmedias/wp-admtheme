/**
 * this is "homePage" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView';

// ------------------------------------------------------------------------- START EXPORT CLASS

export class homePage extends jView
{

    // ------------------------------------------------------------------------- TYPE

    // ------------------------------------------------------------------------- INIT

    /**
     * prepare nodes
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareNodes()
    {

    }

    /**
     * prepare dependencies
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareDependencies()
    {

    }

    /**
     * prepare events
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareEvents()
    {

    }

    /**
     * after Init
     * (method overwriting jView and move to constructor via init)
     */
    protected afterInit()
    {
        this.test();
    }

    // ------------------------------------------------------------------------- HANDLERS

    protected test()
    {
        console.log('test');
    }

    // ------------------------------------------------------------------------- END EXPORT CLASS
}

