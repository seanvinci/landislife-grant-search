<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ($query->have_posts()): ?>

<div class="grant-results">
  <div class="row">
    <div class="topline-1px-dark"></div>
    <div class="medium-7 columns">
      <?php if ($query->found_posts) {
        echo '<h3><span>Results - '.$query->found_posts;
        echo ' Grant';
        if ($query->found_posts > 1) {
          echo 's';
        }
        echo '</span></h3>';
        } ?>
    </div>
    <div class="medium-5 columns small-hide medium-show">
      <nav class="pagination right">
        <?php lil_pagination($query->max_num_pages); ?>
      </nav>
    </div>
  </div>
  
  <?php

  echo '<div class="grant-results-content row">';
  echo '<ul>';

  while ($query->have_posts()):
    $query->the_post();
    $theme_term_no_link = get_the_term_list( get_the_ID(), 'theme', '', ', ', '' ) ;
    $region_term_no_link = get_the_term_list( get_the_ID(), 'region', '', ', ', '' ) ;
    $year_term_no_link = get_the_term_list( get_the_ID(), 'year', '', ', ', '' ) ;
  ?>
  <li class="medium-6 large-4 columns">
    <figure>
      <?php if (has_post_thumbnail()) { the_post_thumbnail("large"); } ?>
      <figcaption>
        <h4><?php echo the_title(); ?></h4>
        <?php the_content(); ?>
      </figcaption>
    </figure>
  </li>
  <?php endwhile;
  
  echo '</ul>';
  echo '</div>';

  ?>

<?php else: ?>

<div class="row">
  <div class="medium-7 columns">
    <h3><span>Results - 0 Grants</span></h3>
  </div>
</div>

<?php endif; ?>

<div class="row">
  <div class="columns">
    <nav class="pagination">
      <?php lil_pagination($query->max_num_pages); ?>
    </nav>
  </div>
</div>

</div>