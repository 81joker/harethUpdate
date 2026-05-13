<?php

function latestnews_post_types()
{
  // Latest News Post Type
  register_post_type('latestnews', array(
    'show_in_rest' => true,
    // 'capability_type' => 'latestnews',
    'map_meta_cap' => true,
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'latestnews'),
    'has_archive' => true,
    'public' => true,
    'labels' => array(
      'name' => 'Latest News',
      'add_new_item' => 'Add New Latest News',
      'edit_item' => 'Edit Latest News',
      'all_items' => 'All Latest News',
      'singular_name' => 'Latest News'
    ),
    'menu_icon' => 'dashicons-email'
  ));
}

add_action('init', 'latestnews_post_types');

