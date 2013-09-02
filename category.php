<?php get_header(); ?>

<div class="row single">
  <div class="col-md-3 hidden-phone">
    <ul class="list-unstyled taxonomy-list sans">
      <?php 
        $args = array('title_li' => '', 'show_count' => true);
        wp_list_categories( $args ); 
      ?>
    </ul>
  </div>
  <div class="col-md-9">
  <?php if ( have_posts() ) : ?>
    <h3><?php 
      $catid = $wp_query->query_vars['cat'];
      $cat_family = get_categories(array('parent' => $catid));
      $cat_family_reversed = array_reverse(explode(',', get_category_parents($catid, false, ',')));
      echo ($cat_family_reversed[4]) ? $cat_family_reversed[4].' <span class="separator">></span> ' : '';
      echo ($cat_family_reversed[3]) ? $cat_family_reversed[3].' <span class="separator">></span> ' : '';
      echo ($cat_family_reversed[2]) ? $cat_family_reversed[2].' <span class="separator">></span> ' : '';
      echo $cat_family_reversed[1]; ?>
      <small><?php echo get_category($catid)->count . ' '; echo (get_category($catid)->count == 1) ? item : items ?></small>
    </h3>

      <?php
        if (function_exists('z_taxonomy_image_url')) {
          $catImage = z_taxonomy_image_url();
          if (!empty($catImage)) {
      ?>

      
      <!-- <img src="<?php echo z_taxonomy_image_url(); ?>"> -->
      
      <?php }} ?>

    <ul class="list-unstyled">
      <?php wp_list_categories(array('title_li' => '', 'child_of' => $catid, 'show_count' => true, 'show_option_none' => '', 'depth' => 1)); ?>
    </ul>

    <ul class="list-unstyled detail-list">
    <?php while ( have_posts() ) : the_post(); ?>
      <li class="clearfix">
        <?php
          $the_image = ''; 
          if (get_field('feature_image')) {
            $the_image = get_field('feature_image');
          } else {
            $the_image = get_bloginfo('template_directory') . '/img/missing-image.png';
          }
        ?>
        <img class="pull-left" src="<?php echo $the_image ?>" alt="">
        <div class="item-content">
          <h5>
            <a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            by <?php echo get_the_term_list( $post->ID, 'manufacturers', '', ', ', '' ); ?>
            <small><?php if(get_field('model_number')){ ?>(Model #: <?php the_field('model_number'); ?>)<?php } ?></small>
          </h5>
          <p><small><?php the_field('description'); ?></small></p>
        </div>
      </li>
    <?php endwhile; ?>
    </ul>
  <?php else : ?>
    <p>nope</p>
  <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>