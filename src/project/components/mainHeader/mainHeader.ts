/**
 * this is "mainHeader" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './mainHeader.scss'
import {navBar} from "../navBar/navBar";
import {hamburgerButton} from "../hamburgerButton/hamburgerButton";
import {TweenLite} from "gsap";
import {breakPoint} from '../../../common/helpers/breakPoint';


// States de la navBar Handler
enum EToggleNavBarHandler
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

    private _navBar: navBar;
    private _hamburgerButton: hamburgerButton;


    // hamburger Button
    private $hamburgerButton: ZeptoCollection;
    private $lineTop: ZeptoCollection;
    private $lineCenter: ZeptoCollection;
    private $lineBottom: ZeptoCollection;
    private $navBar: ZeptoCollection;


    // ------------------------------------------------------------------------- INIT

    /**
     * prepare nodes
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareNodes()
    {

        this.$navBar            = this.$root.find('.navBar');

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

        // inclure la nav Bar
        this._navBar = new navBar( $('.navBar') );
    }

    /**
     * prepare events
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareEvents()
    {
        // changer l'affichage de la navBar en function du click hamburger Button
        this.$hamburgerButton.click( () =>
        {
            // passer la methode toggle navBar avec le param toggle
            this.changeStateNavBarHandler(EToggleNavBarHandler.TOGGLE)
        });

        // reset le state de la navBar en function du reszie
        // si mobile : le reset est de cacher la nav bar
        // si laptop : le reset est de montrer la nav bar
        $(window).on('resize', this.resetNavBarStateHandler.bind(this));
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
    protected changeStateNavBarHandler (pState: EToggleNavBarHandler)
    {

        if ( pState == EToggleNavBarHandler.TOGGLE )
        {
            // toggle du state
            this._isOpen = !this._isOpen;
        }
        else if ( pState == EToggleNavBarHandler.OPEN )
        {
            // passer open à true
            this._isOpen = true;
        }
        else  if ( pState == EToggleNavBarHandler.CLOSE )
        {
            // passer open à false (cacher la navBar)
            this._isOpen = false;
        }

        // animer l'apparition de la navBar
        this.navBarAnim();

        // changer l'affichage des lignes du hamburger button
        this.hamburgerButtonLinesAnim();
    }

    /**
     * Reset le state de la nav Bar
     * si mobile : le reset est de cacher la nav bar
     * si laptop : le reset est de montrer la nav bar
     */
    protected resetNavBarStateHandler()
    {
        // si plus grand que large
        breakPoint('large')
            // monter la nav bar
            ? this.changeStateNavBarHandler( EToggleNavBarHandler.OPEN )
            // cacher la nav bar
            : this.changeStateNavBarHandler( EToggleNavBarHandler.CLOSE );

    }

    // ------------------------------------------------------------------------- ANIM

    /**
     * Animer la navBar en function du state
     */
    protected navBarAnim () :void
    {
        // animer l'apparition
        TweenLite.to(this.$navBar, .3, {
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

