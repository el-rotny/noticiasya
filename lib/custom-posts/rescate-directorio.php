<?php

/*
* Creating a function to create our CPT
*/

function rescate_directorio_cpt() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Rescate Directorios', 'Post Type General Name', 'NoticiasYa' ),
        'singular_name'       => _x( 'Rescate Directorio', 'Post Type Singular Name', 'NoticiasYa' ),
        'menu_name'           => __( 'Rescate Directorios', 'NoticiasYa' ),
        'parent_item_colon'   => __( 'Parent Rescate Directorio', 'NoticiasYa' ),
        'all_items'           => __( 'All Rescate Directorios', 'NoticiasYa' ),
        'view_item'           => __( 'View Rescate Directorio', 'NoticiasYa' ),
        'add_new_item'        => __( 'Add New Rescate Directorio', 'NoticiasYa' ),
        'add_new'             => __( 'Add New', 'NoticiasYa' ),
        'edit_item'           => __( 'Edit Rescate Directorio', 'NoticiasYa' ),
        'update_item'         => __( 'Update Rescate Directorio', 'NoticiasYa' ),
        'search_items'        => __( 'Search Rescate Directorio', 'NoticiasYa' ),
        'not_found'           => __( 'Not Found', 'NoticiasYa' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'NoticiasYa' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'Rescate Directorio', 'NoticiasYa' ),
        'description'         => __( 'Rescate Directorio', 'NoticiasYa' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'categoria', 'market' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );

    // Registering your Custom Post Type
    register_post_type( 'rescate-directorio', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'rescate_directorio_cpt', 0 );
