<?php

	/*
		Template Name: Homepage
	*/

	get_header();

?>

<main>
	<?php echo get_template_part( 'section/home', 'step'); ?>
	<?php echo get_template_part( 'section/home', 'experts'); ?>
	<?php echo get_template_part( 'section/home', 'testimonials'); ?>
	<?php echo get_template_part( 'section/home', 'city'); ?>
	<?php echo get_template_part( 'section/home', 'channel'); ?>
	<?php echo get_template_part( 'section/home', 'social'); ?>
	<?php echo get_template_part( 'section/home', 'portfolio'); ?>
	<?php echo get_template_part( 'section/home', 'blog'); ?>
</main>


<?php get_footer(); ?>