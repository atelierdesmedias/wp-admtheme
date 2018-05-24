/**
 * this is "bigCover" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './bigCover.scss'
import {eventBanner} from "../eventBanner/eventBanner";

// ------------------------------------------------------------------------- START EXPORT CLASS

export class bigCover extends jView
{

    // ------------------------------------------------------------------------- TYPE

    private _eventBanner: eventBanner;
    private $video: ZeptoCollection;

    // ------------------------------------------------------------------------- INIT

    /**
     * prepare nodes
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareNodes()
    {
        // la video qui tourne en boucle
        this.$video = this.$root.find('.bigCover_video');
    }

    /**
     * prepare dependencies
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareDependencies()
    {
        // importer event Banner
        this._eventBanner = new eventBanner( $('.eventBanner') );
    }

    /**
     * prepare events
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareEvents()
    {
        window.addEventListener('resize', this.applyVideoHeightHandler.bind(this))
    }

    /**
     * after Init
     * (method overwriting jView and move to constructor via init)
     */
    protected afterInit()
    {
        console.log('coucou bigCover');
    }

    // ------------------------------------------------------------------------- HANDLERS

    protected applyVideoHeightHandler () :void
    {
     console.log('resize');
    }


    // ------------------------------------------------------------------------- DISPOSE

    // supprimer l'écoute de l'event
    dispose ()
    {
        window.removeEventListener('resize', this.applyVideoHeightHandler.bind(this))
    }


}

