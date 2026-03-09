<div class="modal wp_modal" id="modal-order">
    <div class="modal-dialog">
        <div class="modal-body" style="background: #272727">
            <button class="btn-close close-modal-wp cf-js" type="button">
                <svg class="icon">
                    <use style="fill: white;" xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#close"/>
                </svg>
            </button>
            
            <form method="post" id="orderformModal" class="contact-form cf-js">
                <label class="textfield">
                    <input type="text" name="first_name" required>
                    <span class="placeholder">First name*</span>
                </label>
                <label class="textfield">
                    <input type="text" name="last_name" required>
                    <span class="placeholder">Last name*</span>
                </label>
                <label class="textfield">
                    <input type="email" name="email" required>
                    <span class="placeholder">Email*</span>
                </label>
                <label title="+ ..." class="textfield">
                    <input id="phone" placeholder="+ ..." type="text" pattern="^[0-9-+\s()]*$" minlength="8" maxlength="15" name="phone" class="validation-numbers">
                    <span class="placeholder">Phone</span>
                </label>
                <input type="hidden" name="productCode" value="<?= get_field('product_code') ?>">
                <label class="checkbox">
                    <input name="check" type="checkbox" checked>
                    <span class="input-checkbox"></span>
                    <span class="text"><?php the_field('сonsent','option'); ?></span>
                </label>

                <input name="data_set" type="hidden">
                <input id="country" name="country" type="hidden">
                <input name="form_type" type="hidden" value="short">
                <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

                <button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                    <span class="mdc-button__label dark"><?php the_field('short_form_modal','option'); ?></span>
                    <span class="mdc-button__ripple"></span>
                </button>
                <div class="response error"></div>
            </form>

            <div class="loading-js loading hidden">
                <div class="loading-dots">
                    <div class="loading-dots--dot"></div>
                    <div class="loading-dots--dot"></div>
                    <div class="loading-dots--dot"></div>
                </div>
                <div class="h3"><?= __('Just a sec', 'kaymera') ?></div>
                <div class="text"><?= __('We are transferring you to secure payment gateway', 'kaymera') ?></div>
            </div>
        </div>
    </div>
</div>