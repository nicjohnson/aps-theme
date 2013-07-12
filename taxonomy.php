<?php get_header(); ?>

<?php 
  $taxonomy = get_query_var('taxonomy');
  $the_tax = get_taxonomy($taxonomy)->labels->name;
  $queried_term = get_query_var($taxonomy);
  $terms = get_terms($taxonomy, 'slug='.$queried_term);
?>

<div class="row single">
  <div class="span3 hidden-phone">
    <ul class="unstyled taxonomy-list sans">
      <?php
        $args = array(
          'title_li' => '',
          'taxonomy' => $taxonomy,
        );
        wp_list_categories( $args ); 
      ?>
    </ul>
  </div>
  <div class="span9">
  <?php if ( have_posts() ) : ?>

    <div class="stacked">
      <h2>
      <?php
        echo $the_tax;
        if ($terms) {
          foreach($terms as $term) {
            echo  '<span class="separator">:</span> ' . $term->name;
          }
        }
      ?>
      </h2>
      <ul class="unstyled stacked">
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