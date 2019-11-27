<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function elections_districts_taxonomies() {

     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Elections Districts', 'taxonomy general name' ),
       'singular_name' => _x( 'Elections District', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Elections Districts' ),
       'all_items' => __( 'All Elections Districts' ),
       'parent_item' => __( 'Parent Elections District' ),
       'parent_item_colon' => __( 'Parent Elections District:' ),
       'edit_item' => __( 'Edit Elections District' ),
       'update_item' => __( 'Update Elections District' ),
       'add_new_item' => __( 'Add New Elections District' ),
       'new_item_name' => __( 'New Elections District Name' ),
       'menu_name' => __( 'Elections Districts' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'elections-districts' ),
     );

     register_taxonomy( 'elections-districts', array( 'event' ), $args );

 }
 add_action( 'init', 'elections_districts_taxonomies', 0 );
