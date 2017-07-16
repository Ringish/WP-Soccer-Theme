<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body class="<?php body_class(); ?>">
	<header class="header">
		<a href="<?php site_url(); ?>">
			<?php
			the_custom_logo();
			?>
		</a>
		<nav class="navigation">
			<?php
		   /**
			* Displays a navigation menu
			* @param array $args Arguments
			*/
			$args = array(
				'theme_location' => 'header-menu',
				);
			
			wp_nav_menu( $args );
			?>
		</nav>
	</header>