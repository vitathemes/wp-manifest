/* eslint-env browser */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var $slides = document.querySelectorAll('.js-slider-slide').length;
    var slider_args = {
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
      slider_args.cellAlign = 'left';
    }

    var slider = new Flickity('.js-slider', slider_args);
  });
})();