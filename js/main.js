/* eslint-env browser */
var slider;
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.js-slider') !== null) {
            var $slides = document.querySelectorAll('.js-slider-slide').length;

            if (window.matchMedia("(max-width: 568px)").matches) {
                var sliderOptions = {
                    prevNextButtons: false,
                    pageDots: false,
                    wrapAround: false,
                    cellAlign: 'center',
                    initialIndex: 0,
                    imagesLoaded: true,
                    groupCells: 2,
                    pauseAutoPlayOnHover: false,
                    accessibility: true
                };
            } else {
                var sliderOptions = {
                    prevNextButtons: false,
                    pageDots: false,
                    wrapAround: true,
                    cellAlign: 'center',
                    initialIndex: 0,
                    imagesLoaded: true,
                    groupCells: 2,
                    pauseAutoPlayOnHover: false,
                    accessibility: true
                };
            }

            if ($slides < 4) {
                sliderOptions.cellAlign = 'left';
            }

            if (window.matchMedia("(max-width: 700px)").matches) {
                sliderOptions.groupCells = false;
            }

            slider = new Flickity('.js-slider', sliderOptions);
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
        var searchForm = document.querySelector('.js-search-form');
        searchToggle.addEventListener('click', function () {

            searchForm.classList.toggle('is-open');
            searchForm.querySelector('input[type="search"]').focus();
        });

        searchForm.querySelector('.c-header__toggle--close-search').addEventListener('click', function(){
            searchToggle.style.opacity = '1';
            searchForm.classList.toggle('is-open');
        });
    });

    //window.addEventListener('focus', function () {
        //console.log(document.activeElement.closest(".c-blog-carousel__content__cell").index);
        //if (document.activeElement == document.querySelector('.c-blog-carousel__content__cell *')) {
            //console.log(document.activeElement.closest(".c-blog-carousel__content__cell"));
        //}
    //});

})();


var menuToggle = document.querySelector('.c-header__toggle');
var menu = document.querySelector('.c-header__menu-items');
var menuLinks = menu.getElementsByTagName('a');
var menuListItems = menu.querySelectorAll('li');

var focus, isToggleItem, isBackward;
var lastIndex = menuListItems.length - 1;
var lastParentIndex = document.querySelectorAll('.c-header__menu > ul > li').length - 1;
document.addEventListener('focusin', function () {
    focus = document.activeElement;
    if (isToggleItem && focus !== menuLinks[0]) {
        document.querySelectorAll('.c-header__menu > ul > li')[lastParentIndex].querySelector('a').focus();
    }

    if (focus === menuToggle) {
        isToggleItem = true;
    } else {
        isToggleItem = false;
    }

    if (focus.classList.contains('c-slider__slide-link')) {
        var homepageSliderCells = document.querySelectorAll('.js-slider-slide');
        var focusedCell = focus.parentNode.parentNode;
        var indexOfFocusedCell = 0;
        homepageSliderCells.forEach(function (el) {
           if (el === focusedCell) {
               slider.select( indexOfFocusedCell );
           }

           if (window.matchMedia("(max-width: 768px)").matches) {
               indexOfFocusedCell ++;
           } else {
               indexOfFocusedCell += 0.5;
           }
        });
    }
}, true);

document.addEventListener('keydown', function (e) {
    if (e.shiftKey && e.keyCode == 9) {
        isBackward = true;
    } else {
        isBackward = false;
    }
});

for (el of menuLinks) {
    el.addEventListener('blur', function (e) {
        if (!isBackward) {
            if (e.target === menuLinks[lastIndex]) {
                menuToggle.focus();
            }
        }
    });
}

var searchCloseEl = document.querySelector('.js-search-form .c-header__toggle--close-search');
var searchSubmitEl = document.querySelector('.js-search-form .search-submit');
searchCloseEl.addEventListener('blur', function (e) {
    if (isBackward) {
        searchSubmitEl.focus();
    }
});

searchSubmitEl.addEventListener('blur', function (e) {
    if (!isBackward) {
        searchCloseEl.focus();
    }
});

