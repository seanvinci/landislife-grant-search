<?php

function lil_pagination($pages = '', $range = 2) {
  $showitems = ($range * 2)+1;

  global $paged;
  
  if (empty($paged)) $paged = 1;

  if ($pages == '') {
    global $wp_query;
    
    $pages = $wp_query->max_num_pages;
    
    if (!$pages) {
      $pages = 1;
    }
  }

  if (1 != $pages) {
    
    echo '<ul class="inline-list">';

    if ($paged > 1 && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($paged - 1).'"><span class="offscreen">Previous</span>◄</a></li>';

    if ($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li><a href="'.get_pagenum_link(1).'">...</a></li>';

    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
        echo ($paged == $i)? '<li class="pagi-current"><div>'.$i.'</div></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a></li>';
      }
    }

    if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($pages).'">...</a></li>';

    if ($paged < $pages && $showitems < $pages) echo '<li><a href="'.get_pagenum_link($paged + 1).'"><span class="offscreen">Next</span>&#9658;</a></li>';

    echo '</ul>';

  }
}

?>