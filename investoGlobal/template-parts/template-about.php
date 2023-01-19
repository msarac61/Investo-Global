<?php

	/*
		Template Name: About Us
	*/

	get_header();

	// Custom Fields

	$text_field_title = get_post_meta($post->ID, "text_field_title", true);
	$title = explode(' ',$text_field_title);
	$about_image = get_post_meta($post->ID, "about_image", true);
	$about_download_file = get_post_meta($post->ID, "about_download_file", true);

	$mission = get_post_meta($post->ID, "mission", true);
	$vision = get_post_meta($post->ID, "vision", true);
	$core_values = get_post_meta($post->ID, "core_values", true);
	$welcoming_text = get_post_meta($post->ID, "welcoming_text", true);
	$flag_title = get_post_meta($post->ID, "flag_title", true);
	$expriences_count = get_post_meta($post->ID, "expriences_count", true);
	$customers_count = get_post_meta($post->ID, "customers_count", true);

	$video_cover_youtube = get_post_meta($post->ID, "video_cover_youtube", true);
	$video_url_youtube = get_post_meta($post->ID, "video_url_youtube", true);
	$languages_count = get_post_meta($post->ID, "languages_count", true);
	$languages_title = get_post_meta($post->ID, "languages_title", true);
	$languages_description = get_post_meta($post->ID, "languages_description", true);

	$company_list = get_field('company_list');

?>

