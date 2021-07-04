/* eslint-env browser */
var slider;
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.js-slider') !== null) {
            var wp_manifest_slides = document.querySelectorAll('.js-slider-slide').length;

            if (window.matchMedia("(max-width: 568px)").matches) {
                var wp_manifest_sliderOptions = {
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
                var wp_manifest_sliderOptions = {
                    prevNextButtons: true,
                    pageDots: false,
                    wrapAround: true,
                    cellAlign: 'center',
                    initialIndex: 0,
                    imagesLoaded: true,
                    groupCells: 2,
                    pauseAutoPlayOnHover: false,
                    accessibility: true,
                    arrowShape: {
                        x0: 10,
                        x1: 40, y1: 30,
                        x2: 45, y2: 25,
                        x3: 20
                    }
                };
            }

            if (wp_manifest_slides < 4) {
                wp_manifest_sliderOptions.cellAlign = 'left';
            }

            if (window.matchMedia("(max-width: 700px)").matches) {
                wp_manifest_sliderOptions.groupCells = false;
            }

            slider = new Flickity('.js-slider', wp_manifest_sliderOptions);
        }


        /* Blog Carousel */
        if (document.querySelector('.js-blog-image-carousel') !== null) {
            var wp_manifest_blogCarouselOptions = {
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
                wp_manifest_blogCarouselOptions.draggable = true;
            }

            var wp_manifest_blogImageCarousel = new Flickity('.js-blog-image-carousel', wp_manifest_blogCarouselOptions);
            wp_manifest_blogCarouselOptions.fade = true;
            var blogContentCarousel = new Flickity('.js-blog-content-carousel', wp_manifest_blogCarouselOptions);
            document.querySelectorAll('.c-blog-carousel__content__cell a').forEach(function (link) {
                link.tabIndex = -1;
            });
            document.querySelectorAll('.c-blog-carousel__content__cell.is-selected a').forEach(function (link) {
                link.tabIndex = 0;
            });
            wp_manifest_blogImageCarousel.on('change', function (index) {
                blogContentCarousel.select(index);
                document.querySelectorAll('.c-blog-carousel__content__cell').forEach(function (el) {
                    el.querySelectorAll('a').forEach(function (link) {
                        link.tabIndex = -1;
                    });
                });

                document.querySelectorAll('.c-blog-carousel__content__cell.is-selected a').forEach(function (link) {
                    link.tabIndex = 0;
                });
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


        var wp_manifest_searchToggle = document.querySelector('.js-search-toggle');
        var wp_manifest_searchForm = document.querySelector('.js-search-form');
        wp_manifest_searchToggle.addEventListener('click', function () {

            wp_manifest_searchForm.classList.toggle('is-open');
            wp_manifest_searchForm.querySelector('input[type="search"]').focus();
        });

        wp_manifest_searchForm.querySelector('.c-header__toggle--close-search').addEventListener('click', function () {
            wp_manifest_searchToggle.style.opacity = '1';
            wp_manifest_searchForm.classList.toggle('is-open');
        });
    });

    //window.addEventListener('wp_manifest_focus', function () {
    //console.log(document.activeElement.closest(".c-blog-carousel__content__cell").index);
    //if (document.activeElement == document.querySelector('.c-blog-carousel__content__cell *')) {
    //console.log(document.activeElement.closest(".c-blog-carousel__content__cell"));
    //}
    //});

})();


var wp_manifest_menuToggle = document.querySelector('.c-header__toggle');
var wp_manifest_menu = document.querySelector('.c-header__menu-items');
var wp_manifest_menuLinks = wp_manifest_menu.getElementsByTagName('a');
var wp_manifest_menuListItems = wp_manifest_menu.querySelectorAll('li');

var wp_manifest_focus, wp_manifest_isToggleItem, wp_manifest_isBackward;
var wp_manifest_lastIndex = wp_manifest_menuListItems.length - 1;
var wp_manifest_lastParentIndex = document.querySelectorAll('.c-header__menu > ul > li').length - 1;
document.addEventListener('wp_manifest_focusin', function () {
    wp_manifest_focus = document.activeElement;
    if (wp_manifest_isToggleItem && wp_manifest_focus !== wp_manifest_menuLinks[0]) {
        document.querySelectorAll('.c-header__menu > ul > li')[wp_manifest_lastParentIndex].querySelector('a').focus();
    }

    if (wp_manifest_focus === wp_manifest_menuToggle) {
        wp_manifest_isToggleItem = true;
    } else {
        wp_manifest_isToggleItem = false;
    }

    if (wp_manifest_focus.classList.contains('c-slider__slide-link')) {
        var homepageSliderCells = document.querySelectorAll('.js-slider-slide');
        var focusedCell = wp_manifest_focus.parentNode.parentNode;
        var indexOfFocusedCell = 0;
        homepageSliderCells.forEach(function (el) {
            if (el === focusedCell) {
                slider.select(indexOfFocusedCell);
            }

            if (window.matchMedia("(max-width: 768px)").matches) {
                indexOfFocusedCell++;
            } else {
                indexOfFocusedCell += 0.5;
            }
        });
    }
}, true);

document.addEventListener('keydown', function (e) {
    if (e.shiftKey && e.keyCode == 9) {
        wp_manifest_isBackward = true;
    } else {
        wp_manifest_isBackward = false;
    }
});

for (el of wp_manifest_menuLinks) {
    el.addEventListener('blur', function (e) {
        if (!wp_manifest_isBackward) {
            if (e.target === wp_manifest_menuLinks[wp_manifest_lastIndex]) {
                wp_manifest_menuToggle.focus();
            }
        }
    });
}

var wp_manifest_searchCloseEl = document.querySelector('.js-search-form .c-header__toggle--close-search');
var wp_manifest_searchSubmitEl = document.querySelector('.js-search-form .search-submit');
wp_manifest_searchCloseEl.addEventListener('blur', function (e) {
    if (wp_manifest_isBackward) {
        wp_manifest_searchSubmitEl.focus();
    }
});

wp_manifest_searchSubmitEl.addEventListener('blur', function (e) {
    if (!wp_manifest_isBackward) {
        wp_manifest_searchCloseEl.focus();
    }
});

wp_manifest_menuToggle.addEventListener('blur', function (e) {
    if (wp_manifest_isBackward) {
        wp_manifest_menuLinks[wp_manifest_lastIndex].focus();
    }
});
