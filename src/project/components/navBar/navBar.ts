/**
 * this is "navBar" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './navBar.scss'
import {menu} from "../menu/menu";
import {socialBlock} from "../socialBlock/socialBlock";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class navBar extends jView
{

    // ------------------------------------------------------------------------- TYPE

    private _menu: menu;
    private _socialBlock: socialBlock;

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

        // importer le social block
        this._socialBlock = new socialBlock( $('.socialBlock') );

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
