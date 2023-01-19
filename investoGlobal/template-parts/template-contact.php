<?php

	/*
		Template Name: Contact
	*/

	get_header();

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
                    <div class="services-page-title"><h1><?php the_title(); ?></h1></div>
                </div>
                <div class="col-md-6">
                    <div class="htop-img">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/contact-page-img-new.jpg" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
        <div class="container contact-mobil-top">
            <div class="row row-5-gutter">
                <div class="col-md-6">
                    <div class="page-sub-title">
                        <div class="page-sub-title-top color-primary sare-fs-50 line-height-55"><?php _e( 'We Are just a call away', 'InvestoGlobal' ); ?></div>
                    </div>
                    <div class="page-address-bar mt-5">
                        <ul>
                            <?php if(ot_get_option( 'phone' )) { ?><li><?php echo ot_get_option( 'phone' ); ?></li><? } ?>
                            <?php if(ot_get_option( 'phone2' )) { ?><li><?php echo ot_get_option( 'phone2' ); ?></li><? } ?>
                            <?php if(ot_get_option( 'adress' )) { ?><li><?php echo ot_get_option( 'adress' ); ?></li><? } ?>
                            <?php if(ot_get_option( 'e_mail' )) { ?><li><?php echo ot_get_option( 'e_mail' ); ?></li><? } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-sub-title">
                        <div class="page-sub-title-top color-primary sare-fs-50 line-height-55"><?php _e( 'Let us call you', 'InvestoGlobal' ); ?></div>
                    </div>
					<?php echo do_shortcode(ot_get_option( 'form_shortcode')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-10-gutter">
            <div class="col-md-5">
                    <div class="page-sub-title">
                        <div class="page-sub-title-top color-primary sare-fs-60 line-height-55"><?php _e( 'Where we are ?', 'InvestoGlobal' ); ?></div>
                    </div>
            </div>
        </div>
    </div>
	<?php if(ot_get_option( 'company_map_code' )) { ?>
		<div class="google-map sare-mt-40">
			<?php echo ot_get_option( 'company_map_code' ); ?>
		</div>
	<?php } ?>
</main>
<?php get_footer(); ?>