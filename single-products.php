<?php get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>
  <div class="row single">
    <div class="span3 hidden-phone">
      <ul class="nav nav-tabs sans">
          <li class="active"><a href="#features" data-toggle="tab">Features</a></li>
          <li><a href="#documents" data-toggle="tab">Documents</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="features">
            <?php the_field('features'); ?>
          </div>
          <div class="tab-pane" id="documents">
            <?php if (function_exists('wpba_attachments_exist')) { ?>
              <?php if (wpba_attachments_exist()) { ?>
                <?php echo wpba_attachment_list(array(show_icon => true, float_class => '', open_new_window => true));  ?>
              <?php } else { ?>
                <p>There are no documents available.</p>
              <?php } ?>
            <?php } ?>
          </div>
        </div>
    </div>
    <div class="span9">
      <h2><?php the_title(); ?></h2>
      <ul class="product-taxonomy sans unstyled">
        <li>Model Number: <?php the_field('model_number'); ?></li>
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
      <!-- <h3>Description</h3> -->
      <div class="description">
        <?php if(get_field('feature_image')) { ?>
          <img src="<?php the_field('feature_image'); ?>" alt="" class="pull-left">
        <?php } ?>
        <?php the_field('description'); ?>
      </div>

      <div>
        <!-- features and docs? -->
      </div>
      <?php the_content(); ?>
    <?php endwhile; ?>
    </div>
  </div>
<?php get_footer(); ?>