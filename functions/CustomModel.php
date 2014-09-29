<?php

class CustomModel {
    protected $post;
    protected $data = array();
    protected $terms = array();
    public function __construct($post) {
        $this->post = $post;
        $this->data = get_post_custom();
        if ($this->termsId) {
            $this->terms = wp_get_post_terms( $post->ID, $this->termsId );
        }
    }
    public function has($attribute) {
        return !empty($this->data['_'.$attribute][0]);
    }
    public function get($attribute) {
        if ($this->has($attribute)) {
            return $this->data['_'.$attribute][0];
        }
    }
    public function getTags() {
        return $this->terms;
    }
}
?>