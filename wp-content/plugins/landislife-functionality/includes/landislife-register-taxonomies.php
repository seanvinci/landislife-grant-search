<?php

/**
 * Register custom taxonomies
 */

// Create 'Theme' taxonomy
function create_taxonomy_theme() {
  $labels = array(
    'name'                       => __( 'Themes' ),
    'singular_name'              => __( 'Theme' ),
    'search_items'               => __( 'Search Themes' ),
    'popular_items'              => __( 'Popular Themes' ),
    'all_items'                  => __( 'All Themes' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Theme' ),
    'update_item'                => __( 'Update Theme' ),
    'add_new_item'               => __( 'Add New Theme' ),
    'new_item_name'              => __( 'New Theme Name' ),
    'separate_items_with_commas' => __( 'Separate Themes with commas' ),
    'add_or_remove_items'        => __( 'Add or remove Themes' ),
    'choose_from_most_used'      => __( 'Choose from the most used Themes' ),
    'not_found'                  => __( 'No Themes found.' ),
    'menu_name'                  => __( 'Themes' ),
  );
  $args = array(
    'hierarchical'               => false,
    'labels'                     => $labels,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'update_count_callback'      => '_update_post_term_count',
    'query_var'                  => true,
    'rewrite'                    => array( 'slug' => 'theme' ),
    'public'                     => true,
  );
  register_taxonomy( 'theme', 'grants', $args );
}
add_action( 'init', 'create_taxonomy_theme', 1 );


// Create 'Region' taxonomy
function create_taxonomy_region() {
  $labels = array(
    'name'                       => __( 'Region' ),
    'singular_name'              => __( 'Region' ),
    'search_items'               => __( 'Search Regions' ),
    'popular_items'              => __( 'Popular Regions' ),
    'all_items'                  => __( 'All Regions' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Region' ),
    'update_item'                => __( 'Update Region' ),
    'add_new_item'               => __( 'Add New Region' ),
    'new_item_name'              => __( 'New Region Name' ),
    'separate_items_with_commas' => __( 'Separate Regions with commas' ),
    'add_or_remove_items'        => __( 'Add or remove Regions' ),
    'choose_from_most_used'      => __( 'Choose from the most used Regions' ),
    'not_found'                  => __( 'No Regions found.' ),
    'menu_name'                  => __( 'Regions' ),
  );
  $args = array(
    'hierarchical'               => false,
    'labels'                     => $labels,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'update_count_callback'      => '_update_post_term_count',
    'query_var'                  => true,
    'rewrite'                    => array( 'slug' => 'region' ),
    'public'                     => true,
  );
  register_taxonomy( 'region', 'grants', $args );
}
add_action( 'init', 'create_taxonomy_region', 1 );


// Create 'Year' taxonomy
function create_taxonomy_year() {
  $labels = array(
    'name'                       => __( 'Year' ),
    'singular_name'              => __( 'Year' ),
    'search_items'               => __( 'Search Years' ),
    'popular_items'              => __( 'Popular Years' ),
    'all_items'                  => __( 'All Years' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Year' ),
    'update_item'                => __( 'Update Year' ),
    'add_new_item'               => __( 'Add New Year' ),
    'new_item_name'              => __( 'New Year Name' ),
    'separate_items_with_commas' => __( 'Separate Years with commas' ),
    'add_or_remove_items'        => __( 'Add or remove Years' ),
    'choose_from_most_used'      => __( 'Choose from the most used Years' ),
    'not_found'                  => __( 'No Years found.' ),
    'menu_name'                  => __( 'Years' ),
  );
  $args = array(
    'hierarchical'               => false,
    'labels'                     => $labels,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'update_count_callback'      => '_update_post_term_count',
    'query_var'                  => true,
    'rewrite'                    => array( 'slug' => 'year' ),
    'public'                     => true,
  );
  register_taxonomy( 'year', 'grants', $args );
}
add_action( 'init', 'create_taxonomy_year', 1 );


// Remove Meta Boxes
function remove_meta_boxes() {
  remove_meta_box('tagsdiv-theme', 'grants', 'normal');
  remove_meta_box('tagsdiv-region', 'grants', 'normal');
  remove_meta_box('tagsdiv-year', 'grants', 'normal');
}
add_action( 'admin_menu', 'remove_meta_boxes' );


?>