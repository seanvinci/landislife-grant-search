<?php
// masthead vars
$heading = get_field('masthead_heading');
$subheading = get_field('masthead_subheading');
$body_copy = get_field('masthead_body_copy');
// grants to date vars
$grants_num = get_field('grants_num');
$countries_num = get_field('countries_num');
$ip_groups_num = get_field('ip_groups_num');
?>

<section class="masthead" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/casestudy-1-61_1600x1067.jpg');">
  <div class="masthead-inner nav-height">
    <?php if ($heading || $subheading): ?>
    <div class="row">
      <div class="small-12 large-10 large-push-1 columns">
        <?php if ($heading) echo '<h1>'.$heading.'</h1>'; ?>
        <?php if ($subheading) echo '<h2>'.$subheading.'</h2>'; ?>
        <?php if ($body_copy) echo '<div class="subheader"><p>'.$body_copy.'</p></div>'; ?>
      </div>
    </div>
    <?php endif; ?>
    <?php if ($grants_num && $countries_num && $ip_groups_num): ?>
    <div class="grant-counter row">
      <div class="columns">
        <h3>Grants to Date</h3>
      </div>
      <div class="columns">
        <ul class="inline-list">
          <li>
            <div>
              <div class="grant-label">Grants</div>
              <div class="grant-number"><?php echo $grants_num; ?></div>
            </div>
          </li>
          <li>
            <div>
              <div class="grant-label">Countries</div>
              <div class="grant-number"><?php echo $countries_num; ?></div>
            </div>
          </li>
          <li>
            <div>
              <div class="grant-label">IP Groups</div>
              <div class="grant-number"><?php echo $ip_groups_num; ?></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>