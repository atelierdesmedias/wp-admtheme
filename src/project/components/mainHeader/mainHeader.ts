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

        this.$hamburgerButton.on('click', this.mobileToggleNavBarHandler.bind(this));

        this.$hamburgerButton.on('click', this.hamburgerButtonLinesAnim.bind(this));
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
    public mobileToggleNavBarHandler ()
    {
        // changer le state de isHidden
        this.changeNavBarState();
        console.log(this._isOpen);

        // animer l'apparition
        this.navBarAnim();
    }

    // ------------------------------------------------------------------------- STATES

    /**
     * changer le state de la visiblilté de la navBar
     */
    protected changeNavBarState () :void
    {
        // changer le state de isHidden
        this._isOpen = !this._isOpen;
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
     * @param {number} pDuration
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

