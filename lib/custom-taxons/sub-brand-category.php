<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function sub_brand_category_taxonomies() {


     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Sub Brand Categories', 'taxonomy general name' ),
       'singular_name' => _x( 'Sub Brand Category', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Sub Brand Categories' ),
       'all_items' => __( 'All Sub Brand Categories' ),
       'parent_item' => __( 'Parent Sub Brand Category' ),
       'parent_item_colon' => __( 'Parent Sub Brand Category:' ),
       'edit_item' => __( 'Edit Sub Brand Category' ),
       'update_item' => __( 'Update Sub Brand Category' ),
       'add_new_item' => __( 'Add New Sub Brand Category' ),
       'new_item_name' => __( 'New Sub Brand Category Name' ),
       'menu_name' => __( 'Sub Brand Categories' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'sub-brand-category' ),
     );

     register_taxonomy( 'sub-brand-category', array( 'sub-brand' ), $args );

 }
 add_action( 'init', 'sub_brand_category_taxonomies', 0 );
