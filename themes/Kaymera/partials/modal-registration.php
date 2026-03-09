<div class="modal wp_modal" id="modal-registration">
    <div class="modal-dialog medium-size">
        <div class="modal-body">
            <button class="btn-close close-modal" type="button">
                <svg class="icon">
                    <use xlink:href="<?= get_template_directory_uri() ?>/img/icons/svgmap.svg#close"/>
                </svg>
            </button>
            <div class="modal-title">
                <h2 class="mdc-typography--headline5">
                    <?php the_field('registration_title','option'); ?>
                </h2>
            </div>
            <form method="post" id="registrationform" class="modal-form">
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
                <label class="textfield">
                    <input placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" type="tel" name="phone" required>
                    <span class="placeholder">Phone number*</span>
                </label>
                <label class="textfield">
                    <input name="company" type="text">
                    <span class="placeholder">Company name</span>
                </label>
                <label class="checkbox">
                    <input name="check" type="checkbox">
                    <span class="input-checkbox"></span>
                    <span class="text"><?php the_field('сonsent','option'); ?></span>
                </label>
                <input name="event_title" type="hidden" value="<?= get_the_title() ?>">
                <input name="event_link" type="hidden" value="<?= get_post_permalink() ?>">
                <input name="event_id" type="hidden" value="<?= get_the_ID() ?>">
                <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

                <button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                    <span class="mdc-button__label"><?php the_field('registration_form','option'); ?></span>
                    <div class="mdc-button__ripple"></div>
                </button>
                <div class="response"></div>

            </form>
        </div>
    </div>
</div>