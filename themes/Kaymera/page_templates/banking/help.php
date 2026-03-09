<?php if( have_rows('help') ):
		while( have_rows('help') ): the_row(); ?>
			<section class="section-grid-image">	
				<div class="wrap">
					<h2 class="grid-image-title mdc-typography--headline3">
						<?php the_sub_field('title'); ?>
					</h2>
				</div>
				<div class="p-relative">
					<div class="wrap">
						<div class="row p-relative">
							<div class="margin-left-auto col-6 col-md">
								<span class="grid-image-subtitle mdc-typography--subtitle1">
									<?php the_sub_field('text'); ?>
								</span>
								<div class="grid-list">
									<div class="row">
										<?php if( have_rows('advantages') ):
											while( have_rows('advantages') ): the_row(); ?>
												<div class="col-6">
													<div class="grid-list-item">
														<?= wp_get_attachment_image( get_sub_field('icon'), 'full', '', array('class'=> 'icon') ); ?>
														<span class="grid-list-item-title mdc-typography--subtitle2">
															<?php the_sub_field('title'); ?>
														</span>
														<span class="grid-list-item-text mdc-typography--body2">
															<?php the_sub_field('text'); ?>
														</span>
													</div>
												</div>
												<?php
											endwhile;
										endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<img src="<?= get_template_directory_uri() ?>/img/command-center-img.png" class="left-image" alt="">
				</div>
			</section>
		<?php
	endwhile;
endif; ?>