<?php

/*
		Template Name: All Project
	*/

get_header();

?>

<main>
	<div class="sare-pt-50 sare-pb-50">
		<div class="blog-title-about">
			<div class="container">
				<span>
					<div class="blog-title-header-name sare-fs-80">
						<h1><?php the_title(); ?></h1>
					</div>
				</span>
			</div>
		</div>

		<div class="container sare-mt-20">
			<div class="row">
				<?php

				global $the_query;

				$i = '0';

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$args = array(

					'post_type' => 'post',
					'posts_per_page' => 12,
					'paged' => $paged,

				);

				$the_query = new WP_Query($args);

				if ($the_query->have_posts()) :

					while ($the_query->have_posts()) : $the_query->the_post();

						$i++;

						$city = get_the_terms($post->ID, 'city');

						$district = get_the_terms($post->ID, 'district');

						$types = get_the_terms($post->ID, 'type');

						$statu = get_post_meta($post->ID, "proje_statu", true);
						$_SESSION['unity'] = "";
						if (isset($_GET['unity'])) {

							$unity = $_GET['unity'];
						} else {

							$unity = get_post_meta($post->ID, "unity", true);
						}

						if (get_post_meta($post->ID, "sale_price", true)) {

							$price = get_post_meta($post->ID, "sale_price", true);
						} else {

							$price = '0';
						}

						if ($unity == 'EUR'  or $_SESSION['unity'] == "EUR") {
							$unity = '€';
						} else if ($unity == 'USD' or $_SESSION['unity'] == "USD") {
							$unity = '$';
						} else {

							$unity = '₺';
						}

						if (isset($_GET['unity'])) {

							$sale_price = TCMB_Converter($_GET['unity'], get_post_meta($post->ID, "unity", true), $price) . ' ' . $unity;
						} else {

							// $sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;

							if ($_SESSION['unity']) {
								if ($unity == 'EUR'  or $_SESSION['unity'] == "EUR") {
									$unity = '€';
								} else if ($unity == 'USD' or $_SESSION['unity'] == "USD") {
									$unity = '$';
								} else {

									$unity = '₺';
								}
								$sale_price = TCMB_Converter($_SESSION['unity'], get_post_meta($post->ID, "unity", true), $price) . ' ' . $unity;
							} else {
								$sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;
							}
						}



				?>

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 sare-mt-30">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="project-vertical-img">
									<?php if (!empty($statu)) { ?>
										<?php if ($statu != 'None') { ?>
											<div class="project-images-on-features">
												<div class="project-iof">
													<span class="icon"><i class="bi bi-check2"></i></span> <span class="text"><?php _e('Ready To Move', 'InvestoGlobal'); ?></span>
												</div>
											</div>
										<?php } ?>
									<?php } ?>

									<?php

									if (has_post_thumbnail($post->ID)) {
										echo get_the_post_thumbnail($post->ID, 'archive_project_image', array('class' => 'w-100'));
									} else {
										echo '<img src="' . get_bloginfo('template_url') . '/assets/img/project-vertical.jpg" class="img-fluid">';
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
													<div class="<?php if (apply_filters('wpml_is_rtl', NULL)) { ?>text-left<?php } else { ?>text-right<?php } ?> sare-fw-700 color-primary text-transform-uppercase"><?php if (get_post_meta($post->ID, "sale_price", true) > 0 or !empty(get_post_meta($post->ID, "sale_price", true))) {
																																																							echo $sale_price;
																																																						} else if(empty(get_post_meta($post->ID, "sale_price", true)) or get_post_meta($post->ID, "sale_price", true) == 0) {
																																																							echo __('Sold Out', 'InvestoGlobal');
																																																						}; ?></div>
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
				<div class="col-md-12">
					<div class="sare-pagination sare-mt-20">
						<?php pagination(); ?>
					</div>
				</div>
				<!--sare-pagination-->
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>