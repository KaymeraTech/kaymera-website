<?php if( have_rows('block_1') ):
		while( have_rows('block_1') ): the_row(); ?>
			<section class="main-banner" id="main-banner">
				<div class="main-banner-image" id="main-banner-image">
					<canvas class="inner-banner" id="canvas"></canvas>
					<!--<img class="inner-banner" src="<?php echo get_template_directory_uri(); ?>/img/triangles-main.png" alt="">-->
				</div>
				<div class="wrap">
					<div class="row">
						<div class="col-6 col-lg-8 col-sm">
							<div class="main-banner-col" id="main-banner-col">
								<span class="mdc-typography--overline main-overline">
									<?php the_sub_field('before_title'); ?>
								</span>
								<h1 class="mdc-typography--headline3 main-title">
									<?php the_sub_field('title'); ?>
								</h1>
							<div class="mdc-typography--body1 main-text">
								<p>
									<?php the_sub_field('after_title'); ?>
								</p>
							</div>
							<!-- <a data-analytics='{"form":"send_modal_form","type":"request_demo"}' data-set="Home page: <?php the_sub_field('button_text'); ?>" href="#contacts" class="modal-contact-button mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"> -->
							<a data-analytics='{"form":"send_modal_form","type":"request_demo"}' data-set="Home page: <?php the_sub_field('button_text'); ?>" href="https://kaymera.com/app/#contacts" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded" target="_blank">
								<span class="mdc-button__label dark">
									<?php the_sub_field('button_text'); ?>
								</span>
								<div class="mdc-button__ripple"></div>
							</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section-store-grid margin-cor" id="section-store-grid">
				<div class="wrap">
					<div class="row row-store-grid">
						<div class="col col-7 col-lg">
							<div class="store-grid-top">
								<h2 class="store-grid-title mdc-typography--headline4">
									<?php the_sub_field('title_2'); ?>
								</h2>
								<p class="store-grid-text mdc-typography--body1">
									<?php the_sub_field('offer'); ?>
								</p>
							</div>

							<?php if( have_rows('pages') ):
								while( have_rows('pages') ): the_row(); ?>
									<div class="store-panel-large">
										<div class="store-panel-large-inner">
											<div class="store-panel-top">
											<h3 class="mdc-typography--headline5 store-panel-title">
												<?php the_sub_field('title_1'); ?>
											</h3>
											<a href="<?php the_sub_field('link_1'); ?>" class="btn mdc-button mdc-button--outlined">
												<span class="mdc-button__ripple"></span>
												<span class="mdc-button__label"><?php the_sub_field('button_text'); ?></span>
											</a>
											</div>
											<div class="round"></div>
											<?php echo wp_get_attachment_image(
														get_sub_field('image_1'),
														'full', '', array('class'=>'panel-img')); ?>
										</div>
									</div>
									<?php
								endwhile;
							endif; ?>

						</div>
						<div class="col col-5 col-lg">

							<?php if( have_rows('pages') ):
								while( have_rows('pages') ): the_row(); ?>
								<div class="store-panel panel-red">
									<div class="store-panel-inner">
										<div class="store-panel-top">
										<h3 class="mdc-typography--headline5 store-panel-title">
											<?php the_sub_field('title_2'); ?>
										</h3>
										<a href="<?php the_sub_field('link_2'); ?>" class="btn mdc-button mdc-button--outlined">
											<span class="mdc-button__ripple"></span>
											<span class="mdc-button__label"><?php the_sub_field('button_text'); ?></span>
										</a>
										</div>
										<img src="<?php echo get_template_directory_uri(); ?>/img/lazy-round.svg" alt="lazy-round" class="vector">
										<?php echo wp_get_attachment_image(
												get_sub_field('image_2'),
												'full', '', array('class'=>'panel-img')); ?>
									</div>
								</div>
								<?php
								endwhile;
							endif; ?>

							<?php if( have_rows('pages') ):
								while( have_rows('pages') ): the_row(); ?>
								<div class="store-panel panel-yellow">
									<div class="store-panel-inner">
										<div class="store-panel-top">
										<h3 class="mdc-typography--headline5 store-panel-title">
											<?php the_sub_field('title_3'); ?>
										</h3>
										<a href="<?php the_sub_field('link_3'); ?>" class="btn mdc-button mdc-button--outlined">
											<span class="mdc-button__ripple"></span>
											<span class="mdc-button__label"><?php the_sub_field('button_text'); ?></span>
										</a>
										</div>
										<div class="round"></div>
										<?php echo wp_get_attachment_image(
												get_sub_field('image_3'),
												'full', '', array('class'=>'panel-img', 'loading'=>'eager')); ?>
									</div>
								</div>
								<?php
								endwhile;
							endif; ?>

						</div>
					</div>
				</div>
			</section>
<?php
		endwhile;
	endif; ?>
