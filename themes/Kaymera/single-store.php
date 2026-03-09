<?php
/*
Template Name: Page store
*/
?>
<?php get_header(); ?>
<main class="main store-page" id="store-page">
    <section class="seciton">
        <div class="wrap">
            <h1 class="map-title mdc-typography--headline4"><?php the_title(); ?></h1>
            <?php 
                $description = get_field('description');
                if ($description) : ?>
                <p class="subtitle"><?= get_field('description'); ?></p>
            <?php endif;
                $tabs_list = get_field('tabs_list'); 
            ?>
            <div class="tabs">
                <ul class="tabs__list">
                    <li class="tabs__item active"><a href="#overview"><?= __('Overview', 'kaymera') ?></a></li>
                    <?php foreach ($tabs_list as $li) : ?>
                        <li class="tabs__item">
                            <a target="<?= $li['tab']['target'] ?>" href="<?= $li['tab']['url'] ?>"><?= $li['tab']['title'] ?>
                                <?php if ($li['link_icon']) : ?>
                                    <span class="icon-link">
                                        <svg class="icon">
                                            <use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#arrow-right-top" />
                                        </svg>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="store">

                <!-- Gallery -->
                <div class="store__sticky">
                    <?php $gallery = get_field('gallery');
                    $gallery_list = $gallery['gallery-list']; ?>
                    <div class="gallery-container">
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery_list as $gallery_item => $value) { ?>
                                    <div class="swiper-slide">
                                        <?= wp_get_attachment_image( $value, 'large' ); ?>
                                    </div>    
                                <?php } ?>     
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                            <?php foreach ($gallery_list as $gallery_item => $value) { ?>
                                    <div class="swiper-slide">
                                        <?= wp_get_attachment_image( $value, 'medium' ); ?>
                                    </div>    
                                <?php } ?>
                            </div>
                            <div class="gallery-numbers">
                                <span class="text">+</span>
                                <span class="text number"></span>
                            </div>
                        </div>
                    </div>
                    <?php $overview = get_field('overview'); ?>
                    <div class="single">
                        <div class="single__img">
                            <?php  echo wp_get_attachment_image( $gallery_list[0], 'large' ); ?>
                        </div>
                        <div class="store__price">
                            <p class="store__price-number"><?=$overview['before_measure']; ?><?=$overview['price']; ?><?=$overview['after_measure']; ?></p>
                            <a data-analytics='{"form":"send_modal_form","type":"get_now_header"}' data-set="<?php the_title(); ?>" href="#" class="btn btn--blue mdc-button modal-order-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"><?= __('Buy now', 'kaymera') ?></a> <!-- TODO popup -->
                        </div>
                        <!-- Payment system -->
                        <div class="store__secured">
                            <p class="store__secured-text">
                                <?= __('Secured and trusted checkout with:', 'kaymera') ?>
                            </p>
                            <div class="store__secured-img">
                                <img src="<?= get_template_directory_uri() ?>/img/payment.svg" class="payment_img" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="store__content">

                    <!-- Description -->
                    <?php if ($overview['description']) : ?>
                        <div id='overview' class="store__text panel-full-text mdc-typography--body1 tabs-id">
                            <?= $overview['description']; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Price -->
                    <div class="store__price">
                        <div class="store__price-wrapper">
                            <p class="store__price-number"><?= $overview['before_measure']; ?><?=$overview['price']; ?><?=$overview['after_measure']; ?></p> <!-- TODO API -->
                        </div>
                        <a data-analytics='{"form":"send_modal_form","type":"get_now_header"}' data-set="<?php the_title(); ?>" href="#" class="btn btn--blue mdc-button modal-order-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"><?= __('Buy now', 'kaymera') ?></a> <!-- TODO popup -->
                    </div>

                    <!-- Payment system -->
                    <div class="store__secured">
                        <p class="store__secured-text">
                            <?= __('Secured and trusted checkout with:', 'kaymera') ?>
                        </p>
                        <div class="store__secured-img">
                            <img src="<?= get_template_directory_uri() ?>/img/payment.svg" class="payment_img" />
                        </div>
                    </div>

                    <!-- More box -->
                    <?php 
                        $more_box = get_field('more_box');
                        if ($more_box['title'] || $more_box['text']) :
                    ?>
                        <div class="more-box">
                            <div class="row">
                                <div class="col-sm-12 col-7">
                                    <div class="text-group">
                                        <div class="title">
                                            <?= $more_box['title'] ?>
                                        </div>
                                        <div class="text">
                                            <?= $more_box['text'] ?>
                                        </div>
                                    </div>
                                    <a target="<?= $more_box['button']['title'] ?>" href="<?= $more_box['button']['url'] ?>" class="btn"><?= $more_box['button']['title'] ?></a>
                                </div>
                                <div class="col-sm-12 col-5 flex">
                                    <?= wp_get_attachment_image($more_box['image'], $size = 'full', false, ['class'=>'image']); ?>
                                </div>
                            </div>
                        </div>
                    <?php
                        endif;
                    ?>

                    <!-- Additional list -->
                    <?php
                        $privacy = get_field('list_with_caption');
                        $privacy__list = $privacy['list'];
                        if ($privacy__list) :
                    ?>
                        <div class="store__privacity">
                            <span id="<?= $privacy['id']; ?>" class="pre-title tabs-id"><?= $privacy['pre_title']; ?></span>
                            <h2 class="map-title mdc-typography--headline4"><?= $privacy['title']; ?></h2>
                            <ul class="privacity__list">
                                <?php foreach ($privacy__list as $key => $item) { ?>
                                    <li class="privacity__item">
                                        <p class="privacity__item-text"><?= $item['text']; ?> <b><?= $item['prompt_title']; ?></b></p>
                                        <?php if($item['need_prompt']){ ?>
                                            <div class="privacity__item-help">
                                            <button class="privacity__help-icon">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.99998 1.33337C4.32598 1.33337 1.33331 4.32604 1.33331 8.00004C1.33331 11.674 4.32598 14.6667 7.99998 14.6667C11.674 14.6667 14.6666 11.674 14.6666 8.00004C14.6666 4.32604 11.674 1.33337 7.99998 1.33337ZM7.99998 2.66671C10.9534 2.66671 13.3333 5.04663 13.3333 8.00004C13.3333 10.9535 10.9534 13.3334 7.99998 13.3334C5.04656 13.3334 2.66665 10.9535 2.66665 8.00004C2.66665 5.04663 5.04656 2.66671 7.99998 2.66671ZM7.33331 4.66671V6.00004H8.66665V4.66671H7.33331ZM7.33331 7.33337V11.3334H8.66665V7.33337H7.33331Z" fill="#E4524C"/>
                                                </svg>
                                            </button>
                                            <div class="privacity__help-content">
                                                <button class="privacity__help-content-button">
                                                    <svg class="privacity__help-content-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.99998 1.33337C4.32598 1.33337 1.33331 4.32604 1.33331 8.00004C1.33331 11.674 4.32598 14.6667 7.99998 14.6667C11.674 14.6667 14.6666 11.674 14.6666 8.00004C14.6666 4.32604 11.674 1.33337 7.99998 1.33337ZM7.99998 2.66671C10.9534 2.66671 13.3333 5.04663 13.3333 8.00004C13.3333 10.9535 10.9534 13.3334 7.99998 13.3334C5.04656 13.3334 2.66665 10.9535 2.66665 8.00004C2.66665 5.04663 5.04656 2.66671 7.99998 2.66671ZM7.33331 4.66671V6.00004H8.66665V4.66671H7.33331ZM7.33331 7.33337V11.3334H8.66665V7.33337H7.33331Z" fill="#E4524C"/>
                                                    </svg>
                                                </button>
                                                <div class="privacity__help-title">
                                                    <?php if($item['icon'] ): ?>
                                                        <img src="<?= $item['icon']; ?>" />
                                                    <?php endif; ?>
                                                    <p> <?= $item['prompt_title']; ?> </p>
                                                </div>
                                                <div class="privacity__help-text"><?= $item['prompt']; ?></div>
                                                <?php 
                                                $link = $item['link'];
                                                if( $link ): 
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                                    ?>
                                                    <a class="privacity__help-more" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                <?php endif; ?>
                                            </div>

                                            </div>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Specefication list -->
                    <?php
                        $tech = get_field('specs');
                        $tech__list = $tech['info_table'];
                        if (count($tech__list) > 0) :
                    ?>
                    <div class="store__tech">
                        <span id="<?= $tech['id'] ?>" class="pre-title tabs-id"><?= $tech['pre_title'] ?></span> <!-- TODO -->
                        <h2 class="map-title mdc-typography--headline4"><?= $tech['title']; ?></h2>
                        <?php if($tech__list){ ?>
                            <ul class="store__tech-list">
                                <?php foreach ($tech__list as $key => $item) { ?>
                                    <li class="store__tech-item">
                                        <p class="store__teach-name"><?=$item['name']; ?></p>
                                        <div class="store__teach-content"><?= $item['info']; ?></div>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <!-- Linking block -->
    <?php
        $similar = get_field('similar')['product']; 
        $similar_id = $similar->ID;
        if (isset($similar)) : ?>
            <section class="section section__offer">
                <div class="wrap">
                    <div class="offer">
                        
                        <h2 class="map-title mdc-typography--headline4"><?= $similar->post_title; ?></h2>
                        <span class="pre-title"><?= get_field('description', $similar_id); ?></span>
                        <div class="store__price">
                            <a class="btn btn" href="<?= get_permalink($similar_id); ?>"><?= __('Learn more', 'kaymera') ?></a>
                        </div>
                        <div class="order__img">
                            <?= get_the_post_thumbnail($similar_id, 'large'); ?>
                        </div>
                    </div>
                </div>
            </section>
    <?php endif; ?>

</main>

<div class="qty__popup">
    <?php get_template_part('partials/modal-order-form'); ?>
</div>

<?php get_footer(); ?>