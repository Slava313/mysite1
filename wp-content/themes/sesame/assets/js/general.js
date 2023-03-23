/*!
 * Sesame JS Library
 * @Copyright Realtyna Inc. Co 2017
 * @Author UI Department of Realtyna Inc.
 */

(function($,window, document){
    $(function(){

        /*Mobile menu*/
        $('.re-mobile-menu-handler').on('click',function(e){
            e.preventDefault();
            if($(this).hasClass('expand'))
            {
                $('.re-nav').slideUp();
                $(this).removeClass('expand');
            }else{
                $('.re-nav').slideDown();
                $(this).addClass('expand');
                sesame_MobileMenuLoop();
            }

        });
        $('.re-mobile-menu-close').on('click',function(e) {
            e.preventDefault();
            $('.re-mobile-menu-handler').trigger('click');
        });
        $('.menu-item-has-children').each(function(){
            $(this).append('<span class="re-menu-collapsible-btn"></span>');
        });
        
        $('.re-nav .re-menu-collapsible-btn').on('click',function(){
            if($(this).hasClass('expand'))
            {
                $(this).parent('li').children('ul').slideUp();
                $(this).removeClass('expand');
            }else{
                $(this).parent('li').children('ul').slideDown();
                $(this).addClass('expand');
            }

        });

        /*Agent Info*/
        $('.wpl_prp_container_content_right .agent_info .wpl_agent_info').click(function () {
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).children('ul,.company_details').slideUp();
            }else{
                $(this).addClass('active');
                $(this).children('ul,.company_details').slideDown();
            }
        });

        /*Header Search*/
        $('.re-header-search .re-icon-search').on('click', function () {
            $('.re-header-search .re-search').toggle();
            $('.re-header-search .re-search input').focus();
            sesame_SearchPopupLoop();
        });
        $(document).mouseup(function(e) {
            var search_container = $('.re-header-search .re-search');

            // if the target of the click isn't the container nor a descendant of the container
            if (!search_container.is(e.target) && search_container.has(e.target).length === 0)
            {
                search_container.hide();
            }
        });
        $('.re-header-search .re-search .re-search-toggle').on('click', function () {
            $(this).parents('.re-search').hide();
            $('.re-header-search .re-icon-search').focus();
        });

        /*Sticky header*/
        if($('.re-header').hasClass('re-sticky-header'))
            sesame_createSticky($(".re-sticky-header .re-header-inner"),$(".re-sticky-height"));

        /*Creating Sticky header*/
        function sesame_createSticky(sticky,stickyheight) {

            if (typeof sticky !== "undefined") {

                var	pos = sticky.offset().top,
                    win = $(window);

                win.on("scroll", function() {
                    if(win.scrollTop() > pos)
                    {
                        sticky.addClass("fixed");
                        stickyheight.addClass("fixed");
                    }
                    else
                    {
                        sticky.removeClass("fixed");
                        stickyheight.removeClass("fixed");
                    }
                });
            }
        }

        /*Register page*/
        $('#wpl_usertypes_type3 h3').prepend('<span class="re-icon-Guests"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>');
        $('#wpl_usertypes_type2 h3').prepend('<span class="re-icon-Owner"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>');
        $('[id*="wpl_usertypes_type10"] h3').prepend('<span class="re-icon-Investor"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>');

        /*Testimonial Carousel*/
        $('.re-content .read-more').click(function(event){
            event.preventDefault();
            $(this).closest('.re-content').find('.second-part').show();
            $(this).hide();
        });

        /*Carousel: Testimonials and Posts*/
        $('.re-carousel').slick({
            dots: true,
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 900,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                  }
                }
              ]
        });
    });
    $(document).ready(function () {
        sesame_focusMenu();
    });



})(jQuery, window, document);

// The focusMenu function for Keyboard Navigation
function sesame_focusMenu() {
    // Get all the link elements within the primary menu.
    var links, i, len,
        menu = document.querySelector( '.menu' );

    if ( ! menu ) {
        return false;
    }

    links = menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( i = 0, len = links.length; i < len; i++ ) {
        links[i].addEventListener( 'focus', sesame_toggleFocus, true );
        links[i].addEventListener( 'blur', sesame_toggleFocus, true );
    }

    //Sets or removes the .focus class on an element.
    function sesame_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .primary-menu.
        while ( -1 === self.className.indexOf( 're-nav' ) ) {
            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'focus' ) ) {
                    self.className = self.className.replace( ' focus', '' );
                } else {
                    self.className += ' focus';
                }
            }
            self = self.parentElement;
        }
    }
}


function sesame_SearchPopupLoop() {
    var _doc = document;
    _doc.addEventListener( 'keydown', function( event ) {
            selectors = 'input, a, button';
            search_popup = _doc.querySelector( '.re-search' );

            elements = search_popup.querySelectorAll( selectors );
            elements = Array.prototype.slice.call( elements );

            lastEl = elements[ elements.length - 1 ];
            firstEl = elements[0];
            activeEl = _doc.activeElement;
            tabKey = event.keyCode === 9;
            shiftKey = event.shiftKey;

            if ( ! shiftKey && tabKey && lastEl === activeEl ) {
                event.preventDefault();
                firstEl.focus();
            }

            if ( shiftKey && tabKey && firstEl === activeEl ) {
                event.preventDefault();
                lastEl.focus();
            }
    } );
}
function sesame_MobileMenuLoop() {
    var _doc = document;
    _doc.addEventListener( 'keydown', function( event ) {
        selectors = 'a';
        menu_popup = _doc.querySelector( '.re-nav' );

        elements = menu_popup.querySelectorAll( selectors );
        elements = Array.prototype.slice.call( elements );

        lastEl = elements[ elements.length - 1 ];
        firstEl = elements[0];
        activeEl = _doc.activeElement;
        tabKey = event.keyCode === 9;
        shiftKey = event.shiftKey;

        if ( ! shiftKey && tabKey && lastEl === activeEl ) {
            event.preventDefault();
            firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === activeEl ) {
            event.preventDefault();
            lastEl.focus();
        }
    } );
}