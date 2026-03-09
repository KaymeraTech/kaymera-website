<div class="modal wp_modal" id="modal-chooce">
    <div class="modal-dialog medium-size">
        <div class="modal-body">
            <button class="btn-close close-modal-wp" type="button">
                <svg class="icon">
                    <use style="fill: white;" xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#close"/>
                </svg>
            </button>
            <div class="modal-title">
                <h2 class="mdc-typography--headline5">
                    <?php the_field('choose_title','option'); ?>
                </h2>
            </div>
            <form method="post" id="chooseModalform" class="modal-form">
                <!-- can have class error -->
                <label class="textfield textfield-50">
                    <input name="first_name" type="text" required>
                    <span class="placeholder">First name*</span>
                </label>
                <label class="textfield textfield-50">
                    <input name="last_name" type="text" required>
                    <span class="placeholder">Last name*</span>
                </label>
                <label class="textfield">
                    <input name="email" type="email" required>
                    <span class="placeholder">Email*</span>
                </label>
                <label title="+ ..." class="textfield">
                    <input type="tel" id="phone" placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" name="phone" required>
                    <!-- <input placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" type="tel" name="phone" required> -->
                    <span class="placeholder">Phone number*</span>
                </label>
                <label class="checkbox">
                    <input name="check" type="checkbox">
                    <span class="input-checkbox"></span>
                    <span class="text"><?php the_field('сonsent','option'); ?></span>
                </label>
                
                <input id="country" name="country" type="hidden">
                <input name="form_type" type="hidden" value="choose">
                <input name="choose" type="hidden" value="">
                <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

                <button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                    <span class="mdc-button__label dark"><?php the_field('choose_form','option'); ?></span>
                    <div class="mdc-button__ripple"></div>
                </button>
                <div class="response"></div>
            </form>

        </div>
    </div>
</div>