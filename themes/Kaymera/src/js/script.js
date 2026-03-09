// import './intlTelInput.js'; 
import './slider.js';
import './animation.js';
import './tel-input.js';

document.addEventListener("DOMContentLoaded", function(){
    openMenu();

    openAccordeon();

    detectTextFields();

    changeTabs();

    if(window.innerWidth > 640){
        addLines();
    }

    if(window.innerWidth <= 768){
        mobileFooterMenu();
    }


    var openRegistrationModal = document.querySelectorAll('.open-registration-modal');
    var registrationModal = document.getElementById('modal-registration');
    if(openRegistrationModal.length > 0){
        for(var i = 0; i < openRegistrationModal.length; i++){
            openRegistrationModal[i].addEventListener('click', function(e){
                e.preventDefault();
                openModal(registrationModal, this);
            });
        }
    }

    var openSupportModal = document.querySelectorAll('.open-support-modal');
    var supportModal = document.getElementById('modal-support');
    if(openSupportModal.length > 0){
        for(var i = 0; i < openSupportModal.length; i++){
            openSupportModal[i].addEventListener('click', function(e){
                e.preventDefault();
                openModal(supportModal, this);
            });
        }
    }

    var openDownloadModal = document.querySelectorAll('.download-panel');
    var downloadModal = document.getElementById('modal-download');
    if(openDownloadModal.length > 0){
        for(var i = 0; i < openDownloadModal.length; i++){
            openDownloadModal[i].addEventListener('click', function(e){
                e.preventDefault();
                downloadModal.setAttribute('data-download', this.getAttribute('data-download'));
                openModal(downloadModal, this);
            });
        }
    }

    var questionButton = document.querySelectorAll('.question-button');
    for(var i = 0; i < questionButton.length; i++){
        questionButton[i].addEventListener('click', function(){
            this.classList.add('clicked');
            if(this.nextElementSibling){
                if(this.nextElementSibling.classList.contains('question-button')){
                    this.nextElementSibling.classList.add('events-none');  
                }
            }
            if(this.previousElementSibling){
                if(this.previousElementSibling.classList.contains('question-button')){
                    this.previousElementSibling.classList.add('events-none');  
                }
            }
            this.parentElement.classList.add(this.getAttribute('data-answer'));
        });
    }

    var select = document.querySelectorAll('.select');

    if(select.length > 0){
        for(var i = 0; i < select.length; i++){
            customSelect(select[i]);
        }
    }

    var labelLoad = document.querySelectorAll('.label-load');

    if(labelLoad.length > 0){
        for(var i = 0; i < labelLoad.length; i++){
            loadFile(labelLoad[i]);
        }
    }

    let validate_number_inputs = document.querySelectorAll('.validation-numbers');
    validate_number_inputs.forEach(element => {
        element.addEventListener('input', (e) => {
            if (!isANumber(element.value)) {
                element.value = element.value.slice(0, -1);
            }
        });
    });
    
});

function isANumber( value ) {
    var numStr = /^-?(\d+\.?\d*)$|(\d*\.?\d+)$/;
    return numStr.test( value.toString() );
}

function openMenu(){
	var btnMenu = document.getElementById('btn-menu');
	var header = document.getElementById('header');

	btnMenu.addEventListener('click', function(){
		header.classList.toggle('open-menu');
	});	
}


function openAccordeon(){
    var accordeon = document.querySelectorAll('.accordeon');
    if(accordeon.length > 0){
        for(var i = 0; i < accordeon.length; i++){
            accordeon[i].querySelector('.accordeon-panel').addEventListener('click', function(){
                this.classList.toggle('open');
            });
        }
    }
}

function detectTextFields(){
    var textField = document.querySelectorAll('.textfield');
    if(textField.length > 0){
        for(var i = 0; i < textField.length; i++){
            var inputField = textField[i].querySelector('input');
            if(textField[i].querySelector('input') == null){
                inputField = textField[i].querySelector('textarea');
            }
            if(inputField.value.length > 0){
                textField[i].classList.add('filled');
            } else {
                textField[i].classList.remove('filled');
            }
            textField[i].addEventListener('change', function(){
                inputField = this.querySelector('input');
                if(this.querySelector('input') == null){
                    inputField = this.querySelector('textarea');
                }
                if(inputField.value.length > 0){
                    this.classList.add('filled');
                } else {
                    this.classList.remove('filled');
                }
            });
        }
    }
}

