/**
 * this is "hamburgerButton" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './hamburgerButton.scss'
import {navBar} from "../navBar/navBar";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class hamburgerButton extends jView
{

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

    }

    /**
     * prepare events
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareEvents()
    {
        // executer la methode qui se trouve dans le composant navBar sans avoir besoin
        // de l'instancer (la méthode est static)
        this.$root.on('click', navBar.mobileToggleNavBarHandler.bind(this));
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

