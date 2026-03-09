/**
 * Send forms
 * -----------------
 */

function additional_loader(id, show = true) {
    let modal_body = document.getElementById(id).closest(".modal-body"),
        main_js_elms = modal_body.querySelectorAll(".cf-js"),
        loading_js = modal_body.querySelector(".loading-js");
    if (main_js_elms.length > 0 && loading_js) {
        if (show) {
            main_js_elms.forEach(element => {
                element.classList.add('hidden');
            });
            loading_js.classList.remove('hidden');
        } else {
            main_js_elms.forEach(element => {
                element.classList.remove('hidden');
            });
            loading_js.classList.add('hidden');
        }
    }

}

//Insert result function
function inserResult(id, result, button = false) {
    document.querySelector('#' + id + " button").disabled = false;
    document.querySelector('#' + id + " button span").innerHTML = button;
    document.querySelector('#' + id + " .response").innerHTML = result;
}

function sendForm(id, handler, button, afterFunction = null) {
    if (document.getElementById(id) != null) {
        document.getElementById(id).onsubmit = function (e) {
            e.preventDefault();

            // Loader if exist
            additional_loader(id);

            document.querySelector('#' + id + " button").disabled = true;
            document.querySelector('#' + id + " button span").innerHTML = field_settings.wait;
            //Get data
            let data = new FormData(document.getElementById(id));
            data.append('nonce', api_settings.nonce);
            //Check data
            var result = field_settings.to_many;
            let allowed = true;
            for (var val of data.entries()) {
                if (val[0] == 'textarea') {
                    if (val[1].length > 450) {
                        allowed = false;
                        break;
                    }
                } else if (val[1].length > 350) {
                    console.log(val);
                    allowed = false;
                    break;
                }
                // else if (val[0] == 'phone') {
                //     //Check if phone dont start with +
                //     if ( (val[1].indexOf('+') !== 0) || (val[1].split("+").length-1 > 1) ) {
                //         result = field_settings.must_plus;
                //         allowed = false;
                //         break;
                //     }
                // }
            }
            // Send data
            let xhr = new XMLHttpRequest();
            if (allowed == true) {
                xhr.open("POST", api_settings.ajax_url + '?action=' + handler);
                xhr.send(data);

                // Insert output in form
                xhr.onload = function (e) {

                    let answer = JSON.parse(xhr.response);
                    if (afterFunction) {
                        afterFunction(id, answer, button);
                    } else {
                        let result = answer.result;
                        inserResult(id, result, button);
                        document.querySelector('#' + id).reset();

                        //For Downloads
                        if (answer.link) {
                            let link = answer.link;
                            window.open(link, '_blank');
                        }

                        // Loader if exist
                        additional_loader(id, false);
                    }
                    //Analytics
                    AnalyticsSetDataLayer();

                }
            } else {
                inserResult(id, result, button);
            }
        }
    }
}
//Initialization send forms
document.addEventListener("DOMContentLoaded", function () {
    sendForm('contactform', 'sendForm', field_settings.short_form);
    sendForm('contactformModal', 'sendForm', field_settings.short_form_modal);
    sendForm('contactformFull', 'sendFormFull', field_settings.full_form);
    sendForm('registrationform', 'registration_event', field_settings.registration_form);
    sendForm('downloadformModal', 'download_file', field_settings.form_download);
    sendForm('chooseModalform', 'sendChoose', field_settings.choose_form);
    sendForm('chooseform', 'sendChoose', field_settings.choose_form);
    sendForm('orderformModal', 'orderForm', field_settings.short_form_modal, orderProcessUrl);
});

function orderProcessUrl(id, answer, button) {
    //console.log(answer.result);
    if (answer.message == 'Success') {
        window.location.href = answer.result;
    } else if (answer.code = '400') {
        additional_loader(id, false);
        inserResult(id, answer.message, button);
    }

    // else if (answer.message == '\"email\" must be a valid email') {
    //     additional_loader(id, false);
    //     inserResult(id, '\"Email\" must be a valid', button);
    // } else {
    //     additional_loader(id, false);
    //     inserResult(id, 'Error', button);
    // }
}

/**
 * Additional modals (plus modals in script.js)
 * -----------------
 */
