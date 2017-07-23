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
<body <?php body_class(); ?>>
	<header class="header">
		<div class="container">
			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			if ($image) {
				?>
				<a class="site-logo" href="<?php  bloginfo('url'); ?>"><img src="<?php echo $image[0]; ?>"></a>
				<?php
			}
			else {

				$sitename = get_bloginfo('name');
				$sitename = explode(" ", $sitename);
				?>
				<a class="site-logo" href="<?php bloginfo('url'); ?>"><span class="logo-txt-1"><?php echo $sitename[0]; ?></span><span class="logo-txt-2"><?php echo $sitename[1]; ?></span>
					<?php
				}
				?>

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
	</div>
</header>
<div class="header-pusher"></div>