function changeTabs(){
    var tabButtons = document.querySelectorAll('.mdc-tab');
    var tabBodyContent = document.querySelectorAll('.tab-content');

    for(var i = 0; i < tabButtons.length; i++){
        tabButtons[i].addEventListener('click', function(){
            for(var j = 0; j < tabButtons.length; j++){
                tabButtons[j].classList.remove('mdc-tab--active');
                tabButtons[j].setAttribute('aria-selected', "false");
                tabBodyContent[j].classList.remove('tab-content-active');
                tabButtons[j].querySelector('.mdc-tab-indicator').classList.remove('mdc-tab-indicator--active');
            }
            this.classList.add('mdc-tab--active');
            this.setAttribute('aria-selected', "true");
            this.querySelector('.mdc-tab-indicator').classList.add('mdc-tab-indicator--active');
            var activeTab = this;
            var activeAttribute = activeTab.getAttribute('tabIndex');

            for(var k = 0; k < tabBodyContent.length; k++){
                if(tabBodyContent[k].getAttribute('data-tab') == activeAttribute){
                    tabBodyContent[k].classList.add('tab-content-active');
                }
            }
        });
    }
}

function mobileFooterMenu(){
    var openMobFooterInner = document.querySelectorAll('.footer-menu-title');

    for(var i = 0; i < openMobFooterInner.length; i++){
        openMobFooterInner[i].addEventListener('click', function(){
            this.classList.toggle('active');
        });   
    }
}


/*
    allows open modal
    modal -  block with modal window
    openModal - block, that allows open modal, can be as string 'no-open'
*/
function openModal(modal, openModal){
	document.body.classList.add('body-overflow');
	modal.classList.add('open-modal');
	var modalDialog = modal.querySelector('.modal-dialog');
	var closeElem = modal.querySelectorAll('.close-modal');
	for(var j = 0; j < closeElem.length; j++){
		closeElem[j].addEventListener('click', function(){
			closeModal(modal);
		});	
	}

	document.addEventListener('click', function(e){
		if(openModal !== 'no-open'){
			if(modal.classList.contains('open-modal')){
				var target = e.target;
				var openedBlock = target == openModal || openModal.contains(target);
				var modalDialogBlock = target == modalDialog || modalDialog.contains(target);
				if(!openedBlock && !modalDialogBlock){
					closeModal(modal);
				}
			}
		}
	});

}

function closeModal(modal){
	document.body.classList.remove('body-overflow');
	modal.classList.remove('open-modal');
}

function customSelect(select){
    var selectBlock = select.querySelector('.select-block');
    var selectValue = select.querySelector('.select-value');

   if(selectBlock){
        selectBlock.addEventListener('click', function(){
            select.classList.toggle('open-select');
        });
   }

    document.addEventListener('click', function(e){
        var target = e.target;
        var currentSelect = target == select || select.contains(target);
        if(!currentSelect){
            select.classList.remove('open-select');
        }
    }, false);

    var selectOptions = select.querySelectorAll('.select-option');

    for(var i = 0; i < selectOptions.length; i++){
        selectOptions[i].addEventListener('click', function(){
            select.classList.remove('open-select');
            select.setAttribute('data-choosed', this.getAttribute('data-value'));
            selectValue.innerText = this.getAttribute('data-value');
        });
    }
}

function loadFile(labelLoad){
    var inputFile = labelLoad.querySelector('input[type="file"]');
    var fileList = [];
    inputFile.addEventListener('change', function(){
        for(var i = 0; i < inputFile.files.length; i++){
            fileList.push(inputFile.files[i].name);
        }
        updateList(fileList, labelLoad);
    });

}


function updateList(fileList, labelLoad){
    var currentHTML = document.createElement('div');
    for(var i = 0; i < fileList.length; i++){

        currentHTML = '<div class="loaded-file">\
                <img class="loaded-file-icon" src="img/icons/image-icon.svg">\
                <span class="loaded-file-name">' + fileList[i] + '</span>\
                <button class="loaded-file-delete" type="button">\
                    <img src="img/icons/round-close.svg" />\
                </button>\
            </div>';
    }

    labelLoad.parentElement.querySelector('.file-tags').innerHTML = currentHTML;


    setTimeout(function(){
        console.log(labelLoad);
        var loadedFile = document.querySelectorAll('.loaded-file');
        for(var j = 0; j < loadedFile.length; j++){
            loadedFile[j].querySelector('loaded-file-delete').addEventListener('click', function(){
                thisElem.remove();
            });
        }
    }, 5000);
}

