<section class="section-contacts">
        <div class="wrap">
            <div class="row">
                <div class="col-5 col-md">
                    <div class="contacts-col">
                        <div class="contacts-group">
                            <?php if( have_rows('offices') ):
                                while( have_rows('offices') ): the_row(); ?>
                                    <h2 class="underlined-title mdc-typography--headline5">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                    <span class="address mdc-typography--body2">
                                        <?php the_sub_field('text'); ?>
                                    </span>
                                <?php
                                endwhile;
                            endif; ?>
                        </div>
                        <div class="contacts-group">
                            <?php if( have_rows('links') ):
                                    while( have_rows('links') ): the_row(); ?>
                                    <h2 class="underlined-title mdc-typography--headline5">
                                        <?php the_sub_field('title'); ?>
                                    </h2>
                                    <?php if( have_rows('link_group') ):
                                        while( have_rows('link_group') ): the_row(); ?>
                                                <div class="contacts-inner-group">
                                                    <h3 class="contacts-info-group-title mdc-typography--headline6">
                                                        <?php the_sub_field('title'); ?>
                                                    </h3>
                                                    <a href="<?= get_sub_field('link')['url']; ?>" class="contacts-link mdc-typography--body2"><?= get_sub_field('link')['title']; ?></a>
                                                </div>
                                            <?php
                                        endwhile;
                                    endif; ?>
                                    <?php
                                endwhile;
                            endif; ?>   
                        </div>
                    </div>     
                </div>

                <div class="col-7 col-md">
                    <div class="contacts-panel">
                        <h2 class="contacts-panel-title mdc-typography--headline5">
                            <?php the_field('form_title'); ?>
                        </h2> 
                        <form method="post" id="contactformFull" class="contacts-panel-form">
                            <div class="contacts-panel-form-row">
                                <label class="textfield">
                                    <input type="text" name="first_name" required>
                                    <span class="placeholder">First name*</span>
                                </label>
                                <label class="textfield">
                                    <input type="text" name="last_name" required>
                                    <span class="placeholder">Last name*</span>
                                </label>
                            </div>
                            <label class="textfield">
                                <input type="email" name="email" required>
                                <span class="placeholder">E-mail*</span>
                            </label>
                            <label title="+ ..." class="textfield">
                                <input type="tel" id="phone" placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" name="phone" required>
                                <!-- <input placeholder="+ ..." pattern="^[0-9-+\s()]*$" minlength="12" maxlength="15" type="tel" name="phone" required> -->
                                <span class="placeholder">Phone number*</span>
                            </label>
                            <label class="textfield">
                                <input type="text" name="company_name">
                                <span class="placeholder">Company name</span>
                            </label>
                            <label class="textfield">
                                <textarea name="textarea"></textarea>
                                <span class="placeholder">Message</span>
                            </label>
                            <label class="checkbox">
                                <input name="check" type="checkbox">
                                <span class="input-checkbox"></span>
                                <span class="text"><?php the_field('сonsent','option'); ?></span>
                            </label>

                            <input id="country" name="country" type="hidden">
                            <input name="form_type" type="hidden" value="full">
                            <input name="link" type="hidden" value="<?= 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

                            <button data-analytics='{"form":"send_contact_form","type":"send_message"}' type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                                <span class="mdc-button__label"><?php the_field('form_button_text'); ?></span>
                                <div class="mdc-button__ripple"></div>
                            </button>

                            <div style="margin-bottom: -24px; color: black; margin-top: 24px" class="response"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>