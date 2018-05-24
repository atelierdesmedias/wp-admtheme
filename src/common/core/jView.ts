/**
 * This is "jView" JS export class
 * IMPORTANT : do not edit this class
 */

import {Disposable} from "./Disposable";

// -------------------------------------------------------------------------------  START EXPORT CLASS

export class jView extends Disposable
{

    // ------------------------------------------------------------------------- TYPE ELEMENTS

    $root: any;

    // ------------------------------------------------------------------------- CONSTRUCTOR

    /**
     * JView constructor
     * Load all methods
     *
     */
    constructor( $pRoot: any = null )
    {
        // relay
        super();

        // if $pRoot exist
        if ($pRoot != null) {
            // define $pRoot like $root
            this.$root = $pRoot;
        }

        // load init method
        this.init();
    }

    // ------------------------------------------------------------------------- INIT

    /**
     * init
     * This method get all methods
     */
    protected init()
    {
        this.targetRoot();
        this.prepareNodes();
        this.prepareDependencies();
        this.prepareEvents();
        this.afterInit();
    }

    /**
     * Target our root if not already defined via constructor params
     */
    protected targetRoot () {}

    /**
     * prepare Nodes
     */
    protected prepareNodes() {}

    /**
     * prepare Dependencies
     */
    protected prepareDependencies() {}

    /**
     * prepare events
     */
    protected prepareEvents() {}

    /**
     * after init
     */
    protected afterInit() {}


}
