<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site custom-header">
	<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<?php
		if ( is_active_sidebar( 'header' ) ) {
			dynamic_sidebar( 'header' );
		}
	?>
	
	<div id="content" class="site-content <?php echo element_class('site-content')?>">
		<div id="wrap" class="wrap-default <?php echo element_class('wrap')?>">
