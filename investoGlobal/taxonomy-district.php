<?php

	get_header();
	$id = get_queried_object()->term_id;
	$population_age = get_field('population_age','district_'.$id.'');
	$population_of_the_district = get_field('population_of_the_district','district_'.$id.'');
	$population_of_the_education = get_field('population_of_the_education','district_'.$id.'');
	$annual_population_increase = get_field('annual_population_increase','district_'.$id.'');
	$faq_snippet = get_field('faq_questions_snippet','district_'.$id.'');
	$video = get_field('youtube_video_code','district_'.$id.'');
  $youtube_fixed_video_title = get_field('youtube_fixed_video_title','district_'.$id.'');
  // Region Changes
  $region_district = get_post_meta($post->ID, "other_district", true);
?>
       <main>

		<div class="sare-pt-50">
			<div class="sare-single-section">
				<div class="container">
					<div class="population-table-title">
						<div class="population-table-title-1"><span><?php single_term_title(); ?></span> <?php if($video) { ?><a class="hidden-mobil videoDistrict" href="https://www.youtube.com/watch?v=<?php echo $video; ?>" data-lity><i class="bi bi-play-circle"></i></a><?php } ?></div>
						<div class="population-table-title-2"><?php echo __('Population Informations', 'InvestoGlobal'); ?></div>
					</div>
					<div class="row row-5-gutter sare-mt-50">
						<div class="col-md-3">
							<div class="population-age-title"><?php echo __('Population Age', 'InvestoGlobal'); ?></div>
							<div class="population-age-list">
								<ul>
									<?php if (is_array($population_age) || is_object($type)) { ?>
										<?php foreach($population_age as $population) { ?>
											<li>
												<div class="population-age-list-left">
													<div class="pagl-age"><?php echo $population['age_range']; ?></div>
													<div class="pagl-text"><?php echo __('Years Old', 'InvestoGlobal'); ?></div>
												</div>
												<div class="population-age-list-right">
													<div class="pagl-percent">%<?php $percent =  ($population['age_percent_person'] * 100) / ($population_of_the_district); echo number_format($percent, 2, ',', ' '); ?></div>
												</div>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							</div>
						</div>
						<div class="col-md-1"></div>
						<div class="col-md-8 sare-mt-50">
							<div class="row">
								<div class="col-md-4 sare-mobil-bottom">
									<div class="population-icon-box border-none">
										<div class="population-icon population-icon1">
											<svg height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path d="M26.66,38.58a3.46,3.46,0,0,0,3.28-3.29v-7.4c0-2.72-5.36-4.11-8.22-4.11s-8.22,1.39-8.22,4.11v7.4a3.47,3.47,0,0,0,3.29,3.29"/><path d="M36.52,40.22c1.6,0,3.29-.87,3.29-2.46v-7.4c0-2.72-4.83-4.12-7.4-4.12a8.17,8.17,0,0,0-.82.05"/><path d="M21.72,21.31A3.15,3.15,0,0,0,25,18V16.38a3.15,3.15,0,0,0-3.29-3.29,3.16,3.16,0,0,0-3.29,3.29V18A3.16,3.16,0,0,0,21.72,21.31Z"/><line x1="36.52" y1="50.91" x2="36.52" y2="32"/><path d="M47.21,43.51c1.6,0,3.29-.87,3.29-2.47v-7.4c0-2.71-4.83-4.11-7.4-4.11a10.08,10.08,0,0,0-1.64.15"/><line x1="47.21" y1="50.91" x2="47.21" y2="35.29"/><line x1="26.66" y1="50.91" x2="26.66" y2="29.53"/><line x1="16.79" y1="29.53" x2="16.79" y2="50.91"/><line x1="21.72" y1="37.76" x2="21.72" y2="50.91"/><path d="M32.41,23.78a3.16,3.16,0,0,0,3.29-3.29V18.84a3.29,3.29,0,0,0-6.58,0v1.65A3.16,3.16,0,0,0,32.41,23.78Z"/><path d="M43.92,27.07a3.16,3.16,0,0,0,3.29-3.29V22.13a3.29,3.29,0,1,0-6.58,0v1.65A3.16,3.16,0,0,0,43.92,27.07Z"/></svg>
										</div>
										<div class="population-title"><?php echo __('Population Of The ', 'InvestoGlobal'); ?> <br> <?php single_term_title(); ?></div>
										<div class="population-text"><?php echo thousandsCurrencyFormat($population_of_the_district); ?></div>
									</div>
								</div>
								<div class="col-md-4 sare-mobil-bottom">
									<div class="population-icon-box border-none">
										<div class="population-icon">
											   <svg height="130" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path d="M32.14,34.39a.71.71,0,0,1-.32-.07l-20.4-8.54a.83.83,0,0,1,0-1.52l20.13-8.82a.82.82,0,0,1,.65,0L52.58,24a.83.83,0,0,1,0,1.52L32.47,34.32A.93.93,0,0,1,32.14,34.39ZM13.84,25l18.29,7.66,18-7.91L31.87,17.09Z"/><path d="M23.65,43.27H22V29.66a.84.84,0,0,1,.45-.74l9.18-4.78.76,1.47-8.73,4.55Z"/><path d="M25.78,51.13H19.85A.83.83,0,0,1,19,50.3V46.24a3.79,3.79,0,1,1,7.58,0V50.3A.83.83,0,0,1,25.78,51.13Zm-5.1-1.66H25V46.24a2.14,2.14,0,0,0-4.28,0Z"/><path d="M32.14,40.16c-7.17,0-13.57-2.29-15.95-5.71a.86.86,0,0,1-.14-.47V27.19H17.7v6.52c2.17,2.83,8.05,4.8,14.44,4.8s12.27-2,14.44-4.8V26.87h1.65V34a.86.86,0,0,1-.14.47C45.71,37.87,39.31,40.16,32.14,40.16Z"/></svg>
										</div>
										<div class="population-title"><?php echo __('Population Of The Education', 'InvestoGlobal'); ?></div>
										<div class="population-text"><?php echo $population_of_the_education; ?></div>
									</div>
								</div>
								<div class="col-md-4 sare-mobil-bottom">
									<div class="population-icon-box border-none">
										<div class="population-icon">
												<svg height="130"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path class="cls-1" d="M31.77,42a13,13,0,1,1,13.05-13A13.06,13.06,0,0,1,31.77,42Zm0-24.46A11.42,11.42,0,1,0,43.19,28.93,11.43,11.43,0,0,0,31.77,17.51Z"/><path class="cls-1" d="M53.17,51.14a.8.8,0,0,1-.57-.24L39.84,38.15A.82.82,0,0,1,41,37L53.75,49.75a.81.81,0,0,1,0,1.15A.82.82,0,0,1,53.17,51.14Z"/><path class="cls-1" d="M12.65,34.94a.81.81,0,0,1-.81-.81V33a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v1.09A.82.82,0,0,1,12.65,34.94Z"/><path class="cls-1" d="M9,34.94a.82.82,0,0,1-.82-.81v-3.7A.82.82,0,0,1,9,29.62a.81.81,0,0,1,.81.81v3.7A.81.81,0,0,1,9,34.94Z"/><path class="cls-1" d="M16.46,34.94a.82.82,0,0,1-.82-.81V28.47a.82.82,0,0,1,.82-.81.81.81,0,0,1,.81.81v5.66A.81.81,0,0,1,16.46,34.94Z"/><path class="cls-1" d="M24.07,34.94a.82.82,0,0,1-.82-.81V28.58a.82.82,0,0,1,.82-.81.81.81,0,0,1,.81.81v5.55A.81.81,0,0,1,24.07,34.94Z"/><path class="cls-1" d="M28.09,34.94a.82.82,0,0,1-.82-.81v-7.5a.82.82,0,0,1,.82-.82.82.82,0,0,1,.81.82v7.5A.81.81,0,0,1,28.09,34.94Z"/><path class="cls-1" d="M32.11,34.94a.82.82,0,0,1-.82-.81V21.63a.82.82,0,0,1,.82-.82.82.82,0,0,1,.81.82v12.5A.81.81,0,0,1,32.11,34.94Z"/><path class="cls-1" d="M36,34.94a.81.81,0,0,1-.81-.81V21.63a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v12.5A.82.82,0,0,1,36,34.94Z"/><path class="cls-1" d="M40,34.94a.81.81,0,0,1-.81-.81V28.37a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v5.76A.82.82,0,0,1,40,34.94Z"/><path class="cls-1" d="M47.32,34.94a.81.81,0,0,1-.81-.81V28.91a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v5.22A.82.82,0,0,1,47.32,34.94Z"/><path class="cls-1" d="M51.13,34.94a.82.82,0,0,1-.82-.81V25a.82.82,0,0,1,.82-.82.82.82,0,0,1,.81.82v9.13A.81.81,0,0,1,51.13,34.94Z"/><path class="cls-1" d="M55,34.94a.81.81,0,0,1-.81-.81V27.28a.82.82,0,0,1,.81-.82.82.82,0,0,1,.82.82v6.85A.82.82,0,0,1,55,34.94Z"/></svg>
										</div>
										<div class="population-title"><?php echo __('Annual Population Increase', 'InvestoGlobal'); ?></div>
										<div class="population-text">%<?php echo $annual_population_increase; ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($video) { ?>
				<div class="container hidden-desktop sare-mt-30">
					<div class="row">
						<div class="col-md-12">
						<div class="discover-video-title"><?php echo __('Discover', 'InvestoGlobal'); ?> <?php single_term_title(); ?></div>
						<iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>		
				</div>
			<?php } ?>

			<div class="container">

				<div class="row">

					<?php $i = '0'; if (have_posts()) : while (have_posts()) : the_post();
							$i++;
							$city = get_the_terms($post->ID, 'city' );
							$district = get_the_terms($post->ID, 'district' );
							$types = get_the_terms($post->ID, 'type' );
							$statu = get_post_meta($post->ID, "proje_statu", true);
              $_SESSION['unity'] = "";
							if (isset($_GET['unity'])) {
								$_SESSION['unity'] = $_GET['unity'];
								if($_SESSION['unity']){
									 $unity = $_SESSION['unity'];
								}
							} 
							else if($_SESSION['unity']!=""){
								$unity = $_SESSION['unity'];
							}
							else {
								$unity = get_post_meta($post->ID, "unity", true);
							}
							if(get_post_meta($post->ID, "sale_price", true)) {
								$price = get_post_meta($post->ID, "sale_price", true);
							} else {
								$price = '0';
							}
							if ($unity == 'EUR' or $_SESSION['unity'] == 'EUR') {
								$unity = '€';
							} else if ($unity == 'USD'  or $_SESSION['unity'] == 'USD') {
								$unity = '$';
							} else {
								$unity = '₺';
							}
							if(isset($_GET['unity']) or $_SESSION['unity']) {
								$sale_price = TCMB_Converter($_SESSION['unity'],get_post_meta($post->ID, "unity", true), $price). ' ' . $unity;
							} else {

								$sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;

							}

					?>

						<?php if($i == 5) { ?>
							<?php if(term_description()) { ?>
								<div class="col-md-12 col-12 sare-mb-30 sare-mt-50">
									<div class="seperator-2 text-center">
										<div class="title-svg">
											<div class="icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="83px" height="70px">
													<image x="0px" y="0px" width="83px" height="70px" xlink:href="data:img/png;base64,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"/>
												</svg>
											</div>
										</div>
										<?php echo term_description(); ?>
									</div>
								</div>
							<?php } ?>
						<?php } ?>

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 sare-mt-30">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="project-vertical-img">
									<?php if(!empty($statu)) { ?>
										<?php if($statu != 'None') { ?>
											<div class="project-images-on-features">
												<div class="project-iof">
													<span class="icon"><i class="bi bi-check2"></i></span> <span class="text"><?php _e( 'Ready To Move', 'InvestoGlobal' ); ?></span>
												</div>
											</div>
										<?php } ?>
									<?php } ?>
									<?php
										if ( has_post_thumbnail( $post->ID ) ) {
										   echo get_the_post_thumbnail( $post->ID, 'archive_project_image', array( 'class' => 'w-100' ) );
										} else {
											echo '<img src="'.get_bloginfo('template_url').'/assets/img/project-vertical.jpg" class="img-fluid">';
										}
									?>

									<div class="project-images-on-title">
										<div class="project-custom-title"><?php the_title(); ?></div>
										<div class="project-iof-price sare-fw-600 text-transform-uppercase">
											<div class="row row-no-gutter align-item-center">
												<div class="col-md-7 col-7">
													<div class="city-dot-iof sare-fs-14">
														<?php echo $district[0]->name; ?>
													</div>
													<div class="city-iof sare-fs-12"><?php echo $city[0]->name; ?></div>
												</div>
												<div class="col-md-5 col-5 Xprice">
													<div class="<?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?>text-left<?php } else { ?>text-right<?php } ?> sare-fw-700 color-primary text-transform-uppercase"><?php if(get_post_meta($post->ID, "sale_price", true) > 0) { echo $sale_price; } else { echo __( 'Sold Out', 'InvestoGlobal' ); }; ?></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php endwhile;else : ?>
					<?php endif; ?> 

					<?php if($i < 5) { ?>
						<?php if(term_description()) { ?>
							<div class="col-md-12 col-12 sare-mb-30 sare-mt-50">
								<div class="seperator-2 text-center">
									<div class="title-svg">
										<div class="icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="83px" height="70px">
												<image x="0px" y="0px" width="83px" height="70px" xlink:href="data:img/png;base64,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"/>
											</svg>
										</div>
									</div>
									<?php echo term_description(); ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>

					<div class="col-md-12">
						<div class="sare-pagination sare-mt-50">
							<?php pagination_wp_query(); ?>
						</div>
					</div>

					<?php wp_reset_query(); ?>
						<?php if (is_array($faq_snippet) || is_object($faq_snippet)) { ?>
							<div class="col-md-12 sare-mt-50">
								<div class="accordion" id="FaQuestion" itemscope itemtype="https://schema.org/FAQPage">
									<?php $i = '0'; foreach($faq_snippet as $faq) { $i++; ?>
										<div class="faq" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
											<div class="faquestionTitle" data-toggle="collapse" data-target="#Faq<?php echo $i; ?>" aria-expanded="true" aria-controls="Faq<?php echo $i; ?>" itemprop="name"><i class="bi bi-plus-circle-dotted"></i> <?php echo $faq['faq_question_title']; ?></div>
											<div id="Faq<?php echo $i; ?>" class="collapse <?php if($i == '1') { echo 'show'; } ?>" aria-labelledby="headingOne" data-parent="#FaQuestion" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
												<div class="faqReply" itemprop="text"><?php echo apply_filters('the_content', $faq['faq_question_description']); ?></div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
        </main>

		<?php

			$form_title = ot_get_option( 'footer_form___title' );
			$form_description = ot_get_option( 'footer_form___description' );
			$form_shortcode = ot_get_option( 'footer_form___shortcode___' );

		?>
    <?php 

if(!empty($region_district)){
      $region_control = 0;
      foreach($region_district as $districts) { 
        $region_control++;
      }
      if($region_control>1){
    ?>

	<div class="region sare-mt-150 sare-mobil-top-50 sare-mt-150">
    <div class="container">
	<div class="population-table-title  mb-5">
		<div class="population-table-title-1"><?php echo __('region', 'InvestoGlobal'); ?></div>
			<div class="population-table-title-2"><?php echo __('Price Changes', 'InvestoGlobal'); ?></div>
		</div>
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="item">
            <div class="top-area d-md-flex align-items-center justify-content-between">
              <div class="text">
                <div class="city"><?php echo $city[0]->name; ?></div>
                <div class="distinct"><?php echo $district[0]->name; ?></div>
                <div class="info"><?php echo __('changes in house rental prices', 'InvestoGlobal'); ?></div>
              </div>
              <div class="region-tab">
				      <div class="tab-title"><?php echo __('For Rent', 'InvestoGlobal'); ?></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link " id="one-rental-tab" data-toggle="tab" href="#one-rental" role="tab"
                      aria-controls="one-rental" aria-selected="true"><?php echo __('1 year', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="two-rental-tab" data-toggle="tab" href="#two-rental" role="tab"
                      aria-controls="two-rental" aria-selected="false"><?php echo __('3 years', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="three-rental-tab" data-toggle="tab" href="#three-rental" role="tab"
                      aria-controls="three-rental" aria-selected="false"><?php echo __('5 years', 'InvestoGlobal'); ?></a>
                  </li>
                </ul>
              </div>
            </div>
           
            <div class="bottom-area">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="one-rental" role="tabpanel" aria-labelledby="one-rental-tab">
                  <?php echo  region_price('1_years__rental_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                  <div class="tab-pane fade show active" id="two-rental" role="tabpanel" aria-labelledby="two-rental-tab">
                  <?php echo region_price('3_years__rental_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                <div class="tab-pane fade" id="three-rental" role="tabpanel" aria-labelledby="three-rental-tab">
                  <?php echo region_price('5_years__rental_percent', $district[0]->term_id, $region_district);  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="item">
            <div class="top-area d-md-flex align-items-center justify-content-between">
              <div class="text">
              <div class="city"><?php echo $city[0]->name; ?></div>
                <div class="distinct"><?php echo $district[0]->name; ?></div>
                <div class="info"><?php echo __('changes in house sale prices', 'InvestoGlobal'); ?></div>
              </div>
              <div class="region-tab">
				      <div class="tab-title"><?php echo __('For Sale', 'InvestoGlobal'); ?></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link " id="one-sale-tab" data-toggle="tab" href="#one-sale" role="tab" aria-controls="one-sale" aria-selected="true"><?php echo __('1 year', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="two-sale-tab" data-toggle="tab" href="#two-sale" role="tab" aria-controls="two-sale" aria-selected="false"><?php echo __('3 years', 'InvestoGlobal'); ?></a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="three-sale-tab" data-toggle="tab" href="#three-sale" role="tab" aria-controls="three-sale" aria-selected="false"><?php echo __('5 years', 'InvestoGlobal'); ?></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bottom-area">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="one-sale" role="tabpanel" aria-labelledby="one-sale-tab">
                 <?php echo region_price('1_years__sale_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                <div class="tab-pane fade  show active" id="two-sale" role="tabpanel" aria-labelledby="two-sale-tab">
                 <?php echo region_price('3_years__sale_percent', $district[0]->term_id, $region_district);  ?>
                </div>
                <div class="tab-pane fade" id="three-sale" role="tabpanel" aria-labelledby="three-sale-tab">
                  <?php echo  region_price('5_years__sale_percent', $district[0]->term_id, $region_district);  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 


  <?php }  } ?>

  <?php 
    if($video){ ?>
        <div class="fixed-video">
            <div class="video-title mb-3" id="video-title"><?php echo __('Get a closer look <br> at the district', 'InvestoGlobal'); ?></div>
            <div class="video mb-2" id="video"> 
			<iframe
			id="youtube-video"
			width="100%"
			height="200"
			src="https://www.youtube.com/embed/<?= $video; ?>?enablejsapi=1&version=3&playerapiid=ytplayer"
			title="YouTube video player"
			frameborder="0"
			allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
			allowfullscreen>
		</iframe>
      </div>
      <div class="close-button" id="close-button"><i class="ri-play-line" id="close-button-icon"></i></div>
    </div>
    <?php }  ?>


		<div class="footer-form">
			<div class="footer-form-window">
				<div class="footer-form-window-bg">
					<div class="footer-only-form sare-pt-50">
						<div class="footer-form-title color-primary sare-fw-600 sare-fs-44"><?php echo $form_title; ?></div>
						<div class="footer-form-sub-title color-four text-center <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { } else { ?>letter-spacing-20<?php } ?> sare-fw-600 sare-fs-24 text-transform-uppercase"><?php echo $form_description; ?></div>
						<?php echo do_shortcode($form_shortcode); ?>
					</div>
				</div>
			</div>
		</div>

 <?php get_footer(); ?>