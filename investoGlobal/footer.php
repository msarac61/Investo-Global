<?php

// Footer Control(s)

$form_title = ot_get_option('footer_form___title');
$form_description = ot_get_option('footer_form___description');
$form_shortcode = ot_get_option('footer_form___shortcode___');
$footer_logo = ot_get_option('footer_logo');
$social_twitter = ot_get_option('footer_social___twitter');
$social_youtube = ot_get_option('footer_social___youtube');
$social_instagram = ot_get_option('footer_social___instagram');
$social_facebook = ot_get_option('footer_social___facebook');
$social_linkedin = ot_get_option('footer_social___linkedin');
$social_aparat = ot_get_option('footer_social___aparat');


$footer_form = get_post_meta(get_the_id(), "disable_footer_form", true);
$prop_link = ot_get_option('footer_properties_link___mobil');
$services_link = ot_get_option('footer_services_link___mobil');

if (is_single() && 'post' == get_post_type()) {

	$wp_link = str_replace("{page_name}", get_the_title(), ot_get_option('footer_whatsapp_link___single_mobil'));
} else {

	$wp_link = ot_get_option('footer_whatsapp_link_mobil');
}

?>

<div class="opened-lightbox-form hidden-mobil">
	<?php if (!is_front_page()) { ?>
		<div class="opened-lightbox-form-item">
			<i class="bi bi-envelope"></i>
		</div>
	<?php } ?>
	<div class="experts-box-link opened-lightbox-form-item-whatsapp">
		<a href="<?php echo $wp_link; ?>" target="_blank"><i class="bi bi-whatsapp"></i></a>
	</div>
</div>

<div class="mobile-buttons hidden-desktop">
	<div class="row row-no-gutter">
		<div class="col-md-3 col-3">
			<div class="property-box-button">
				<a href="<?php echo $prop_link; ?>">
					<div class="mobile-buttons-icons"><img src="<?php bloginfo('template_url'); ?>/assets/img/mobile-button-1.svg" alt="<?php _e('Properties', 'InvestoGlobal'); ?>" width="25" height="30"></div>
					<div class="mobile-buttons-text"><?php _e('Properties', 'InvestoGlobal'); ?></div>
				</a>
			</div>
		</div>
		<div class="col-md-3 col-3">
			<div class="services-box-button">
				<a href="<?php echo $services_link; ?>">
					<div class="mobile-buttons-icons"><img src="<?php bloginfo('template_url'); ?>/assets/img/mobile-button-2.svg" alt="<?php _e('Services', 'InvestoGlobal'); ?>" width="25" height="30"></div>
					<div class="mobile-buttons-text"><?php _e('Services', 'InvestoGlobal'); ?></div>
				</a>
			</div>
		</div>
		<div class="col-md-3 col-3">
			<div class="whatsapp-box-button">
				<a href="<?php echo $wp_link; ?>">
					<div class="mobile-buttons-icons"><i class="bi bi-whatsapp"></i></div>
					<div class="mobile-buttons-text"><?php _e('Whatsapp', 'InvestoGlobal'); ?></div>
				</a>
			</div>
		</div>
		<div class="col-md-3 col-3">
			<div class="cf-box-button">
				<div class="mobile-buttons-icons"><i class="bi bi-envelope"></i></div>
				<div class="mobile-buttons-text"><?php _e('E-Mail', 'InvestoGlobal'); ?></div>
			</div>
		</div>
	</div>
</div>

