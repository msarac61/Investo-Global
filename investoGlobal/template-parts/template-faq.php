<?php

	/*
		Template Name: FAQ
	*/

	get_header();

	$page_image = get_field('faq_page_image');
	$faqs = get_field('faq_list');


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
                        <?php echo wp_get_attachment_image($page_image['ID'], 'full','', array( "class" => "img-fluid" )); ?>
                    </div>
                </div>
            </div>
        </div>

		<?php if (is_array($faqs) || is_object($faqs)) { ?>
			 <?php $k = '0';  foreach($faqs as $faq) { $k++; ?>
				<div class="faq-collapse sare-mt-50">
					<div class="blog-title-about sare-mb-50"><div class="container"><span><div class="blog-title-header-name sare-fs-70"><?php echo $faq['faq_list_title']; ?></div></span></div></div>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div id="accordion<?php echo $k; ?>">
									<?php $y = '0'; foreach($faq['faq_content'] as $f) { $y++; ?>
										<div class="collapseItem">
											<div class="collapseButton" id="heading<?php echo $y; ?>">
												<a data-toggle="collapse" data-target="#collapse<?php echo $y; ?>" aria-expanded="true" aria-controls="collapse<?php echo $y; ?>">
													<?php echo $f['faq_content_-_title']; ?>
												</a>
											</div>

											<div id="collapse<?php echo $y; ?>" class="collapseDescription collapse <?php if($y == '1') { echo 'show'; } ?>" aria-labelledby="heading<?php echo $y; ?>" data-parent="#accordion<?php echo $k; ?>">
												<?php echo $f['faq_content_-_description']; ?>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			<?php } ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>