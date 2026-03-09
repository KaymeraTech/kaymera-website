document.addEventListener('DOMContentLoaded', function(){

    if(window.innerWidth > 640){
        var sliderRow = document.querySelectorAll('.slider-row');
        if(sliderRow.length > 0){
            var slider = tns({
                container: '.slider-row',
                items: 4,
                gutter: 96,
                mouseDrag: true,
                swipeAngle: false,
                speed: 800,
                loop: true,
                autoWidth: true, 
                controls: false,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayButtonOutput: false,
            });
        }
    }

    var sliderPartners= document.querySelectorAll('.partners-slider');
    if(sliderPartners.length > 0){
        var slider = tns({
            container: '.partners-slider',
            items: 2,
            mouseDrag: true,
            speed: 800,
            loop: true,
            gutter: 16,
            controls: false,
            nav: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayButtonOutput: false,
            responsive: {
                1080: {
                    items: 6,
                    gutter: 80,
                    autoWidth: false,
                },
                768: {
                    items: 4,
                    gutter: 40,
                    autoWidth: false,
                },
                480: {
                    items: 3,
                    gutter: 40,
                    autoWidth: false,
                }
            }
        });
    }

    var halfSlider = document.querySelectorAll('.half-slider');
    if(halfSlider.length > 0){
        var slider = tns({
            container: '.half-slider',
            items: 1,
            axis: 'vertical',
            mode: 'gallery',
            speed: 800,
            loop: true,
            controls: false,
            nav: true,
            swipeAngle: false,
            mouseDrag: true
        });
    }
});

