<header class="nav-main">
  <div>
    <h1 class="nav-logo"><a href="javascript:;"><img src="<?php echo get_template_directory_uri(); ?>/img/logos/land_is_life_logo_horizontal_white.svg" alt="Land is Life"></a></h1>
    <nav>
      <?php
        $defaults = array(
          'theme_location' => 'primary-nav',
          'container'      => false,
          'items_wrap'     => '<ul class="level-1">%3$s</ul>',
          'walker'         => new Custom_Walker_Nav_Menu
        );
        wp_nav_menu($defaults);
      ?>
    </nav>
    <div class="nav-button"><a class="button red-button" href="javascript:;">Donate</a></div>
    <button class="nav-icon" type="button"><div></div></button>
  </div>
  <div class="nav-overlay"></div>
</header>