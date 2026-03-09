<?php if( have_rows('block_4') ):
        while( have_rows('block_4') ): the_row(); ?>
        <section class="section-map">
          <div class="wrap">
            <div class="map-top">
                <h2 class="map-title mdc-typography--headline4">
                <?php the_sub_field('title'); ?>
            </h2>
              <div class="map-description">
                <span class="text mdc-typography--subtitle1">
                <?php the_sub_field('text'); ?>
            </span>
                <span class="tag-live"><?php the_sub_field('accent_text'); ?></span>
              </div>
            </div>
            <div class="map-container">
              <div class="map-inner">
                <?php echo wp_get_attachment_image(get_sub_field('image'),'full', ''); ?>
                <div class="pin pin-1">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-2">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-3">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-4">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-5">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-6">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-7">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-8">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-9">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-10">
                  <span class="pin-round"></span>
                </div>
                <div class="pin pin-11">
                  <span class="pin-round"></span>
                </div>
              </div>
            </div>
          </div>
        </section>
<?php endwhile;
    endif; ?>