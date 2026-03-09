<!-- loop block 2 -->
<?php if( have_rows('block_2') ):
  while( have_rows('block_2') ): the_row(); ?>

  <section class="section-main-tabs z-index-cor">
    
    <div class="wrap">
      <span class="tabs-title mdc-typography--headline5">
          <?php the_sub_field('title'); ?>
          </span>
    </div>





    <div class="tabs-custom">
      <div class="tabs-header">
        <div class="mdc-tab-bar" role="tablist">
          <div class="mdc-tab-scroller">
            <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll">
              <div class="mdc-tab-scroller__scroll-content">
                
              <?php if( have_rows('tabs') ):
                  $i = 0;
                  while( have_rows('tabs') ): the_row(); ?>
                <button role="tab" class="mdc-tab <?php if($i==0): echo 'mdc-tab--active'; endif; ?>" aria-selected="true" tabindex="<?php echo $i ?>">
                  <span class="mdc-tab__content">
                    <span class="mdc-tab__text-label">
                      <?php the_sub_field('title'); ?>
                    </span>
                  </span>
                  <span class="mdc-tab-indicator <?php if($i==0): echo 'mdc-tab-indicator--active'; endif; ?>">
                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                  </span>
                  <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                </button>
                <?php $i++;
                endwhile;
              endif; ?>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="tabs-body">
      <!-- loop tabs -->
      <?php if( have_rows('tabs') ):
        $i = 0;
        while( have_rows('tabs') ): the_row(); ?>
          <div class="tab-content <?php if($i==0): echo 'tab-content-active'; endif; ?>" data-tab="<?php echo $i++ ?>">
            <!-- loop adventages -->
            <div class="body-list">
              <div class="wrap">
                <div class="body-list-inner">
                  <?php if( have_rows('advantages') ):
                        while( have_rows('advantages') ): the_row(); ?>
                          <div class="body-list-item">
                            <?php echo wp_get_attachment_image(
                              get_sub_field('icon'),
                              'full', '', array('class'=>'body-list-img')); ?>
                            <span class="body-list-name">
                                <?php the_sub_field('text'); ?>
                            </span>
                          </div>
                        <?php
                      endwhile;
                  endif; ?>
                </div>
              </div>
            </div>
            <!-- end loop adventages -->
            <!-- loop content -->
            <?php if( have_rows('content') ):
              while( have_rows('content') ): the_row(); ?>
                <div class="content-tabs-inner">
                  <div class="content-tabs-inner-hidden">
                    <div class="wrap">
                      <div class="content-tabs-col">
                        <h2 class="content-tabs-title mdc-typography--headline4">
                          <?php the_sub_field('title'); ?>
                        </h2>
                        <span class="content-tabs-text mdc-typography--body1">
                          <?php the_sub_field('text'); ?>
                        </span>
                        <div class="content-tabs-btns">
<!-- 							                          <a data-analytics='<?php the_sub_field('dataanalytics'); ?>' data-set="<?php the_sub_field('title'); ?>: <?php the_sub_field('button_1_text'); ?>" href="https://kaymera.com/app/#contacts" class="modal-contact-button mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"> -->
                          <a data-analytics='<?php the_sub_field('dataanalytics'); ?>' data-set="<?php the_sub_field('title'); ?>: <?php the_sub_field('button_1_text'); ?>" href="https://kaymera.com/app/#contacts" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded" target="_blank">
                            <span class="mdc-button__label"><?php the_sub_field('button_1_text'); ?></span>
                            <span class="mdc-button__ripple"></span>
                          </a>
                          <a href="<?php the_sub_field('page_button_2'); ?>" class="btn mdc-button mdc-button--outlined">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">Learn more</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div style="background-color: <?php the_sub_field('color_background_round'); ?>" class="round"></div>
                  </div>
                  <?php echo wp_get_attachment_image(
														    get_sub_field('image'),
														    'full', '', array('class'=>   get_sub_field('img_class')   )); ?>
                </div>
            <?php endwhile;
              endif; ?>
            <!-- end loop content -->
          </div>
      <?php endwhile;
      endif; ?>
      <!-- end loop tabs -->
    </div>
  </section>


<?php endwhile;
endif; ?>
<!-- end loop tabs -->
