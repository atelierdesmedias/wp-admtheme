<?php
/********************  custom post type ************************/     
add_action( 'init', 'add_coworker' );
function add_coworker() {
  $labels = array(
    'name' => __('Name', 'Coworkers'),
    'singular_name' => __('Name', 'Coworker'),
    'add_new' => __('Add a ... ', 'Coworker'),
    'add_new_item' => __('Add a new ... ', 'Coworker'),
    'edit_item' => __('Edit the ... ', 'Coworker'),
    'new_item' => __('New ', 'Coworker'),
    'view_item' => __('See the', 'Coworker'),
    'search_items' => __('Find a ... ', 'Coworker'),
    'not_found' =>  __('No ... found', 'Coworker'),
    'not_found_in_trash' => __('No ... found in trash', 'Coworker'),
    'parent_item_colon' => ''
  );

  $supports = array('title', 'page-attributes', 'editor', 'thumbnail' );

  register_post_type( 'nom',
    array(
      'labels' => $labels,
      'description' => ' description goes here',
      'public' => true,
      'supports' => $supports,
      'capability_type' => 'page',
      'has_archive' => true,
    )
  );
}

?>
