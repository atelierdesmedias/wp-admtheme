/**
 * this is "mainHeader" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './mainHeader.scss'
import {navBar} from "../navBar/navBar";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class mainHeader extends jView
{
    // ------------------------------------------------------------------------- TYPE

    private _navBar: navBar;

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

        this._navBar = new navBar( $('.navBar') );

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

