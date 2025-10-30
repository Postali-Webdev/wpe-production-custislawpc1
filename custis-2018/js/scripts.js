/**
 * Theme scripting
 *
 * @package Custis_2018
 * @author Postali
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
  "use strict";

// Sticky Contact bar on initial scroll
// $(document).scroll(function() {
//   var y = $(this).scrollTop();
//   if (y >= 550) {
//      $(".header-tab").css("opacity", "1"),
//    $(".header-tab").css("top", "168px"); 
//   } else {
//      $(".header-tab").css("opacity", "0"),
//    $(".header-tab").css("top", "150px"); 
//   }
// });
// Remove Sticky Contact bar when user hits bottom
// window.onscroll = function() {
//     if ((window.innerHeight + window.scrollY) >= document.body.scrollHeight) {
//         $(".header-tab").css("opacity", "0");
//     }
// };  
//Makes the Menu go
  $('#menu-icon').click(function(e){
    e.preventDefault();
    $('#mobile-nav').slideToggle(300);
    // Change this boolean number to adjust animation speed
    $(this).toggleClass('open');
  });

//Practice Areas Sub Menu
  $('#menu-mobile-navigation .menu-item-has-children>a').click(function(e){
    e.preventDefault();
    $(this).siblings('.sub-menu').slideToggle(300);
    // Change this boolean number to adjust animation speed
    $(this).toggleClass('open');
  });


  //Show / Hide Practice Tiles on hover

  $(function() {
      $('.PA-content').hover(function() {
          $(this).toggleClass('fadeIn');
      });
  });

  // Widget sidebar smooth scrollin'
  $('.fp-banner ul li a').click(function(){  
    //Toggle Class
    $(".active").removeClass("active");      
    $(this).closest('li').addClass("active");
    var theClass = $(this).attr("class");
    $('.'+theClass).parent('li').addClass('active');
    //Animate
    $('html, body').stop().animate({
        scrollTop: $( $(this).attr('href') ).offset().top - 160
    }, 400);
    return false;
  });

  //Contact Form 7 Redirect
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = '/form-success/';
    }, false );

  // Touch Device Detection
    var isTouchDevice = 'ontouchstart' in document.documentElement;
        if( isTouchDevice ) {
        $('body').removeClass('no-touch');
    };

});