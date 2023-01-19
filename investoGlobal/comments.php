	<?php

		if(isset($_GET['replytocom'])) {
			$id = 'respond';
		} else {
			$id = 'no-respond';
		}

	?> 

	<div class="sare-mt-20">
		<div class="comment-form">

			<div class="comment-form-title"><?php _e( 'Leave A Reply', 'InvestoGlobal' ); ?></div>
			<div class="comment-form-description"><?php _e( 'Your email address will not be published. Required fields are marked*', 'InvestoGlobal' ); ?></div>
				<form action="<?php bloginfo('url'); ?>/wp-comments-post.php" method="post">
					<div class="row row-5-gutter sare-mt-20">
						<?php if ( is_user_logged_in() ) : ?>
						<?php else : ?>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12 sare-mt-10">
									<input type="text" name="author" placeholder="<?php _e( 'Name & Surname', 'InvestoGlobal' ); ?>">
								</div>
								<div class="col-md-12 sare-mt-10">
									<input type="tel" name="phone_number" class="wpcf7-intl-tel w-100" placeholder="<?php _e( 'Phone Number', 'InvestoGlobal' ); ?>">
									<input type="hidden" name="country" value="<?php echo country(); ?>">
								</div>
								<div class="col-md-12 sare-mt-10">
									<input type="email" name="email" placeholder="<?php _e( 'E-Mail Address', 'InvestoGlobal' ); ?>">
								</div>
							</div>
						</div>
						<?php endif; ?>
						<div class="<?php if ( is_user_logged_in() ) : ?>col-md-12<?php else : ?>col-md-6 <?php endif; ?>">
							<div class="row">
								<div class="col-md-12 sare-mt-10">
									<textarea name="comment" placeholder="<?php _e( 'Comment Detail', 'InvestoGlobal' ); ?>"></textarea>
								</div>
								<div class="col-md-12 sare-mt-10">
									<button type="submit"  name="submit" class="submit-form"><?php _e( 'SEND', 'InvestoGlobal' ); ?> <i class="bi bi-arrow-right"></i></button>
								</div>
							</div>
						</div>
					</div>
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</form>
		</div>
	</div><!--sare-mt-20-comment-form-->

	<div class="sare-mt-30">
		<div class="comment-list">
			<?php if(get_comments_number() > 0) { ?>
				<div class="comment-list-comment-count"><?php echo get_comments_number(); ?> <?php _e( 'Comment(s)', 'InvestoGlobal' ); ?></div>
			<?php } ?>
			<?php wp_list_comments(array('callback' => 'investo_comment','orderby' => 'comment_date_gmt','order'   => 'ASC')); ?>
		</div><!--comment-list-->
	</div><!--sare-mt-20-comment-list -->