<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>
  <div class="row single">
    <div class="span2 hidden-phone">
      <h4>Sidebar?</h4>
    </div>
    <div class="span10">
      <h2><?php the_title(); ?></h2>
      <ul class="product-taxonomy sans unstyled">
        <li>Model Number: <?php echo get_post_meta( get_the_ID(), 'model-number', true ); ?></li>
        <li><?php echo get_the_term_list( $post->ID, 'applications', 'Applications: ', ', ', '' ); ?></li>
        <li><?php echo get_the_term_list( $post->ID, 'manufacturers', 'Manufacturers: ', ', ', '' ); ?></li>
        <!-- <li><?php echo get_the_term_list( $post->ID, 'category', 'Categories: ', ', ', '' ); ?></li> -->
        <li>Categories: <?php
       $cat_Id = get_the_category($post->ID);
       $categories = get_category_parents( $cat_Id[0], true, ' > ' );
       $title = get_the_title();
       echo substr($categories, 0, strlen($categories) -3 );
    ?></li>
      </ul>
      <h3>Description</h3>
      <?php echo get_post_meta( get_the_ID(), 'description', true ); ?>


      <div class="row">
        <div class="span5">
          <h3>Features</h3>
          <?php echo get_post_meta( get_the_ID(), 'features', true ); ?>
        </div>
        <div class="span5">
          <?php if (function_exists('wpba_attachments_exist')) { ?>
          <?php if (wpba_attachments_exist()) { ?>
            <h3>Attachments</h3>
            <?php echo wpba_attachment_list(array(show_icon => false, float_class => '', open_new_window => true));  ?>
          <?php } ?>
          <?php } ?>
        </div>
      </div>
      <?php the_content(); ?>
    <?php endwhile; ?>
    </div>
  </div>
<?php get_footer(); ?>