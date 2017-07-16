<?php
// Custom logo
add_theme_support( 'custom-logo' );

// Register menu
function affiliate_menus() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'affiliate_menus' );

// Enqueue styles and scripts
wp_enqueue_style( 'style', get_template_directory_uri().'/dist/styles/theme.min.css', array(), time() );
wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/scripts/main.min.js', array ( 'jquery' ), time(), true);

?>