<?php

	// Social Control

	$channel_title = ot_get_option( 'channel_title' );
	$channel_sub_title = ot_get_option( 'channel_sub_title' );
	$channel_description_title = ot_get_option( 'channel_description___title' );
	$channel_description = ot_get_option( 'channel_description' );
	$channel_link = ot_get_option( 'channel_link' );
	$chanel_video_generator = ot_get_option( 'video_generator' );

	//echo '<pre>';
	// print_r($chanel_video_generator);
	// echo '</pre>';
?>

<section id="youtube" class="youtube sare-mt-50">
	<div class="container">
		<div class="row row-small-gutter mt-3">
			<div class="col-md-5">
				<div class="youtube-title">
					<div class="youtube-title-top color-primary sare-fs-68 line-height-68"><?php echo $channel_title; ?></div>
					<div class="youtube-title-middle sare-fw-600 color-tertiary sare-fs-24 color-four <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { } else { ?>letter-spacing-30<?php } ?> text-transform-uppercase"><?php echo $channel_sub_title; ?></div>
					<div class="clearfix"></div>
					<div class="youtube-channel-title sare-fw-700 sare-fs-32 text-transform-uppercase sare-mt-20">
						<?php echo $channel_description_title; ?>
					</div>
					<div class="youtube-channel-description sare-fs-14 sare-mt-20">
						<?php echo $channel_description; ?>
					</div>
					<div class="youtube-channel-link sare-fw-700 sare-fs-14 text-transform-uppercase color-primary sare-mt-30">
						<a href="<?php echo $channel_link; ?>" title="<?php _e( 'Watch Our Channel', 'InvestoGlobal' ); ?>" target="_blank"><?php _e( 'Watch Our Channel', 'InvestoGlobal' ); ?><i class="bi bi-arrow-right"></i></a>
					</div>
					<div class="youtube-logo sare-mt-30">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/new-youtube.png" width="113" height="26" class="img-fluid">
					</div>
				</div>
			</div>
			<div class="col-md-7">

					<div class="youtube-slider-arrow">
						<div class="CustomYTPrev">
							<i class="bi bi-chevron-left"></i>
						</div>
						<div class="CustomYTnext">
							<i class="bi bi-chevron-right"></i>
						</div>
					</div>

				<div class="owl-carousel owl-theme youtube-slider" <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> data-rtl="true" <?php } ?>>
					<?php foreach($chanel_video_generator as $video) { $img_id = attachment_url_to_postid($video['video_image']); ?>
						<div class="youtube-item">
							<a href="<?php echo $video['video_link']; ?>" title="<?php echo $video['title']; ?>" data-lity>
								<div class="channel-box-play">
									<i class="bi bi-play"></i>
								</div>
								<?php echo wp_get_attachment_image( $img_id, 'youtube_slider', false, array( "class" => "img-fluid" ) );  ?>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
<?php /*
		<div class="row slider-right hidden-mobil">
			<div class="owl-carousel owl-theme youtube-slider2" <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> data-rtl="true" <?php } ?>>
				<?php for($i = '1'; $i < count($chanel_video_generator); $i++) { $img_id = attachment_url_to_postid($chanel_video_generator[$i]['video_image']); ?>
					<div class="youtube-item">
						<?php echo wp_get_attachment_image( $img_id, 'youtube_slider');  ?>
					</div>
				<?php } ?>
				<?php for($i = '0'; $i < 1; $i++) { ?>
					<div class="youtube-item">
						<?php echo wp_get_attachment_image( $img_id, 'youtube_slider' );  ?>
					</div>
				<?php } ?>
			</div>
		</div>
*/ ?>

	</div>
</section>