<?php get_header(); ?>

	<main>
		<div class="sare-pt-50 sare-pb-50">
			<div class="blog-title-about">
				<div class="container">
					<span><div class="blog-title-header-name sare-fs-80"><h1><?php the_title(); ?></h1></div></span>
				</div>
			</div>
			<div class="container">
				<div class="page-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</main>	

<?php get_footer(); ?>