<?php if( have_rows('block_3') ):
		while( have_rows('block_3') ): the_row(); ?>
<section class="section-round-images">

        <div class="wrap">

            <div class="section-round-images-top">
                <span class="top-overline mdc-typography--overline">
                    <?php the_sub_field('before_title'); ?>
                </span>
                <h2 class="top-title mdc-typography--headline3">
                    <?php the_sub_field('title'); ?>
                </h2>
                <div class="top-text mdc-typography--body2">
                    <p>
                        <?php the_sub_field('after_title'); ?>
                    </p>
                </div>
            </div>

            <div class="row two-columns-round-row">
                <?php if( have_rows('team') ):
                        while( have_rows('team') ): the_row();
                            if(get_sub_field('text')) : ?>
                                <div class="col-6 col-sm">
                                    <div class="two-columns-round">
                                        <div class="round-image">
                                            <?php echo wp_get_attachment_image(
                                                    get_sub_field('image'),
                                                    'full', '', array('class'=> 'cover' )); ?>
                                        </div>
                                        <h3 class="round-title mdc-typography--headline5">
                                            <?php the_sub_field('name'); ?>
                                        </h3>
                                        <span class="round-desc mdc-typography--body2">
                                            <?php the_sub_field('position'); ?>
                                        </span>
                                        <span class="round-text mdc-typography--body2">
                                            <?php the_sub_field('text'); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endif;
                        endwhile;
                endif; ?>
            </div>

            <div class="row amount-columns-round-row">
                <?php if( have_rows('team') ):
                        while( have_rows('team') ): the_row();
                            if(!get_sub_field('text')) : ?>
                                <div class="col-4 col-sm">
                                    <div class="amount-columns-round">
                                        <div class="round-image">
                                            <?php echo wp_get_attachment_image(
                                                    get_sub_field('image'),
                                                    'full', '', array('class'=> 'cover' )); ?>
                                        </div>
                                        <h3 class="round-title mdc-typography--headline6">
                                            <?php the_sub_field('name'); ?>
                                        </h3>
                                        <span class="round-desc mdc-typography--body2">
                                            <?php the_sub_field('position'); ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endif;
                        endwhile;
                endif; ?>
            </div>
        
        </div>

    </section>
<?php
	endwhile;
endif; ?>