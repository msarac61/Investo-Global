<?php 

/*
	Template Name: Get Offer
*/


get_header(); ?>

	<main>
		<div class="sare-pt-50 sare-pb-20">
			<div class="blog-title-about">
				<div class="container">
					<span><div id="offer_title" class="blog-title-header-name sare-fs-80"><h1><?php the_title(); ?></h1></div></span>
				</div>
			</div>
			<div class="container sare-mt-50">
				<div id="form" class="offer-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</main>	

	<?php if(ot_get_option( 'company_map_code' )) { ?>
		<div class="google-map sare-mt-10">
			<?php echo ot_get_option( 'company_map_code' ); ?>
		</div>
	<?php } ?>

<?php get_footer(); ?>

<script>

	 $(function () {
		$('[name="acceptance-944"]').change(function () {
			if ($(this).is(":checked")) {
				$(".bi-app").toggle();
				$(".bi-check2-square").toggle();
			}
		});
	});

</script>