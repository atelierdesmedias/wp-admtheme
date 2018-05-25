/**
 * this is "navBar" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './navBar.scss'
import {menu} from "../menu/menu";
import {socialBlock} from "../socialBlock/socialBlock";
import {intranetConnection} from "../intranetConnection/intranetConnection";
import {languageBlock} from "../languageBlock/languageBlock";
import { TweenLite } from "gsap";


// state de visibilité de la mobile navBar
// (en mobile cette "navBar" est full screen)
let  _isVisible :boolean = false;

// ------------------------------------------------------------------------- START EXPORT CLASS

export class navBar extends jView
{
    // ------------------------------------------------------------------------- LOCALS



    // ------------------------------------------------------------------------- TYPE

    private _menu: menu;
    private _socialBlock: socialBlock;
    private _intranetConnection: intranetConnection;
    private _languageBlock: languageBlock;
    private static $root: ZeptoCollection;


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
        
        // importer le block intranet connection
        this._intranetConnection = new intranetConnection( $('.intranetConnection') );

        // importer le block language
        this._languageBlock = new languageBlock( $('.languageBlock') );

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

    public static mobileToggleNavBarHandler()
    {
        /**
         * le context this n'est pas disponible depuis une méthode statique
         * ????
         *
         * @type {ZeptoCollection}
         */
        let $root = $('.navBar');

        // changer le state de isHidden
        _isVisible = !_isVisible;

        // animer l'apparition
        TweenLite.to($root, .3, {
            autoAlpha: _isVisible ? 1 : 0
        });
    }

    protected changeNavBarState() :void
    {
        // changer le state de isHidden
        _isVisible = !_isVisible;
    }

    protected navBarAnim() :void
    {
        // // animer l'apparition
        // TweenLite.to(this.$root, .3, {
        //     autoAlpha: _isVisible ? 1 : 0
        // });
    }

    // ------------------------------------------------------------------------- END EXPORT CLASS
}

