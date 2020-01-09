<?php
/**
 * CONSTANTS
 */

define( 'NOTICIASYA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NOTICIASYA_TEMPLATE_DIR', NOTICIASYA_PLUGIN_DIR . '/templates/' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once plugin_dir_path( __FILE__ ) . '/utilities/nav_walker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Register Custom Navigation Walker
 */
function register_sub_navwalker(){
	require_once plugin_dir_path( __FILE__ ) . '/utilities/sub_nav_walker.php';
}
add_action( 'after_setup_theme', 'register_sub_navwalker' );


register_nav_menus( array(
    'primary_noticias' => __( 'Primary Noticias', 'NoticiasYa' ),
));

/**
 * Register Custom Admin Page (ACF)
 */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Home Settings',
		'menu_title'	=> 'Home',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

		/**
     * Enable Custom Logo
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
     */
		add_theme_support( 'custom-logo', array(
	    'header-text' => array( 'site-title', 'site-description' ),
 		));

		/**
		 * Changes the class on the custom logo in the header.php
		 */
		function custom_logo_output( $html ) {
			$html = str_replace('custom-logo-link', 'navbar-brand -centered', $html );
			return $html;
		}
		add_filter('get_custom_logo', 'custom_logo_output', 10);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    // add_editor_style(asset_path('styles/main.css'));

		add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio' ) );

		/**
		 * Add Pageviews theme support
		 * @link https://pressjitsu.com/blog/pageviews-wordpress-plugin/
		 */
		add_theme_support( 'pageviews' ); // disable default behavior

}, 20);

// Disable Gutenberg if Installed
add_filter('use_block_editor_for_post', '__return_false', 10);


function wpse_plugin_comment_template( $comment_template ) {
     global $post;
     if ( !( is_singular() && ( have_comments() || 'open' == $post->comment_status ) ) ) {
        // leave the standard comments template for standard post types
        return;
     }
     return dirname(__FILE__) . '/templates/comments.php';
}
// throw this into your plugin or your functions.php file to define the custom comments template.
add_filter( "comments_template", "wpse_plugin_comment_template" );


// This is your function, you can name it anything you want
function entravision_pageviews_widget($args) {
	/* Define Templates */
	$templates = new NoticiasYa_Template_Loader;
	?>
	<?php
		$templates->get_template_part( 'template-parts/content', 'popular-widget' );
	?>
<?php }

add_action( 'pageviews_widget', 'entravision_pageviews_widget', 999 );
