(function ($) {
  $(document).ready(function () {
    var openSideMenu = $('#open-side-menu');
    var closeSideMenu = $('#close-side-menu');
    var sideMenu = $('.side-navigation');

    openSideMenu.click(function (e) {
      sideMenu.toggleClass('open-slide');
      $('body').toggleClass('locked');
    });

    closeSideMenu.click(function () {
      sideMenu.removeClass('open-slide');
      $('body').removeClass('locked');
    });

    $('.cat-list_item').on('click', function () {
      $('.cat-list_item').removeClass('active');
      $(this).addClass('active');

      $.ajax({
        type: 'POST',
        url: mkwpAjax.ajaxurl,

        data: {
          action: 'filter_posts',
          category: $(this).data('slug'),
        },
        success: function (res) {
          console.log(res);
          $('.articles-grid-items').html(res);
        },
      });
    });

    $('.home-slide-slider').slick({
      slidesToShow: 4,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint:560,
          settings: {
            centerMode: true,
            slidesToShow: 1.2,
          },
        },
      ],
    });

    function slickAarrows() {
      if ($('.slick-prev')) {
        $('.slick-prev').addClass('icon-arrow-long-left');
        $('.slick-prev').html('');
      }

      if ($('.slick-next')) {
        $('.slick-next').addClass('icon-arrow-long-right');
        $('.slick-next').html('');
      }
    }

    slickAarrows();

    $(window).resize(function () {
      slickAarrows();
    });




  // listing
  var btnGrid = $('.btn-grid-view');
  var btnList = $('.btn-list-view');
  var rowContent = $('.listing-row-content');


    btnGrid.click(function() {
      btnList.removeClass('active');
      btnGrid.addClass('active');
      rowContent.removeClass('list');
      rowContent.addClass('grid');
    })


    btnList.click(function() {
      btnGrid.removeClass('active');
      btnList.addClass('active');
      rowContent.removeClass('grid');
      rowContent.addClass('list');
    })



    // search button

    $('.search-icon').click(function() {
      $('.mini-navigation form').fadeToggle();

      $(this).find('i').toggleClass('icon-search', 'icon-close');
    })


  });

})(jQuery);
