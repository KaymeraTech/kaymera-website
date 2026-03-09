<?php if( have_rows('block_3') ):
		while( have_rows('block_3') ): the_row(); ?>
        <section class="section-scroll-panels red" id="section-scroll-panels">
            <div class="wrap">
                <div class="scroll-panel-mockup" id="scroll-panel-mockup">

                    <div class="panel-mockup">
                        <?php if( have_rows('image_group') ):
                            while( have_rows('image_group') ): the_row(); ?>
                                <?php echo wp_get_attachment_image( 
                                                    get_sub_field('image_4'),
                                                    'full', '', array('class'=>'main-mockup')); ?>
                                <?php echo wp_get_attachment_image( 
                                                    get_sub_field('image_3'),
                                                    'full', '', array('class'=>'panel-mockup-img red active', 'id'=>'red-mockup-panel')); ?>
                                <?php echo wp_get_attachment_image( 
                                                    get_sub_field('image_2'),
                                                    'full', '', array('class'=>'panel-mockup-img orange second', 'id'=>'orange-mockup-panel')); ?>
                                <?php echo wp_get_attachment_image( 
                                                    get_sub_field('image_1'),
                                                    'full', '', array('class'=>'panel-mockup-img green third', 'id'=>'green-mockup-panel')); ?>
                                <?php
                            endwhile;
                        endif; ?>      
                    </div>

                    <div class="scroll-panel-content">
                        <div class="scroll-panel-icon">
                            <div class="scroll-panel-icon">
                                <svg class="lock-icon lock">
                                    <use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#lock" />
                                </svg>
                                <svg class="lock-icon padlock">
                                    <use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#padlock">
                                </svg>
                                <?php echo wp_get_attachment_image( 
                                                    get_sub_field('icon'),
                                                    'full', '', array('class'=>'group-icon')); ?>
                                <svg viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg" class="round">
                                   <path class="path" d="M52.9,3.3c14.6,5.3,25,19.2,25,35.6c0,20.9-17,37.9-37.9,37.9S2.1,59.9,2.1,39c0-16.6,10.7-30.7,25.6-35.9"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="scroll-panel-title mdc-typography--headline4">
                            Keep all of your conversations <span class="white">private</span>
                        </h3>
                        <p class="mdc-typography--body1">
                            Enjoy the benefits of fully secure calls between Kaymera devices. Kaymera Secure Communications app ensures that all of your business and private conversations are safe by default. 
                        </p>
                    </div>
                    
                </div>
            </div>
        </section>
    <?php
	endwhile;
endif; ?>