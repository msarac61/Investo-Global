<?php

	/*
		Template Name: Single Services
	*/

	get_header();

	$services_image = get_post_meta($post->ID, "services_image", true);

?>

	<main>
		<div class="sare-pt-50 sare-pb-50">
			<div class="header-title-about">
				<div class="container <?php if (!wp_is_mobile() ) { echo 'position-relative'; } ?>">
					<span>
						<div class="hta1 sare-fs-80 line-height-75"><?php _e( 'Investo', 'InvestoGlobal' ); ?></div>
						<div class="hta1 sare-fw-300 sare-ml-80 sare-fs-80 line-height-75"><?php _e( 'Global', 'InvestoGlobal' ); ?></div>
					</span>
				</div>
			</div>

			<div class="container">
				<div class="row row-10-gutter">
					<div class="col-md-6">
						<div class="services-page-title">
						   <h1><?php the_title(); ?></h1>
						</div>
					</div>
					<div class="col-md-6">
						<div class="htop-img">
							<?php echo wp_get_attachment_image($services_image, 'full','', array( "class" => "w-100 h-auto" )); ?>
						</div>
					</div>
				</div>
			</div>

		<div class="container sare-mt-negative">
			<div class="row row-10-gutter">
				<div class="col-md-12">
					<div class="single-blog-post">
						<div class="">
							<?php the_content(); ?>
						</div>
					</div>
				</div><!-- col-md-8-->
			</div><!-- col-md-8-->
		</div><!-- col-md-8-->
	</main>

<?php get_footer(); ?>