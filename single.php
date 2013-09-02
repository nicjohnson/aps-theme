<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>
  <div class="row single">
    <div class="col-md-2 hidden-phone">
      <h4>Sidebar?</h4>
    </div>
    <div class="col-md-10">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    <?php endwhile; ?>
    </div>
  </div>
<?php get_footer(); ?>