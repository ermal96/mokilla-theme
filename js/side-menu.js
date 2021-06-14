/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {
     console.log(1);

    var openSideMenu = $('#open-side-menu');
    var closeSideMenu = $('#close-side-menu');
    var sideMenu = $('.side-navigation');


    openSideMenu.click(function(e) {
        sideMenu.toggleClass('open-slide');
    })
    
    closeSideMenu.click(function() {
        sideMenu.removeClass('open-slide');
    })

} )( jQuery );
  