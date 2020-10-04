/* eslint-env browser */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.js-slider') !== null) {
            var $slides = document.querySelectorAll('.js-slider-slide').length;
            var sliderOptions = {
                prevNextButtons: false,
                pageDots: false,
                wrapAround: true,
                autoPlay: 5000,
                cellAlign: 'center',
                initialIndex: 0,
                imagesLoaded: true,
                groupCells: 2,
                pauseAutoPlayOnHover: false,
                accessibility: true
            };

            if ($slides < 4) {
                sliderOptions.cellAlign = 'left';
            }

            if (window.matchMedia("(max-width: 700px)").matches) {
                sliderOptions.groupCells = false;
            }

            var slider = new Flickity('.js-slider', sliderOptions);
        }


        /* Blog Carousel */
        if (document.querySelector('.js-blog-image-carousel') !== null) {
            var blogCarouselOptions = {
                prevNextButtons: false,
                pageDots: false,
                draggable: false,
                autoPlay: false,
                cellAlign: 'center',
                hash: true,
                imagesLoaded: true,
                initialIndex: 0,
                groupCells: false,
                pauseAutoPlayOnHover: false,
                accessibility: true
            };

            if (window.matchMedia("(max-width: 700px)").matches) {
                blogCarouselOptions.draggable = true;
            }

            var blogImageCarousel = new Flickity('.js-blog-image-carousel', blogCarouselOptions);
            blogCarouselOptions.fade = true;
            var blogContentCarousel = new Flickity('.js-blog-content-carousel', blogCarouselOptions);
            document.querySelectorAll('.c-blog-carousel__content__cell a').forEach(function (link) {
                link.tabIndex = -1;
            })
            document.querySelectorAll('.c-blog-carousel__content__cell.is-selected a').forEach(function (link) {
                link.tabIndex = 0;
            })
            blogImageCarousel.on('change', function (index) {
                blogContentCarousel.select(index);
                document.querySelectorAll('.c-blog-carousel__content__cell').forEach(function (el) {
                    el.querySelectorAll('a').forEach(function (link) {
                        link.tabIndex = -1;
                    })
                });

                document.querySelectorAll('.c-blog-carousel__content__cell.is-selected a').forEach(function (link) {
                    link.tabIndex = 0;
                })
            });
            document.querySelectorAll('.js-blog-carousel-nav-item').forEach(function (item) {
                item.addEventListener('click', function (event) {
                    blogCarouselNavigation(item);
                });
            });

            function blogCarouselNavigation(el) {
                document.querySelectorAll('.js-blog-carousel-nav-item').forEach(function (item) {
                    item.classList.remove('is-active');
                });
                el.classList.add("is-active");
            }
        }


        var searchToggle = document.querySelector('.js-search-toggle');
        var searchCloseToggle = document.querySelector('.js-search-toggle-close');
        var searchForm = document.querySelector('.js-search-form');
        searchToggle.addEventListener('click', function () {

            searchToggle.style.opacity = '0';
            searchCloseToggle.style.display = 'block';
            searchForm.classList.toggle('is-open');
            searchForm.querySelector('input[type="search"]').focus();
        });

        searchCloseToggle.addEventListener('click', function () {
            searchToggle.style.opacity = '1';
            searchCloseToggle.style.display = 'none';
            searchForm.classList.toggle('is-open');
        });

        searchForm.querySelector('input[type="search"]').onblur = function(){
            searchToggle.style.opacity = '1';
            searchCloseToggle.style.display = 'none';
            searchForm.classList.toggle('is-open');
        };
    });

    window.addEventListener('focus', function () {
        console.log(document.activeElement);
        if (document.activeElement == document.querySelector('.c-blog-carousel__content__cell *')) {
            console.log('Carousel Focused!');
        }
    });

})();