<?php if (!empty($footer_form[0]) == "on" || is_single()) { ?>
	<div class="footer-form">
		<div class="footer-form-window">
			<div class="footer-form-window-bg">
				<div class="footer-only-form sare-pt-50">
					<div class="footer-form-title color-primary sare-fw-600 sare-fs-44"><?php echo $form_title; ?></div>
					<div class="footer-form-sub-title color-four text-center <?php if (apply_filters('wpml_is_rtl', NULL)) {
																				} else { ?>letter-spacing-20<?php } ?> sare-fw-600 sare-fs-24 text-transform-uppercase"><?php echo $form_description; ?></div>
					<?php echo do_shortcode($form_shortcode); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<footer class="footer sare-pt-100 sare-pb-50">
	<div class="footer-center">
		<div class="footer-logo sare-mt-30"><img src="<?php echo $footer_logo; ?>" width="325" height="80" class="img-fluid" alt="" /></div>
		<div class="footer-menu sare-mt-30">
			<ul>
				<?php menu('footer1'); ?>
			</ul>
		</div>
		<div class="footer-social sare-mt-30">
			<ul>
				<li class="twitter">
					<a href="<?php echo $social_twitter; ?>" target="_blank"><svg width="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
							<path d="M51.93,18.36a1,1,0,0,0-.49-.84,1,1,0,0,0-1,0,5.5,5.5,0,0,1-4.52.75l-.13-.07a8.87,8.87,0,0,0-10.46-1.41,8.47,8.47,0,0,0-4.61,8l0,.36-.35-.05a21.33,21.33,0,0,1-13.93-7.6,1,1,0,0,0-.83-.35,1,1,0,0,0-.77.48,8.6,8.6,0,0,0-.19,8.5l.2.36-.41.07a1,1,0,0,0-.87,1,8.72,8.72,0,0,0,3,6.58l.25.22-.24.23a1,1,0,0,0-.25,1,8.9,8.9,0,0,0,5,5.38l.62.25-.6.29a15.16,15.16,0,0,1-8.27,1.38H13a1,1,0,0,0-.5,1.81A23.45,23.45,0,0,0,25.1,48.3,23,23,0,0,0,48.44,24.92v-.14l.11-.09C50.23,23.24,51.93,20.73,51.93,18.36Zm-5,5.15a1,1,0,0,0-.42.84,21,21,0,0,1-21.36,22,21.77,21.77,0,0,1-7-1.14l-1.07-.36,1.11-.22a16.94,16.94,0,0,0,7.11-3.19h0a1,1,0,0,0-.58-1.75,7,7,0,0,1-5.47-2.84l-.32-.45.55,0a8.68,8.68,0,0,0,1.68-.27,1,1,0,0,0,.72-1,.94.94,0,0,0-.78-.92,6.87,6.87,0,0,1-5.2-4.67L15.71,29l.52.13a8.75,8.75,0,0,0,1.89.25h0a1,1,0,0,0,.95-.7,1,1,0,0,0-.4-1.09,6.63,6.63,0,0,1-2.84-7.26l.13-.51.37.37a23.34,23.34,0,0,0,15.54,6.94.93.93,0,0,0,.79-.34,1,1,0,0,0,.21-.86,6.52,6.52,0,0,1,3.4-7.43,6.84,6.84,0,0,1,8.35,1.27c.64.69,3.08.74,4.35.45l.64-.15-.31.58A8.64,8.64,0,0,1,46.88,23.51Z" />
						</svg></a>
				</li>
				<li class="youtube">
					<a href="<?php echo $social_youtube; ?>" target="_blank"><svg width="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
							<path d="M26.73,26.32V36.79a1.49,1.49,0,0,0,2.2,1.31l9.65-5.19a1.48,1.48,0,0,0,.78-1.3,1.51,1.51,0,0,0-.77-1.32L28.94,25a1.54,1.54,0,0,0-.72-.18,1.49,1.49,0,0,0-1.49,1.49Zm2,.85,8.09,4.43L28.73,36Z" />
							<path d="M46.93,47.75a6.53,6.53,0,0,0,4.46-2.13c1.42-1.54,1.83-4.69,1.84-4.82,0-.41.33-3.77.33-7.14V30.39c0-3.37-.29-6.73-.32-7.1l.28,0h0l-.28,0v0c0-.34-.41-3.38-1.85-4.9a6.91,6.91,0,0,0-4.54-2.12l-.29,0c-5.78-.42-14.47-.48-14.55-.48s-8.79.06-14.63.48l-.24,0a6.76,6.76,0,0,0-4.54,2.18c-1.38,1.51-1.79,4.49-1.83,4.83s-.33,3.77-.33,7.13v3.27c0,3.37.29,6.73.32,7.1s.4,3.34,1.85,4.86a7,7,0,0,0,4.69,2.09l.45.06h.09c3.32.32,13.75.47,14.2.48.1,0,8.8-.06,14.58-.48ZM32.06,46.27c-.44,0-10.73-.17-14-.47l-.54-.07a5,5,0,0,1-3.46-1.46,7.48,7.48,0,0,1-1.32-3.69c0-.15-.31-3.59-.31-6.92V30.39c0-3.36.29-6.75.31-6.9a8,8,0,0,1,1.33-3.71,4.72,4.72,0,0,1,3.26-1.55l.2,0c5.28-.38,12.93-.46,14.42-.48.13,0,8.73.06,14.43.47l.19,0a4.91,4.91,0,0,1,3.36,1.51,7.71,7.71,0,0,1,1.31,3.74s.31,3.54.31,6.91v3.27c0,3.3-.29,6.76-.31,6.9a8.46,8.46,0,0,1-1.33,3.71,4.51,4.51,0,0,1-3.2,1.5l-.26,0C41,46.19,33,46.26,32.06,46.27Z" />
						</svg></a>
				</li>
				<li class="aparat">
					<a href="<?php echo $social_aparat; ?>" target="_blank"><svg width="45" height="45" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
							<path class="social-aparat" d="M21.12,43.22A14.63,14.63,0,0,1,19.24,41a15.17,15.17,0,0,1-1.42-2.62,15.33,15.33,0,0,1-1.21-5.56l-.1-3.88-2.69,8.78a5.44,5.44,0,0,0,3.59,6.76l8.74,2.67L23,44.85A14.93,14.93,0,0,1,21.12,43.22ZM15,38.05l.67-2.2a16.37,16.37,0,0,0,.94,3,16.85,16.85,0,0,0,1.53,2.83A17.63,17.63,0,0,0,20,43.89l-2.2-.68A4.13,4.13,0,0,1,15,38.05Z" />
							<path class="social-aparat" d="M21.12,21.46a14.63,14.63,0,0,1,2.27-1.88A15.11,15.11,0,0,1,26,18.16,15.32,15.32,0,0,1,31.56,17l3.88-.1-8.78-2.68a5.41,5.41,0,0,0-6.75,3.59l-2.68,8.76,2.25-3.14A15,15,0,0,1,21.12,21.46Zm7.37-5.41a16.37,16.37,0,0,0-3,.94,17.19,17.19,0,0,0-2.83,1.53,16.88,16.88,0,0,0-2.23,1.82l.67-2.21a4.17,4.17,0,0,1,4-2.93,4.12,4.12,0,0,1,1.21.18Z" />
							<path class="social-aparat" d="M42.88,43.22A15.22,15.22,0,0,1,38,46.52a15.27,15.27,0,0,1-5.55,1.21l-3.86.11,8.76,2.68a5.59,5.59,0,0,0,1.58.23,5.45,5.45,0,0,0,5.17-3.82l2.67-8.75-2.25,3.13A14.93,14.93,0,0,1,42.88,43.22Zm-7.37,5.41a16.37,16.37,0,0,0,3-.94,17.19,17.19,0,0,0,2.83-1.53,16.8,16.8,0,0,0,2.23-1.81l-.68,2.2a4.12,4.12,0,0,1-5.16,2.75Z" />
							<path class="social-aparat" d="M46.59,20.25l-8.77-2.68L41,19.82a15.7,15.7,0,0,1,1.92,1.64,15.22,15.22,0,0,1,3.3,4.89,15.27,15.27,0,0,1,1.21,5.55l.1,3.87L50.17,27A5.42,5.42,0,0,0,46.59,20.25Zm-.37,1.21A4.14,4.14,0,0,1,49,26.63l-.67,2.19a16.52,16.52,0,0,0-.94-3A16.16,16.16,0,0,0,44,20.79Z" />
							<path class="social-aparat" d="M40.56,23a4.9,4.9,0,1,0-2.26,9.54,4.4,4.4,0,0,0,1.14.14A4.91,4.91,0,0,0,40.56,23ZM43,28.6a3.65,3.65,0,0,1-1.64,2.27,3.64,3.64,0,1,1-1.89-6.74,4,4,0,0,1,.83.09A3.65,3.65,0,0,1,43,28.6Z" />
							<path class="social-aparat" d="M37.7,35a4.9,4.9,0,1,0-1.11,9.68A4.81,4.81,0,0,0,39.14,44a4.86,4.86,0,0,0,2.2-3A4.92,4.92,0,0,0,37.7,35Zm2.41,5.61a3.63,3.63,0,0,1-4.38,2.7,3.63,3.63,0,0,1,.84-7.17,3.86,3.86,0,0,1,.84.09A3.65,3.65,0,0,1,40.11,40.61Z" />
							<path class="social-aparat" d="M42.6,21.74a15,15,0,0,0-16.43-3.21,15,15,0,0,0-4.77,3.21,15.13,15.13,0,0,0-3.21,4.77,15,15,0,0,0,0,11.66,15.13,15.13,0,0,0,3.21,4.77,15,15,0,0,0,16.43,3.21,15,15,0,0,0,8-8,15,15,0,0,0,0-11.66A15.13,15.13,0,0,0,42.6,21.74Zm3.12,10.6a13.56,13.56,0,0,1-1.08,5.34,13.73,13.73,0,0,1-25.28,0,13.74,13.74,0,0,1,0-10.68,13.77,13.77,0,0,1,7.3-7.3,13.74,13.74,0,0,1,10.68,0,13.77,13.77,0,0,1,7.3,7.3A13.56,13.56,0,0,1,45.72,32.34Z" />
							<path class="social-aparat" d="M26.29,29.68a4.78,4.78,0,0,0,1.13.13,4.9,4.9,0,1,0-1.13-.13Zm-2.41-5.61A3.64,3.64,0,0,1,31,25.75,3.59,3.59,0,0,1,29.33,28a3.63,3.63,0,0,1-5.45-3.93Z" />
							<path class="social-aparat" d="M25.7,32.14a4.9,4.9,0,1,0-2.27,9.54,5,5,0,0,0,1.15.14,4.91,4.91,0,0,0,1.12-9.68Zm2.4,5.61a3.63,3.63,0,0,1-4.38,2.7,3.64,3.64,0,0,1,.85-7.18,3.85,3.85,0,0,1,.83.1A3.65,3.65,0,0,1,28.1,37.75Z" />
							<path class="social-aparat" d="M34.54,32.34A2.54,2.54,0,1,0,32,34.88,2.54,2.54,0,0,0,34.54,32.34Zm-3.81,0A1.27,1.27,0,1,1,32,33.61,1.27,1.27,0,0,1,30.73,32.34Z" />
						</svg></a>
				</li>
				<li class="instagram">
					<a href="<?php echo $social_instagram; ?>" target="_blank"><svg width="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
							<path d="M45.58,18.44a7.87,7.87,0,0,0-2.83-1.84,11.49,11.49,0,0,0-3.92-.75c-1.78-.09-2.32-.11-6.82-.11s-5,0-6.82.1a11.93,11.93,0,0,0-3.92.75,7.87,7.87,0,0,0-2.83,1.84,8,8,0,0,0-1.84,2.83,12,12,0,0,0-.75,3.93c-.09,1.76-.11,2.34-.11,6.81s0,5,.1,6.81a12,12,0,0,0,.75,3.93,7.94,7.94,0,0,0,1.85,2.83,7.75,7.75,0,0,0,2.82,1.84,12,12,0,0,0,3.93.75c1.78.08,2.37.1,6.81.1s5,0,6.81-.1a11.83,11.83,0,0,0,3.92-.75,8.18,8.18,0,0,0,4.68-4.67,12,12,0,0,0,.75-3.92c.08-1.79.1-2.38.1-6.82s0-5.05-.09-6.81a11.83,11.83,0,0,0-.75-3.92A7.79,7.79,0,0,0,45.58,18.44Zm.21,20.27a9.2,9.2,0,0,1-.59,3.17,5.83,5.83,0,0,1-3.32,3.32,9.64,9.64,0,0,1-3.16.59c-1.79.08-2.32.09-6.71.09s-4.92,0-6.7-.09a9.78,9.78,0,0,1-3.17-.59,5.51,5.51,0,0,1-2-1.31,5.37,5.37,0,0,1-1.3-2,9.64,9.64,0,0,1-.59-3.16c-.07-1.77-.09-2.36-.09-6.7s0-4.94.09-6.71a9.78,9.78,0,0,1,.59-3.17,5.42,5.42,0,0,1,1.32-2,5.48,5.48,0,0,1,2-1.31,9.58,9.58,0,0,1,3.17-.58c1.77-.08,2.36-.1,6.7-.1s4.93,0,6.7.1a9.26,9.26,0,0,1,3.17.59,5.71,5.71,0,0,1,3.31,3.31,9.13,9.13,0,0,1,.59,3.16c.08,1.78.1,2.36.1,6.71S45.87,37,45.79,38.71Z" />
							<path d="M32,23.8a8.21,8.21,0,1,0,8.2,8.2A8.21,8.21,0,0,0,32,23.8Zm0,14A5.82,5.82,0,1,1,37.83,32,5.83,5.83,0,0,1,32,37.82Z" />
							<circle cx="40.85" cy="23.16" r="1.69" />
						</svg></a>
				</li>
				<li class="facebook">
					<a href="<?php echo $social_facebook; ?>" target="_blank"><svg height="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
							<path class="social-fb" d="M35.23,49.11H27.74V34.56H23V27.09h4.72V23.38c0-5.23,3.09-8.49,8.07-8.49a38.43,38.43,0,0,1,4.43.24l.74.1V22H37.16c-1.63,0-1.93.52-1.93,2v3.13H40.6l-.93,7.48H35.23Zm-5.79-1.7h4.09V32.87h4.63l.51-4.08H33.53V24c0-1.58.38-3.67,3.63-3.67h2.12V16.74c-.81-.07-2.08-.15-3.47-.15-4,0-6.37,2.54-6.37,6.79v5.41H24.72v4.08h4.72Z" />
						</svg></a>
				</li>
				<li class="linkedin">
					<a href="<?php echo $social_linkedin; ?>" target="_blank"><svg height="45" height="45" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
							<path class="social-linkedin" d="M48.25,49.11H40.67V37.69c0-3.32-.39-4.9-2.65-4.9s-3.19,1.28-3.19,4.72v11.6H26.39V25.7h8.17v1.52a8.3,8.3,0,0,1,5.62-2.07c7.87,0,8.93,5.65,8.93,11.18V49.11Zm-5.88-1.7h5V36.33c0-5.85-1.21-9.48-7.23-9.48a6.27,6.27,0,0,0-5.62,3l-.24.46H33l-.1-.85V27.4H28.09v20h5v-9.9c0-1.76,0-6.42,4.89-6.42,4.35,0,4.35,4.29,4.35,6.6Z" />
							<path class="social-linkedin" d="M23.87,49.11H15.43V25.7h8.44Zm-6.74-1.7h5v-20h-5Z" />
							<path class="social-linkedin" d="M19.65,24.44a4.78,4.78,0,1,1,4.75-4.79A4.78,4.78,0,0,1,19.65,24.44Zm0-7.85a3.08,3.08,0,1,0,3.05,3.06A3.06,3.06,0,0,0,19.65,16.59Z" />
						</svg></a>
				</li>
			</ul>
		</div>

		<div class="footer-bottom-menu sare-mt-30">
			<ul>
				<?php menu('footer2'); ?>
			</ul>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<script>
	wpcf7.cached = 0;
</script>

</body>
</html>