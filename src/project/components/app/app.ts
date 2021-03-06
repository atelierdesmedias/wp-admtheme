/**
 * this is "app" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './app.scss'
import {mainFooter} from "../mainFooter/mainFooter";
import {mainHeader} from "../mainHeader/mainHeader";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class app extends jView
{
    // ------------------------------------------------------------------------- TYPE

    private _mainFooter: mainFooter;
    private _mainHeader: mainHeader;

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
        // importer le main header
        this._mainHeader = new mainHeader( $('.mainHeader') );

        // importer le main footer
        this._mainFooter = new mainFooter( $('.mainFooter') );
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


    // ------------------------------------------------------------------------- END EXPORT CLASS
}

