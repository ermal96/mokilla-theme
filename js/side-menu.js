
 ( function( $ ) {
     
  $(document).ready(function(){
    var openSideMenu = $('#open-side-menu');
    var closeSideMenu = $('#close-side-menu');
    var sideMenu = $('.side-navigation');


    openSideMenu.click(function(e) {
        sideMenu.toggleClass('open-slide');
    })
    
    closeSideMenu.click(function() {
        sideMenu.removeClass('open-slide');
    })

    $('.cat-list_item').on('click', function() {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');
    
      $.ajax({
        type: 'POST',
        url:mkwpAjax .ajaxurl,
        
        data: {
          action: 'filter_posts',
          category: $(this).data('slug'),
        },
        success: function(res) {
          console.log(res);
          $('.articles-grid-items').html(res);
        }
      })
    });





    $('.categories-slide-slider').slick({
      slidesToShow: 4,
    });


    if($('.slick-prev')) {
      $('.slick-prev').addClass('icon-arrow-long-left');
      $('.slick-prev').html('')
    }

    if($('.slick-next')) {
      $('.slick-next').addClass('icon-arrow-long-right');
      $('.slick-next').html('')
    }



  });

} )( jQuery );
  