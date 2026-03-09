<?php get_header(); ?>
<main class="main archive-store">
    <section class="section-text-center">
        <div class="wrap">
            <div class="block-text-center">
                <h1 class="mdc-typography--headline3 title-center">
                    <?= __('Say & Send Anything You Want.', 'kaymera') ?><span class="colored-text"> <?= __('Securely.', 'kaymera') ?></span>
                </h1>
                <div class="mdc-typography--body1 text-center">
                    <p><?= __('Encrypted chats and voice call for safe communications and data exchange.', 'kaymera') ?></p>
                </div>
            </div>
            <?php if ( have_posts() ) : ?>
                <div class="container-store">
                    <div class="choose-panels-grid row">
                        <?php while ( have_posts() ) : the_post();  ?>
                            <div class="col col-6 col-md">
                                <div class="choose-panel">
                                    <a href="<?= get_permalink() ?>" class="choose-panel-image-block">
                                        <?php the_post_thumbnail('large'); ?>
                                    </a>
                                    <h3 class="choose-panel-text mdc-typography--subtitle1">
                                        <?= get_the_title(); ?>
                                    </h3>
                                    <a href="<?= get_permalink() ?>" class="mdc-button mdc-button--outlined">
                                        <span class="mdc-button__label"><?= __('Learn more.', 'kaymera') ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile ?>    
                    </div>
                </div>
            <?php 
                else :
                    echo __('There are no goods.', 'kaymera');
                endif;
            ?>
        </div>
    </section>
</main>
<?php 
get_footer(); ?>