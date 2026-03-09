<?php if( have_rows('first_screen') ):
		while( have_rows('first_screen') ): the_row(); ?>
			<section class="section-main-double">
				<div class="wrap">
					<div class="row ai-fe">
						<div class="col-6 col-sm">
							<?php breadcrumbs(); ?>
							<div class="main-double-column">
								<span class="overline mdc-typography--overline red">
									<?php the_sub_field('before'); ?>
								</span>
								<h1 class="title mdc-typography--headline3">
									<?php the_sub_field('title'); ?>
								</h1>
								<div class="double-description mdc-typography--body2">
									<p>
										<?php the_sub_field('intro'); ?>
									</p>
								</div>
								<div class="scroll-element">
									<span class="mdc-typography--caption"><?php the_sub_field('scroll'); ?></span>
								</div>
							</div>
						</div>
						<div class="col-6 col-sm">
							<?= wp_get_attachment_image( get_sub_field('image'), 'full', '', array('class'=> 'main-double-img') ); ?>
						</div>
					</div>
				</div>
			</section>
		<?php
	endwhile;
endif; ?>