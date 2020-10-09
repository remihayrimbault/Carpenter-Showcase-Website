(function($){
    jQuery(document).ready(function() {
    var offset = 220;
    var duration = 800;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });

    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

     //   jQuery('.menu-toggle').click(function(event) {
          //  $( "'#site-navigation .menu-item-has-children" ).addClass( "myClass yourClass" );
        //});

    jQuery('.menu-toggle').click(function(event) {
           jQuery('#site-navigation').slideToggle('slow');
    });

 

    jQuery('#site-navigation .menu-item-has-children > a').append('<span class="sub-toggle"><button class="fa fa-angle-down"></button>  </span>');
    jQuery('#site-navigation .page_item_has_children').append('<span class="sub-toggle"> <button class="fa fa-angle-down"></i> </button></span>');


    jQuery('#site-navigation .sub-toggle').click(function(e) {

        e.preventDefault();

        jQuery(this).parents('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        jQuery(this).parents('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        jQuery(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');

    });

     mtSticky();
      jQuery(window).scroll(mtSticky);
      function mtSticky() {
        var height = jQuery(window).scrollTop(), 
        stickyHeight = jQuery('.header_s').outerHeight(),
        scroll = jQuery(window).scrollTop(),
        slowscroll = scroll / 2;
        jQuery('body').removeClass('sticky');
        if(height  > stickyHeight) {
          jQuery('body').addClass('sticky');
          jQuery('.slider-section').css({
          //          transform: "translateY(" + slowscroll + "px)"
                });
          } else {
          jQuery('body').removeClass('sticky');
           jQuery('.slider-section').css({
         //           transform: "translateY(0)"
                });
        }

        // padding for footer
         var _footerh = jQuery("#footer-section").outerHeight();
        jQuery('body').css('padding-bottom',_footerh);
      }

      jQuery( '.search-btn' ).on( 'click', function(event) {

        event.preventDefault();

        showSearchForm();
    } );

    jQuery( '.search-btn' ).on( 'keypress', function(event) {

        event.preventDefault();

        if(e.which == 13) {

            showSearchForm();
        }
    } );

    jQuery( '.search-form-close-btn' ).on( 'click', function(event) {

        event.preventDefault();

        closeSearchForm();
    } );

    jQuery( '.search-form-close-btn' ).on( 'keydown', function(event) {

        if((event.keyWhich || event.keyCode) == 9) {

            event.preventDefault();

            closeSearchForm();
            
        }
    } );

   

});

function showSearchForm() {

    var searchForm = $( '#search-box' );

    searchForm.toggleClass('show').find('.search-input').focus();
}

function closeSearchForm() {

    var searchForm = $( '#search-box' );

    searchForm.removeClass('show').addClass('hide');
    $( ".user-info" ).find('.search-btn').focus();
}
})(jQuery);