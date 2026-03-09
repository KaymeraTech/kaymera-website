<form method="post" id="contactform" class="contact-form">
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
    
    <input id="country" name="country" type="hidden">
    <input name="form_type" type="hidden" value="short">
    <input name="data_set" type="hidden" value="Footer form">
    <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

    <input type="submit"
	       value="<?php the_field('short_form','option'); ?>"
	       class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded"
	       data-analytics='{"form":"send_contact_form","type":"contact_now"}'>
    <div style="margin-bottom: -24px; color: white; margin-top: 24px" class="response"></div>
    <input type="text" name="hp_check" style="display:none !important;" tabindex="-1" autocomplete="off">
</form>

