/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
"use strict";
var nc = jQuery.noConflict();
nc(document).ready(function () {
  var $grid = nc('#gallery-tiles .gallery-wrap').isotope({
    itemSelector: '.gallery-gcol',
    layoutMode: 'packery'
  });
  var $grid = nc('#inner-content .album-page').isotope({
    itemSelector: '.gallery-item',
    layoutMode: 'packery'
  });
// layout Masonry after each image loads
  $grid.imagesLoaded().progress(function () {
    $grid.isotope('layout');
  });
//  nc('#gallery-tiles .gallery-wrap').Chocolat({
//    loop: true,
//    imageSize: 'contain',
//    overlayOpacity: 0.9,
//    imageSelector: '.thumbnail-links'
//  });
});

