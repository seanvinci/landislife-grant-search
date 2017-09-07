<?php

// LOGIN SCREEN

// Change login image
add_action("login_head", "my_login_head");
function my_login_head() {
  echo "
  <style>
    /* Replace Login Logo */
    body.login h1 a {
      background-image: url('".home_url()."/wp-content/themes/landislife/img/logos/land_is_life_logo_vertical_black.svg');
      height: 14rem;
      width: 14rem;
      background-size: 100%;
    }
  </style>
  ";
}

// Change title for login screen
add_filter('login_headertitle', create_function(false,"return 'URL Title';"));

// Change url for login screen
add_filter('login_headerurl', create_function(false,"return home_url();"));

?>