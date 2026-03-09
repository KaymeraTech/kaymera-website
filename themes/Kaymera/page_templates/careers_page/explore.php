<?php if( have_rows('explore_more') ):
		while( have_rows('explore_more') ): the_row(); ?>
            <section class="section-round-blocks">
                <div class="wrap">
                    <h2 class="section-round-block-title mdc-typography--headline4">
                    <?php the_sub_field('title'); ?>
                    </h2>
                    <div class="round-blocks-row row">      
                        <?php if( have_rows('items') ):
                                while( have_rows('items') ): the_row(); ?>
                                    <div class="col col-4 col-md">
                                        <div class="round-block">
                                            <?php echo wp_get_attachment_image(
                                                        get_sub_field('image'),
                                                        'full', '', array('class'=> 'round-block-img' )); ?>
                                            <div class="round-block-bottom">
                                                <h3 class="round-block-title mdc-typography--headline6">
                                                    <?php echo get_the_title(url_to_postid(get_sub_field('page'))); ?>
                                                </h3>
                                                <a href="<?php the_sub_field('page'); ?>" class="mdc-fab round-block-link">
                                                    <div class="mdc-fab__ripple"></div>
                                                    <svg class="icon">
                                                        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/icons/svgmap.svg#arrow-right" />
                                                    </svg>
                                                </a>
                                            </div>
                                            <a href="<?php the_sub_field('page'); ?>" class="round-full-link"></a>
                                        </div>
                                    </div>
                                <?php
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php
	endwhile;
endif; ?>