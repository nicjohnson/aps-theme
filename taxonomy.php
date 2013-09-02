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

    <div class="stacked">
      <h2>
      <?php
        echo $taxonomyName;
        if ($terms) {
          foreach($terms as $term) {
            echo  '<span class="separator">:</span> ' . $term->name;
          }
        }
      ?>
      </h2>

      <?php
        if (function_exists('z_taxonomy_image_url')) {
          $catImage = z_taxonomy_image_url();
          if (!empty($catImage)) {
      ?>
      
      <img src="<?php echo z_taxonomy_image_url(); ?>">
      
      <?php }} ?>

      <ul class="list-unstyled stacked">
    <?php while ( have_posts() ) : the_post(); ?>
        <li><a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
      </ul>
    </div>
  <?php else : ?>
    <p>nope</p>
  <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>