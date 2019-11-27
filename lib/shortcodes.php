<?php

require NOTICIASYA_PLUGIN_DIR . 'utilities/plugin_template_loader.php';
require NOTICIASYA_PLUGIN_DIR . 'utilities/noticiasya_template_loader.php';

function custom_loader_shortcode() {
	$templates = new NoticiasYa_Template_Loader;
  ob_start();
  $templates->get_template_part( 'content', 'page' );
  $templates->get_template_part( 'content', 'search' );
  $templates->get_template_part( 'content');
  return ob_get_clean();
}

// Zero out the post_content_prefix shortcode.
function do_post_content_prefix($atts, $content = "") {
  return $content;
}

function register_shortcodes(){
	add_shortcode( 'noticias_template', 'loader_templates' );
	add_shortcode( 'post_content_prefix', 'do_post_content_prefix' );
}

add_action( 'init', 'register_shortcodes');
