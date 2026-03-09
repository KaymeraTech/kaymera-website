<section class="section-partners">
  <div class="wrap">
    <?php if( have_rows('block_3') ):
          while( have_rows('block_3') ): the_row(); ?>
          <h3 class="section-partners-title mdc-typography--headline5">
            <?php the_sub_field('title'); ?>
          </h3>
            <div class="partners-slider">
              <?php 
              $images = get_sub_field('logos');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)
              if( $images ):
                foreach( $images as $image_id ):
                  echo wp_get_attachment_image( $image_id, $size );
                endforeach;
              endif; ?>
            </div>
          </div>
    <?php endwhile;
    endif; ?>
</section>