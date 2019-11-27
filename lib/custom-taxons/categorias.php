<?php
 /**
  * Add custom taxonomies
  *
  * Additional custom taxonomies can be defined here
  * http://codex.wordpress.org/Function_Reference/register_taxonomy
  */

 function categoria_taxonomies() {

     // This array of options controls the labels displayed in the WordPress Admin UI
     $labels = array(
       'name' => _x( 'Categorias', 'taxonomy general name' ),
       'singular_name' => _x( 'Categoria', 'taxonomy singular name' ),
       'search_items' =>  __( 'Search Categorias' ),
       'all_items' => __( 'All Categorias' ),
       'parent_item' => __( 'Parent Categoria' ),
       'parent_item_colon' => __( 'Parent Categoria:' ),
       'edit_item' => __( 'Edit Categoria' ),
       'update_item' => __( 'Update Categoria' ),
       'add_new_item' => __( 'Add New Categoria' ),
       'new_item_name' => __( 'New Categoria Name' ),
       'menu_name' => __( 'Categorias' ),
     );

     $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'event-category' ),
     );

     register_taxonomy( 'categoria', array( 'post' ), $args );

 }
 add_action( 'init', 'categoria_taxonomies', 0 );
