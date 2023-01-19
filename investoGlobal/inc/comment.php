<?php

add_filter('get_avatar','avatar_class');

function avatar_class($class) {
	$class = str_replace("class='avatar", "class='user", $class) ;
	return $class;
}

function investo_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;

	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'div';
		$add_below = 'div-comment';
	}

?>

	<div class="comment-list-item sare-mt-30" id="comment-<?php comment_ID(); ?>">
		<div class="row row-5-gutter">
			<div class="col-md-2">
				<div class="author-img">
					<?php echo get_avatar($comment, 130); ?>
				</div>
			</div>
			<div class="col-md-10">
				<div class="comment-author-name"><?php echo $comment->comment_author; ?> <?php if(get_comment_meta( get_comment_ID(), 'country' , true )) { ?><span class="comment-right-country">( <?php echo get_comment_meta( get_comment_ID(), 'country' , true ); ?> )</span><?php } ?></div>
				<div class="comment-author-date"><?php comment_date('F d - Y'); ?></div>
				<div class="comment-description">
					<?php comment_text (); ?>
				</div>
			</div>
		</div>
	</div><!--comment-list-item -->

<?php } ?>