function addLines(){
    var canvas = document.getElementById('canvas');
    if(canvas != null){
        var canvas = document.getElementById("canvas"),
        ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        var x = 220;
        if(window.innerWidth < 480){
            x = 80;
        }

        var stars = [], 
        FPS = 60,
        mouse = {
            x: 0,
            y: 0
        };

        for (var i = 0; i < x; i++) {
            stars.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 1 + 1,
                vx: Math.floor(Math.random() * 50) - 25,
                vy: Math.floor(Math.random() * 50) - 25
            });
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            ctx.globalCompositeOperation = "lighter";

            for (var i = 0, x = stars.length; i < x; i++) {
                var s = stars[i];

                ctx.fillStyle = "#E4524C";
                ctx.beginPath();
                if( i < (x - 50)){
                    ctx.arc(s.x, s.y, s.radius, 0, 2 * Math.PI);
                } else if( i < x - 20){
                    ctx.arc(s.x, s.y, s.radius * 3, 0, 2 * Math.PI);
                }
                
                ctx.fill();
                ctx.fillStyle = "black";
                ctx.stroke();
            }

            ctx.beginPath();
            for (var i = 0, x = stars.length; i < x; i++) {
                var starI = stars[i];
                ctx.moveTo(starI.x, starI.y);
                if (distance(mouse, starI) < 150) ctx.lineTo(mouse.x, mouse.y);
                    for (var j = 0, x = stars.length; j < x; j++) {
                        var starII = stars[j];
                        if (distance(starI, starII) < 150) {
                            ctx.lineTo(starII.x, starII.y);
                        }
                    }
                }
                ctx.lineWidth = 0.05;
                ctx.strokeStyle = "#E4524C";
                ctx.stroke();
            }

            function distance(point1, point2) {
            var xs = 0;
            var ys = 0;

            xs = point2.x - point1.x;
            xs = xs * xs;

            ys = point2.y - point1.y;
            ys = ys * ys;

            return Math.sqrt(xs + ys);
        }

        function update() {
            for (var i = 0, x = stars.length; i < x; i++) {
                var s = stars[i];

                s.x += s.vx / FPS;
                s.y += s.vy / FPS;

                if (s.x < 0 || s.x > canvas.width) s.vx = -s.vx;
                if (s.y < 0 || s.y > canvas.height) s.vy = -s.vy;
            }
        }

        canvas.addEventListener("mousemove", function(e) {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        function tick() {
            draw();
            update();
            requestAnimationFrame(tick);
        }

        tick();

    }
}


// Page store slider


// var galleryThumbs = new Swiper(".gallery-thumbs", {
//     // centeredSlides: true,
//     // centeredSlidesBounds: true,
//     slidesPerView: 3,
//     watchOverflow: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     width: '80',
//     height: '80',
//     direction: "vertical" });
  
  
//   var galleryMain = new Swiper(".gallery-main", {
//     watchOverflow: true,
//     watchSlidesVisibility: true,
//     watchSlidesProgress: true,
//     // preventInteractionOnTransition: true,
//     navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev" },
  
//     effect: "fade",
//     fadeEffect: {
//       crossFade: true },
  
//     thumbs: {
//       swiper: galleryThumbs } 
//     });
  
  
  
//   galleryMain.on("slideChangeTransitionStart", function () {
//     galleryThumbs.slideTo(galleryMain.activeIndex);
//     console.log('transition start');
//   });
  
