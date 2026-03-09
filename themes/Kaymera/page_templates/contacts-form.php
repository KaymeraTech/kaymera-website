<?php 
  if (get_field('need_contact_form')) :
    if( have_rows('contact_form') ):
        while( have_rows('contact_form') ): the_row(); 
        ?>
        <section id="contacts" class="section-contact-form">
          <div class="wrap">
            <div class="form-block">
              <h3 class="form-title mdc-typography--headline4">
                <?php the_sub_field('title'); ?>
              </h3>
              <span class="form-text mdc-typography--body1">
                <?php the_sub_field('text'); ?>
              </span>
              <?php get_template_part('partials/contact_form'); ?>
            </div>
          </div>
          <?php echo wp_get_attachment_image( get_sub_field('background_image'),'full', '', array('class'=>'bg-img')); ?>
          <?php echo wp_get_attachment_image( get_sub_field('image'),'full', '', array('class'=>'img-mockup')); ?>
        </section>
      <?php 
      endwhile;
    endif;
  endif;
?>