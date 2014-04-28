<?php
/********************  custom post type ************************/     
add_action( 'init', 'add_coworker' );
function add_coworker() {
  $labels = array(
    'name' => 'Coworkers',
    'singular_name' => 'Coworker'
  );

  $supports = array('title', 'page-attributes', 'editor', 'thumbnail' );

  register_post_type( 'adm_coworker',
    array(
      'labels' => $labels,
      'description' => 'Une fiche coworker',
      'public' => true,
      'supports' => $supports,
      'rewrite' => array('slug' => 'coworkers'),
      'capability_type' => 'page',
      'has_archive' => true,
    )
  );
}

?>
