/**
 * @Filename: main
 * @Description: Main bundle script
 */

// ----------------------------------------------------------------------------- STYLE IMPORTS

// normalize (from npm)
import 'normalize.css'

// reset from helpers
import './common/helpers/reset.scss'

// declare inline @fontFace
import './common/fonts/_fonts.scss'

// layout
import './common/layouts/body.scss'

// ----------------------------------------------------------------------------- JS IMPORTS

import {jView} from './common/core/jView';
import {homePage} from "./project/pages/homePage/homePage";

// ----------------------------------------------------------------------------- START EXPORT CLASS

export class main extends jView
{

    // ------------------------------------------------------------------------- TYPE

    private _homePage: homePage;

    // ------------------------------------------------------------------------- INIT

    /**
     * after Init
     * (method overwriting jView and move to constructor via init)
     */
    protected afterInit() {

        // load scripts depend of the page page
        this.showPage();

        // load root components
        this.InitRootComponents();
    }

    // ------------------------------------------------------------------------- FINAL

    /**
     * Components that are not concatenated in specific page
     */
    protected InitRootComponents() {

        /**
         * instance d'un composant
         * @desc: penser à passer en param l'objet zepto relatif à la class principale du composant
         * cela permet de cibler ce block via "this.$root" à l'interieur du .ts du composant instancié
         *
         * ex :
         *  - si le composant à instancier est "menu",
         *  passer en param d'instance - $('.menu')
         *
         * @doc: http://zeptojs.com/
         */

    }

    /**
     * Load script depend of pages
     */
    protected showPage() {

        /**
         * instance d'une page
         * @type {homePage}
         * @private
         * @desc: penser à passer en param l'objet zepto relatif à la class principale du composant
         * cela permet de cibler ce block via "this.$root" à l'interieur du .ts du composant instancié
         *
         * ex :
         *  - si le composant page à instancier est "homePage",
         *  passer en param d'instance - $('.homePage')
         *
         * @doc: http://zeptojs.com/
         *
         */

         this._homePage = new homePage( $('.homePage') );

    }

    // ------------------------------------------------------------------------- END EXPORT CLASS

}

/**
 * FINAL
 * instancier la class "main"
 */
new main();


