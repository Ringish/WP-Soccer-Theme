<?php
get_header();
?>
<?php

$top_content = get_top_content();
?>
<section class="top-content" style="background-image:url('<?php echo $top_content['img']; ?>');">
	<div class="container">
		<div class="intro">
			<h1><?php echo $top_content['title']; ?></h1>
			<p><?php echo $top_content['content']; ?></p>
		</div>
		<aside class="posts-sidebar">
			<h2><?php echo $top_content['posts_heading']; ?> </h2>

			<?php
			$args = array(
				'post_type'   => $top_content['post_type'],
				'posts_per_page' => $top_content['num_posts'],	
				);

			$query = new WP_Query( $args );

			if ($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post();
					?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php
					if ($top_content['custom_meta']) {
						?>
						<time><?php echo get_post_meta( get_the_id(), $top_content['custom_meta'], true ); ?></time>
						<a href="<?php the_permalink(); ?>" class="btn"><?php echo __('Read more','soccer-theme'); ?></a>
						<?php
					}
				}
			}

			wp_reset_query();
			?>

		</aside>
	</div>
</section>
<main class="container" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_id()); ?>)">
	<div class="intro-content">
		<?php
		while (have_posts()) {
			the_post();
			the_content();
		}
		?>
	</div>
</main>
<section class="testimonials container">
	<?php
	$args = array(
		'format'   => 'quote',
		'posts_per_page' => 3,	
		);

	$query = new WP_Query( $args );

	if ($query->have_posts()) {
		while($query->have_posts()) {
			$query->the_post();
			?>
			<blockquote class="quote"><?php the_content(); ?></blockquote>
			<?php
		}
	}
	wp_reset_query();
	?>
</section>
<?php
get_footer();
?>