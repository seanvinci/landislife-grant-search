<?php if (have_rows('foundations')): ?>
<section class="foundations-feature-block content-block-top content-block-bottom purple-bg">
  <div class="row">
    <div class="columns">
      <h4>Funding Foundations</h4>
    </div>
    <div class="medium-8 medium-pull-2 columns">
      <ul class="inline-list">
        <?php while (have_rows('foundations')): the_row();
          // vars
          $name = get_sub_field('foundation_name');
          $url = get_sub_field('foundation_url');
        ?>
        <?php echo '<li><a href="'.$url.'">'.$name.'</a></li>'; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</section>
<?php endif; ?>