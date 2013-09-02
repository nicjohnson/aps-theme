<?php get_header(); ?>

<?php 
  $taxonomySlug = get_query_var('taxonomy');
  $taxonomyName = get_taxonomy($taxonomySlug)->labels->name;
  $queried_term = get_query_var($taxonomySlug);
  $terms = get_terms($taxonomySlug, 'slug='.$queried_term);
?>

<div class="row single">
  <div class="col-md-3 hidden-phone">
    <ul class="list-unstyled taxonomy-list sans">
      <?php
        $args = array(
          'title_li' => '',
          'taxonomy' => $taxonomySlug,
        );
        wp_list_categories( $args ); 
      ?>
    </ul>
  </div>
  <div class="col-md-9">
  <?php if ( have_posts() ) : ?>

      <h3>
      <?php
        echo $taxonomyName;
        if ($terms) {
          foreach($terms as $term) {
            echo  '<span class="separator">:</span> ' . $term->name;
          }
        }
      ?>
      </h3>

      <?php
        if (function_exists('z_taxonomy_image_url')) {
          $catImage = z_taxonomy_image_url();
          if (!empty($catImage)) {
      ?>
      
      <!-- <img src="<?php echo z_taxonomy_image_url(); ?>"> -->
      
      <?php }} ?>

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
            <small>by</small> <?php echo get_the_term_list( $post->ID, 'manufacturers', '', ', ', '' ); ?>
            <small><?php if(get_field('model_number')){ ?> – Model: <?php the_field('model_number'); ?><?php } ?></small>
          </h5>
          <p class="sans"><small><?php echo get_the_term_list( $post->ID, 'category', 'Categories: ', ', ', '' ); ?></small></p>
          <p><small><?php the_field('summary'); ?></small></p>
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