<div class="modal" id="modal-download">
    <div class="modal-dialog">
        <div class="modal-body">
            <button class="btn-close close-modal-wp" type="button">
                <svg class="icon">
                    <use xlink:href="<?= get_template_directory_uri(); ?>/img/icons/svgmap.svg#close"/>
                </svg>
            </button>
            <div class="modal-title">
                <h2 class="mdc-typography--headline5 title">
                    <?php the_field('modal_title'); ?>
                </h2>
                <span class="mdc-typography--body2"><?php the_field('modal_text'); ?></span>
            </div>
            <form method="post" id="downloadformModal" class="modal-form">

                <label class="textfield">
                    <input name="email" type="email" required>
                    <span class="placeholder">E-mail*</span>
                </label>

                <label class="checkbox">
                    <input name="check" type="checkbox">
                    <span class="input-checkbox"></span>
                    <span class="text"><?php the_field('сonsent','option'); ?></span>
                </label>

                <input type="hidden" name="post_id">
                <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                
                <button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                    <span class="mdc-button__label"><?php the_field('form_download','option'); ?></span>
                    <div class="mdc-button__ripple"></div>
                </button>
                <div class="response"></div>
        </div>
    </div>
</div>