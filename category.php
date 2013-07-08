<?php get_header(); ?>

<pre><code><?php print_r($wp_query) ?></code></pre>

  <?php if ( have_posts() ) : ?>

    
      <ul class="unstyled stacked">
    <?php while ( have_posts() ) : the_post(); ?>
        <li><a class="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
      </ul>
    </div>
  <?php else : ?>
    <p>nope</p>
  <?php endif; ?>

<?php get_footer(); ?>