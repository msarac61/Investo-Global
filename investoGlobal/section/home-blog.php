<?php 
	$posts = get_posts('post_type=blog&suppress_filters=0&posts_per_page=-1');
	$count = count($posts); 

	if( $count > 1 ) { 
?>
<section id="blog" class="section-blog sare-pt-150">
	<div class="container">
		<div class="blog-title text-center">
			<div class="blog-title-top color-primary sare-fs-68 line-height-68"><?php echo ot_get_option( 'blog___title' ); ?></div>
			<div class="blog-title-bottom sare-fs-14 color-four sare-mt-20 sare-fw-500"><?php echo ot_get_option( 'blog_sub___title' ); ?></div>
		</div>
		<div class="sare-mt-100">
			<div class="sare-step row row-no-gutter">
					<?php
						$i = '0';
						$args = array(
							'post_type' => 'blog',
							'posts_per_page' => 6,
						);
						$the_query = new WP_Query( $args );
						if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : $the_query->the_post();			
						$i++;
					?>
					<div class="col-md-6 border<?php echo $i; ?>">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<div class="blog-home">
								<div class="blog-home-date"><?php the_time('d F Y'); ?></div>
								<div class="blog-home-title"><?php the_title(); ?></div>
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
		<div class="investo-button mx-center-50">
			<a href="<?php echo get_the_permalink(ot_get_option( 'blog___readmore_page')); ?>" title="<?php echo ot_get_option( 'blog___readmore' ); ?>"><?php echo ot_get_option( 'blog___readmore' ); ?> <i class="bi bi-arrow-right"></i></a>
		</div>
	</div>
</section>
<?php } ?>