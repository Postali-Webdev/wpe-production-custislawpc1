/**
 * Theme scripting
 *
 * @package Bevilacqua 2018
 * @author Postali
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
  "use strict";


// Slick
  $('.award-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow:6,
    autoplay: false,
    infinite: true,
    slidesToScroll: 1,
    cssEase: 'linear',  
    responsive: [
      {
        breakpoint: 1150,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: false,
          infinite: true,
          dots: false,
          arrows:true
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          infinite: true,
          dots: false,
          arrows:true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: false,
          dots: false,
          arrows:true
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

});