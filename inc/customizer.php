<?php
function soccer_theme_customizer($wp_customize) {

	$args = array(
		'post_type'   => array('post','page'),
		'post_status' => 'any',	
		);
	
	$query = new WP_Query( $args );

	if ($query->have_posts()) {
		$posts = array();
		while($query->have_posts()) {
			$query->the_post();
			$posts[get_the_id()] = get_the_title();
		}
	}
	

$wp_customize->add_section( 'top_content' , array(
		'title'    => __( 'Top content', 'copywriter' ),
		'priority' => 35
		) );   

	$wp_customize->add_setting( 'top_content' , array(
		'transport' => 'refresh',
		) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_text_heading', array(
		'label'    => __( 'Top content', 'soccer-theme' ),
		'section'  => 'top_content',
		'settings' => 'top_content',
		'type'	   => 'select',
		'choices'  => $posts
		) ) );

}

add_action( 'customize_register', 'soccer_theme_customizer' );