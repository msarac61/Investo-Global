<?php

	/*
		Template Name: Property --
	*/

	get_header();

	// Custom Fields

	$slider = get_field('slider');
	$types_category = get_field('types_category');
	$featured_content = get_field('featured_content');
	$project_first_item_detail = get_post_meta($post->ID, "project_first_item_detail", true);
	$project_seperate_item_detail = get_post_meta($post->ID, "project_seperate_item_detail", true);
	$project_last_item_detail = get_post_meta($post->ID, "project_last_item_detail", true);
	$project_bottom_content_detail = get_post_meta($post->ID, "project_bottom_content_detail", true);
	$project_bottom_feauted_list = get_field('project_bottom_feauted_list');

	$filter_price = explode(";",$_POST['my_range']);
	$filter_price1 = $filter_price[0];
	$filter_price2 = $filter_price[1];
	$filter_city = $_POST['city'];
	$filter_district = $_POST['district'];
	$filter_type = $_POST['type'];
	$filter_room = $_POST['room'];

	if($_GET['reset']) { 

		unset($_POST);
		$_POST = array();

	}

?>

<main>
	<div class="container sare-mt-50 sare-mb-50">
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel owl-theme property-slider"  <?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> data-rtl="true" <?php } ?>>
					<?php if (is_array($slider) || is_object($slider)) { ?>
						<?php foreach($slider as $slide) { ?>
							<div class="item">
								<?php echo wp_get_attachment_image($slide['ID'], 'archive_slider','', array( "class" => "img-fluid" )); ?>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-12 mt-4 mb-5">
				<div class="row">
					<?php if (is_array($types_category) || is_object($types_category)) { ?>
						<?php foreach($types_category as $category) { ?>
							<?php $word = explode(' ',$category['type_title_2_word']); ?>
							<div class="col-md-3 col-6 sare-fast-filter-mobil-bottom">
								<div class="property-box">
									<div class="property-box-img"><a href="<?php echo $category['type_link']; ?>"><?php echo wp_get_attachment_image($category['type_image']['ID'], 'full','', array( "class" => "img-fluid" )); ?></a></div>
									<div class="property-box-title">
										<div class="property-box-title-1"><a href="<?php echo $category['type_link']; ?>"><?php echo $word[0]; ?></a></div>
										<div class="property-box-title-2"><a href="<?php echo $category['type_link']; ?>"><?php echo $word[1]; ?></a></div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>

				<div class="row sare-mt-150 sare-mobil-top-50">
					<div class="col-md-6">
						<div class="filter-left-1"><?php _e( 'Find the Best Areas to', 'InvestoGlobal' ); ?></div>
						<div class="filter-left-2"><?php _e( 'Buy Property in Turkey', 'InvestoGlobal' ); ?></div>
					</div>
					<div class="col-md-6">
						<form method="post" action="<?php the_permalink(); ?>">
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content modal-filter-popup">
								  <div class="modal-body">
									<input type="text" class="range-price" name="my_range" value="" data-type="double" data-min="20000" data-max="2500000" data-from="<?php if($filter_price1 == true) { echo $filter_price1; } else { ?>100000<?php } ?>" data-to="<?php if($filter_price2 == true) { echo $filter_price2; } else { ?>1800000<?php } ?>" data-grid="true">
									<div class="filter-submit-button mt-3">
										<input type="submit" class="w-100" value="<?php _e( 'Filter', 'InvestoGlobal' ); ?>">
									</div>
								  </div>
								</div>
							  </div>
							</div>
							<div class="row row-5-gutter">
								<div class="col-md-2 hidden-mobil">
									<?php if(!empty($_POST['city']) || !empty($_POST['room']) || !empty($_POST['type']) || !empty($_POST['my_range']) ) { ?>
										<div class="filter-bg text-center sare-fs-12 sare-fw-600 text-transform-uppercase"><a href="<?php the_permalink(); ?>?reset"><?php _e( 'Reset', 'InvestoGlobal' ); ?></a></div>
									<?php } else { ?>
										<div class="filter-bg text-center sare-fs-12 sare-fw-600 text-transform-uppercase"><?php _e( 'Sort By', 'InvestoGlobal' ); ?></div>
									<?php } ?>
									
									<!--<div class="filter-submit-button">
										<input type="submit" class="w-100" value="Filter">
									</div>-->
								</div>
								<div class="col-md-10">
									<div class="row row-5-gutter">
										<div class="col-md-3 col-6 sare-mobil-bottom">
											<div class="filter-item">
												<select  class="w-100 select2 selectpicker" name="city" onchange="if(this.value != 0) { this.form.submit(); }">>
													<option value=""><?php _e( 'City', 'InvestoGlobal' ); ?></option>
													<?php
														$args = array(
															'taxonomy' => 'city',
															'hide_empty' => '0',
														);
														$citys = get_terms($args);
													?>
													<?php foreach($citys as $city) { ?>
														<option value="<?php echo $city->term_id; ?>" <?php if($_POST['city'] == $city->term_id) { echo 'selected'; } ?>><?php echo $city->name; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-3 col-6 sare-mobil-bottom">
											<div class="filter-item">
												<select class="w-100 select2 selectpicker" name="room" onchange="if(this.value != 0) { this.form.submit(); }">>
													<option value=""><?php _e( 'Room', 'InvestoGlobal' ); ?></option>
													<?php
														$args = array(
															'taxonomy' => 'room',
															'hide_empty' => '0',
														);
														$rooms = get_terms($args);
													?>
													<?php foreach($rooms as $room) { ?>
														<option value="<?php echo $room->term_id; ?>" <?php if($_POST['room'] == $room->term_id) { echo 'selected'; } ?>><?php echo $room->name; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-3 col-6 sare-mobil-bottom">
											<div class="filter-item">
												<select class="w-100 select2 selectpicker" name="type" onchange="if(this.value != 0) { this.form.submit(); }">>
													<option value=""><?php _e( 'Type', 'InvestoGlobal' ); ?></option>
													<?php
														$args = array(
															'taxonomy' => 'type',
															'hide_empty' => '0',
														);
														$types = get_terms($args);
													?>
													<?php foreach($types as $type) { ?>
														<option value="<?php echo $type->term_id; ?>" <?php if($_POST['type'] == $type->term_id) { echo 'selected'; } ?>><?php echo $type->name; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="col-md-3 col-6 sare-mobil-bottom">
											<div class="filter-item">
												<a data-toggle="modal" data-target="#exampleModal" class="price-toggle"><?php _e( 'Price', 'InvestoGlobal' ); ?></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="col-md-12 sare-mt-60 sare-no-mobil-top"></div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 col-12 sare-mb-30">
						<div class="first-post-text">
							<?php echo $project_first_item_detail; ?>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 col-12">
						<div class="row">
							<?php if (is_array($featured_content) || is_object($featured_content)) { ?>

							<?php

								foreach($featured_content as $custom_post) {	
								$city = get_the_terms($custom_post, 'city' );
								$district = get_the_terms($custom_post, 'district' );
								$statu = get_post_meta($custom_post, "proje_statu", true);
								$discount = get_post_meta($custom_post, "discount", true);
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
									$unity = get_post_meta($custom_post, "unity", true);
								}
								if(get_post_meta($custom_post, "sale_price", true)) {
									$price = get_post_meta($custom_post, "sale_price", true);
								} else {
									$price = '0';
								}

								if ($unity == 'EUR' or $_SESSION['unity'] == 'EUR') {
									$unity = '€';
								} else if ($unity == 'USD'  or $_SESSION['unity'] == 'USD') {
									$unity = '$';
								} else {
									$unity = '₺';
								}}
								if(isset($_GET['unity']) or $_SESSION['unity']) {
									$sale_price = TCMB_Converter($_SESSION['unity'],get_post_meta($custom_post, "unity", true), $price). ' ' . $unity;
								} else {
									$sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;
								}

							?>

								<div class="col-md-6 col-12 sare-mb-30">
									<a href="<?php echo get_the_permalink($custom_post); ?>" title="<?php echo get_the_title($custom_post); ?>">
										<div class="project-vertical-small">
											<div class="project-images-on-features">
												<div class="project-iof">
													<?php if(!empty($discount)) { ?>
														<span class="icon">%<?php echo $discount; ?></span>
														<span class="text"><?php _e( 'Discount', 'InvestoGlobal' ); ?></span>
													<?php } ?>
													<?php if(!empty($statu)) { ?>
														<?php if($statu != 'None') { ?>
															<span class="text2"><?php _e( 'Ready To Move', 'InvestoGlobal' ); ?></span>
														<?php } ?>
													<?php } ?>
													</div>
												</div>
											<?php echo get_the_post_thumbnail($custom_post, 'property_big', array( 'class' => 'w-100' ) ); ?>
											<div class="proje-detail-vertical">
												<div class="vertical-lokation">
													<div class="sare-fs-14">
														<?php echo $district[0]->name; ?> <span class="zone-viewer"><i class="bi bi-question-lg"></i></span>
													</div>
													<div class="sare-fs-12"><?php echo $city[0]->name; ?></div>
												</div>
												<div class="vertical-price">
													<?php echo $sale_price; ?>
												</div>
											</div>
										</div>
									</a>
								</div>
								<?php } ?>
							</div>
						</div>

						<?php

							$array = array();
						
							if(!empty($_POST['city'])){

								 $array[] =  array(
									'taxonomy' => 'city',
									'field' => 'term_id',
									'terms' => $filter_city,
								);
							} else {
								 $array[] =  array(
									'taxonomy' => 'city',
									'field' => 'term_id',
									'terms' => '343',
								);
							}
							if(!empty($_POST['type'])){
								 $array[] =  array (
									'taxonomy' => 'type',
									'field' => 'term_id',
									'terms' => $filter_type,
								);
							}
							if(!empty($_POST['room'])){
								 $array[] =  array (
									'taxonomy' => 'room',
									'field' => 'term_id',
									'terms' => $filter_room,
								);
							}

							global $the_query;

							$i = '0';

							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

							if(isset($_POST['my_range'])) {

								$args = array(

									'post_type' => 'post',
									'posts_per_page' => 15,
									'paged' => $paged,   

								   'tax_query' => array (
										'relation' => 'OR',
										$array
									),

									'meta_query'	=> array(
										'relation' => 'AND',
											array(
												'key' => 'sale_price',
												'value' => $filter_price1,
												'compare' => '>',
												'type' => 'NUMERIC'
											),
											array(
												'key' => 'sale_price',
												'value' => $filter_price2,
												'compare' => '<=',
												'type' => 'NUMERIC'
											)
									),
									'meta_query' => array(
										array(
										  'key' => 'sale_price',
										  'value' => '0',
										  'compare' => '>'
										)
									),
								);

							} else {

								$args = array(

									'post_type' => 'post',
									'posts_per_page' => 15,
									'paged' => $paged, 
									'tax_query' => array (
										'relation' => 'OR',
										$array
									),
									'meta_query' => array(
										array(
										  'key' => 'sale_price',
										  'value' => '0',
										  'compare' => '>'
										)
									),

								);

							}

							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) :
							while ( $the_query->have_posts() ) : $the_query->the_post();		
							$i++;
							$city = get_the_terms($post->ID, 'city' );
							$district = get_the_terms($post->ID, 'district' );
							$types = get_the_terms($post->ID, 'type' );
							$statu = get_post_meta($post->ID, "proje_statu", true);
							if(isset($_GET['unity'])) {
								$unity = $_GET['unity'];
							} else {
								$unity = get_post_meta($post->ID, "unity", true);
							}
							if(get_post_meta($post->ID, "sale_price", true)) {
								$price = get_post_meta($post->ID, "sale_price", true);
							} else {
								$price = '0';
							}
							if($unity == 'EUR') {
								$unity = '€';
							} else if($unity == 'USD') {
								$unity = '$';
							} else {
								$unity = '₺';
							}
							if(isset($_GET['unity'])) {
								$sale_price = TCMB_Converter($_GET['unity'], get_post_meta($post->ID, "unity", true), $price). ' ' . $unity;
							} else {
								$sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;
							}



						?>

						<?php if($i == '9') { ?>
							<div class="col-md-12 col-12 sare-mb-30">
								<div class="seperator-1 text-center">
									<div class="title-svg">
										<div class="icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="83px" height="70px">
												<image x="0px" y="0px" width="83px" height="70px" xlink:href="data:img/png;base64,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"/>
											</svg>
										</div>
									</div>
									<?php echo $project_seperate_item_detail; ?>
								</div>
							</div>
						<?php } ?>
						<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12 sare-mb-30">
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
										   echo get_the_post_thumbnail( $post->ID, 'archive_project_image', array( 'class' => 'img-fluid' ) );
										} else {
											echo '<img src="'.get_bloginfo('template_url').'/assets/img/project-vertical.jpg" class="img-fluid">';
										}
									?>

									<div class="project-images-on-title">
										<?php if(!empty($types[0]->name)) { ?>
										<div class="project-iof-title sare-fs-14 sare-fw-600 text-transform-uppercase text-center"><?php echo $types[0]->name; ?></div>
										<?php } ?>
										<div class="project-iof-price sare-fw-600">
											<div class="row row-no-gutter align-item-center">
												<div class="col-md-7 col-7">
													<div class="city-dot-iof sare-fs-14 text-transform-uppercase">
														<?php echo $district[0]->name; ?> <span class="zone-viewer"><i class="bi bi-question-lg"></i></span>
													</div>
													<div class="city-iof sare-fs-12"><?php echo $city[0]->name; ?></div>
												</div>
												<div class="col-md-5 col-5 Xprice">
													<div class="<?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?>text-left<?php } else { ?>text-right<?php } ?> sare-fw-700 color-primary"><?php echo $sale_price; ?></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php
						endwhile;
						endif;
						wp_reset_postdata(); 
					?>
					<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12 sare-mb-30">
						<div class="last-post-text">
							<?php echo $project_last_item_detail; ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="sare-pagination sare-mt-20">
							<?php pagination(); ?>
						</div>
					</div>					
					<!--sare-pagination-->
					<div class="col-md-12 col-12 sare-mb-50 sare-mt-50">
						<div class="header-title-about2 sare-mt-100">
							<span class="bottom">
								<div class="hta1 color-primary sare-fw-600 sare-fs-32 line-height-55 text-transform-uppercase"><?php _e( 'Looking to purchase a', 'InvestoGlobal' ); ?></div>
								<div class="hta2 color-tertiary sare-fw-300 color-primary sare-fs-80"><?php _e( 'Property ?', 'InvestoGlobal' ); ?></div>
							</span>
						</div>
						<div class="sare-mt-50">
							<div class="seperator-1 text-center">
								<?php echo $project_bottom_content_detail; ?>
							</div>
						</div>
						<div class="sare-mt-50">
							<div class="seperator-1">
								<div class="row">

									<div class="col-md-12">
										<div class="prop-step-title">
											<?php _e( '3 Ways to Obtain Turkish Citizenship', 'InvestoGlobal' ); ?>
										</div>
									</div>

									<?php foreach($project_bottom_feauted_list as $fea) { ?>
									<div class="col-md-4 sare-no-mobil-top ">
										<div class="property-icon-box">
											<div class="propery-icon">
												<?php echo $fea['featured_list_icon']; ?>
											</div>
											<div class="property-icon-description">
												<?php echo $fea['featured_list_detail']; ?>
											</div>
										</div>
									</div><!-- col-md-4-->
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--row row-10-gutter sare-mt-20-->
			</div>
			<!--.col-md-12-->
		</div>
		<!--row row-10-gutter-->
	</div>
	<!--container sare-mt-50 sare-mb-50-->
	<div class="which-district">
		<div class="container">
			<div class="which-district-title text-center">
				<?php if ( apply_filters( 'wpml_is_rtl', NULL) ) { ?> 
					<div class="which-district-top-title"><?php _e( 'Which', 'InvestoGlobal' ); ?> <?php _e( 'Districts ?', 'InvestoGlobal' ); ?></div>
				<?php } else { ?>
					<div class="which-district-top-title"><?php _e( 'Which', 'InvestoGlobal' ); ?></div>
					<div class="which-district-sub-title"><?php _e( 'Districts ?', 'InvestoGlobal' ); ?></div>
				<?php } ?>
			</div>
			<?php
				$args = array(
					'taxonomy' => 'district',
				);
				$districts = get_terms($args);
			?>
			<div class="district-list">
				<ul>
					<?php foreach($districts as $district) { ?>
						<li>
							<div><a href="<?php echo get_term_link($district->term_id); ?>"><?php echo $district->name; ?></a></div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</main>
 <?php get_footer(); ?>

<script>

	setTimeout(function(){
	   $('.property-main-form').show();
	   $('.opened-lightbox-form-item').hide();
	}, 10000);

</script>