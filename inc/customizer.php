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
		'title'    => __( 'Top content', 'soccer-theme' ),
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


	$wp_customize->add_setting( 'posts_heading' , array(
		'default'   => 'Lorem ipsum',
		'transport' => 'refresh',
		) );
	$wp_customize->add_setting( 'posts_post_type' , array(
		'default'   => 'post',
		'transport' => 'refresh',
		) );
	$wp_customize->add_setting( 'posts_number' , array(
		'default'   => 4,
		'transport' => 'refresh',
		) );
	$wp_customize->add_setting( 'custom_meta' , array(
		'default'   => '',
		'transport' => 'refresh',
		) );

	foreach (get_post_types() as $key => $value) {
		if ($key != "revision" && $key != "nav_menu_item" && $key != "custom_css" && $key != "customize_changeset") {
			$post_types[$key] = ucfirst($value);
		}
	}
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_heading', array(
		'label'    => __( 'Posts heading', 'soccer-theme' ),
		'section'  => 'top_content',
		'settings' => 'posts_heading',
		) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'posts_post_type', array(
		'label'    => __( 'Post type', 'soccer-theme' ),
		'section'  => 'top_content',
		'settings' => 'posts_post_type',
		'type'	   => 'select',
		'choices'  => $post_types
		) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'posts_number', array(
		'label'    => __( 'Number of posts', 'soccer-theme' ),
		'section'  => 'top_content',
		'settings' => 'posts_number',
		'type'	   => 'select',
		'choices'  => array(1,2,3,4,5,6)
		) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'custom_meta', array(
		'label'    => __( 'Display custom meta', 'soccer-theme' ),
		'section'  => 'top_content',
		'settings' => 'custom_meta'
		) ) );

}

add_action( 'customize_register', 'soccer_theme_customizer' );