//   galleryThumbs.on("transitionStart", function () {
//     galleryMain.slideTo(galleryThumbs.activeIndex);
//     console.log('second start');
//   });
var galleryThumbs = new Swiper(".gallery-thumbs", {
    centeredSlides: true,
    centeredSlidesBounds: true,
    slidesPerView: 3,
    watchOverflow: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    direction: 'vertical' });
  
  
  var galleryMain = new Swiper(".gallery-main", {
    watchOverflow: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    // preventInteractionOnTransition: true,
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
      },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev' },
  
    effect: 'fade',
    fadeEffect: {
      crossFade: true },
  
    thumbs: {
      swiper: galleryThumbs } });
  
    let slidersCurrent = $('.gallery-main .swiper-slide-active').index();
    let slidersLenght = $('.gallery-main .swiper-slide').length;
    
    let slidersLeftUpdate = function(){
        
        console.log('slidersCurrent', slidersCurrent);
        console.log('slidersLenght', slidersLenght);

        if(slidersCurrent + 2 < slidersLenght && slidersCurrent != 0){
            $('.gallery-numbers .number').text(slidersLenght - slidersCurrent - 2);
        } else {
            $('.gallery-numbers .number').text(Math.abs(slidersLenght - slidersCurrent - 3));
        }
        
        if(slidersCurrent + 2 < slidersLenght && slidersLenght > 3){
            $('.gallery-numbers').show(300);
        }
        
        if(slidersCurrent + 2 >= slidersLenght || slidersLenght <= 3 ){
            $('.gallery-numbers').hide(300);
        }
        // console.log(slidersLeft);
        // console.log(slidersLeft.length);
    }

    slidersLeftUpdate();
    
    if (slidersLenght > 3) {
        galleryMain.on('slideChangeTransitionStart', function () {
            galleryThumbs.slideTo(galleryMain.activeIndex);
            slidersLeftUpdate();
        });
          
        galleryThumbs.on('transitionStart', function () {
            galleryMain.slideTo(galleryThumbs.activeIndex);
            slidersLeftUpdate();
        });
    }
  


  // CUSTOM SELECT

  $('select.custom').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});


$('.store__qty .select-options li').on('click', function(){
    console.log($(this).attr('rel'));
    if($(this).attr('rel') >= 3){
        console.log('open popup');
        $('.qty__popup .wp_modal').addClass('open-modal');
    }
})



$('.privacity__help-icon').on('mouseover', function(){
    $('.privacity__help-content').removeClass('active');
    $(this).parent().find('.privacity__help-content').addClass('active');
});

$('.privacity__help-content').on('mouseleave', function(){
    $(this).removeClass('active');
    console.log('out!!');
});



let changeSliderBlock = function(){
    if ($('.store__content .store__price').offset()) {
        let store = $('.store__content .store__price').offset().top - $(window).scrollTop();
        console.log(store);
        console.log($(window).scrollTop(), 'window scrolled');

        if(store >= 0){
            $('.store__sticky').removeClass('change');
        } else{
            $('.store__sticky').addClass('change');
        }
    }
}

changeSliderBlock();

$(document).scroll(function(){
    changeSliderBlock();
  });


// tabs show active element for store page
  jQuery(window).scroll(function(){
    var $sections = $('.tabs-id');
        $sections.each(function(i,el){
        var top  = $(el).offset().top-200;
        var bottom = top +$(el).height();
        var scroll = $(window).scrollTop();
        var id = $(el).attr('id');
        if( scroll > top && scroll < bottom){
            $('a.active').parent().removeClass('active');
            $('a.active').removeClass('active');
            $('a[href="#'+id+'"]').addClass('active');
            $('a.active').parent().addClass('active');

        }
    });
});
// TABS scroll for store page
$(".tabs").on("click","a", function (event) {
    //event.preventDefault();
    var id  = $(this).attr('href'),
        top = $(id).offset().top;
    $('body,html').animate({scrollTop: top - 199}, 500);
});

// check is window width is enouch for .privacity__item-help
let privacityCheckHelpPosition = function(){

    let documentWidth = $(document).width();
    let privacityItem = $('.privacity__item-text');

    privacityItem.each(function(i, item){
        if(documentWidth - $(item).offset().left - $(item).width() - 340 <= 0){ // 340 - width of .privacity__item-help element
            console.log(documentWidth - $(item).offset().left - $(item).width());
            console.log(item);
            $(this).siblings('.privacity__item-help').addClass('right');
        } else{
            $(this).siblings('.privacity__item-help').removeClass('right');
        }
    });

}
privacityCheckHelpPosition();

$(window).on('resize', privacityCheckHelpPosition);


let updateHeaderWidth = function(){
    let headerHeight;
    if($(window).width() > 640){
        headerHeight = $('.header').height();
    } else{
       headerHeight = $('.header').height() + $('.header .menu-nav').height();
    }
    $('.tabs').css('top', headerHeight);
}

updateHeaderWidth();

$(window).on('resize', updateHeaderWidth);