<main>
	<div class="sare-pt-50 sare-pb-50">
		<div class="blog-title-about">
			<div class="container">
				<span><div class="blog-title-header-name sare-fs-80"><h1><?php the_title(); ?></h1></div></span>
			</div>
		</div>
		<div class="container">
			<div class="row <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { } else { ?>row-5-gutter<?php } ?> sare-mt-50 ">
				<div class="col-md-3 rtl-support hidden-mobil">
					<div class="au-left-bottom-title">
						<div class="au-lbt-1"><?php echo $title[0]; ?></div>
						<div class="au-lbt-2"><?php echo $title[1]; ?></div>
						<div class="au-lbt-3"><?php echo $title[2]; ?></div>
						<div class="au-lbt-4"><?php echo $title[3]; ?></div>
						<div class="au-lbt-5"><?php echo $title[4]; ?></div>
						<div class="au-lbt-5"><?php echo $title[5]; ?></div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="property-catalog">
						<?php echo wp_get_attachment_image($about_image, 'full','', array( "class" => "w-100 h-auto" )); ?>
						<?php if(!empty($about_download_file)) { ?>
							<div class="pc-detail">
								<a href="<?php echo $about_download_file; ?>">
									<div class="row <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { } else { ?>row-5-gutter<?php } ?>">
										<div class="col-md-10">
											<div class="pc-text1"><?php echo __('Knowledge Expertise', 'InvestoGlobal'); ?></div>
											<div class="pc-text2"><?php echo __('Download', 'InvestoGlobal'); ?></div>
										</div>
										<div class="col-md-2">
											<div class="pc-icon1"><svg height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g id="_7" data-name="7"><path class="download_icon_svg" d="M37.32,31.44,33,35.72v-11a1,1,0,1,0-2.08,0v11l-4.28-4.28a1,1,0,1,0-1.46,1.47l5.87,5.88a1,1,0,0,0,.91.26,1,1,0,0,0,.91-.26l5.88-5.88a1,1,0,1,0-1.47-1.47ZM32,15.39A16.61,16.61,0,1,0,48.61,32,16.61,16.61,0,0,0,32,15.39Zm0,31.15A14.54,14.54,0,1,1,46.54,32,14.54,14.54,0,0,1,32,46.54Z"/></g></svg></div>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { } else { ?>row-5-gutter<?php } ?> sare-mt-50">
				<div class="col-md-3 hidden-mobil rtl-support">
					<div class="au-left-bottom-title">
						<div class="expriences">
							<div class="expriences_number"><?php echo $expriences_count; ?></div>
							<div class="expriences_r">
								<div class="expriences_text1"><?php echo __('Years', 'InvestoGlobal'); ?></div>
								<div class="expriences_text2"><?php echo __('expriences', 'InvestoGlobal'); ?></div>
							</div>
						</div>
						<div class="customers">
							<div class="customers_number"><?php echo $customers_count; ?><span>+</span></div>
							<div class="customer-bottom">

								<?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?>
									<div class="customers_text2"><?php echo __('Customers', 'InvestoGlobal'); ?></div>
									<div class="customers_text1"><?php echo __('Happy', 'InvestoGlobal'); ?></div>
								<?php } else { ?>
									<div class="customers_text1"><?php echo __('Happy', 'InvestoGlobal'); ?></div>
									<div class="customers_text2"><?php echo __('Customers', 'InvestoGlobal'); ?></div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="about-us-sep-description">
						<div class="sare-mt-50"><?php $welcoming = apply_filters( 'the_content', $welcoming_text); echo $welcoming; ?></div>

						<div class="about-us-numeric-word text-transform-uppercase">01 <span><?php echo __('Mission', 'InvestoGlobal'); ?></span></div>
						<?php echo $mission; ?>
						<div class="about-us-numeric-word text-transform-uppercase">02 <span><?php echo __('Vision', 'InvestoGlobal'); ?></span></div>
						<?php echo $vision; ?>
						<div class="about-us-numeric-word text-transform-uppercase">03 <span><?php echo __('Core Values', 'InvestoGlobal'); ?></span></div>
						<?php echo $core_values; ?>
					</div>
				</div>
			</div>
			<!-- Vision -->
		</div>
		<!-- container -->


		<div class="about-center-bg sare-mt-200">
			<div class="video-cover-top-item">
				<div class="container">
					<div class="row row-small-gutter">
						<div class="col-md-4">
							<div class="video-text">
								<div class="video-arrow"><img src="<?php bloginfo('template_url'); ?>/assets/img/video-arrow.png" /></div>
								<div class="sare-fs-68 video-text-item text-center"><?php echo __('Watch Our Video', 'InvestoGlobal'); ?></div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="about-video">
								<a href="<?php echo $video_url_youtube; ?>" data-lity>
									<div class="about-video-play">
										<svg version="1.1" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 213.7 213.7" enable-background="new 0 0 213.7 213.7" xml:space="preserve">
											<polygon class="triangle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="73.5,62.5 148.5,105.8 73.5,149.1 " />
											<circle class="circle" fill="none" stroke-width="7" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="106.8" cy="106.8" r="103.3" />
										</svg>
									</div>
									<?php echo wp_get_attachment_image($video_cover_youtube, 'full','', array( "class" => "w-100" )); ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sare-pt-50 sare-pb-50">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="au-bottom-arrow mt-5 hidden-mobil">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/au-bottom-arrow.png" />
					</div>
					<div class="expert-title <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> text-right <?php } else { ?>text-left<?php } ?> ">
						<div class="expert-title-top color-primary sare-fs-68 line-height-68"><?php echo __('A Company', 'InvestoGlobal'); ?></div>
					</div>
					<div class="expriences <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { echo 'float-right'; } else { } ?>">
						<div class="expriences_number <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { echo 'float-left'; } else { } ?>"><?php echo $languages_count; ?></div>
						<div style="<?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { echo 'margin-right:0px'; } else { } ?>" class="expriences_r <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { echo 'float-left'; } else { } ?>">
							<div class="expriences_text1"><?php echo __('Spoken', 'InvestoGlobal'); ?></div>
							<div class="expriences_text3"><?php echo __('Languages', 'InvestoGlobal'); ?></div>
						</div>
					</div>
				</div>
					<div class="col-md-7">
						<div class="flag-group">
							<div class="sare-fs-30 flag-title"><?php echo $flag_title; ?></div>
							<img src="<?php bloginfo('template_url'); ?>/assets/img/flag-group.png" class="img-fluid"/>
						</div>
						<div class="about-us-sep-description mt-4">
							<p class="sare-fw-300 sare-fs-30"><?php echo $languages_title; ?></p>
							<?php $ldesc = apply_filters( 'the_content', $languages_description); echo $ldesc; ?>
						</div>
					</div>
				</div>
			</div>
		<div class="header-title-about2 sare-mt-100">
			<span class="bottom">
				<div class="hta1 sare-fs-70 line-height-55 text-transform-uppercase"><?php echo __('Our Group', 'InvestoGlobal'); ?></div>
				<div class="hta2 sare-fw-300 color-primary sare-fs-80 line-height-75"><?php echo __('companies', 'InvestoGlobal'); ?></div>
			</span>
		</div>
		<div class="container">
			<div class="row row-5-gutter mt-5">
				<?php if (is_array($company_list) || is_object($company_list)) { ?>
					<?php foreach($company_list as $company) { ?>
						<div class="col-md-2 col-4 mb-2">
							<div class="group-logo">
								<?php if($company['group_link']) { ?>
									<a href="<?php echo $company['group_link']; ?>" target="_blank" title="<?php echo $company['company_name']; ?>">
								<?php } ?>
									<?php echo wp_get_attachment_image($company['company_logo']['ID'], 'full','', array( "class" => "img-fluid" )); ?>
								<?php if($company['group_link']) { ?>
									</a>
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