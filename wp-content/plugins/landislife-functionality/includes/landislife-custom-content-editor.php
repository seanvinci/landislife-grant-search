<?php

// Content editor first line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons') ){
  function base_extended_editor_mce_buttons($buttons) {
    $post_id = $_GET['post'];
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file == 'faq-template.php') {
      return array('bold', 'italic', 'link', 'unlink', 'removeformat');
    } else {
      return array('bold', 'italic', 'link', 'unlink', 'alignleft', 'aligncenter', 'alignright', 'bullist', 'removeformat', 'fullscreen');
    }
  }
  add_filter("mce_buttons", "base_extended_editor_mce_buttons", 0);
}


// Content editor second line toolbar customizations
if( !function_exists('base_extended_editor_mce_buttons_2') ){
  function base_extended_editor_mce_buttons_2($buttons) {
    // Remove second line toolbar
    return array();
  }
  add_filter("mce_buttons_2", "base_extended_editor_mce_buttons_2", 0);
}

?>