<?php

add_action( 'init', 'create_post_type' );
add_action( 'init', 'manufacturers_taxonomy' );
add_action( 'init', 'applications_taxonomy' );
// add_action( 'init', 'categories_taxonomy' );
add_action( 'after_switch_theme', 'my_rewrite_flush' );
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'products'
    ));
    return $query;
  }
}

function my_rewrite_flush() {
  flush_rewrite_rules();
}

function create_post_type() {
  register_post_type( 'products',
    array(
      'labels' => array (
        'name' => 'Products',
        'singular_name' => 'Product',
        'menu_name' => 'Products',
        'add_new' => 'Add Product',
        'add_new_item' => 'Add New Product',
        'edit' => 'Edit',
        'edit_item' => 'Edit Product',
        'new_item' => 'New Product',
        'view' => 'View Product',
        'view_item' => 'View Product',
        'search_items' => 'Search Products',
        'not_found' => 'No Products Found',
        'not_found_in_trash' => 'No Products Found in Trash',
        'parent' => 'Parent Product',
      ),
      'taxonomies' => array('category', 'manufacturers', 'applications'),
      'supports' => array('title', 'editor', 'revisions', 'author'),
      'query_var' => true,
      'has_archive' => true,
      'public' => true,
      'menu_position' => 2,
      'rewrite' => array('slug' => 'products')
    )
  );
}

function manufacturers_taxonomy() {
  register_taxonomy(
    'manufacturers',
    'products',
    array(
      'hierarchical' => false,
      'label' => 'Manufacturers',
      'query_var' => true,
      'rewrite' => array('slug' => 'manufacturers')
    )
  );
}

function applications_taxonomy() {
  register_taxonomy(
    'applications',
    'products',
    array(
      'hierarchical' => false,
      'label' => 'Applications',
      'query_var' => true,
      'rewrite' => array('slug' => 'applications')
    )
  );
}

function categories_taxonomy() {
  register_taxonomy(
    'categories',
    // 'products',
    array(
      // 'hierarchical' => true,
      // 'label' => 'Categories',
      // 'query_var' => true,
      // 'rewrite' => array('slug' => 'categories')
    )
  );
}



// add_action('init', 'cptui_register_my_cpt');

// function cptui_register_my_cpt() {
//   register_post_type('products', array( 
//     'label' => '__('Products')',
//     'description' => '',
//     'public' => 'true',
//     'show_ui' => 'true',
//     'show_in_menu' => 'true',
//     'capability_type' => 'post',
//     'hierarchical' => 'true',
//     'rewrite' => array('slug' => 'products', 'with_front' => '1'),
//     'query_var' => 'true',
//     'exclude_from_search' => 'false',
//     'supports' => array('title','editor','custom-fields','revisions','author'),
//     'taxonomies' => array('categories','applications','manufacturers'),
//     'labels' => array (
//       'name' => 'Products',
//       'singular_name' => 'Product',
//       'menu_name' => 'Products',
//       'add_new' => 'Add Product',
//       'add_new_item' => 'Add New Product',
//       'edit' => 'Edit',
//       'edit_item' => 'Edit Product',
//       'new_item' => 'New Product',
//       'view' => 'View Product',
//       'view_item' => 'View Product',
//       'search_items' => 'Search Products',
//       'not_found' => 'No Products Found',
//       'not_found_in_trash' => 'No Products Found in Trash',
//       'parent' => 'Parent Product',
//     )
//   )); 
// }

// class Post_Category_Walker extends Walker_Category {

//   private $term_ids = array();

//   function __construct( $post_id, $taxonomy )  {
//     // fetch the list of term ids for the given post
//     $this->term_ids = wp_get_post_terms( $post_id, $taxonomy, 'fields=ids' );
//   }

//   function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, $output ) {
//     $display = false;

//     $id = $element->term_id;

//     if ( in_array( $id, $this->term_ids ) ) {
//       // the current term is in the list
//       $display = true;
//     }
//     elseif ( isset( $children_elements[ $id ] ) ) {
//       // the current term has children
//       foreach ( $children_elements[ $id ] as $child ) {
//         if ( in_array( $child->term_id, $this->term_ids ) ) {
//           // one of the term's children is in the list
//           $display = true;
//           // can stop searching now
//           break;
//         }
//       }
//     }

//     if ( $display )
//       parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
//   }
// }



// function walk_post_categories( $post_id, $args = array() ) {
//   $args = wp_parse_args( $args, array(
//     'taxonomy' => 'category'
//   ) );

//   $args['walker'] = new Post_Category_Walker( $post_id, $args['taxonomy'] );

//   $output = wp_list_categories( $args );
//   if ( $output )
//     return $output;
// }