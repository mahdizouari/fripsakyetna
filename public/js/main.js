
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================
    $(document).ready(function () {
        $(".animsition").animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 1500,
            outDuration: 800,
            linkElement: '.animsition-link',
            loading: true,
            loadingParentElement: 'html',
            loadingClass: 'animsition-loading-1',
            loadingInner: '<div class="loader05"></div>',
            timeout: true,
            timeoutCountdown: 3000, // Force end after 3s
            onLoadEvent: false, // Don’t wait for full page load
            browser: ['animation-duration', '-webkit-animation-duration'],
            overlay: false,
            transition: function (url) {
                window.location.href = url;
            }
        });
    });*/
    
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });

    
    


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $(document).ready(function () {
        // Toggle mobile menu
      $('.btn-show-menu-mobile').on('click', function() {
    var menuMobile = $('.menu-mobile');
    
    $(this).toggleClass('is-active');
    
    // Check if the mobile menu is already visible
    if (menuMobile.hasClass('open')) {
        // If it's open, animate the closing (slide up)
        menuMobile.removeClass('open').stop().animate({
            height: '0',
            opacity: '0'
        }, 400, function() {
            // Once the animation is done, set display to none
            menuMobile.css('display', 'none');
        });
    } else {
        // If it's closed, show the menu and animate the opening (slide down)
        menuMobile.addClass('open').css({
            'display': 'block',
            'height': 'auto',  // Ensure it takes the necessary height for sliding
            'opacity': '1'
        }).stop().animate({
            height: menuMobile[0].scrollHeight, // Using scrollHeight to slide down
            opacity: '1'
        }, 400);
    }
});

        
    
        // Toggle submenus
        $('.arrow-main-menu-m').on('click', function (e) {
            e.stopPropagation(); // Prevent bubbling
            const $thisArrow = $(this);
            $thisArrow.parent().find('.sub-menu-m').slideToggle();
            $thisArrow.toggleClass('turn-arrow-main-menu-m');
        });
    
        // On window resize
        $(window).on('resize', function () {
            if ($(window).width() >= 992) {
                // Hide mobile menu if visible
                if ($('.menu-mobile').is(':visible')) {
                    $('.menu-mobile').hide();
                    $('.btn-show-menu-mobile').removeClass('is-active');
                }
    
                // Hide all submenus and remove arrow rotation
                $('.sub-menu-m').each(function () {
                    if ($(this).is(':visible')) {
                        $(this).hide();
                        $(this).siblings('.arrow-main-menu-m').removeClass('turn-arrow-main-menu-m');
                    }
                });
            }
        });
    });
    


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    /*$filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });*/

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    /*$('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

       if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }    
    });*/

    $('.js-show-filter').on('click', function() {
        var filterPanel = $('.panel-filter');
        
        $(this).toggleClass('show-filter');
        
        // Check if the filter panel is already visible
        if (filterPanel.hasClass('open')) {
            // If the filter panel is open, animate the closing (slide up)
            filterPanel.removeClass('open').stop().animate({
                height: '0',
                opacity: '0'
            }, 400, function() {
                // Once the animation is done, set display to none
                filterPanel.css('display', 'none');
            });
            
         
        } else {
            // If the filter panel is closed, show and animate both panels (slide down)
            filterPanel.addClass('open').css('display', 'block').stop().animate({
                height: filterPanel[0].scrollHeight,
                opacity: '1'
            }, 400);
            
        
        }   
    });
    
    
    




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });
    
    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        $('.js-modal1').addClass('show-modal1');
    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });



})(jQuery);