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

// ------------------------------------------------------------------------- START EXPORT CLASS

export class homePage extends jView
{
    // ------------------------------------------------------------------------- TYPE

    private _bigCover: bigCover;
    private _presentationAdmSection: presentationAdmSection;
    private _adherentSection: adherentSection;

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

    }

    /**
     * after Init
     * (method overwriting jView and move to constructor via init)
     */
    protected afterInit()
    {

    }

    // ------------------------------------------------------------------------- HANDLERS

    // ------------------------------------------------------------------------- CONFIG

    // ------------------------------------------------------------------------- END EXPORT CLASS
}

