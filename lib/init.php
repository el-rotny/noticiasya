<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noticias_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'NoticiasYa' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="h4 widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header', 'NoticiasYa' ),
		'id'            => 'header',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<div id="site-container--%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Body', 'NoticiasYa' ),
		'id'            => 'body',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<div id="site-container--%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Displays after main conent.
	register_sidebar( array(
		'name'          => esc_html__( 'Single | After Content', 'NoticiasYa' ),
		'id'            => 'single-post__after-content',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="h4 widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Single | Read More Left', 'NoticiasYa' ),
		'id'            => 'single-post__read-more-left',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="h4 widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Single | Read More Right', 'NoticiasYa' ),
		'id'            => 'single-post__read-more-right',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<section id="%1$s" class="widget sidebar__item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="h4 widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'NoticiasYa' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'NoticiasYa' ),
		'before_widget' => '<div id="site-container--%1$s" class="widget %2$s col-md-3 col-sm-6 footer-col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="h6 widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'noticias_widgets_init' );

/**
 * Additional Upload Mime Types
 * @param  [type] $mimes [description]
 * @return [type]        [description]
 */
 function my_custom_mime_types( $mimes ) {
	 unset( $mimes['svg'] );
	 // New allowed mime types.
	 $mimes['svg'] = 'image/svg+xml';
	 return $mimes;
 }
 add_filter( 'upload_mimes', 'my_custom_mime_types' );
