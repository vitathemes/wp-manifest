/* eslint-env browser */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.js-slider') !== null) {
            const $slides = document.querySelectorAll('.js-slider-slide').length;
            const sliderOptions = {
                prevNextButtons: false,
                pageDots: false,
                wrapAround: true,
                autoPlay: 5000,
                cellAlign: 'center',
                imagesLoaded: true,
                groupCells: 2,
                pauseAutoPlayOnHover: false
            };

            if ($slides < 4) {
                sliderOptions.cellAlign = 'left';
            }

            const slider = new Flickity('.js-slider', sliderOptions);
        }
        /* Blog Carousel */
        const blogCarouselOptions = {
            prevNextButtons: false,
            pageDots: false,
            draggable: false,
            autoPlay: false,
            cellAlign: 'center',
            hash: true,
            imagesLoaded: true,
            initialIndex: 0,
            groupCells: false,
            pauseAutoPlayOnHover: false
        };

        if (window.matchMedia("(max-width: 700px)").matches) {
            blogCarouselOptions.draggable = true;
        }

        const blogImageCarousel = new Flickity('.js-blog-image-carousel', blogCarouselOptions);
        blogCarouselOptions.fade = true;
        const blogContentCarousel = new Flickity('.js-blog-content-carousel', blogCarouselOptions);
        blogImageCarousel.on( 'change', function( index ) {
            blogContentCarousel.select( index );
        });


        document.querySelectorAll('.js-blog-carousel-nav-item').forEach(item => {
            item.addEventListener('click', event => {
                blogCarouselNavigation(item);
            });
        });

        function blogCarouselNavigation(el) {
            document.querySelectorAll('.js-blog-carousel-nav-item').forEach(function (item) {
               item.classList.remove('is-active');
            });
            el.classList.add("is-active");
        }
    });
})();
