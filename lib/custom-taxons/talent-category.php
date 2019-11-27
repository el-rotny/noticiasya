<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function talent_category_taxonomies() {

     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Talent Categories', 'taxonomy general name' ),
       'singular_name' => _x( 'Talent Category', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Talent Categories' ),
       'all_items' => __( 'All Talent Categories' ),
       'parent_item' => __( 'Parent Talent Category' ),
       'parent_item_colon' => __( 'Parent Talent Category:' ),
       'edit_item' => __( 'Edit Talent Category' ),
       'update_item' => __( 'Update Talent Category' ),
       'add_new_item' => __( 'Add New Talent Category' ),
       'new_item_name' => __( 'New Talent Category Name' ),
       'menu_name' => __( 'Talent Categories' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'talent-category' ),
     );

     register_taxonomy( 'talent-category', array( 'talent' ), $args );

 }
 add_action( 'init', 'talent_category_taxonomies', 0 );