function modalWP(buttonClass, formID) {
    var openContactModal = document.querySelectorAll('.' + buttonClass);
    var contactModal = document.getElementById(formID);
    if (openContactModal.length > 0) {
        for (var i = 0; i < openContactModal.length; i++) {
            openContactModal[i].closest('.' + buttonClass).addEventListener('click', function (e) {
                e.preventDefault();
                openModalWP(contactModal, this)
            });
        }
    }
}
//Close modal
function closeModalWP(element) {
    element.classList.remove('open-modal');
    document.body.classList.remove('body-overflow');
    //Remove response when modal close
    document.querySelectorAll("form .response").forEach(element =>
        element.innerHTML = ''
    );
}
//Init close modal by click out modal on all modals on page
if (document.querySelectorAll('.modal')) {
    document.querySelectorAll(".modal").forEach(element =>
        element.addEventListener('click', function (e) {
            if (e.target == this) {
                closeModalWP(e.target)
            }
        })
    );
}
//Modal construct main part
function open_construct(modal) {
    document.body.classList.add('body-overflow');
    modal.classList.add('open-modal');
    document.querySelector('.open-modal .close-modal-wp').addEventListener('click', function (e) {
        closeModalWP(modal);
    });
}
//Standart, Download, Chooce forms condition
function openModalWP(modal, this_element) {
    open_construct(modal);
    //Stabdart
    if (this_element.getAttribute('data-set')) {
        let data_set = this_element.getAttribute('data-set');
        modal.querySelector('input[name ="data_set"]').value = data_set;
    }
    //Download
    else if (this_element.getAttribute('data-post-id')) {
        let data_post_id = this_element.getAttribute('data-post-id');
        modal.querySelector('input[name ="post_id"]').value = data_post_id;
    }
    //Chooce
    else if (this_element.getAttribute('data-item')) {
        let data_item = this_element.getAttribute('data-item');
        modal.querySelector('input[name ="choose"]').value = data_item;
    }
}
//Initialization modals
document.addEventListener("DOMContentLoaded", function () {
    modalWP('modal-contact-button', 'modal-contact');
    modalWP('modal-download-button', 'modal-download');
    modalWP('choose-button', 'modal-chooce');
    modalWP('modal-order-button', 'modal-order');
});

/**
 * Load more downloads
 * -------------------
 */
document.addEventListener("DOMContentLoaded", function () {
    let buttons = document.querySelectorAll('.load-more-button');
    for (let button of buttons) {
        button.addEventListener('click', function (e) {

            e.preventDefault();

            let el = e.target.closest(".load-more-button");
            let data_button_name = el.getAttribute('data-button-name');
            let data_count = el.getAttribute('data-count');
            let data_perpagecount = el.getAttribute('data-per-page-count');
            let data_offset = el.getAttribute('data-offset');
            let data_term = el.getAttribute('data-term')

            //Button settings
            el.disabled = true;
            el.querySelector('.button-more-text').innerHTML = 'Please wait...';

            let xhr = new XMLHttpRequest();
            let json = JSON.stringify({
                perpagecount: data_perpagecount,
                count: data_count,
                offset: data_offset,
                term: data_term
            });

            xhr.open("POST", api_settings.ajax_url + '?action=get_downloads');
            xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
            xhr.send(json);

            // Insert output in form
            xhr.onload = function (e) {
                let result = JSON.parse(xhr.response);
                let offset = Number(data_perpagecount) + Number(data_offset);
                el.setAttribute('data-offset', offset);

                el.parentElement.querySelector('.inner').innerHTML += result;

                if (Number(data_offset) + Number(data_perpagecount) >= data_count) {
                    el.style.display = "none";
                }
                function fade() {
                    let blocks = el.parentElement.querySelectorAll('.fadein');
                    for (let j = 0; j < blocks.length; j++) {
                        blocks[j].style.opacity = "1";
                    }
                }
                setTimeout(fade, 1)
                //Button settings
                el.disabled = false;
                el.querySelector('.button-more-text').innerHTML = data_button_name;
                //Initial to new buttons
                modalWP('modal-download-button', 'modal-download');
            }

        });
    }
});

/**
 * Youtube embed video
 * -------------------
 */
if (document.querySelector('.video-inner .btn-play') != null) {
    youtube();
}
function youtube() {
    // 2. This code loads the IFrame Player API code asynchronously.       
    var video_id = document.querySelector('.video-inner .btn-play').getAttribute('data-video');
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    var done = false;
    window.onYouTubeIframeAPIReady = function () {
        player = new YT.Player('player', {
            height: '100%',
            width: '100%',
            videoId: video_id,
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }
    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();
    }
    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
        }
    }
    function stopVideo() {
        player.stopVideo();
    }
    document.querySelector('.video-inner .btn-play').addEventListener("click", function () {
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    })
}

/** Analytics */
//Set data
function AnalyticsSetFormName() {
    window.dataAnalytics = '{"form":"send_form"}';
    let buttonAnalyticsForm = document.querySelectorAll('[data-analytics]');
    buttonAnalyticsForm.forEach(function (button) {
        button.addEventListener('click', function (event) {
            window.dataAnalytics = JSON.parse(this.getAttribute('data-analytics'));
            //console.log(window.dataAnalytics);
        });
    });
}
//Initialization
document.addEventListener("DOMContentLoaded", () => {
    AnalyticsSetFormName();
});
//Form submit function
function AnalyticsSetDataLayer() {
    dataLayer.push({
        'event': window.dataAnalytics.form,
        'typeform': window.dataAnalytics.type
    });
}
//Hash condition
function hashRedirect() {
    if (window.location.hash == '#threats') {
        window.history.pushState("", "", "/");
    }
}
hashRedirect();