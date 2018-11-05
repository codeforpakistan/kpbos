jQuery( document ).ready(function( $ ) {
"use strict"

    // ------- Time Counter ------- //
    jQuery('#countdown-1').countdown({
        date: '7/30/2017 2:17:59',
        offset: -2100,
        day: 'Day',
        days: 'Days'
    });
    // ------- Time Counter ------- //

    // ------- Responsive Menu ------- //
    jQuery('#responsive-menu').slicknav({
        duration: 300,
    });
    // ------- Responsive Menu ------- //

    // ------- Custom Select ------- //    
    $('.custom-select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
        $this.addClass('select-hidden'); 
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');
        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());
        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);
        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }
        var $listItems = $list.children('li');
        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });
        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });
        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
    // ------- Custom Select ------- //

    // ------- Range Slider ------- //
    var $element = jQuery('input[type="range"]');
    var $handle;
    $element
      .rangeslider({
        polyfill: false,
        onInit: function() {
          $handle = jQuery('.rangeslider__handle', this.$range);
          updateHandle($handle[0], this.value);
        }
      })
      .on('input', function() {
        updateHandle($handle[0], this.value);
      });

    function updateHandle(el, val) {
      el.textContent = val;
    }
    // ------- Range Slider ------- //

    // ------- Counter ------- //
    try {
        jQuery('#tc-counters').appear(function () {
            jQuery('#chapters, #miles, #following').data('countToOptions', {
                formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });
            jQuery('#amount').data('countToOptions', {
                formatter: function (value, options) {
                return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, '.');
                }
            });
            jQuery('.timer').each(count);
            function count(options) {
                var $this = jQuery(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            }
        });
    } catch (err) {}    
    // ------- Counter ------- //

    // ------- Animated Progress Bar ------- //
    try {
        jQuery('#tc-skillgroup').appear(function () {
            jQuery('.tc-skillholder').each(function () {
                jQuery(this).find('.tc-skillbar').animate({
                    width: jQuery(this).attr('data-percent')
                }, 2500);
            });
        });
    } catch (err) {}
    // ------- Animated Progress Bar ------- //

    // ------- Blog Post Slider ------- //
    jQuery('#post-slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    // ------- Blog Post Slider ------- //

    // ------- Twitter Slider ------- //
    jQuery('#twitter-slider').slick({
        infinite: true,
        arrows: false,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000
    });
    // ------- Twitter Slider ------- //

    // ------- Arthor Slider ------- //
    jQuery('#arthor-slider').slick({
        infinite: true,
        arrows: true,
        fade: true,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1
    });
    // ------- Arthor Slider ------- //

    // ------- Related Blog Slider ------- //
    jQuery('#related-blog-slider').slick({
        dots: false,
        infinite: false,
        speed: 700,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            { breakpoint: 102, settings:{ slidesToShow: 3, slidesToScroll: 1}},
            { breakpoint: 991, settings:{ slidesToShow: 3, slidesToScroll: 1}},
            { breakpoint: 600, settings:{ slidesToShow: 2, slidesToScroll: 1}},
            { breakpoint: 480, settings:{ slidesToShow: 1, slidesToScroll: 1}}
      ]
    });
    // ------- Related Blog Slider ------- //

    // ------- Instagram Slider ------- //
    jQuery('#instagram-slider').slick({
        dots: false,
        infinite: false,
        speed: 700,
        arrows: false,
        slidesToShow: 8,
        slidesToScroll: 1,
        responsive: [
            { breakpoint: 1200, settings:{ slidesToShow: 6, slidesToScroll: 1}},
            { breakpoint: 1024, settings:{ slidesToShow: 6, slidesToScroll: 1}},
            { breakpoint: 800, settings: { slidesToShow: 4, slidesToScroll: 1}},
            { breakpoint: 480, settings: { slidesToShow: 3, slidesToScroll: 1 }},
            { breakpoint: 320, settings: { slidesToShow: 2, slidesToScroll: 1 }}
        ]
    });
    // ------- Instagram Slider ------- //

    // ------- Featured News Slider ------- //
    jQuery('#featured-news-slider').slick({
        dots: false,
        infinite: false,
        speed: 700,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            { breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 1}},
            { breakpoint: 480, settings: { slidesToShow: 1, slidesToScroll: 1}}
        ]
    });
    // ------- Featured News Slider ------- //


    // ------- Products Slider ------- //
    jQuery('#products-slider').slick({
        dots: false,
        infinite: false,
        speed: 700,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            { breakpoint: 800, settings: { slidesToShow: 2, slidesToScroll: 1}},
            { breakpoint: 480, settings: { slidesToShow: 1, slidesToScroll: 1}}
        ]
    });
    // ------- Products Slider ------- //

    // ------- Brands Icon Slider ------- //
    jQuery('#brands-icon-slider').slick({
        dots: false,
        infinite: false,
        speed: 700,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive:[
            { breakpoint: 1024,settings: {slidesToShow: 4,slidesToScroll: 1,}},
            { breakpoint: 600, settings: { slidesToShow: 2, slidesToScroll: 1}},
            { breakpoint: 480, settings: { slidesToShow: 1, slidesToScroll: 1}}
        ]
    });
    // ------- Brands Icon Slider ------- //

    // ------- Mesonary ------- //
    var $container = jQuery('.filter-masonry');
    var $optionSets = jQuery('.option-set');
    var $optionLinks = $optionSets.find('a');

    function doIsotopeFilter() {
        if (jQuery().isotope) {
            var isotopeFilter = '';
            $optionLinks.each(function() {
                var selector = jQuery(this).attr('data-filter');
                var link = window.location.href;
                var firstIndex = link.indexOf('filter=');
                if (firstIndex > 0) {
                    var id = link.substring(firstIndex + 7, link.length);
                    if ('.' + id == selector) {
                        isotopeFilter = '.' + id;
                    }
                }
            });
            $container.isotope({
                itemSelector: '.masonry-grid',
                filter: isotopeFilter
            });
            $optionLinks.each(function() {
                var $this = jQuery(this);
                var selector = $this.attr('data-filter');
                if (selector == isotopeFilter) {
                    if (!$this.hasClass('selected')) {
                        var $optionSet = $this.parents('.option-set');
                        $optionSet.find('.selected').removeClass('selected');
                        $this.addClass('selected');
                    }
                }
            });
            $optionLinks.on( "click", function() {
                var $this = jQuery(this);
                var selector = $this.attr('data-filter');
                $container.isotope({
                    itemSelector: '.masonry-grid',
                    filter: selector
                });
                if (!$this.hasClass('selected')) {
                    var $optionSet = $this.parents('.option-set');
                    $optionSet.find('.selected').removeClass('selected');
                    $this.addClass('selected');
                }
                return false;
            });
        }
    }
    var isotopeTimer = window.setTimeout(function() {
        window.clearTimeout(isotopeTimer);
        doIsotopeFilter();
    }, 1000);
    jQuery('.simple-masonry').isotope({
      itemSelector: '.simple-masonry-grid'
    });
    // ------- Mesonary ------- // 

    // ------- Gallery slider ------- //
    jQuery('.gallery-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.gallery-slider-thumb'
    });
    jQuery('.gallery-slider-thumb').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.gallery-slider',
        dots: false,
        focusOnSelect: true,
        arrows: false,
        centerMode: true,
        responsive: [
            { breakpoint: 641, settings: { slidesToShow: 5, slidesToScroll: 1}},
            { breakpoint: 481, settings: { slidesToShow: 3, slidesToScroll: 1}}
        ]  
    });
    jQuery('.prev').on( "click", function(){
      jQuery('.gallery-slider-thumb').slick('slickPrev');
    });

    jQuery('.next').on( "click", function(){
      jQuery('.gallery-slider-thumb').slick('slickNext');
    });
    // ------- Gallery slider ------- //

    // ------- Event Reviews ------- //
    jQuery('.event-reviews-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      asNavFor: '.event-reviews-thumb',
    });
    jQuery('.event-reviews-thumb').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.event-reviews-slider',
      dots: false,
      focusOnSelect: true,
      arrows: false,
    });
    jQuery('.prev').on( "click", function(){
      jQuery('.event-reviews-thumb').slick('slickPrev');
    });
    jQuery('.next').on( "click", function(){
      jQuery('.event-reviews-thumb').slick('slickNext');
    });
    // ------- Event Reviews ------- //

    // ------- Event Google Map ------- // 
    $("#event-map").gmap3({
      map:{
        options:{
          center:[46.578498,2.457275],
          zoom: 5,
          scrollwheel: false
        }
      },
      marker:{
        values:[
          {address:"66000 Newyork, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}},
          {address:"96000 Perpignan, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}},
          {address:"16000 san Francisco, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}},
          {address:"26000 Diego, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}},
          {address:"26000 Houston, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}},
          {address:"26000 san brest, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}},
          {address:"26000 clermmont, France", data:"Perpignan ! GO USAP !", options:{icon: "assets/images/map-marker.png"}}
        ],
        options:{
          draggable: false
        },
        events:{
          mouseover: function(marker, event, context){
            var map = $(this).gmap3("get"),
              infowindow = $(this).gmap3({get:{name:"infowindow"}});
            if (infowindow){
              infowindow.open(map, marker);
              infowindow.setContent(context.data);
            } else {
              $(this).gmap3({
                infowindow:{
                  anchor:marker, 
                  options:{content: context.data}
                }
              });
            }
          },
          mouseout: function(){
            var infowindow = $(this).gmap3({get:{name:"infowindow"}});
            if (infowindow){
              infowindow.close();
            }
          }
        }
      }
    });
    // ------- Event Google Map ------- //

    // ------- Contact Google Map  ------- // 
    jQuery("#contact-map").gmap3({
        marker: {
            address: "Haltern am See, Weseler Str. 151"
        },
        map: {
            options: {
                zoom: 6,
                scrollwheel: false,
            }
        },
    });
    // ------- Contact Google Map ------- //

    // ------- Animated Progress Bar ------- //
    try {
        jQuery('#tc-skillgroup-1, #tc-skillgroup-2').appear(function () {
            jQuery('.tc-skillholder').each(function () {
                jQuery(this).find('.tc-skillbar').animate({
                    width: jQuery(this).attr('data-percent')
                }, 2500);
            });
        });
    } catch (err) {}
    // ------- Animated Progress Bar ------- //

    // ------- Auto height function ------- //
    var setElementHeight = function () {
        var width = jQuery(window).width();
        /*if (jQuery('.tc-hero-slider li img') >= height) {*/
        var height = jQuery(window).height();
        jQuery('.fullscreen').css('height', (height));
        }
    //       else {
    //            jQuery('.autoheight').css('min-height', (800));
    //        }
    //};
    jQuery(window).on("resize", function () {
        setElementHeight();
    }).resize();
    // ------- Auto height function ------- //

    // ------- Prety Photo ------- //
    jQuery("a[data-rel]").each(function () {
        jQuery(this).attr("rel", jQuery(this).data("rel"));
    });
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'dark_square',
        slideshow: 3000,
        autoplay_slideshow: false,
        social_tools: false
    });
    // ------- Prety Photo ------- //

    // ------- PrettyPhoto Video Popup ------- //
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();
    // ------- PrettyPhoto Video Popup ------- //

    // ------- TimeLine ------- //
    jQuery('#timeline-slider').slick({
        dots: false,
        infinite: false,
        speed: 700,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            { breakpoint: 1024, settings:{ slidesToShow: 3, slidesToScroll: 1}},
            { breakpoint: 991, settings:{ slidesToShow: 3, slidesToScroll: 1}},
            { breakpoint: 641, settings:{ slidesToShow: 2, slidesToScroll: 1}},
            { breakpoint: 480, settings:{ slidesToShow: 1, slidesToScroll: 1}}
      ]
    });
    // ------- TimeLine ------- //

    // ------- Sticky Nav ------- //
    $("#icon-bar").on("click",function(){
        $(".sticky-nav").toggleClass("open-nav");
    });
    // ------- Sticky Nav ------- //

    // ------- Sticky Nav ------- //
    $("#open-form").on("click",function(){
        $(".forms-section").toggleClass("open-form");
    });
    // ------- Sticky Nav ------- //

    // ------- Load More ------- //
    if (jQuery(".load-more").length != '') {
        $(function() {
          $("load-more").slice(0, 1).show();
          $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $("div:hidden").slice(0, 1).slideDown();
            if ($("div:hidden").length == 0) {
              $("#load").fadeOut('slow');
            }
            $('html,body').animate({
              scrollTop: $(this).offset().top
            }, 1000);
          });
        });
    }
    // ------- Load More ------- //

});