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
            <p class="subtitle">100% usable & fully encrypted smartphone based on premium hardware.</p>
            <div class="tabs">
                <ul class="tabs__list">
                    <li class="tabs__item active"><a href="#overview">Overview</a></li>
                    <li class="tabs__item"><a href="#privacy">Privacy</a></li>
                    <li class="tabs__item"><a href="#techspecs">Tech Specs</a></li>
                </ul>
            </div>
            <div class="store">
                <div class="store__sticky">
                    <?php $gallery = get_field('gallery');
                    $gallery_list = $gallery['gallery-list']; ?>
                    <div class="gallery-container">
                        <div class="swiper-container gallery-main">
                            <div class="swiper-wrapper">
                                <?php foreach ($gallery_list as $gallery_item => $value) { ?>
                                    <div class="swiper-slide">
                                        <?php  echo wp_get_attachment_image( $value, 'large' ); ?>
                                    </div>    
                                <?php } ?>
                           
                            </div>
                            <!-- <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div> -->
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                            <?php foreach ($gallery_list as $gallery_item => $value) { ?>
                                    <div class="swiper-slide">
                                        <?php  echo wp_get_attachment_image( $value, 'thumbnail' ); ?>
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
                            <p class="store__price-number"><?=$overview['price']; ?></p>
                            <?php 
                                $link = $overview['green_button'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn--blue btn--plus" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            <!-- <a href="#" class="btn btn--blue btn--plus">add to cart</a>
                            <a href="#" class="btn btn">buy now</a> -->
                            <?php 
                                $link = $overview['gray_button'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                        </div>
                        <div class="store__secured">
                            <p class="store__secured-text">
                                <?=$overview['text_about_payment']; ?>
                            </p>
                            <div class="store__secured-img">
                            <?php if($overview['payment_systems_logos'] ): ?>
                                <img src="<?= $overview['payment_systems_logos']; ?>" />
                            <?php endif; ?>
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="store__content">
                  
                    <div id='overview' class="store__text panel-full-text mdc-typography--body1 tabs-id">
                        <?=$overview['description']; ?>
                    </div>
                    <div class="store__qty">
                        <span class="store__qty-label">QTY</span>
                        <select class="custom" id="qty">
                            <!-- <option value="hide">-- Count --</option> -->
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3+</option>
                        </select>
                    </div>
                    <div class="store__price">
                        <div class="store__price-wrapper">
                            <p class="store__price-number"><?=$overview['price']; ?></p>
                            <div class="store__qty">
                                <span class="store__qty-label">QTY</span>
                                <select class="custom" id="qty">
                                    <!-- <option value="hide">-- Count --</option> -->
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3+</option>
                                </select>
                            </div>
                        </div>
                        <?php 
                                $link = $overview['green_button'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn--blue btn--plus" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            <!-- <a href="#" class="btn btn--blue btn--plus">add to cart</a>
                            <a href="#" class="btn btn">buy now</a> -->
                            <?php 
                                $link = $overview['gray_button'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                    </div>
                    <div class="store__secured">
                        <p class="store__secured-text">
                            <?=$overview['text_about_payment']; ?>
                        </p>
                        <div class="store__secured-img">
                        <?php if($overview['payment_systems_logos'] ): ?>
                            <img src="<?= $overview['payment_systems_logos']; ?>" />
                        <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="store__text panel-full-text mdc-typography--body1">
                      <?= $overview['text_after_payment']; ?>
                    </div>
                    <?php $benefits = $overview['benefits']; ?>
                    <?php if($benefits){ ?>
                        <ul class="store__benefits">
                            <?php foreach ($benefits as $key => $benefit) { ?>
                                <li class="store__benefits-item">
                                    <p class="store__benefits-title"><?=$benefit['title'] ?></p>
                                    <p class="store__benefits-text"><?=$benefit['text'] ?></p>
                                    <?php if($benefit['icon'] ): ?>
                                      <div class="store__benefits-img">
                                        <img src="<?=$benefit['icon'] ?>" />
                                      </div>
                                    <?php endif; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    
                    <div class="store__privacity">
                        <span id="privacy" class="pre-title tabs-id">Privacy</span>
                        <?php $privacy = get_field('privacy');
                              $privacy__list = $privacy['list'];
                        ?>
                        <h2 class="map-title mdc-typography--headline4"><?= $privacy['title']; ?></h2>
                        <?php if($privacy__list){ ?>
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
                        <?php } ?>
                    </div>
                    <div class="store__tech">
                        <span id="techspecs" class="pre-title tabs-id">Tech specs</span>
                        <?php $tech = get_field('tech_specs');
                              $tech__list = $tech['info_table'];
                        ?>
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
                </div>
            </div>
        </div>
    </section>

    <section class="section section__offer">
        <div class="wrap">
            <div class="offer">
                <?php $order = get_field('bottom_form'); ?>
                <h2 class="map-title mdc-typography--headline4"><?= $order['title']; ?></h2>
                <span class="pre-title"><?= $order['subtitle']; ?></span>
                <div class="store__price">
                <?php 
                                $link = $order['green_button'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn--blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            <!-- <a href="#" class="btn btn--blue btn--plus">add to cart</a>
                            <a href="#" class="btn btn">buy now</a> -->
                            <?php 
                                $link = $order['gray_button'];
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="btn btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                </div>
                <div class="order__img">
                <?php 
                    $image = $order['image'];
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="qty__popup">
    
    <?php get_template_part('partials/modal-contact-form'); ?>
</div>

<?php 
get_footer(); ?>