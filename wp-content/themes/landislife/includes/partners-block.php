<?php
// vars
$partners_header = get_field('partners_header');

if (have_rows('partners')): ?>
<section class="partners-feature-block content-block-top content-block-bottom red-bg">
  <div class="row">
    <div class="columns">
      <?php if ($partners_header) echo '<h4>'.$partners_header.'</h4>'; ?>
    </div>
    <div class="medium-8 medium-pull-2 columns">
      <ul class="inline-list">
        <?php while (have_rows('partners')): the_row();
          // vars
          $name = get_sub_field('partner_name');
          $url = get_sub_field('partner_url');
        ?>
        <?php echo '<li><a href="'.$url.'">'.$name.'</a></li>'; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</section>
<?php endif; ?>