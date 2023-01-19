<?php

	/*
		Template Name: Blog
	*/

	get_header();
	
	$categories = get_post_meta(get_the_id(), "categories_to_show", true);

?>

	<?php

		$pid = array(); 
		$args = array(
			'post_type' => 'blog',
			'posts_per_page' => 3,
			'meta_key' => 'views_total',
			'orderby' => 'meta_value_num',
			'order' => 'DESC',

		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();			
		$pid[] = get_the_id();
		endwhile;
		endif;
		wp_reset_postdata();

	?>

	<main>
		<div class="sare-pt-50 sare-pb-50">
			<div class="blog-title-about">
				<div class="container">
					<span>
						<div class="blog-title-header-name sare-fs-80"><h1><?php the_title(); ?></h1></div>
					</span>
				</div>
			</div>
			<div class="container sare-mt-80">
				<div class="row row-10-gutter hidden-mobil">
					<div class="col-md-8">
						<div class="blog-big-post">
							<div class="big-post-img">
								<a href="<?php echo get_the_permalink($pid[0]); ?>" title="<?php echo get_the_title($pid[0]); ?>"><?php echo get_the_post_thumbnail($pid[0], 'full', array( 'class' => 'img-fluid' )); ?></a>
							</div>
							<div class="big-post-title">
								<a href="<?php echo get_the_permalink($pid[0]); ?>" title="<?php echo get_the_title($pid[0]); ?>"><?php echo get_the_title($pid[0]); ?></a>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="big-post-category sare-mt-20"><span><?php _e( 'Category : ', 'InvestoGlobal' ); ?></span> <?php $category =  get_the_category($pid[0]); echo $category[0]->name; ?></div>
									<div class="big-post-date sare-mt-20"><span><?php _e( 'Release Date : ', 'InvestoGlobal' ); ?> </span> <?php echo get_the_time( 'F d - Y', $pid[0]); ?></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="blog-small-post sare-mb-20">
							<div class="small-post-img">
								<a href="<?php echo get_the_permalink($pid[1]); ?>" title="<?php echo get_the_title($pid[1]); ?>"><?php echo get_the_post_thumbnail($pid[1], 'full', array( 'class' => 'img-fluid' )); ?></a>
							</div>
							<div class="small-post-title">
								<a href="<?php echo get_the_permalink($pid[1]); ?>" title="<?php echo get_the_title($pid[1]); ?>"><?php echo get_the_title($pid[1]); ?></a>
							</div>
						</div>

						<div class="blog-small-post">
							<div class="small-post-img">
								<a href="<?php echo get_the_permalink($pid[2]); ?>" title="<?php echo get_the_title($pid[2]); ?>"><?php echo get_the_post_thumbnail($pid[2], 'full', array( 'class' => 'img-fluid' )); ?></a>
							</div>
							<div class="small-post-title">
								<a href="<?php echo get_the_permalink($pid[2]); ?>" title="<?php echo get_the_title($pid[2]); ?>"><?php echo get_the_title($pid[2]); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-5-gutter sare-mt-100">
					<?php foreach($categories as $cat) { ?>
						<div class="col-md-4 hidden-mobil">
							<div class="category-box">
								<div class="category-box-title sare-mobil-blog-category-title"><?php echo get_cat_name($cat); ?></div>
								<ul>
									<?php
										$args = array(
											'post_type' => 'blog',
											'posts_per_page' => 3,
											'cat' => array($cat),
										);
										$the_query = new WP_Query( $args );
										if ( $the_query->have_posts() ) :
										while ( $the_query->have_posts() ) : $the_query->the_post();		
									?>
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<div class="blog-category">
												<div class="blog-category-date"><?php echo get_the_time( 'F d - Y', get_the_id()); ?></div>
												<div class="blog-category-title"><?php echo wp_trim_words( get_the_title(), 8, '...' ); ?></div>
											</div>
										</a>
									</li>
									<?php
										endwhile;
										endif;
										wp_reset_postdata();
									?>
								</ul>
							</div>
						</div>
					<?php } ?>
					<div class="col-md-12 sare-mt-50"></div>
					<div class="col-md-12">
						<div class="blog-latest-title">
							<?php _e( 'Latest News', 'InvestoGlobal' ); ?>
						</div>
					</div>
					<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array(
							'post_type' => 'blog',
							'posts_per_page' => 9,
							'paged' => $paged, 
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();		
						$i++;

					?>
						<div class="col-md-4">
							<div class="blog-small-post sare-mb-20">
								<div class="small-post-img">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail(get_the_id(), 'blog', array( 'class' => 'img-fluid' )); ?></a>
								</div>
								<div class="small-post-title-small-title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</div>
							</div>
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
				</div>
			</div>
			<!-- container -->
		</div>
		<!-- sare-pt-50 sare-pb-50-->
	</main>

<?php get_footer(); ?>