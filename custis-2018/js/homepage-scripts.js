// These are the scripts that make the Homepage work
/**
 * Theme scripting
 *
 * @package custis_2018
 * @author Postali
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
  "use strict";

// Randomize Video BG in Home Banner
// Uncomment this to turn randomization back on
var random = Math.floor(Math.random() * $('.banner-wrapper').length);
$('.banner-wrapper').hide().eq(random).show();

// Hover Effect for HP Practice Area Tiles
$(function() {
    $('.help-item').hover(function() {
        $(this).find("a").toggleClass('banner-help-focus');
   	});
});


// Collapse How Can I Help nav when clicking off 
$(document).on("click", function(event){
    var $trigger = $(".ui-accordion-header");
    if($trigger !== event.target && !$trigger.has(event.target).length){
        $(".accordion_content").slideUp("fast");
    }            
});

});