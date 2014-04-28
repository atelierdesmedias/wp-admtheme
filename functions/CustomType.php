<?php

abstract class CustomType {

    protected $plugin;
    protected $id;
    protected $description;
    protected $name;
    protected $singular_name;
    protected $supports = array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' );
    
    protected $fields = array();
    protected $columns = array(
        'title'
    );
    
    private $taxonomy_id;
    private $reserved_columns = array( 'title', 'date' );


    /**
     * Hook into the appropriate actions when the class is constructed.
     */
    public function __construct() {
        $this->id = $this->plugin.'_'.$this->id;
        $this->taxonomy_id = $this->id.'_tag';
        
        $this->consolidate_fields_attribute();
        $this->consolidate_columns_attribute();
        
        add_action( 'init', array($this, 'add_post_type') );
        add_action( 'init', array($this, 'add_taxonomy') );
        add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
        add_action( 'save_post', array( $this, 'save' ) );
        add_filter( 'manage_edit-'.$this->id.'_columns', array($this, 'manage_columns') );
        add_action( 'manage_'.$this->id.'_posts_custom_column', array($this, 'manage_post_columns'), 10, 2 );
    }

    /**
     * Adds the post type.
     */
    public function add_post_type() {
        $labels = array(
            'name' => $this->name,
            'singular_name' => $this->singular_name
        );

        register_post_type( $this->id,
            array(
                'labels' => $labels,
                'description' => $this->description,
                'public' => true,
                'supports' => $this->supports,
                'rewrite' => array('slug' => strtolower($this->name)),
                'capability_type' => 'page',
                'has_archive' => true,
            )
        );
    }

    /**
     * Adds the post type taxonomies.
     */
    public function add_taxonomy() {
        $labels = array(
            'name'              => $this->singular_name . ' Tags',
            'singular_name'     => $this->singular_name . ' Tag'
        );
        register_taxonomy( $this->taxonomy_id, $this->id, array(
            'labels' => $labels
        ));
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box( $post_type ) {
        foreach ($this->fields as $meta_box_id => $meta_box_data) {
            add_meta_box(
                $meta_box_id,                              // id
                $meta_box_data['label'],                   // title
                array( $this, 'render_meta_box_content' ), // callback
                $this->id                                 // context
            );
        }
    }

    /**
     * Save the meta when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save( $post_id ) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        // Check the user's permissions.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        foreach (array_keys($this->fields) as $meta_box_id) {
            $nonce_id = $this->get_full_meta_box_nonce_id($meta_box_id);
            
            // Check if our nonce is set.
            if ( ! isset( $_POST[$nonce_id] ) )
                return $post_id;
    
            $nonce = $_POST[$nonce_id];
    
            // Verify that the nonce is valid.
            if ( ! wp_verify_nonce( $nonce, $this->get_full_meta_box_id($meta_box_id) ) )
                return $post_id;
    
            /* OK, its safe for us to save the data now. */
    
            foreach (array_keys($this->fields[$meta_box_id]['fields']) as $field_id) {
                $namespace_field_id = $this->id.'_'.$field_id;
                
                // Sanitize the user input.
                $field_value = sanitize_text_field( $_POST[$namespace_field_id] );
    
                // Update the meta field.
                update_post_meta( $post_id, '_'.$field_id, $field_value );
            }
        }
    }


    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content( $post, $meta_box ) {
        $meta_box_id = $meta_box['id'];
        
        // Add an nonce field so we can check for it later.
        wp_nonce_field(
            $this->get_full_meta_box_id($meta_box_id),
            $this->get_full_meta_box_nonce_id($meta_box_id)
        );

        foreach ($this->fields[$meta_box_id]['fields'] as $field_id => $field_data) {
            $namespace_field_id = $this->id.'_'.$field_id;

            // Use get_post_meta to retrieve an existing value from the database.
            $field_value = get_post_meta( $post->ID, '_'.$field_id, true );
    
            // Display the form, using the current value.
            $html = '<div class="custom-field">';
            $html .= '<label for="'.$namespace_field_id.'" class="custom-field__label">'.$field_data['label'].'</label>';
            $html .= '<input type="text" id="'.$namespace_field_id.'" name="'.$namespace_field_id.'"';
            $html .= ' value="' . esc_attr( $field_value ) . '" size="25" class="custom-field__input"/>';
            $html .= '</div>';
            
            echo $html;
        }
    }
    
    public function manage_columns() {
        $columns = array(
            'cb' => '<input type="checkbox" />'
        );
        
        foreach ($this->columns as $column_id => $column_label) {
            $columns[$column_id] = $column_label;
        }

        return $columns;
    }
    
    public function manage_post_columns( $column_id, $post_id ) {
        if( in_array( $column_id, $this->reserved_columns ) ) {
            return ;
        }

        /* Get the post meta. */
        $field_value = get_post_meta( $post_id, '_'.$column_id, true );

        /* If no value is found, output an empty message. */
        if ( empty( $field_value ) ) {
            echo '';
        }

        /* If there is a value, add a link to the edition. */
        else {
            echo sprintf( '<a href="%s">%s</a>',
                esc_url(add_query_arg( array( 'post' => $post_id, 'action' => 'edit' ), 'post.php' )),
                esc_html( $field_value )
            );
        }
    }

    protected function consolidate_fields_attribute() {
        foreach (array_keys($this->fields) as $meta_box_id) {
            foreach ($this->fields[$meta_box_id]['fields'] as $field_id => $field_data) {
                if (is_string($field_data)) {
                    $this->fields[$meta_box_id]['fields'][$field_id] = array(
                        'label' => $field_data
                    );
                }
            }
        }
    }

    protected function consolidate_columns_attribute() {
        foreach ($this->columns as $column_id => $column_label) {
            if (is_numeric($column_id)) {
                unset($this->columns[$column_id]);
                $column_id = $column_label;
                if ( $column_data = $this->get_custom_field_data($column_id) ) {
                    $this->columns[$column_id] = $column_data['label'];
                }
            }
        }
    }
    
    protected function get_custom_field_data($field_id) {
        foreach ($this->fields as $meta_box) {
            if (isset($meta_box['fields'][$field_id])) {
                return $meta_box['fields'][$field_id];
            }
        }
        return false;
    }
        
    protected function get_full_meta_box_id($meta_box_id) {
        return $this->id.'_'.$meta_box_id;
    }

    protected function get_full_meta_box_nonce_id($meta_box_id) {
        return $this->get_full_meta_box_id($meta_box_id).'_nonce';
    }
}