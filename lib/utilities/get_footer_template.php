<?php
if ( ! function_exists( 'get_footer_template' ) ) :
function get_footer_template( $name = null ) {
    $templates_loader = new NoticiasYa_Template_Loader;

    /**
     * Fires before the footer template file is loaded.
     *
     * @since 2.1.0
     * @since 2.8.0 $name parameter added.
     *
     * @param string|null $name Name of the specific footer file to use. null for the default footer.
     */
    do_action( 'get_footer', $name );
    $templates = array();
    $name      = (string) $name;
    if ( '' !== $name ) {
        $templates[] = "footer-{$name}.php";
    }

    $templates[] = 'footer.php';

    $templates_loader->locate_template( $templates, true );

}
endif;
