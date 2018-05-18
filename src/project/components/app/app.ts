/**
 * this is "app" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './app.scss'
import {menu} from "../menu/menu";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class app extends jView
{
    private _menu: menu;

    // ------------------------------------------------------------------------- TYPE

    // ------------------------------------------------------------------------- INIT


    /**
     * Target our root if not already defined via constructor params
     * (method overwriting DOMView and move to constructor via init)
     */
    protected targetRoot ()
    {

    }

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

        // importer le menu
        this._menu = new menu( $('.menu') );
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
