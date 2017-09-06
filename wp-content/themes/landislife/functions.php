<?php

// Enable and register menus
add_theme_support('menus');
function register_theme_menus() {
  register_nav_menus(
    array('primary-nav' => __('Primary Nav'))
  );
}
add_action('init', 'register_theme_menus');


include_once('includes/custom-walker.php');


// Enable Featured Images
add_theme_support( 'post-thumbnails' );



// CSS & JS LINKAGE

// Link CSS files
function custom_admin_styles() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/css/custom-admin.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');

function landislife_theme_styles() {
  wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.custom.min.css');
  wp_enqueue_style('foundation', get_template_directory_uri() . '/css/foundation.custom.min.css');
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'landislife_theme_styles');

// Link JS files
function landislife_theme_js() {
  wp_enqueue_script('core_js', get_template_directory_uri() . '/js/core.js', array('jquery'), '', true );
  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri() . "/js/jquery-3.1.1.min.js", false, null);
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'landislife_theme_js');




// function SearchFilter($query) {
//   if ($query->is_search) {
//     $query->set('post_type', array('grants'));
//   }
//   return $query;
// }
// add_filter('pre_get_posts', 'SearchFilter');

// ?>