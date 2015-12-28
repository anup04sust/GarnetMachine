/*
 * @package IllusiveDesign
 * @subpackage Elusive Illusion
 * @since Elusive Illusion 1.0
 */
"use strict";
var nc = jQuery.noConflict();
nc(document).ready(function () {
  /*
   * LiveChat
   */
  nc('.live-contact a').on('click', function () {
    nc('.LPMcontainer.LPMoverlay').trigger('click');
    return false;
  });
  /*
   * MobileMenu
   */
  nc('#mobilemenu-container').mmenu({
    extensions: [eli_obj.mm_theme, "effect-slide-listitems"],
    searchfield: false,
    counters: false,
    navbar: {
      title: 'MENU',
    },
    navbars: [
      {
        position: 'top',
        content: ['<a href="' + eli_obj.site_url + '" class="mm-logo"><img src="' + eli_obj.mm_logo + '" /></a>'], height: 2,
      }, {
        position: 'top',
        content: [
          'prev',
          'title',
          'close'
        ]
      }
    ],
    offCanvas: {
      position: "right",
      zposition: "front",
    },
  });
  var mmenuAPI = nc("#mobilemenu-container").data("mmenu");

  nc('#mm-button-toggle').on('click', function () {
    mmenuAPI.open();
    return false;
  });
  nc('.mm-custom-close').on('click', function () {
    mmenuAPI.close();
    return false;
  });
  /* Table */
  nc('.entry-content table').addClass('table');
  /* Embed Responsive */
  nc('.embed-responsive iframe').addClass('embed-responsive-item');

  nc('.tweetie-carousel').owlCarousel({
    items: 3,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 15000,
    autoplayHoverPause: true,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      }
    }
  });
  nc('.popup-gallery').Chocolat({
    loop: true,
    imageSize: 'contain',
    overlayOpacity: 0.9,
    imageSelector: '.thumbnail'
  });
});

