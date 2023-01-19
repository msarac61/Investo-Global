<?php

	/*
		Template Name: HR
	*/

	get_header();

	$open_position = get_field('open_position');
	$page_image = get_field('hr_page_image');
	$page_description = get_field('hr_page_description');
	$form_shortcode = get_field('form_shortcode');

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
					<div class="services-page-title"><h1><?php the_title(); ?></h1></div>
				</div>
				<div class="col-md-6">
					<div class="htop-img">
						<?php echo wp_get_attachment_image($page_image['ID'], 'full','', array( "class" => "img-fluid" )); ?>
					</div>
				</div>
			</div>				
			<div class="hr-title">
				<div class="hr-top-title"><?php echo sprintf( __( 'Submit <div class="hr-bottom-title mb-4">Your CV</div>', 'InvestoGlobal' )); ?></div>
			</div>				
			<div class="sare-mb-80">
				<div class="hr-description">
					<?php echo $page_description; ?>
				</div>
				
				<div class="hr-cv-form">
					<?php echo do_shortcode($form_shortcode); ?>
				</div>				
			</div>

			<?php if (is_array($open_position) || is_object($open_position)) { ?>
				<div class="hr-title">
					<div class="hr-top-title"><?php echo __('Open', 'InvestoGlobal'); ?></div>
					<div class="hr-bottom-title"><?php echo __('Position', 'InvestoGlobal'); ?></div>
				</div>
			<?php } ?>
			<div class="sare-mt-50" id="accordion">
				<?php if (is_array($open_position) || is_object($open_position)) { ?>
					<?php $i = '0'; foreach($open_position as $position) { $i++;?>
						<div class="collapseItem">
							<div class="collapseButton" id="heading<?php echo $i; ?>">
								<a data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
									<?php echo $position['position_title']; ?>
								</a>
							</div>
							<div id="collapse<?php echo $i; ?>" class="collapseDescription collapse <?php if($i == '1') { echo 'show'; } ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
								<?php echo $position['position_detail']; ?>
								<?php if (is_array($position['position_requirements']) || is_object($position['position_requirements'])) { ?>
									<div class="accordionItemList">
										<ul>
											<?php foreach($position['position_requirements'] as $rq) { ?>
												<li><?php echo $rq['requirement']; ?></li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>