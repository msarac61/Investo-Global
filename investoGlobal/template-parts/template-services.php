<?php

	/*
		Template Name: Services
	*/

	get_header();

	$services = get_field('services');

?>

<main>
	<div class="sare-pt-50 sare-pb-50">
		<div class="blog-title-about">
			<div class="container">
				<span><div class="blog-title-header-name sare-fs-80"><h1><?php the_title(); ?></h1></div></span>
			</div>
		</div>

		<div class="container">
			<div class="row row-10-gutter hidden-desktop">
				<?php $i = '0'; foreach($services as $service) { $i++; ?>
					<a href="#">
						<div class="col-12">
							<div class="step sare-mt-20">
								<div class="step-standart-title color-primary sare-fw-700 text-transform-uppercase text-center w-100"><?php echo $service['services_-_title']; ?></div>
								<div class="step-image sare-mt-20">
									<?php echo wp_get_attachment_image( $service['services_-_image']['ID'], 'full','', array( "class" => "img-fluid" )); ?> 
									<div class="step-description">
										<div class="animate__fadeInUp animate__animated step-description-in">
											<div class="step-description-desc">
												<?php echo $service['services_description']; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php } ?>
			</div>

			<div class="row row-10-gutter sare-mt-10 hidden-mobil">
				<div class="single-plus big"></div>

				<div class="col-md-3"></div>
				<div class="col-md-3 sare-mt-100">
					<div class="services-wdg-title">
						<div class="services-wdg-title-1"><?php echo sprintf( __( 'Our Services in <div class="services-wdg-title-2">%s Steps</div>', 'InvestoGlobal' ), count($services) ); ?></div>
					</div>
					<?php $i = '0'; foreach($services as $service) { $i++; ?>
						<?php if($i % 2 == 0) { ?>
							<a href="<?php echo $service['services_-_link']; ?>" title="<?php echo $service['services_-_title']; ?>">
								<div class="services-wdg sare-mt-20">
									<?php echo wp_get_attachment_image( $service['services_-_image']['ID'], 'full','', array( "class" => "img-fluid" )); ?> 
									<div class="left-services">
										<div class="left-services-number"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></div>
										<div class="left-services-title"><?php echo $service['services_-_title']; ?></div>
										<div class="left-services-description"><?php echo $service['services_description']; ?></div>
									</div>
								</div>
							</a>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="col-md-3">
					<?php $i = '0'; foreach($services as $service) { $i++; ?>
						<?php if($i % 2 == 1) { ?>
							<a href="<?php echo $service['services_-_link']; ?>" title="<?php echo $service['services_-_title']; ?>">
								<div class="services-wdg sare-mt-20">
									<?php echo wp_get_attachment_image( $service['services_-_image']['ID'], 'full','', array( "class" => "img-fluid" )); ?> 
									<div class="right-services">
										<div class="right-services-number"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></div>
										<div class="right-services-title"><?php echo $service['services_-_title']; ?></div>
										<div class="right-services-description"><?php echo $service['services_description']; ?></div>
									</div>
								</div>
							</a>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
		<!-- container -->
	</div>
</main>	

<?php get_footer(); ?>