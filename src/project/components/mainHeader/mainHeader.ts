/**
 * this is "mainHeader" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './mainHeader.scss'
import {mainMenu} from "../mainMenu/mainMenu";
import {hamburgerButton} from "../hamburgerButton/hamburgerButton";
import {TweenLite} from "gsap";
import {breakPoint} from '../../../common/helpers/breakPoint';


// States de la mainMenu Handler
enum EToggleMainMenuHandler
{
    OPEN,
    CLOSE,
    TOGGLE
}

// ------------------------------------------------------------------------- START EXPORT CLASS

export class mainHeader extends jView
{
    // ------------------------------------------------------------------------- LOCALS

    // état de l'ouverture
    private _isOpen = false;

    // ------------------------------------------------------------------------- TYPE

    private _hamburgerButton: hamburgerButton;
    private _mainMenu: mainMenu;


    // hamburger Button
    private $hamburgerButton: ZeptoCollection;
    private $lineTop: ZeptoCollection;
    private $lineCenter: ZeptoCollection;
    private $lineBottom: ZeptoCollection;
    private $mainMenu: ZeptoCollection;


    // ------------------------------------------------------------------------- INIT

    /**
     * prepare nodes
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareNodes()
    {

        this.$mainMenu            = this.$root.find('.mainMenu');

        // cibler le hamburger bouton qui se trouve dans ce composant
        this.$hamburgerButton   = this.$root.find('.hamburgerButton');
        this.$lineTop           = this.$hamburgerButton.find('.hamburgerButton_line-top');
        this.$lineCenter        = this.$hamburgerButton.find('.hamburgerButton_line-center');
        this.$lineBottom        = this.$hamburgerButton.find('.hamburgerButton_line-bottom');
    }

    /**
     * prepare dependencies
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareDependencies()
    {
        // importer le hamburger button
        this._hamburgerButton = new hamburgerButton( $('.hamburgerButton') );

        // inclure le main menu
        this._mainMenu = new mainMenu( $('.mainMenu') );
    }

    /**
     * prepare events
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareEvents()
    {
        // changer l'affichage de la mainMenu en function du click hamburger Button
        this.$hamburgerButton.click( () =>
        {
            // passer la methode toggle mainMenu avec le param toggle
            this.changeStateNavBarHandler(EToggleMainMenuHandler.TOGGLE)
        });

        // reset le state de la mainMenu en function du reszie
        // si mobile : le reset est de cacher le mainMenu
        // si laptop : le reset est de montrer le mainMenu
        $(window).on('resize', this.resetMainMenuStateHandler.bind(this));
    }

    /**
     * after Init
     * (method overwriting jView and move to constructor via init)
     */
    protected afterInit()
    {

    }

    // ------------------------------------------------------------------------- HANDLERS

    /**
     * Mobile toggle
     */
    protected changeStateNavBarHandler (pState: EToggleMainMenuHandler)
    {

        if ( pState == EToggleMainMenuHandler.TOGGLE )
        {
            // toggle du state
            this._isOpen = !this._isOpen;
        }
        else if ( pState == EToggleMainMenuHandler.OPEN )
        {
            // passer open à true
            this._isOpen = true;
        }
        else  if ( pState == EToggleMainMenuHandler.CLOSE )
        {
            // passer open à false (cacher le mainMenu)
            this._isOpen = false;
        }

        // animer l'apparition de la mainMenu
        this.mainMenuAnim();

        // changer l'affichage des lignes du hamburger button
        this.hamburgerButtonLinesAnim();
    }

    /**
     * Reset le state du mainMenu
     * si mobile : le reset est de cacher le mainMenu
     * si laptop : le reset est de montrer le mainMenu
     */
    protected resetMainMenuStateHandler()
    {
        // si plus grand que large
        breakPoint('large')
            // monter le mainMenu
            ? this.changeStateNavBarHandler( EToggleMainMenuHandler.OPEN )
            // cacher le mainMenu
            : this.changeStateNavBarHandler( EToggleMainMenuHandler.CLOSE );

    }

    // ------------------------------------------------------------------------- ANIM

    /**
     * Animer la mainMenu en function du state
     */
    protected mainMenuAnim () :void
    {
        // animer l'apparition
        TweenLite.to(this.$mainMenu, .3, {
            autoAlpha: this._isOpen ? 1 : 0
        });
    }

    /**
     * animation des lignes du hamburger Button
     */
    protected hamburgerButtonLinesAnim () :void
    {
        let pDuration:number = 0.6;

        // animation des "lines" du HamburgerButton
        TweenLite.to(this.$lineTop, pDuration * 0.3, {
            rotation: this._isOpen ? 43 : 0,
            top: this._isOpen ? 6 : 0,
            // ease: Power3.easeInOut
        });

        TweenLite.to(this.$lineCenter, pDuration * 0.3, {
            opacity: this._isOpen  ? 0 : 1,
            // ease: Power3.easeInOut
        });
        TweenLite.to(this.$lineBottom, pDuration * 0.3, {
            rotation: this._isOpen ? -43 : 0,
            bottom: this._isOpen ? 8 : 0,
            // ease: Power3.easeInOut
        });
    }


    // ------------------------------------------------------------------------- END EXPORT CLASS
}

