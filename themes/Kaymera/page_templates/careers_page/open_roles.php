<?php
    //Get data for loop
    $careers = array(
        'post_type' => 'career',
        'posts_per_page' => -1,
        'order' => 'DESC'
    );
    $query = new WP_Query( $careers );
    $terms = get_terms( array(
        'taxonomy' => 'careers-tax',
        'hide_empty' => true,
        'order' => 'DESC'
    ));
?>
<section class="page-content">
    <div class="wrap">
        <div class="page-content-inner">
            <h2 class="mdc-typography--headline4 page-content-top-title"><?php the_field('open_roles'); ?></h2>
            <?php if ($query->post_count == 0) : ?>
                <div class="empty-set">
                    <img src="<?= get_template_directory_uri(); ?>/img/empty-img.svg" alt="" class="empty-img">
                    <span class="empty-text mdc-typography--headline4">
                        no open vacancies
                    </span>
                </div>
            <?php else : ?>
                <div class="amount-set-blocks">
                    <?php
                        foreach ($terms as $term) : ?>
                            <div class="amount-set">
                                <div class="amount-row-top">
                                    <h3 class="mdc-typography--headline5"><?= $term->name; ?></h3>
                                    <span class="amount-info mdc-typography--body2">
                                        <?= $term->count; ?>
                                    </span>
                                </div>
                                <div class="amount-row row">
                                    <?php while ( $query->have_posts() ) {
                                        $query->the_post();
                                        $post_terms = wp_get_object_terms( get_the_id(), 'careers-tax');
                                        $post_term = $post_terms[0];
                                        if ($post_term->term_id == $term->term_id) :
                                            get_template_part('partials/loop-career');
                                        endif;
                                    } ?>
                                </div>
                            </div>
                        <?php endforeach;
                        wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>