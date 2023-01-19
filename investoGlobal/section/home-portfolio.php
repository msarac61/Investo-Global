<?php
	$portfolio = get_field('portfolio_list');
	$portfolio_top_title = get_post_meta(get_the_id(), "portfoilo_top_title", true);
	$portfolio_top_description = get_post_meta(get_the_id(), "portfoilo_top_desription", true);
?>
<section id="portfolio" class="portfolio sare-mt-100 sare-pt-100 sare-pb-100">
	<div class="container">
		<div class="portfolio-title text-center">
			<div class="portfolio-title-top color-primary sare-fs-68 line-height-68"><?php echo $portfolio_top_title; ?></div>
			<div class="portfolio-title-bottom sare-fs-14 color-four sare-mt-10 sare-fw-500"><?php echo $portfolio_top_description; ?></div>
		</div>

		<div class="sare-mt-100">
			<div class="sare-step row row-no-gutter">
				<?php $i = '0'; foreach($portfolio as $portfo) { $i++; ?>
					<div class="col-md-4">
						<div class="portfolio-box">
							<div class="portfolio-box-numeric">
								<div class="portfolio-box-number sare-fs-84 line-height-85 sare-fw-300"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></div>
								<div class="portfolio-box-small-text sare-fs-24 line-height-25 sare-fw-600 text-transform-uppercase"><?php echo $portfo['portfolio_list_item_title']; ?></div>
							</div>
							<div class="portfolio-img"><a href="<?php echo $portfo['portfolio_list_item_link']; ?>" title="<?php echo strip_tags($portfo['portfolio_list_item_title']); ?>"><?php echo wp_get_attachment_image( $portfo['portfolio_list_item_image']['ID'], 'portfolio_home','', array( "class" => "img-fluid" )); ?></a></div>
							<div class="portfolio-text sare-fs-12 color-primary text-transform-uppercase">
								<a href="<?php echo $portfo['portfolio_list_item_link']; ?>" title="<?php echo $portfo['portfolio_list_item_title']; ?>"><?php echo ot_get_option( 'portfolio___all_view' ); ?> <i class="bi bi-arrow-right"></i></a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>