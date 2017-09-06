<?php
/**
 * Plugin Name:       Land is Life Functionality
 * Plugin URI:        http://www.landislife.org
 * Description:       Custom functionality plugin for Land is Life
 * Version:           1.0
 * Author:            Land is Life
 * Author URI:        http://www.landislife.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 // If this file is called directly, abort.
if (!defined( 'WPINC' )) {
  die;
}

require_once('includes/landislife-add-body-classes.php');
require_once('includes/landislife-register-post-types.php');
require_once('includes/landislife-register-taxonomies.php');
require_once('includes/landislife-custom-admin-menu.php');
require_once('includes/landislife-clean-up-head.php');
require_once('includes/landislife-clean-up-default-classes.php');
require_once('includes/landislife-custom-content-editor.php');
require_once('includes/landislife-custom-login.php');
require_once('includes/landislife-remove-default-image-linkage.php');
require_once('includes/landislife-widgets.php');
require_once('includes/landislife-pagination.php');

?>