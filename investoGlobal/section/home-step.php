<?php $step = get_field('step'); ?>
<section id="step" class="step-to-step">
	<div class="container">
		<div class="sare-mt-100 sare-pb-50">
			<div class="sare-step row row-10-gutter mr-0 ml-0">
				<?php $i = '0'; foreach($step as $step_val) { $i++; ?>
					<div class="col-md-3 col-6 <?php if ($i % 2 == 0) echo 'sare-mt-40'; ?>">
						<div class="step">
							<div class="step-number-title color-tertiary sare-fs-36 text-center"><?php echo ot_get_option( 'step___prefix' ); ?><span class="sare-fs-44"><?php echo str_pad($i, 2, "0", STR_PAD_LEFT); ?></span></div>
							<div class="step-standart-title color-primary sare-fw-700 text-transform-uppercase text-center"><?php echo $step_val['step_-_1_sub_title']; ?></div>
							<div class="step-image sare-mt-20">
								<?php echo wp_get_attachment_image($step_val['step_-_1_image']['ID'], 'step_home','', array( "class" => "img-fluid" )); ?>
								<div class="step-description">
									<div class="animate__fadeInUp animate__animated step-description-in">
										<!--<div class="step-description-title">
											<?php echo $step_val['step_-_1_title']; ?>
										</div>-->
										<div class="step-description-desc">
											<?php echo $step_val['step_-_1_desription']; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>