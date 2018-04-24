/**
 * this is "homePage" TS export class
 * follow workflow instructions
 */

// ------------------------------------------------------------------------- IMPORTS

import {jView} from '../../../common/core/jView'
import './homePage.scss'

// ------------------------------------------------------------------------- START EXPORT CLASS

export class homePage extends jView
{

    // ------------------------------------------------------------------------- TYPE

    private $title: ZeptoCollection;
    private $header: ZeptoCollection;

    // ------------------------------------------------------------------------- INIT

    /**
     * prepare nodes
     * (method overwriting jView and move to constructor via init)
     */
    protected prepareNodes()
    {

        /**
         * this.$root
         *
         * -> correspond au param passé à l'instance de "homePage" dans main.ts
         * Penser à cibler tous les élements enfants de ce composant "homePage" depuis ce noeud de DOM
         *
         * ex :
         *  - Je souhaite cibler le titre (Element de homePage), pour cela, je recherche le noeud enfant
         *  via "find" qui porte la class ...
         *
         *  this.$title = this.$root.find('.homePage_title');
         *
         *  Pour finir, Typer la nouvelle variable this.$title
         *  (tricks pour les utilisateurs de phpStorm ou Intellij : cliquer sur la variable à typer, puis "alt + Enter"
         *
         *  Il est maintenant possible d'utiliser "this.$title" dans toutes les méthodes ci dessous
         */

        this.$title = this.$root.find('.homePage_title');
        // console.log(this.$title);
        this.$header = this.$root.find('.homePage_header');

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
        /**
         * Dans cette méthode, lier les methods handler à leur event respectif
         *
         *  ex :
         *      - je veux executer la methode "newConsoleLogHandler" à chaque évenement "resize" :
         *
         *      $(window).on('resize', this.newConsoleLogHandler.bind(this));
         *
         * IMPORTANT : bien penser à "binder" this au contexte extérieur à l'event, sans quoi,
         * "this" fera référence a son contexte courant.
         *
         */

        $(window).on('resize', this.newConsoleLogHandler.bind(this));


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
     * Ici, on créé les méthodes "Handler" qui sont liées à des events
     */

    /**
     * new Console Log Handler
     * Cette méthode lance un console log à chaque evenement choisi
     */
    protected newConsoleLogHandler()
    {
        console.log('coucou, je suis un console log');
    }

    // ------------------------------------------------------------------------- CONFIG


    // ------------------------------------------------------------------------- END EXPORT CLASS
}

