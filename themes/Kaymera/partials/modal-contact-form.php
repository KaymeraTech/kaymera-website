<div class="modal wp_modal" id="modal-contact">
    <div class="modal-dialog">
        <div class="modal-body" style="background: #272727">
            <button class="btn-close close-modal-wp" type="button">
                <svg class="icon">
                    <use style="fill: white;" xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#close"/>
                </svg>
            </button>
            
            <form method="post" id="contactformModal" class="contact-form">
                <label class="textfield">
                    <input type="text" name="name" required>
                    <span class="placeholder">Name*</span>
                </label>
                <label class="textfield">
                    <input type="email" name="email" required>
                    <span class="placeholder">Email*</span>
                </label>
                <label title="+ ..." class="textfield">
                    <input type="tel" id="phone" placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" name="phone" required>
                    <!-- <input placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" type="tel" name="phone" required> -->
                    <span class="placeholder">Phone*</span>
                </label>
                <label class="checkbox">
                    <input name="check" type="checkbox">
                    <span class="input-checkbox"></span>
                    <span class="text"><?php the_field('сonsent','option'); ?></span>
                </label>

                <input name="data_set" type="hidden">
                <input id="country" name="country" type="hidden">
                <input name="form_type" type="hidden" value="short">
                <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
                
                <!-- Spam protection -->
                <input name="ts" type="hidden" value="<?= time() ?>">
                <div style="display:none !important;"><input type="text" name="real_email" tabindex="-1" autocomplete="off"></div>

                <button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                    <span class="mdc-button__label dark"><?php the_field('short_form_modal','option'); ?></span>
                    <span class="mdc-button__ripple"></span>
                </button>
                <div class="response"></div>
            </form>

        </div>
    </div>
</div>