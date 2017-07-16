<?php
get_header();
?>
<?php

$top_content = get_top_content();
?>
	<section class="top-content" style="background-image:url('<?php echo $top_content['img']; ?>');">
	<h1><?php echo $top_content['title']; ?></h1>
	<p><?php echo $top_content['content']; ?></p>
	</section>
<?php
while (have_posts()) {
	the_post();
	the_content();
}
?>
<?php
get_footer();
?>