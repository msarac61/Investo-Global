<?php $testimonials = get_field('testimonials'); ?>
<section id="testimonials" class="testimonials">
	<div class="testimonials-next-prev-button">
		<div class="customPrevBtn"><i class="bi bi-chevron-left"></i></div>
		<div class="customNextBtn"><i class="bi bi-chevron-right"></i></div>
	</div>
	<div class="container">
		<div class="owl-carousel owl-theme testimonials-slider" <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> data-rtl="true" <?php } ?>>
			<?php $i = '0'; foreach($testimonials as $testimonial) { $i++; ?>
					<div class="sare-testimonials row row-large-gutter sare-spacing-50">
						<div class="col-md-6">
							<a href="<?php echo $testimonial['testimonials_video']; ?>" data-lity>
								<div class="testimonials-box">
									<div class="testimonials-user"><?php echo wp_get_attachment_image( $testimonial['testimonials_image']['ID'], 'testimonials_home','', array( "class" => "img-fluid" )); ?></div>
									<div class="testimonials-box-play"><i class="bi bi-play"></i></div>
								</div>
							</a>
						</div>
						<div class="col-md-6 sare-mt-150 sare-mobil-top-50 ">
							<div class="testimonials-right">
								<div class="testimonials-right-watch-button sare-fs-28"><?php echo ot_get_option( 'testimonials___watch_text' ); ?></div>
								<div class="testimonials-right-title sare-fw-700 sare-fs-36 text-transform-uppercase"><?php echo $testimonial['testimonials_title']; ?></div>
								<div class="testimonials-right-small-description sare-fw-400 sare-fs-16">
									<?php echo $testimonial['testimonials_description']; ?>
								</div>
								<div class="testimonials-right-name-surname sare-fs-32 sare-mt-30"><?php echo $testimonial['testimonials_name']; ?></div>
								<div class="testimonials-right-flag text-transform-uppercase sare-fw-700 sare-fs-20"><?php echo wp_get_attachment_image( $testimonial['testimonials_country_flag']['ID'], 'full','', array( "class" => "img-fluid" )); ?> <?php echo $testimonial['testimonials_country']; ?></div>
							</div>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</section>