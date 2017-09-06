<?php

add_filter('body_class','my_class_names');
function my_class_names($classes) {
  global $post;
  $arr = array();
  $arr[] = 'preload';
  return $arr;
}

?>