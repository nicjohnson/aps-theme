<?php get_header(); ?>

<div class="row single">
  <div class="span3 hidden-phone">
    <ul class="unstyled taxonomy-list sans">
      <?php 
        $args = array('title_li' => '');
        wp_list_categories( $args ); 
      ?>
    </ul>
  </div>
  <div class="span9">
  <?php if ( have_posts() ) : ?>
    <h3><?php 
      $catid = $wp_query->query_vars['cat'];
      $cat_family = array_reverse(explode(',', get_category_parents($catid, false, ',')));
      echo ($cat_family[2]) ? $cat_family[2].' <span class="separator">></span> ' : '';
      echo $cat_family[1]; ?></h3>
    <ul class="unstyled stacked">
    <?php while ( have_posts() ) : the_post(); ?>
      <li><a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    </ul>
  <?php else : ?>
    <p>nope</p>
  <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>