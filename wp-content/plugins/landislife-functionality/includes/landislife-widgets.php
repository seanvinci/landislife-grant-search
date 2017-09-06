<?php

/***************************/
/**** REGISTER WIDGETS *****/
/***************************/

function register_widget_areas() {

  // Summer Academy Call Out
  register_sidebar(array(
    'name'          => __('Summer Academy Call Out'),
    'id'            =>'sa-call-out',
    'description'   => __('Add widgets here to appear in the Summer Academy call out section.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

  // Explorations Course Info
  register_sidebar(array(
    'name'          => __('Explorations Course Info'),
    'id'            =>'explorations-call-out',
    'description'   => __('Add widgets here to appear in the "What\'s an Exploration?" section.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

  // Intensives Course Info
  register_sidebar(array(
    'name'          => __('Intensives Course Info'),
    'id'            =>'intensives-call-out',
    'description'   => __('Add widgets here to appear in the "What\'s an Intensive?" section.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

  // Upcoming Events Block
  register_sidebar(array(
    'name'          => __('Upcoming Events Block'),
    'id'            =>'upcoming-events-block',
    'description'   => __('Add widgets here to appear in the Upcoming Events block.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

  // Apply Block
  register_sidebar(array(
    'name'          => __('Apply Block'),
    'id'            =>'apply-block',
    'description'   => __('Add widgets here to appear in the Apply block.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

  // Quote Block
  register_sidebar(array(
    'name'          => __('Quote Block'),
    'id'            =>'quote-block',
    'description'   => __('Add widgets here to appear in the Quote block.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

  // More Info Block
  register_sidebar(array(
    'name'          => __('More Info Block'),
    'id'            =>'more-info-block',
    'description'   => __('Add widgets here to appear in the More Info block.'),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>'
  ));

} add_action( 'widgets_init', 'register_widget_areas' );



/***************************/
/***** CREATE WIDGETS ******/
/***************************/

// Video Feature
add_action( 'widgets_init', function(){
  register_widget( 'video_feature' );
}); 

class video_feature extends WP_Widget {

  function __construct() {
    parent::__construct(
      'video_feature',
      __('Video Feature'),
      array(
        'description' => __( 'Display a featured video.')
      )
    );
  }

  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $title = get_field('title', 'widget_' . $widget_id);
    $video_description = get_field('video_description', 'widget_' . $widget_id);
    $video_url = get_field('video_url', 'widget_' . $widget_id);
    $background_color = get_field('background_color', 'widget_' . $widget_id);
    $cta_text = get_field('cta_text', 'widget_' . $widget_id);
    $cta_url = get_field('cta_url', 'widget_' . $widget_id);

    ?>
    <section class="content-block" id="featvideo">
      <div class="row">
        <div class="columns">
          <h2 class="mb30px"><?php echo $title; ?></h2>
        </div>
      </div>
      <div class="row">
        <div class="large-8 columns">
          <div class="video mb15px"><?php echo $video_url; ?></div>
        </div>
        <div class="large-4 columns">
          <p><?php echo $video_description; ?></p>
          <a class="button red-button" href="<?php echo $cta_url; ?>"><?php echo $cta_text; ?></a>
        </div>
      </div>
    </section>
    <?php
  }

  public function form ($instance) { ?>&nbsp;<?php }

  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }

}


// Text with CTA
add_action( 'widgets_init', function(){
  register_widget( 'text_with_cta' );
});

class text_with_cta extends WP_Widget {

  function __construct() {
    parent::__construct(
      'text_with_cta',
      __('Text with CTA'),
      array(
        'description' => __( 'Display text and a call to action.')
      )
    );
  }

  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $title = get_field('title', 'widget_' . $widget_id);
    $description = get_field('description', 'widget_' . $widget_id);
    $cta_text = get_field('cta_text', 'widget_' . $widget_id);
    $cta_url = get_field('cta_url', 'widget_' . $widget_id);
    ?>
    <section class="content-block-small black-bg" id="feattext">
      <div class="row">
        <div class="medium-10 medium-push-1 columns tac">
          <h4 class="mb15px"><?php echo $title; ?></h4>
          <p class="mb20px"><?php echo $description; ?></p>
          <a class="button white-button outline-button nomar" href="<?php echo $cta_url; ?>"><?php echo $cta_text; ?></a>
        </div>
      </div>
    </section>
    <?php
  }

  public function form ($instance) { ?>&nbsp;<?php }

  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }

}


// Upcoming Events
add_action( 'widgets_init', function(){
  register_widget( 'upcoming_events_block' );
}); 

class upcoming_events_block extends WP_Widget {

  function __construct() {
    parent::__construct(
      'upcoming_events_block',
      __('Upcoming Events Block'),
      array(
        'description' => __( 'Display upcoming events.')
      )
    );
  }

  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $section_heading = get_field('upcoming_events_sec_heading', 'widget_' . $widget_id);

    if (have_rows('upcoming_events_block', 'widget_' . $widget_id)): ?>
    <section class="upcoming-events-block content-block lightgray-bg" id="upcomingevents">
      <div class="row">
        <div class="columns">
          <h2 class="mb30px"><?php echo $section_heading; ?></h2>
        </div>
      </div>
      <div class="row">
        <?php while (have_rows('upcoming_events_block', 'widget_' . $widget_id)): the_row();
          $event_img = get_sub_field('upcoming_event_img', 'widget_' . $widget_id);
          $event_title = get_sub_field('upcoming_event_title', 'widget_' . $widget_id);
          $event_date = get_sub_field('upcoming_event_date', 'widget_' . $widget_id);
          $event_time = get_sub_field('upcoming_event_time', 'widget_' . $widget_id);
          $event_desc = get_sub_field('upcoming_event_desc', 'widget_' . $widget_id);
          $event_cta_text = get_sub_field('upcoming_event_cta_text', 'widget_' . $widget_id);
          $event_cta_url = get_sub_field('upcoming_event_cta_url', 'widget_' . $widget_id);
        ?>
        <div class="upcoming-event medium-6 columns mb20px">
          <a href="<?php echo $event_cta_url; ?>">
            <div class="img-block overlay mb20px" style="background-image: url('<?php echo $event_img; ?>');">
              <div>
                <h3><?php echo $event_title; ?></h3>
                <p><?php echo $event_date . ' <span>|</span> ' . $event_time; ?></p>
              </div>
            </div>
          </a>
          <div class="columns nopad">
            <p><?php echo $event_desc; ?></p>
            <a class="button red-button" href="<?php echo $event_cta_url; ?>"><?php echo $event_cta_text; ?></a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </section>
    <?php endif; ?>
    <?php
  }

  public function form ($instance) { ?>&nbsp;<?php }

  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }

}


// Apply Block
add_action( 'widgets_init', function(){
  register_widget( 'apply_block' );
}); 

class apply_block extends WP_Widget {

  function __construct() {
    parent::__construct(
      'apply_block',
      __('Apply Block'),
      array(
        'description' => __( 'Display apply block.')
      )
    );
  }

  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $apply_heading = get_field('apply_heading', 'widget_' . $widget_id);
    $apply_subheading = get_field('apply_subheading', 'widget_' . $widget_id);

    $number_of_buttons = get_field('number_of_buttons', 'widget_' . $widget_id);

    // Button type select
    $btn_type_1 = get_field('btn_type_1', 'widget_' . $widget_id);

    // Standard button
    $btn_text_standard_1 = get_field('btn_text_standard_1', 'widget_' . $widget_id);
    $btn_url_standard_1 = get_field('btn_url_standard_1', 'widget_' . $widget_id);

    // Notify Me Button
    $btn_text_notify_1 = get_field('btn_text_notify_1', 'widget_' . $widget_id);
    $modal_msg_body_notify_1 = get_field('modal_msg_body_notify_1', 'widget_' . $widget_id);
    $modal_submit_btn_text_notify_1 = get_field('modal_submit_btn_text_notify_1', 'widget_' . $widget_id);

    // Generic Modal Button
    $btn_text_gen_1 = get_field('btn_text_gen_1', 'widget_' . $widget_id);
    $modal_msg_body_gen_1 = get_field('modal_msg_body_gen_1', 'widget_' . $widget_id);
    $modal_btn_text_gen_1 = get_field('modal_btn_text_gen_1', 'widget_' . $widget_id);
    $modal_btn_url_gen_1 = get_field('modal_btn_url_gen_1', 'widget_' . $widget_id);

    // Button type select
    $btn_type_2 = get_field('btn_type_2', 'widget_' . $widget_id);

    // Standard button
    $btn_text_standard_2 = get_field('btn_text_standard_2', 'widget_' . $widget_id);
    $btn_url_standard_2 = get_field('btn_url_standard_2', 'widget_' . $widget_id);

    // Notify Me Button
    $btn_text_notify_2 = get_field('btn_text_notify_2', 'widget_' . $widget_id);
    $modal_msg_body_notify_2 = get_field('modal_msg_body_notify_2', 'widget_' . $widget_id);
    $modal_submit_btn_text_notify_2 = get_field('modal_submit_btn_text_notify_2', 'widget_' . $widget_id);

    // Generic Modal Button
    $btn_text_gen_2 = get_field('btn_text_gen_2', 'widget_' . $widget_id);
    $modal_msg_body_gen_2 = get_field('modal_msg_body_gen_2', 'widget_' . $widget_id);
    $modal_btn_text_gen_2 = get_field('modal_btn_text_gen_2', 'widget_' . $widget_id);
    $modal_btn_url_gen_2 = get_field('modal_btn_url_gen_2', 'widget_' . $widget_id);
    ?>
    <section class="content-block white-bg clearfix" id="applyblock">
      <div class="row">
        <div class="medium-10 medium-push-1 columns tac">
          <h2><?php echo $apply_heading; ?></h2>
          <p class="subheader"><?php echo $apply_subheading; ?></p>
          <?php if ($number_of_buttons == '1'): ?>
          <div class="columns">
          <?php if ($btn_type_1 == 'standard_btn_1'): ?>
            <a class="button red-button" href="<?php echo $btn_url_standard_1; ?>"><?php echo $btn_text_standard_1; ?></a>
          <?php elseif ($btn_type_1 == 'notify_me_btn_1'): ?>
            <button class="button red-button modal-trigger"><?php echo $btn_text_notify_1; ?></a>
          <?php elseif ($btn_type_1 == 'gen_modal_btn_1'): ?>
            <button class="button red-button modal-trigger"><?php echo $btn_text_gen_1; ?></a>
          <?php endif; ?>
          </div>

          <?php if ($btn_type_1 == 'notify_me_btn_1'): ?>
          <div class="modal-overlay">
            <div class="row">
              <div class="columns mb30px">
                <?php echo $modal_msg_body_notify_1; ?>
              </div>
              <div class="columns nopad">
                <form class="contact-form notify-form" id="contactForm" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
                  <input class="offscreen" type=hidden name="oid" value="00D37000000Jh2G">
                  <input class="offscreen" type=hidden name="retURL" value="<?php echo home_url(); ?>/thanks">
                  <select class="offscreen" name="00N37000004Nx9N" id="00N37000004Nx9N" multiple="multiple">
                    <option value="<?php the_title(); ?>" selected><?php the_title(); ?></option>
                  </select>
                  <fieldset>
                    <label class="small-12 medium-6 columns" for="first_name">
                      <div class="input-text">First Name<small>*</small></div>
                      <div class="input-wrap">
                        <input id="first_name" name="first_name" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="last_name">
                      <div class="input-text">Last Name<small>*</small></div>
                      <div class="input-wrap">
                        <input id="last_name" name="last_name" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="email">
                      <div class="input-text">Email<small>*</small></div>
                      <div class="input-wrap">
                        <input id="email" name="email" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="phone">
                      <div class="input-text">Phone Number</div>
                      <div class="input-wrap">
                        <input id="phone" name="phone" type="text">
                      </div>
                    </label>
                  </fieldset>
                  <div class="columns">
                    <button class="button red-button" type="submit"><?php echo $modal_submit_btn_text_notify_1; ?></button>
                  </div>
                </form>
              </div>
              <button class="close-x" type="button"></button>
            </div>
          </div>
          <?php elseif ($btn_type_1 == 'gen_modal_btn_1'): ?>
          <div class="modal-overlay">
            <div class="columns">
              <?php echo $modal_msg_body_gen_1; ?>
              <a class="button red-button" href="<?php echo $modal_btn_url_gen_1; ?>"><?php echo $modal_btn_text_gen_1; ?></a>
              <button class="close-x" type="button"></button>
            </div>
          </div>
          <?php endif; ?>


          <?php elseif ($number_of_buttons == '2'): ?>

          <div class="medium-6 columns small-tac medium-tar">
          <?php if ($btn_type_1 == 'standard_btn_1'): ?>
            <a class="button red-button" href="<?php echo $btn_url_standard_1; ?>"><?php echo $btn_text_standard_1; ?></a>
          <?php elseif ($btn_type_1 == 'notify_me_btn_1'): ?>
            <button class="button red-button modal-trigger"><?php echo $btn_text_notify_1; ?></a>
          <?php elseif ($btn_type_1 == 'gen_modal_btn_1'): ?>
            <button class="button red-button modal-trigger"><?php echo $btn_text_gen_1; ?></a>
          <?php endif; ?>
          </div>

          <?php if ($btn_type_1 == 'notify_me_btn_1'): ?>
          <div class="modal-overlay">
            <div class="row">
              <div class="columns mb30px">
                <?php echo $modal_msg_body_notify_1; ?>
              </div>
              <div class="columns nopad">
                <form class="contact-form notify-form" id="contactForm" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
                  <input class="offscreen" type=hidden name="oid" value="00D37000000Jh2G">
                  <input class="offscreen" type=hidden name="retURL" value="<?php echo home_url(); ?>/thanks">
                  <select class="offscreen" name="00N37000004Nx9N" id="00N37000004Nx9N" multiple="multiple">
                    <option value="<?php the_title(); ?>" selected><?php the_title(); ?></option>
                  </select>
                  <fieldset>
                    <label class="small-12 medium-6 columns" for="first_name">
                      <div class="input-text">First Name<small>*</small></div>
                      <div class="input-wrap">
                        <input id="first_name" name="first_name" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="last_name">
                      <div class="input-text">Last Name<small>*</small></div>
                      <div class="input-wrap">
                        <input id="last_name" name="last_name" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="email">
                      <div class="input-text">Email<small>*</small></div>
                      <div class="input-wrap">
                        <input id="email" name="email" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="phone">
                      <div class="input-text">Phone Number</div>
                      <div class="input-wrap">
                        <input id="phone" name="phone" type="text">
                      </div>
                    </label>
                  </fieldset>
                  <div class="columns">
                    <button class="button red-button" type="submit"><?php echo $modal_submit_btn_text_notify_1; ?></button>
                  </div>
                </form>
              </div>
              <button class="close-x" type="button"></button>
            </div>
          </div>
          <?php elseif ($btn_type_1 == 'gen_modal_btn_1'): ?>
          <div class="modal-overlay">
            <div class="columns">
              <?php echo $modal_msg_body_gen_1; ?>
              <a class="button red-button" href="<?php echo $modal_btn_url_gen_1; ?>"><?php echo $modal_btn_text_gen_1; ?></a>
              <button class="close-x" type="button"></button>
            </div>
          </div>
          <?php endif; ?>

          <div class="medium-6 columns small-tac medium-tal">
          <?php if ($btn_type_2 == 'standard_btn_2'): ?>
            <a class="button red-button" href="<?php echo $btn_url_standard_2; ?>"><?php echo $btn_text_standard_2; ?></a>
          <?php elseif ($btn_type_2 == 'notify_me_btn_2'): ?>
            <button class="button red-button modal-trigger"><?php echo $btn_text_notify_2; ?></a>
          <?php elseif ($btn_type_2 == 'gen_modal_btn_2'): ?>
            <button class="button red-button modal-trigger"><?php echo $btn_text_gen_2; ?></a>
          <?php endif; ?>
          </div>

          <?php if ($btn_type_2 == 'notify_me_btn_2'): ?>
          <div class="modal-overlay">
            <div class="row">
              <div class="columns mb30px">
                <?php echo $modal_msg_body_notify_2; ?>
              </div>
              <div class="columns nopad">
                <form class="contact-form notify-form" id="contactForm" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
                  <input class="offscreen" type=hidden name="oid" value="00D37000000Jh2G">
                  <input class="offscreen" type=hidden name="retURL" value="<?php echo home_url(); ?>/thanks">
                  <select class="offscreen" name="00N37000004Nx9N" id="00N37000004Nx9N" multiple="multiple">
                    <option value="<?php the_title(); ?>" selected><?php the_title(); ?></option>
                  </select>
                  <fieldset>
                    <label class="small-12 medium-6 columns" for="first_name">
                      <div class="input-text">First Name<small>*</small></div>
                      <div class="input-wrap">
                        <input id="first_name" name="first_name" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="last_name">
                      <div class="input-text">Last Name<small>*</small></div>
                      <div class="input-wrap">
                        <input id="last_name" name="last_name" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="email">
                      <div class="input-text">Email<small>*</small></div>
                      <div class="input-wrap">
                        <input id="email" name="email" type="text">
                      </div>
                    </label>
                    <label class="small-12 medium-6 columns" for="phone">
                      <div class="input-text">Phone Number</div>
                      <div class="input-wrap">
                        <input id="phone" name="phone" type="text">
                      </div>
                    </label>
                  </fieldset>
                  <div class="columns">
                    <button class="button red-button" type="submit"><?php echo $modal_submit_btn_text_notify_2; ?></button>
                  </div>
                </form>
              </div>
              <button class="close-x" type="button"></button>
            </div>
          </div>
          <?php elseif ($btn_type_2 == 'gen_modal_btn_2'): ?>
          <div class="modal-overlay">
            <div class="columns">
              <?php echo $modal_msg_body_gen_2; ?>
              <a class="button red-button" href="<?php echo $modal_btn_url_gen_2; ?>"><?php echo $modal_btn_text_gen_2; ?></a>
              <button class="close-x" type="button"></button>
            </div>
          </div>
          <?php endif; ?>

          <?php endif; ?>
        </div>
      </div>
    </section>
    <?php
  }

  public function form ($instance) { ?>&nbsp;<?php }

  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }

}


// Quote Block
add_action( 'widgets_init', function(){
  register_widget( 'quote_block' );
}); 

class quote_block extends WP_Widget {

  function __construct() {
    parent::__construct(
      'quote_block',
      __('Quote Block'),
      array(
        'description' => __( 'Display a quote block.')
      )
    );
  }

  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];
    $quote_image = get_field('quote_image', 'widget_' . $widget_id);
    $quote_heading = get_field('quote_heading', 'widget_' . $widget_id);
    $quote_author = get_field('quote_author', 'widget_' . $widget_id);
    $quote_body = get_field('quote_body', 'widget_' . $widget_id);
    $quote_button_text = get_field('quote_button_text', 'widget_' . $widget_id);
    $quote_button_url = get_field('quote_button_url', 'widget_' . $widget_id);
    ?>
    <section class="quote-block content-block white-bg" id="quoteblock">
      <div class="row collapse medium-uncollapse">
        <figure class="columns">
          <span class="img-block" style="background-image: url('<?php echo $quote_image; ?>');"></span>
          <figcaption>
            <div class="columns">
              <blockquote class="tac">
                <?php if ($quote_heading) { echo '<header><h4>'.$quote_heading.'</h4></header>'; } ?>
                <?php if ($quote_body) { echo '<p>'.$quote_body.'</p>'; } ?>
                <?php if ($quote_author || $quote_button_text): ?>
                <footer>
                  <?php if ($quote_author) { echo '<cite>'.$quote_author.'</cite>'; } ?>
                  <?php if ($quote_button_text) { echo '<a class="button darkgray-button outline-button" href="'.$quote_button_url.'">'.$quote_button_text.'</a>'; } ?>
                </footer>
                <?php endif; ?>
              </blockquote>
            </div>
          </figcaption>
        </figure>
      </div>
    </section>
    <?php
  }

  public function form ($instance) { ?>&nbsp;<?php }

  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }

}


// Upcoming Events
add_action( 'widgets_init', function(){
  register_widget( 'more_info_block' );
}); 

class more_info_block extends WP_Widget {

  function __construct() {
    parent::__construct(
      'more_info_block',
      __('More Info Block'),
      array(
        'description' => __( 'Display a More Info Block.')
      )
    );
  }

  public function widget ($args, $instance) {
    $widget_id = $args['widget_id'];

    if (have_rows('more_info_boxes', 'widget_' . $widget_id)): ?>
    <section class="more-info-block content-block black-bg" id="moreinfo">
      <div class="row">
        <div class="columns">
          <h2 class="mb30px">More Information</h2>
        </div>
        <div class="columns">
          <ul>
            <?php while (have_rows('more_info_boxes', 'widget_' . $widget_id)): the_row();
              $more_info_box_text = get_sub_field('more_info_box_text', 'widget_' . $widget_id);
              $more_info_box_url = get_sub_field('more_info_box_url', 'widget_' . $widget_id);
              $more_info_box_class = get_sub_field('more_info_box_class', 'widget_' . $widget_id);
            ?>
            <li><?php echo '<a '; if ($more_info_box_class){echo 'class="'.$more_info_box_class.'"';}echo 'href="'.$more_info_box_url.'">'.$more_info_box_text.'</a>';?></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </section>
    <?php endif; ?>
    <?php
  }

  public function form ($instance) { ?>&nbsp;<?php }

  public function update ($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']): '';
    return $instance;
  }

}

?>