/**
 * this is "homePage" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './homePage.scss'
import {bigCover} from "../../components/bigCover/bigCover";
import {presentationAdmSection} from "../../components/presentationAdmSection/presentationAdmSection";
import {adherentSection} from "../../components/adherentSection/adherentSection";
import {breakPoint} from '../../../common/helpers/breakPoint';

// ------------------------------------------------------------------------- START EXPORT CLASS

export class homePage extends jView
{
    // ------------------------------------------------------------------------- TYPE

    private _bigCover: bigCover;
    private _presentationAdmSection: presentationAdmSection;
    private _adherentSection: adherentSection;
    private $bigCover: ZeptoCollection;
    private $bigCoverBanner: ZeptoCollection;

    // ------------------------------------------------------------------------- INIT

    /**
     * prepare nodes
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareNodes()
    {
        this.$bigCover = this.$root.find('.bigCover');
        this.$bigCoverBanner = this.$bigCover.find('.bigCover_banner');
        // console.log(this.$bigCoverBanner);
    }

    /**
     * prepare dependencies
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareDependencies()
    {
        // inclure la big Cover
        this._bigCover = new bigCover( $('.bigCover') );

        // inclure le texte de présentation 
        this._presentationAdmSection = new presentationAdmSection( $('.presentationAdmSection') );
        
        // inclure la section "adherent"
        this._adherentSection = new adherentSection( $('.adherentSection') );
    }

    /**
     * prepare events
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareEvents()
    {

        // cloner la banner de bigCover dans le content de homePage au resize
        // $(window).on('resize', this.moveBannerOnResizeHandler.bind(this));
    }

    /**
     * after Init
     * (method overwriting jView and move to constructor via init)
     */
    protected afterInit()
    {

    }

    // ------------------------------------------------------------------------- HANDLERS

    moveBannerOnResizeHandler ()
    {
        if (breakPoint('medium'))
        {
            // this.$bigCoverBanner.clone();

        } else
        {

        }
    }

    // ------------------------------------------------------------------------- CONFIG

    // ------------------------------------------------------------------------- END EXPORT CLASS
}

