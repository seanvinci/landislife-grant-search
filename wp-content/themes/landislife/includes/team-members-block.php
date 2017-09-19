<?php
// vars
$team_members_header = get_field('team_members_header');
$team_members_subheader = get_field('team_members_subheader');

if (have_rows('team_members')): ?>
<section class="global-team-block content-block-top content-block-bottom purple-bg">
  <div class="row">
    <div class="large-8 large-push-2 columns tac">
      <?php if ($team_members_header) echo '<h2>'.$team_members_header.'</h2>'; ?>
      <?php if ($team_members_subheader) echo '<p class="subheader">'.$team_members_subheader.'</p>'; ?>
      <ul class="inline-list medium-up-2 columns">
        <?php while (have_rows('team_members')): the_row();
          // vars
          $team_member_image = get_sub_field('team_member_image');
          $team_member_name = get_sub_field('team_member_name');
          $team_member_title = get_sub_field('team_member_title');
          $team_member_bio = get_sub_field('team_member_bio');
        ?>
        <li class="columns">
          <figure>
            <div class="global-team-image">
              <img src="<?php echo $team_member_image; ?>" alt="">
            </div>
            <figcaption>
              <h3><strong><?php echo $team_member_name; ?></strong></h3>
              <h4><?php echo $team_member_title; ?></h4>
              <p><?php echo $team_member_bio; ?></p>
            </figcaption>
          </figure>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</section>
<?php endif; ?>