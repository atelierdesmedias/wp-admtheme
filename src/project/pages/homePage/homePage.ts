/**
 * this is "homePage" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './homePage.scss'
import {bigCover} from "../../components/bigCover/bigCover";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class homePage extends jView
{
    // ------------------------------------------------------------------------- TYPE

    private _bigCover: bigCover;

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
        // inclure la big Cover
        this._bigCover = new bigCover( $('.bigCover') );
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

    }

    // ------------------------------------------------------------------------- HANDLERS

    // ------------------------------------------------------------------------- CONFIG

    // ------------------------------------------------------------------------- END EXPORT CLASS
}

