<?php
// Custom logo
add_theme_support( 'custom-logo' );

// Featured image
add_theme_support( 'post-thumbnails' ); 

// Customizer
require get_template_directory() . '/inc/customizer.php';

// Register menu
function affiliate_menus() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'affiliate_menus' );

// Enqueue styles and scripts
wp_enqueue_style( 'style', get_template_directory_uri().'/dist/styles/theme.min.css', array(), time() );
wp_enqueue_script( 'script', get_template_directory_uri() . '/dist/scripts/main.min.js', array ( 'jquery' ), time(), true);

// Get top content
function get_top_content() {
	$id = get_theme_mod('top_content');
	$post = get_post($id);
	$content['id'] = $id;
	$content['content'] = $post->post_content;
	$content['content'] = apply_filters('the_content', $content['content']);
	$content['content'] = str_replace(']]>', ']]&gt;', $content['content']);
	$content['title'] = $post->post_title;
	$content['img'] = get_the_post_thumbnail_url($id);
	return $content;

}

?>