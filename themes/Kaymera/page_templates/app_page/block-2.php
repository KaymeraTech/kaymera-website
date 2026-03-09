<?php if( have_rows('block_2') ):
		while( have_rows('block_2') ): the_row(); ?>
        <section class="section-image-panel-block">
                <div class="wrap">
                    <div class="images-set">
                        <?php if( have_rows('image_group') ):
                                while( have_rows('image_group') ): the_row();
                                    echo    wp_get_attachment_image( 
								                    get_sub_field('image_1'),
								                    'full', '', array('class'=> 'img img-left' )).
                                            wp_get_attachment_image( 
								                    get_sub_field('image_2'),
								                    'full', '', array('class'=> 'img img-center' )).
                                            wp_get_attachment_image( 
								                    get_sub_field('image_3'),
								                    'full', '', array('class'=> 'img img-right' )).
                                            wp_get_attachment_image( 
								                    get_sub_field('image_4'),
								                    'full', '', array('class'=> 'img-sm-left' )).
                                            wp_get_attachment_image( 
								                    get_sub_field('image_5'),
								                    'full', '', array('class'=> 'img-sm-right' ));
                            endwhile;
                        endif; ?>
                    </div>
                    <div class="panel-full">
                        <h2 class="panel-full-title mdc-typography--headline6">
                            <?php the_sub_field('title'); ?>
                        </h2>
                        <div class="panel-full-text mdc-typography--body1">
                            <p>
                                <?php the_sub_field('after_title'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="list-icon-text">
                        <div class="row">
                            <?php if( have_rows('adventages') ):
                                    while( have_rows('adventages') ): the_row(); ?>
                                    <div class="col-4">
                                        <div class="item-icon-text">
                                            <?php
                                                echo wp_get_attachment_image( 
                                                        get_sub_field('image'),
                                                        'full', '', array('class'=> 'icon', 'style'=>'width:24px'));
                                            ?>
                                            <span class="text mdc-typography--body1">
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
            </section>
            <?php
	endwhile;
endif; ?>