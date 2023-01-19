<?php
	$experts = get_field('experts');
	$expert_top_title = get_post_meta(get_the_id(), "expert_-_title_top", true);
	$expert_middle_title = get_post_meta(get_the_id(), "expert_-_title_middle", true);
	$expert_bottom_title = get_post_meta(get_the_id(), "expert_-_title_bottom", true);
?>
<section id="experts" class="experts sare-pt-100 sare-pb-200 sare-mt-10">
	<div class="container">
		<div class="expert-title text-center">
			<div class="expert-title-top color-primary sare-fs-68 line-height-68"><?php echo $expert_top_title; ?></div>
			<?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?>
				<div class="expert-title-middle sare-fw-600 color-tertiary sare-fs-24 color-four text-transform-uppercase"><?php echo $expert_middle_title; ?></div>
			<?php } else { ?>
				<div class="expert-title-middle sare-fw-600 color-tertiary sare-fs-24 color-four letter-spacing-30 text-transform-uppercase"><?php echo $expert_middle_title; ?></div>
			<?php } ?>
			<div class="expert-title-bottom sare-fs-16 color-four sare-mt-10 sare-fw-500"><?php echo $expert_bottom_title; ?></div>
		</div>
		<div class="sare-mt-100 sare-experts-100 ">
			<div class="sare-experts row row-10-gutter">
				<?php $i = '0'; foreach($experts as $expert) { $i++; $css = base64_encode($expert['expert_name']); ?>
					<div class="col-md-4 experts-box-mobil <?php echo $css; ?>">
						<a class="experts-box-link <?php echo $css; ?>" href="<?php echo $expert['expert_video']; ?>" data-lity>
							<div class="expert-box <?php echo $css; ?>">
								<div class="expert-box-play <?php echo $css; ?>">
									<svg version="1.1" x="0px" y="0px" width="55px" height="55px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
										<polygon class="<?php echo $css; ?> triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 " />
										<circle class="<?php echo $css; ?> circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
									</svg>
								</div>

								<div class="expert-user <?php echo $css; ?>"><?php echo wp_get_attachment_image( $expert['experts_image']['ID'], 'experts_home','', array( "class" => "img-fluid $css experts-box-link" )); ?></div>
							</div>
						</a>
						<div class="expert-bottom sare-mt-50 text-center <?php echo $css; ?>">
							<div class="expert-user-name sare-fw-700 sare-fs-24 text-transform-uppercase <?php echo $css; ?>"><?php echo $expert['expert_name']; ?></div>
							<div class="expert-user-job text-transform-uppercase <?php echo $css; ?>"><?php echo $expert['expert_job']; ?></div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>