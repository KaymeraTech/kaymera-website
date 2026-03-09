<?php if( have_rows('threats') ):
		while( have_rows('threats') ): the_row(); ?>
			<section class="section-half">
				<div class="row">
					<div class="col-5 col-sm">
						<h2 class="half-slider-title mdc-typography--headline4">
							<?php the_sub_field('title'); ?>
						</h2>
					</div>
					<div class="col-7 col-sm">
						<div class="half-slider-container">
							<div class="half-slider">
								<?php if( have_rows('slider') ):
										while( have_rows('slider') ): the_row(); ?>
											<div class="half-slide">
												<span class="italic-text">
													<?php the_sub_field('text'); ?>
												</span>
												<span class="mdc-typography--headline6 half-slide-text">
													<?php the_sub_field('intro'); ?>
												</span>
												<span class="mdc-typography--headline2 half-slide-info">
													<?php the_sub_field('title'); ?>
												</span>
											</div>
										<?php
									endwhile;
								endif; ?>
							</div>
						</div>	
					</div>
				</div>
			</section>
		<?php
	endwhile;
endif; ?>