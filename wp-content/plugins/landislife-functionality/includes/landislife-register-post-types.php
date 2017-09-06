<?php
/**
 * Register custom post types
 */

// Create 'Grants' post type
function create_post_type_grants() {
  $labels = array(
    'name'                 => __( 'Grants' ),
    'singular_name'        => __( 'Grant' ),
    'add_new'              => __( 'Add Grant' ),
    'add_new_item'         => __( 'Add Grant' ),
    'edit_item'            => __( 'Edit Grant' ),
    'new_item'             => __( 'New Grant' ),
    'all_items'            => __( 'All Grants' ),
    'view_item'            => __( 'View Grant' ),
    'search_items'         => __( 'Search Grants' ),
    'not_found'            => __( 'No Grants found' ),
    'not_found_in_trash'   => __( 'No Grants found in the Trash' ),
    'parent_item_colon'    => '',
    'menu_name'            => 'Grants'
  );
  $args = array(
    'labels'               => $labels,
    'description'          => 'Holds our Grant information',
    'menu_position'        => 4,
    'supports'             => array( 'title', 'thumbnail', 'editor' ),
    'has_archive'          => false,
    'menu_icon'            => 'dashicons-media-text',
    'rewrite'              => array('slug' => 'grants'),
    'public'               => true,
  );
  register_post_type( 'grants', $args );
}
add_action( 'init', 'create_post_type_grants' );


// Custom Messages
function custom_messages( $messages ) {
  global $post, $post_ID;
  $messages['grant'] = array(
    0 => '', 
    1 => sprintf( __('Grant updated. <a href="%s">View Grant</a>'), esc_url( get_permalink($post_ID) ) ),
    4 => __('Grant updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Grant restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Grant published. <a href="%s">View Grant</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Grant saved.'),
    8 => sprintf( __('Grant submitted. <a target="_blank" href="%s">Preview Grant</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Grant scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Grant</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Grant draft updated. <a target="_blank" href="%s">Preview Grant</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
}
add_filter( 'post_updated_messages', 'custom_messages' );

?>