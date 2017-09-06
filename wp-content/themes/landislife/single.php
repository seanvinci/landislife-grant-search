<?php get_header(); ?>

<section>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <h1><?php the_title(); ?></h1>
  <p><?php the_content(); ?></p>

<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</section>

<?php include('partials/contact-block.php'); ?>
<?php get_footer(); ?>