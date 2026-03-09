<section class="page-content">
    <div class="wrap">
        <div class="row page-row faq-row">
            <div class="col-8 col-xlg">
                
            <?php if( have_rows('topics') ):
		        while( have_rows('topics') ): the_row(); ?>
                    <div class="faq-block">
                        <h2 class="mdc-typography--headline6 page-content-title">
                            <?php the_sub_field('title'); ?>
                        </h2>
                        <div class="accordeon-set">
                            <?php if( have_rows('question') ):
		                        while( have_rows('question') ): the_row(); ?>
                            <div class="accordeon">
                                <div class="accordeon-panel">
                                    <span class="accordeon-panel-title mdc-typography--body1">
                                        <?php the_sub_field('title'); ?>
                                    </span>
                                </div>
                                <div class="accordeon-content">
                                    <div class="mdc-typography--body2">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                    <div class="accordeon-question">
                                        <span class="mdc-typography--subtitle2 question"><?php the_field('helpful_text'); ?></span>
                                        <button type="button" class="question-button mdc-button mdc-button--outlined" data-answer="yes">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">
                                                Yes
                                            </span>
                                        </button>
                                        <button type="button" class="mdc-button mdc-button--outlined question-button" data-answer="no">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">
                                                No
                                            </span>
                                        </button>
                                    </div>
                                    <div class="accordeon-answer">
                                        <div class="accordeon-answer-text yes-answer mdc-typography--caption">
                                            <div class="inner-text">
                                                <?php the_field('thank'); ?>
                                            </div>
                                        </div>
                                        <div class="accordeon-answer-text no-answer mdc-typography--caption">
                                            <div class="inner-text">
                                                <?php the_sub_field('more'); 
                                                $link = get_sub_field('link_to_zendex');
                                                ?>
                                                <a target="<?= $link['target']; ?>" href="<?= $link['url']; ?>">
                                                    <?= $link['title']; ?>
                                                </a> 
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                                <?php
                                endwhile;
                            endif; ?>
                        </div>
                    </div>


                        <?php
                endwhile;
            endif; ?>


            </div>
        </div>
    </div>
</section>