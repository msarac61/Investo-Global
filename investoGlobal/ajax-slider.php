	<?php if (is_front_page()) { ?>
		<div class="container">
			<div class="slides">
				<div class="slider-result">
					<?php if ( wp_is_mobile() ) { ?>
						<?php echo wp_get_attachment_image($slider[0]['mobil_slider_image']['ID'], 'mobil_slider', false, array('class' => 'img-fluid')); ?>
					<?php } else { ?>
						<?php echo wp_get_attachment_image($slider[0]['slider_image']['ID'], 'full', false, array('class' => 'img-fluid')); ?>
					<?php } ?>
				</div>
				<div class="slider-pagination hidden-mobil">
					<ul>
						<?php if (is_array($slider) || is_object($slider)) { ?>
							<?php $i = '-1'; foreach($slider as $slide) { $i++; ?>
								<li class="<?php if($i == '0') { echo 'active'; } ?>"><a class="slider-item-id" data-page="<?php echo get_the_id(); ?>" data-id="<?php echo $i; ?>"><?php echo str_pad(($i+1),2,"0",STR_PAD_LEFT); ?></a></li>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
				<div class="slider-pagination-mobil hidden-desktop">
					<ul>
						<?php if (is_array($slider) || is_object($slider)) { ?>
							<?php $i = '-1'; foreach($slider as $slide) { $i++; ?>
								<li class="<?php if($i == '0') { echo 'active'; } ?>"><a class="slider-item-id" data-page="<?php echo get_the_id(); ?>" data-id="<?php echo $i; ?>"><?php echo str_pad(($i+1),2,"0",STR_PAD_LEFT); ?></a></li>
							<?php } ?>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	<?php } ?>