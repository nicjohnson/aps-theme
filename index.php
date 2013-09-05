<?php

get_header(); ?>

    

<div class="hero">
    <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/hero.jpg">
</div>

<div class="row">
  <div class="col-md-4 col-sm-4">
    <h2><small>Browse by</small> Category</h2>
    <ul class="category-items list-unstyled">
<?php
$taxonomy = 'category';
foreach (get_terms($taxonomy) as $cat) {
  if (function_exists('z_taxonomy_image_url') && $cat->parent == '0') {
    $catImage = z_taxonomy_image_url($cat->term_id);
?>      
        <li> 
          <a href="<?php echo get_term_link($cat->slug, $taxonomy); ?>" title="<?php echo $cat->description; ?>"<?php if (!empty($catImage)) { ?> style="background-image: url(<?php echo z_taxonomy_image_url($cat->term_id); ?>);"<?php } ?>>
          <?php echo $cat->name; ?>
          </a>
        </li>
<?php }} ?>
    </ul>
  </div>



  <div class="col-md-4 col-sm-4">
    <h2><small>Browse by</small> Manufacturer</h2>
    <ul class="category-items list-unstyled">
<?php
    $taxonomy = 'manufacturers';
    foreach (get_terms($taxonomy) as $cat) {
      if (function_exists('z_taxonomy_image_url') && $cat->parent == '0') {
        $catImage = z_taxonomy_image_url($cat->term_id);
?>
        <li> 
          <a href="<?php echo get_term_link($cat->slug, $taxonomy); ?>" title="<?php echo $cat->description; ?>"<?php if (!empty($catImage)) { ?> style="background-image: url(<?php echo z_taxonomy_image_url($cat->term_id); ?>);"<?php } ?>>
          <?php echo $cat->name; ?>
          </a>
        </li>

<?php }} ?>
    </ul>
  </div>



  <div class="col-md-4 col-sm-4">
    <h2><small>Browse by</small> Application</h2>
    <ul class="category-items list-unstyled">
<?php
    $taxonomy = 'applications';
    foreach (get_terms($taxonomy) as $cat) {
      if (function_exists('z_taxonomy_image_url') && $cat->parent == '0') {
        $catImage = z_taxonomy_image_url($cat->term_id);
?>
        <li> 
          <a href="<?php echo get_term_link($cat->slug, $taxonomy); ?>" title="<?php echo $cat->description; ?>"<?php if (!empty($catImage)) { ?> style="background-image: url(<?php echo z_taxonomy_image_url($cat->term_id); ?>);"<?php } ?>>
          <?php echo $cat->name; ?>
          </a>
        </li>

<?php }} ?>
      </ul>
  </div>
</div>


    



<?php get_footer(); ?>