<?php

	// Social Control

	$social_wall_title = ot_get_option( 'social_wall_title' );
	$social_wall_sub_title = ot_get_option( 'social_wall_sub_title' );
	$social_wall_hashag_title = ot_get_option( 'social_wall_hashag_title' );
	$social_wall_image_item = ot_get_option( 'social_wall_image_item' );

?>

<section id="social" class="sare-mt-100">
	<div class="social-title text-center">
		<?php if($social_wall_title) { ?><div class="social-title-top color-primary sare-fs-68 line-height-68"><?php echo $social_wall_title; ?> </div><?php } ?>
		<?php if($social_wall_sub_title) { ?><div class="social-title-middle sare-fw-600 color-tertiary sare-fs-24 color-four  <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?><?php } else { ?>letter-spacing-30<?php } ?>"><?php echo $social_wall_sub_title; ?></div><?php } ?>
		<?php if($social_wall_hashag_title) { ?><div class="social-title-bottom sare-fs-14 color-primary sare-mt-10 sare-fw-700 letter-spacing-5 text-transform-uppercase"><?php echo $social_wall_hashag_title; ?></div><?php } ?>
	</div>
	<!-- social-title -->

	<?php /* <div class="sare-mt-50">
		<div class="Stories">
			<?php echo do_shortcode('[wp-story]'); ?>
		</div>
	</div> */ ?>

	<div class="sare-mt-50 sare-social-slider">
		<div class="owl-carousel owl-theme owl-social" <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> data-rtl="true" <?php } ?>>
			<?php foreach($social_wall_image_item as $item) { $id = attachment_url_to_postid($item['item_image']); ?>
				<?php if($item['item_lightbox'] == 'on') { ?>
					<div class="social-item">
						<a href="<?php echo $item['item_image']; ?>" title="<?php echo $item['title']; ?>"  data-lity><?php echo wp_get_attachment_image($id, 'social_slider', false, array('class' => 'img-fluid')); ?></a>
					</div>
				<?php } else { ?>
					<?php if($item['item_link']) { ?>
							<div class="social-item">
								<a href="<?php echo $item['item_link']; ?>" title="<?php echo $item['title']; ?>" target="_blank"><?php echo wp_get_attachment_image($id, 'social_slider', false, array('class' => 'img-fluid')); ?></a>
							</div>
					<?php } else { ?>
							<div class="social-item">
								<?php echo wp_get_attachment_image($id, 'social_slider', false, array('class' => 'img-fluid')); ?>
							</div>
					<?php } ?>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</section>