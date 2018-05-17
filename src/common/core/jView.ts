/**
 * This is "jView" JS export class
 * IMPORTANT : do not edit this class
 */

// -------------------------------------------------------------------------------  START EXPORT CLASS

export class jView {

    // ------------------------------------------------------------------------- TYPE ELEMENTS

    $root: any;

    // ------------------------------------------------------------------------- CONSTRUCTOR

    /**
     * JView constructor
     * Load all methods
     *
     */
    constructor($pRoot: any = null) {

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
     * This method get method
     */
    protected init() {
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
