<?php get_header(); ?>

	<main>
		<?php if (!wp_is_mobile() ) { ?>
			<div class="sare-pt-50 sare-pb-50">
				<div class="blog-title-about">
					<div class="container">
						<span>
							<div class="blog-single-title-header-name sare-fs-80"><h1><?php the_title(); ?></h1></div>
						</span>
					</div>
				</div>
			<?php } ?>
			<div class="container sare-mt-50">
				<div class="row row-10-gutter">
					<div class="col-md-8">
						<div class="single-blog-post">
							<div class="single-blog-post-img"><?php echo get_the_post_thumbnail(get_the_id(), 'full', array( 'class' =>'img-fluid' )); ?></div>
							<div class="sare-mt-100 sare-mobil-100">
								<?php if (wp_is_mobile() ) { ?>
									<div class="mobil-blog-title"><h1><?php the_title(); ?></h1></div>
								<?php } ?>
								<?php the_content(); ?>
							</div>
							<?php comments_template(); ?> 
						</div>
					</div><!-- col-md-8-->

					<div class="col-md-4">

						<div class="recent-news-sidebar">
							<ul>
								<?php
									$args = array(
										'post_type' => 'blog',
										'posts_per_page' => 4,
									);
									$the_query = new WP_Query( $args );
									if ( $the_query->have_posts() ) :
									while ( $the_query->have_posts() ) : $the_query->the_post();		
									$i++;
								?>
								<li>
									<div class="row">
										<div class="col-md-9">
											<div class="p-4">
												<div class="recent-news-sidebar-title">
													<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
												</div>

												<div class="recent-news-sidebar-description mt-3">
													<?php echo wp_trim_words( get_the_content(), 20, '...' ); ?>
												</div>
											</div>
										</div>
										<div class="col-md-3 hidden-mobil">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail(get_the_id(), 'sidebar_blog', array( 'class' => 'img-fluid' )); ?></a>
										</div>
									</div>
								</li>
								<?php
									endwhile;
									endif;
									wp_reset_postdata();
								?>
							</ul>
						</div>

						<div class="row sare-mt-20 fixed-project">
							<?php
								$args = array(
									'post_type' => 'post',
									'orderby' => 'rand',
									'order'    => 'ASC',
									'posts_per_page' => 3,
								);
								$the_query = new WP_Query( $args );
								if ( $the_query->have_posts() ) :
								while ( $the_query->have_posts() ) : $the_query->the_post();		
								$i++;
								$custom_post = get_the_id();

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
								}

								if(isset($_GET['unity']) or $_SESSION['unity']) {

									$sale_price = TCMB_Converter( $_SESSION['unity'],get_post_meta($custom_post, "unity", true), $price). ' ' . $unity;

								} else {

									$sale_price = number_format($price, 0, ',', '.') . ' ' . $unity;

								}

							?>
							<div class="col-md-12 col-12 sare-mb-20">
								<a href="<?php echo get_the_permalink($custom_post); ?>" title="<?php echo get_the_title($custom_post); ?>">
									<div class="project-vertical-small">
										<?php echo get_the_post_thumbnail($custom_post, 'property_big', array( 'class' => 'w-100' ) ); ?>
										<div class="proje-detail-vertical">
											<div class="vertical-lokation">
												<div class="sare-fs-14">
													<?php echo $district[0]->name; ?>
												</div>
												<div class="sare-fs-12"><?php echo $city[0]->name; ?></div>
											</div>
											<div class="vertical-price text-center">
												<?php if($sale_price > 0) { echo $sale_price; } else { echo __( 'Sold Out', 'InvestoGlobal' ); }; ?>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); ?>