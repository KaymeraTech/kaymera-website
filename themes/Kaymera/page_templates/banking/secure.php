<?php if( have_rows('secure') ):
		while( have_rows('secure') ): the_row(); ?>
			<section class="section-form">
				<div class="wrap">
					<div class="row">
						<div class="col-5 col-sm">
							<h2 class="mdc-typography--headline3 section-form-title">
								<?php the_sub_field('title'); ?>
							</h2>
						</div>
						<div class="col-7 col-sm">
							<div class="contacts-panel">
								<h2 class="contacts-panel-title mdc-typography--headline5">
									<?php the_sub_field('form_title'); ?>
								</h2> 
								<form method="post" id="chooseform" class="contacts-panel-form">
									<div class="contacts-panel-form-row">
										<label class="textfield">
											<input name="firstname" type="text" required>
											<span class="placeholder">First name*</span>
										</label>
										<label class="textfield">
											<input name="lastname" type="text" required>
											<span class="placeholder">Last name*</span>
										</label>
									</div>
									<label class="textfield">
										<input name="email" type="email" required>
										<span class="placeholder">E-mail*</span>
									</label>
									<label title="+ ..." class="textfield">
										<input placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" type="tel" name="phone" required>
										<span class="placeholder">Phone*</span>
									</label>

									<input name="form_type" type="hidden" value="choose">

									<button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
										<span class="mdc-button__label">Contact me</span>
										<span class="mdc-button__ripple"></span>
									</button>

									<div class="response"></div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
	endwhile;
endif; ?>