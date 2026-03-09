<div class="modal" id="modal-support">
    <div class="modal-dialog">
        <div class="modal-body">
            <button class="btn-close close-modal" type="button">
                <svg class="icon">
                    <use xlink:href="../img/icons/svgmap.svg#close"/>
                </svg>
            </button>
            <div class="modal-title">
                <h2 class="mdc-typography--headline5">
                    Support
                </h2>
            </div>
            <form class="modal-form">

                <!-- can have class error -->
                <label class="textfield textfield-50">
                    <input type="text" required>
                    <span class="placeholder">First name*</span>
                </label>

                <label class="textfield textfield-50">
                    <input type="text" required>
                    <span class="placeholder">Last name*</span>
                </label>
                
                <label class="textfield">
                    <input type="email" required>
                    <span class="placeholder">Email*</span>
                </label>

                <label class="textfield">
                    <input type="phone" required>
                    <span class="placeholder">Phone number*</span>
                </label>
                <label class="textfield">
                    <input type="text">
                    <span class="placeholder">Company name</span>
                </label>

                <div class="radiofield-set">
                    <label class="radiofield">
                        <input type="radio" name="kymera-type">
                        <span class="radio-view"></span>
                        <span class="radio-text">Phone</span>
                    </label>
                    <label class="radiofield">
                        <input type="radio" name="kymera-type">
                        <span class="radio-view"></span>
                        <span class="radio-text">App</span>
                    </label>
                </div>

                <label class="textfield">
                    <input type="text">
                    <span class="placeholder">Enter Kaymera device IMEI</span>
                </label>

                <div class="select" data-choosed="">
                    <div class="select-block">
                        <span class="select-value">Choose issue category</span>
                        <svg class="icon">
                            <use xlink:href="/img/icons/svgmap.svg#arrow-down" />
                        </svg>
                    </div>
                    <div class="select-inner">
                        <div class="select-option" data-value="Category 1">
                            Category 1
                        </div>
                        <div class="select-option" data-value="Category 2">
                            Category 2
                        </div>
                        <div class="select-option" data-value="Category 3">
                            Category 3
                        </div>
                    </div>
                </div>

                <div class="submit-row">
                    <button type="submit" class="mdc-button mdc-button--raised inline-demo-button mdc-ripple-upgraded">
                        <span class="mdc-button__label">Register</span>
                        <div class="mdc-button__ripple"></div>
                    </button>
                    <div class="load-row">
                        <label class="label-load">
                            <input type="file" name="upload_file[]"  accept="image/*" multiple >
                            <svg class="icon">
                                <use xlink:href="img/icons/svgmap.svg#attach" />
                            </svg>
                        </label>
                        <div class="file-tags"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>