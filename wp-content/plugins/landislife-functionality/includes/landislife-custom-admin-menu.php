<?php

/***************************/
/******* ADMIN MENU ********/
/***************************/

// Remove menu items from CMS menu
function remove_menus(){
  remove_menu_page('index.php');                                //Dashboard
  remove_menu_page('jetpack');                                  //Jetpack*
  remove_menu_page('edit.php');                                 //Posts
  remove_menu_page('edit-comments.php');                        //Comments

  if (!is_admin()) {
    remove_menu_page('plugins.php');                            //Plugins
    remove_menu_page('users.php');                              //Users
    remove_menu_page('options-general.php');                    //Settings
    remove_menu_page('tools.php');                              //Tools
    remove_menu_page('edit.php?post_type=acf-field-group');     //Advanced Custom Fields - Plugin
    remove_menu_page('admin.php?page=site-migration-export');   //All-in-One Site Migration - Plugin
  }
}
add_action( 'admin_menu', 'remove_menus' );


// Reorder menu items
function custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;

  return array(
    'edit.php?post_type=grants',      // Grants
    'edit.php?post_type=page',        // Pages
    'upload.php',                     // Media
    'separator1',                     // First separator
    'plugins.php',                    // Plugins
    'themes.php',                     // Appearance
    'users.php',                      // Users
    'options-general.php',            // Settings
    'tools.php',                      // Tools
    'separator-last',                 // Last separator
  );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');



// Set Default WP Theme Color
function set_default_admin_color($user_id) {
  $args = array(
    'ID' => $user_id,
    'admin_color' => 'midnight'
  );
  wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');


// Disable the user admin bar on public side on registration
add_action('user_register','trash_public_admin_bar');
function trash_public_admin_bar($user_ID) {
    update_user_meta( $user_ID, 'show_admin_bar_front', 'false' );
}

?>