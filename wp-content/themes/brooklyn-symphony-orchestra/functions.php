<?php

add_action('init', 'create_concert_type');
function create_concert_type() {
  register_post_type('bso_concert',
    array(
      'labels' => array(
        'name'               => __('Concerts'),
        'singular_name'      => __('Concert'),
        'add_new'            => __('Add Concert'),
        'add_new_item'       => __('Add New Concert'),
        'edit'               => __('Edit'),
        'edit_item'          => __('Edit Concert'),
        'new_item'           => __('New Concert'),
        'view'               => __('View Concert'),
        'search_items'       => __('Search Concerts'),
        'not_found'          => __('No concerts found'),
        'not_found_in_trash' => __('No concerts found in Trash')
      ),
      'public'      => true,
      'has_archive' => true,
      'show_ui'     => true,
      'rewrite' => array(
        'slug' => 'concerts'
      ),
      'supports' => array(
        'custom_fields'
      )
    )
  );
}
/*
add_action('admin_init', 'add_metaboxes');
function add_metaboxes() {

}
*/
?>