'use strict';
$(document).ready(function() {

    /*-----------------------------------------------------------------
      01. Detect device mobile
    -------------------------------------------------------------------*/
	
    var isMobile = false; 
    if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('html').addClass('touch');
        isMobile = true;
	
    }
    else {
        $('html').addClass('no-touch');
        isMobile = false;
    }

    //IE, Edge
    var isIE = /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /MSIE 10/i.test(navigator.userAgent) || /Edge\/\d+/.test(navigator.userAgent);
    

    /*-----------------------------------------------------------------
      02. Preloader
    -------------------------------------------------------------------*/
    
    anime({
        targets: 'body',
        opacity: 1,
        delay: 900,
        complete: function(anim) {
            animation(); //Init animations
            sliders(); //Init sliders
        }
    });
    
    $('body, .js-img-load').imagesLoaded({ background: !0 }).always( function( instance ) {
	    preloader(); //Init preloader
    });

    function preloader() {
        var tl = anime.timeline({
            complete: function(anim) {
                $('body').removeClass('no-scroll');
            }    
        });
           
        tl
        .add({
            targets: 'body',
            duration: 1,
            update: function() {
                $('body').addClass('no-scroll');
            }
        })
        .add({
            targets: '.preloader',
            duration: 1,
            opacity: 1
        })
        .add({
            targets: '.preloader__logo',
            duration: 1200,
            webkitFilter: 'blur(0)',
            scale: 1,
            opacity: 1,
            easing: 'easeInOutQuart'
        })
        .add({
            targets: '.preloader__progress span',
            duration: 1000,
            width: '100%',
			easing: 'easeInOutQuart'
        },'-=500')
        .add({
            targets: '.preloader',
			delay: 1,
			opacity: 0,
			zIndex: '-1',
            easing: 'easeInOutQuart',
            /*change: function() {
                $('body').removeClass('no-scroll');
                tween(); //Init animations
                sliders(); //Init sliders
            }*/
		})
        .add({
            targets: '.preloader__wrap',
            duration: 1000,
            translateY: '30px',
            opacity: 0,
            easing: 'easeInOutQuart'
        },'-=1500');
        /*.add({
            complete: function(anim) {
                animation(); //Init animations
                sliders(); //Init sliders
            }
        },'-=1800');*/
    };


    /*-----------------------------------------------------------------
      03. niceScroll
    -------------------------------------------------------------------*/		
    
	function niceScroll() {
	    if (!isMobile && !isIE) {
            $('html').niceScroll({
		        horizrailenabled:false,
		        cursorborder: "none",
		        scrollspeed: 80, // scrolling speed
                mousescrollstep: 40, // scrolling speed with mouse wheel (pixel)
	        });
        }
        if (isIE) {
            $('html').niceScroll({
		        horizrailenabled:false,
		        cursorborder: "none"
	        });
	    }
	};

	niceScroll();
	
	
    /*-----------------------------------------------------------------
      04. Hamburger
    -------------------------------------------------------------------*/

    $('.hamburger').on('click', function() {
        $(this).toggleClass('is-active');
        $('html').toggleClass('is-scroll-disabled');
	    $('body').toggleClass('open');
	    $('.menu').toggleClass('menu-show');
        $('.ef-background').addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', 
        function(){
            $(this).removeClass('animated');
        });
    });

    // Closing the menu by Esc
    $(document).on('keyup', function(e) {
        if (e.keyCode === 27) $('.open .hamburger').click();
    });

    // Hovered link
    $('.menu-list__item').on('mouseenter', function(){
        $('.menu-list').addClass('has-hovered-link');
    });
    $('.menu-list__item').on('mouseleave', function(){
        $('.menu-list').removeClass('has-hovered-link');
    });
  
  
    /*-----------------------------------------------------------------
      05. Toggle Navbar
    -------------------------------------------------------------------*/
    
    // Color
    $(window).on('scroll', function() {
	    $('.navbar-change').each(function(index, value) {
            if ($(window).scrollTop() > 50){
                $('.navbar').removeClass('navbar--white');
            } else {
                $('.navbar').addClass('navbar--white');
            }
        });
    });
    
    // Sticky
    $(window).on('scroll', function() {
	    
            if ($(window).scrollTop() < 50){
                $('.navbar').removeClass('sticky');
            } else {
                $('.navbar').addClass('sticky');
            }
    });
    

    /*-----------------------------------------------------------------
      06. Side Nav
    -------------------------------------------------------------------*/
  
    var sideNavOpen = $('.hamburger');
    
    $('.sideNav').each(function(i) {
        var sideNavTl = anime.timeline({autoplay: false});
        anime.set('.sideNav', {
            translateX: '360'
        });
        anime.set('.sideNav .sideNav__item.el', {
            translateX: '70'
        });
        sideNavTl
        .add({
            targets: '.overlay-sideNav',
            opacity: {
                value: 1,
                duration: 500,
                delay: 0
            }, 
            zIndex: {
                value: 2,
                duration: 1,
                delay: 0
            }
        })
        .add({
            targets: '.sideNav',
            translateX: '0',
            duration: 500,
            easing: 'easeInOutQuart'
        },'-=500')
        .add({
            targets: '.sideNav__item.el',
            duration: 200,
            delay: anime.stagger(80),
            translateX: 0,
            easing: 'easeInOutCirc'
        },'-=500');

        $(sideNavOpen).on('click', function(e) {
            e.preventDefault();
            if (sideNavTl.began) {
                sideNavTl.reverse()
                sideNavTl.completed = false;
            }
            if (sideNavTl.paused) {
                sideNavTl.play()
            }
        });
    });  
  
    // Sub items
    $('.sideNav-collapsed').on('click', function() {
        $(this).toggleClass('sideNav__item-open').parent('li').siblings('li').children('span.sideNav-collapsed').removeClass('sideNav__item-open');
        $(this).parent().toggleClass('sideNav__item-open').children('ul').slideToggle(500).end().siblings('.sideNav__item-open').removeClass('sideNav__item-open').children('ul').slideUp(500);
    });
  
  
    /*-----------------------------------------------------------------
      07. Cursor
    -------------------------------------------------------------------*/
  
    function followCursor() {
        var cursor = $('.cursor');

        // followEffect
        function moveCursor(e) {
	        var t = e.clientX + "px",
                n = e.clientY + "px";
            
            var circleCursor = anime({
                targets: '.cursor',
                duration: 30,
                left: t,
                top: n,
                easing: 'linear'    
            });
        }
        $(window).on('mousemove', moveCursor);

        // zoomEffect
        $('a, .zoom-cursor').on('mouseenter', function() {
            cursor.addClass('cursor--zoom');
        });
        $('a, .zoom-cursor').on('mouseleave', function() {
            cursor.removeClass('cursor--zoom');
        });

        // cursor close
        $('.trigger-close').on('mouseenter', function() {
            cursor.addClass('cursor-close');
        });
        $('.trigger-close').on('mouseleave', function() {
            cursor.removeClass('cursor-close');
        });
    };
	
    followCursor(); //Init

  
    /*-----------------------------------------------------------------
      08. Scroll indicator
    -------------------------------------------------------------------*/
    
	function scrollIndicator() {
        $(window).on('scroll', function() {
            var wintop = $(window).scrollTop(), docheight = 
            $(document).height(), winheight = $(window).height();
 	        var scrolled = (wintop/(docheight-winheight))*100;
  	        $('.scroll-line').css('width', (scrolled + '%'));
        });
    };

	scrollIndicator(); //Init
	

    /*-----------------------------------------------------------------
      09. Slider
    -------------------------------------------------------------------*/

    /*$('.cover-slider').each(function() {
        $(this).css('background-image', 'url('+$(this).data('bg')+')');
    });*/
	
    // settings
	var $sliderDelay = 6000, // Delay between transitions (in ms).
	    $sliderSpeed = 1200; // Speed transitions
	
    // animate stroke dashoffset
    var count = 0,
    $svg = $('.slider-nav--progress').drawsvg({
		duration: $sliderDelay,
		stagger: $sliderSpeed,
		reverse: true
    });

    function animateDrawsvg() {
        $svg.drawsvg('animate');
    }
	
    function sliders() {
        $('.slider-horizontal').each(function() {
		    // Half slider
            var interleaveOffset = 0.5;
			
            var halfSliderCaption = new Swiper('.slider__caption', {
                slidesPerView: 1,
                //loop: true,
                effect: 'fade',			
	            parallax: true,
                speed: $sliderSpeed,
                simulateTouch: false,
				on: {
                    slideChange: function() {
                        animateDrawsvg();
                    }
                }
            });
			
            var halfSliderImage = new Swiper('.slider__image', {
                slidesPerView: 1,
                //loop: true,
			    speed: $sliderSpeed,
                simulateTouch: false,
	            roundLengths: true,
	            parallax: true,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
		            clickable: true
                },
                autoplay: {
                    disableOnInteraction: false,
					delay: $sliderDelay, // Delay between transitions (in ms).
                },
                keyboard: {
	                enabled: true
	            },
                mousewheel: {
		            eventsTarged: '.hero',
		            sensitivity: 1
	            },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                on: {
                    progress: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            var slideProgress = swiper.slides[i].progress,
                                innerOffset = swiper.width * interleaveOffset,
                                innerTranslate = slideProgress * innerOffset;					
                            swiper.slides[i].querySelector('.cover-slider').style.transform = 'translateX(' + innerTranslate + 'px)';
                        }
                    },
                    touchStart: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = '';
                        }
                    },
                    setTransition: function(speed) {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = speed + 'ms';
                            swiper.slides[i].querySelector('.cover-slider').style.transition = speed + 'ms';
                        }
                    }
                }
            });

            halfSliderCaption.controller.control = halfSliderImage;
            halfSliderImage.controller.control = halfSliderCaption;
		});
		
		// Slider Vertical
		$('.slider-vertical').each(function() {
            var interleaveOffset = 0.5;
	        var interleaveOffsetCaption = 1;
	
	        // Caption
            var halfSliderCaption = new Swiper('.slider__caption', {
                slidesPerView: 1,
                //loop: true,
                effect: 'fade',
	            direction: 'vertical',
	            parallax: true,
                speed: $sliderSpeed,
                simulateTouch: false,
				on: {
                    slideChange: function() {
                        animateDrawsvg();
                    }
                }
            });
	
	        // Image
            var halfSliderImage = new Swiper('.slider__image', {
                slidesPerView: 1,
                //loop: true,
			    speed: $sliderSpeed,
			    direction: 'vertical',
                simulateTouch: false,
	            roundLengths: true,
	            parallax: true,
                pagination: {
                    el: '.swiper-pagination-num',
                    type: 'fraction',
		            clickable: true
                },
                autoplay: {
                    disableOnInteraction: false,
					delay: $sliderDelay, // Delay between transitions (in ms).
                },
                keyboard: {
	                enabled: true
	            },
                mousewheel: {
		            eventsTarged: '.hero',
		            sensitivity: 1
	            },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                on: {
                    progress: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            var slideProgress = swiper.slides[i].progress,
                                innerOffset = swiper.height * interleaveOffset,
                                innerTranslate = slideProgress * innerOffset;
                                swiper.slides[i].querySelector('.cover-slider').style.transform = 'translateY(' + innerTranslate + 'px)';
                        }
                    },
                    touchStart: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = '';
                        }
                    },
                    setTransition: function(speed) {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = speed + 'ms';
                            swiper.slides[i].querySelector('.cover-slider').style.transition = speed + 'ms';
                        }
                    }
                }
            });
    
	        // Details
            var halfSliderDetails = new Swiper('.slider-container-details', {
                slidesPerView: 1,
                //loop: true,
                effect: 'fade',
	            parallax: true,
                speed: $sliderSpeed,
                simulateTouch: false
            });
		
		    // halfSliderCaption and halfSliderImage 
            halfSliderCaption.controller.control = halfSliderImage;
            halfSliderImage.controller.control = halfSliderCaption;

            // halfSliderImage and halfSliderDetails 
            halfSliderImage.controller.control = halfSliderDetails;
            halfSliderDetails.controller.control = halfSliderImage;
		
            // halfSliderCaption and halfSliderDetails 
            halfSliderCaption.controller.control = halfSliderDetails;
            halfSliderDetails.controller.control = halfSliderCaption;		
		});
		
		//Fullscreen slider
		$('.slider-fullscreen').each(function() {
            var interleaveOffset = 0.7;
			
            var halfSliderCaption = new Swiper('.slider__caption', {
                slidesPerView: 1,
                //loop: true,
                effect: 'fade',
	            parallax: true,
                speed: $sliderSpeed,
                simulateTouch: false,
				on: {
                    slideChange: function() {
                        animateDrawsvg();
                    }
                }
            });
			
            var halfSliderImage = new Swiper('.slider__image', {
                slidesPerView: 1,
                //loop: true,
			    speed: $sliderSpeed,
                simulateTouch: false,
	            roundLengths: true,
	            parallax: true,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
		            clickable: true
                },
                autoplay: {
                    disableOnInteraction: false,
					delay: $sliderDelay, // Delay between transitions (in ms).
                },
                keyboard: {
	                enabled: true
	            },
                mousewheel: {
		            eventsTarged: '.header-fullscreen',
		            sensitivity: 1
	            },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                },
                on: {
                    progress: function() {
                        if (!isIE) {
                            var swiper = this;
                            for (var i = 0; i < swiper.slides.length; i++) {
                                var slideProgress = swiper.slides[i].progress,
                                    innerOffset = swiper.width * interleaveOffset,
                                    innerTranslate = slideProgress * innerOffset;					
                                swiper.slides[i].querySelector('.cover-slider').style.transform = 'translateX(' + innerTranslate + 'px)';
                            }
                        }
                    },
                    touchStart: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = '';
                        }
                    },
                    setTransition: function(speed) {
                        if (!isIE) {
                            var swiper = this;
                            for (var i = 0; i < swiper.slides.length; i++) {
                                swiper.slides[i].style.transition = speed + 'ms';
                                swiper.slides[i].querySelector('.cover-slider').style.transition = speed + 'ms';
                            }
                        }
                    }
                }
			
            });
			
            halfSliderCaption.controller.control = halfSliderImage;
            halfSliderImage.controller.control = halfSliderCaption;
		});
		
        // Slider project
        var interleaveOffsetArticle = 0.7;
        var sliderProject = new Swiper('.slider-article', {
            slidesPerView: 1,
            loop: true,
		    speed: 1200,
            simulateTouch: false,
	        parallax: true,
            /*autoplay: {
                disableOnInteraction: false,
				delay: 5000, // Delay between transitions (in ms).
            },*/
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },

            on: {
                progress: function() {
                    if (!isIE) {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            var slideProgress = swiper.slides[i].progress,
                                innerOffset = swiper.width * interleaveOffsetArticle,
                                innerTranslate = slideProgress * innerOffset;
                            swiper.slides[i].querySelector('.cover-slider').style.transform = 'translateX(' + innerTranslate + 'px)';
                        }
                    }
                },
                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = '';
                    }
                },
                setTransition: function(speed) {
                    if (!isIE) {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                            swiper.slides[i].style.transition = speed + 'ms';
                            swiper.slides[i].querySelector('.cover-slider').style.transition = speed + 'ms';
                        }
                    }
                }
            }
        });	
        
        // Projects carousel
        var swiper = new Swiper('.projects-carousel', {
            loop: true,
            slidesPerView: 'auto',
            spaceBetween: 140,
            centeredSlides: true,
            speed: 900,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                type: 'progressbar',
            },		
            keyboard: {
                enabled: true
            },
            mousewheel: {
                eventsTarged: '.grid-carousel',
                sensitivity: 1
            },
            breakpoints: {
                0: {
                    spaceBetween: 0
                },
                580: {
                    spaceBetween: 0
                },
                768: {
                    spaceBetween: 40
                },
                990: {
                    spaceBetween: 80
                },
                1200: {
                    spaceBetween: 100
                },
                1500: {
                    spaceBetween: 120
                }			
            }
        });	
    };


    /*-----------------------------------------------------------------
      10. Style background image
    -------------------------------------------------------------------*/	
  
    $('.js-image').each(function(){
        var dataImage = $(this).attr('data-image');
        $(this).css('background-image', 'url(' + dataImage + ')');
    });
		

    /*-----------------------------------------------------------------
      11. Start video
    -------------------------------------------------------------------*/

    var video_wrapper = $('.youtube-video-place');
	
    if(video_wrapper.length){
        $('.video__btn').on('click', function(){
            video_wrapper.html('<iframe allowfullscreen frameborder="0" class="js-video-iframe" src="' + video_wrapper.data('yt-url') + '"></iframe>');
        });
    }
	
    /*-----------------------------------------------------------------
	  12. Input
    -------------------------------------------------------------------*/

    $(".js-focus").on('focus',function(){
        $(this).parent().addClass("is-completed");
    });

    $(".js-focus").on('focusout',function(){
        if($(this).val() === "")
        $(this).parent().removeClass("is-completed");
    });
  
	
    /*-----------------------------------------------------------------
      13. Autoresize textarea
    -------------------------------------------------------------------*/	

    $('textarea').each(function(){
        autosize(this);
    });


    /*-----------------------------------------------------------------
     14.  Switch categories & Filter mobile
    -------------------------------------------------------------------*/	
  
    $('.select').on('click','.placeholder',function(){
      var parent = $(this).closest('.select');
      if ( ! parent.hasClass('is-open')){
          parent.addClass('is-open');
          $('.select.is-open').not(parent).removeClass('is-open');
      }else{
          parent.removeClass('is-open');
      }
    }).on('click','ul>li',function(){
        var parent = $(this).closest('.select');
        parent.removeClass('is-open').find('.placeholder').text( $(this).text() );
        parent.find('input[type=hidden]').attr('value', $(this).attr('data-value') );
	
	    $('.filters__item').removeClass('active');
	    $(this).addClass('active');
	    var selector = $(this).attr('data-filter');
	    $('.js-sort').isotope({
	        filter: selector
	    });
	    return false;	
    });

  
    /*-----------------------------------------------------------------
      15. Masonry
    -------------------------------------------------------------------*/
 
    // fitGrid
    var $fitGrid=$('.fitGrid').isotope({
        itemSelector: '.item-news',
	    layoutMode: 'fitRows',
        percentPosition: true,
	    transitionDuration: '0.5s',
        hiddenStyle: {
            opacity: 0,
            transform: 'scale(0.001)'
        },
        visibleStyle: {
            opacity: 1,
            transform: 'scale(1)'
        },
        fitRows: {
            gutter: '.gutter-sizer'
        },	
        masonry: {
	        columnWidth: '.item-news',
            gutter: '.gutter-sizer',
            isAnimated: true
        }
    });
  
    $fitGrid.imagesLoaded().progress( function() {
        $fitGrid.isotope ({
	        columnWidth: '.item-news',
            gutter: '.gutter-sizer',
            isAnimated: true,
	        layoutMode: 'fitRows',
            fitRows: {
                gutter: '.gutter-sizer'
            }  	  
	    });
    });  

    // Projects
    var $masonryProjects=$('.js-masonry-project').isotope({
        itemSelector: '.item-project',
        percentPosition: true,
	    transitionDuration: '0.5s',
        hiddenStyle: {
            opacity: 0,
            transform: 'scale(0.001)'
        },
        visibleStyle: {
            opacity: 1,
            transform: 'scale(1)'
        },	
        masonry: {
	        columnWidth: '.item-project',
            isAnimated: true
        }
    });
  
    $masonryProjects.imagesLoaded().progress( function() {
        $masonryProjects.masonry ({
	        columnWidth: '.item-project',
            isAnimated: true
	    });
    });
	
	
    /*-----------------------------------------------------------------
      16. Animations
    -------------------------------------------------------------------*/

    function animation() {
	    // init ScrollMagic
        var ctrl = new ScrollMagic.Controller(); 
        //var $split = $('.js-lines'); 
	
        // anim text for slider
        function textWave(){
            if($(".js-text-wave").length){
                $(".js-text-wave").each(function(){
                    if(!$(this).hasClass("complete")){
                        $(this).addClass("complete");
		                var textChange = $(this).html().replace("<br />", "~"),
		                    textChange = textChange.replace("<br>", "~"),
                            textChange = $(this).html(),
                            textArray = textChange.split(""), //  /\r?\n/
                            textDone = "",
                            num;
                        for (var i = 0; i < textArray.length; i++) {
                            if(textArray[i] == " "){
                                textDone += " ";
                            } else if(textArray[i] == "~"){
                                textDone += "<br />";
                            } else{
                                textDone += '<div><span style="transition-delay: '+(i/30)+'s;">'+textArray[i]+'</span></div>';
                            }
                        }
                        $(this).html(textDone);
                    }
                });
            }
        }	
        textWave();	
        
        // Split chars
        var instance = new SplitType('.js-words', {
            split: 'chars'
        });
        /*Splitting({
            target: '.js-words',
            by: 'chars',
        });*/

        // Animation words
        $('.js-words .char').each(function(index) {
            if (!isMobile) {
                var animWords = anime({
                    targets: this,
                    translateY: ['100%', '0%'],
                    duration: 400,
                    easing: 'easeOutCirc',
                    delay: 30 + index * 30,
                    autoplay: false
                });
                new ScrollMagic.Scene({
                    triggerElement: this,
	                triggerHook: 'onEnter',
                    //duration: '100%',
                    reverse: false
                })
                .setAnime(animWords)
                .addTo(ctrl);
            }
        });
        
        // Split lines
        var instance = new SplitType('.js-lines', {
            split: 'lines'
        });

        // Animation lines
        $('.js-lines .line').each(function(index) {
            if (!isMobile) {
                var animLines = anime({
                    targets: this,
                    translateY: ['100%', '0%'],
                    opacity: [0, 1],
                    duration: 600,
                    easing: 'easeOutCirc',
                    delay: 100 + index * 100,
                    autoplay: false
                });
                new ScrollMagic.Scene({
                    triggerElement: this,
	                triggerHook: 'onEnter',
                    //offset: '-100%',
                    reverse: false
                })
                .setAnime(animLines)
                .addTo(ctrl);
            }
        });
        
        // slideDown load
        $('.js-down').each(function() {
            if (!isMobile) {
                var animDown = anime({
                    targets: this,
                    translateY: ['100%', '0%'],
                    opacity: [0, 1],
                    duration: 600,
                    easing: 'easeOutCirc',
                    delay: 500
                });
            }
        });

        // slideDown effect
        $('.js-block').each(function() {
            if (!isMobile) {
                var animSlideDown = anime({
                    targets: this,
                    translateY: [50, '0'],
                    opacity: [0, 1],
                    duration: 600,
                    delay: 600,
                    easing: 'easeOutCirc',
                    autoplay: false
                });
                new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: 'onEnter',
                    //offset: '-100%',
                    reverse: false
                })
                .setAnime(animSlideDown)
                .addTo(ctrl);
            }
        });
        
        // Scale Load
        $('.js-scale').each(function() {
            if (!isMobile) {
                var animScale = anime({
                    targets: '.js-scale',
                    scale: ['1.2', '1'],
                    opacity: [0, 1],
                    duration: 600,
                    easing: 'easeOutCirc'
                });
            }
        });
	  
        // Reveal
        var steps = document.querySelectorAll('.reveal');

        $.each(steps, function(index, step){
		    if (!isMobile) {
                new ScrollMagic.Scene({
                    triggerElement: step,
		            triggerHook: 'onEnter',
	                reverse: false
                })
                .setClassToggle(step, 'animated')
                .addTo(ctrl);
		    }
        });
        
        // Animation opacity
        $('.js-opacity').each(function() {
            if (!isMobile) {
                var animOpacity = anime({
                    targets: this,
                    translateY: [0, 50],
                    opacity: [1, 0],
                    duration: 600,
                    easing: 'easeOutCirc',
                    autoplay: false
                });
            
                new ScrollMagic.Scene({
                    triggerElement: this,
	                triggerHook: 'onLeave',
	                duration: '100%'
                })
                .setAnime(animOpacity)
                .addTo(ctrl);
            }
        });
    };


    /*-----------------------------------------------------------------
      17. Jarallax
    -------------------------------------------------------------------*/		

    function parallax() {
        $('.jarallax').jarallax({
			disableParallax: /iPhone|iPod|Android/,
            speed: 0.8,
            type: 'scroll'
        });

        $('.jarallaxVideo').jarallax({
            disableVideo: /iPad|iPhone|iPod|Android/
        });
	};
	
	parallax(); //Init


    /*-----------------------------------------------------------------
	  18. Video
    -------------------------------------------------------------------*/

    var isPlaying = $('#video').length;

    if(isPlaying){
        videojs('#video', {
            controlBar: {
                timeDivider: false,
                fullscreenToggle: false,
                playToggle: false,
                remainingTimeDisplay: false
            }
        });
    }


    /*-----------------------------------------------------------------
	  19. mediumZoom
    -------------------------------------------------------------------*/
  
    mediumZoom($('[data-zoomable]').toArray())
  
  
    /*-----------------------------------------------------------------
	  20. Anchor scroll
    -------------------------------------------------------------------*/	
	
    $('a[href^="!#"]').on('click',function (e) {
        e.preventDefault();
        var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });


    /*-----------------------------------------------------------------
      21. Polyfill object-fit
    -------------------------------------------------------------------*/	
	
    var $someImages = $('img.cover');
    objectFitImages($someImages);


    /*-----------------------------------------------------------------
      22. Parallax mouse
    -------------------------------------------------------------------*/
    
    var timeout;
    $('.parallax-container').mousemove(function(e){
        if(timeout) clearTimeout(timeout);
        setTimeout(callParallax.bind(null, e), 200);
  
    });

    function callParallax(e){
        parallaxIt(e, '.error-page', -30);
    }

    function parallaxIt(e, target, movement){
		if (!isMobile) {
            var $this = $('.parallax-container'),
                relX = e.pageX - $this.offset().left,
                relY = e.pageY - $this.offset().top;
            
            var animMove = anime({
                targets: target,
                translateX: (relX - $this.width()/2) / $this.width() * movement,
                translateY: (relY - $this.height()/2) / $this.height() * movement,
                duration: 1000,
                easing: 'easeOutCirc'
            });
		}
    }


	/*-----------------------------------------------------------------
	  23. PhotoSwipe
	-------------------------------------------------------------------*/

    var initPhotoSwipeFromDOM = function(gallerySelector) {
        var parseThumbnailElements = function(el) {
            var thumbElements = el.childNodes,
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;

            for(var i = 0; i < numNodes; i++) {
                figureEl = thumbElements[i]; // <figure> element
					
                if(figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element
                size = linkEl.getAttribute('data-size').split('x');

                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };

                if(figureEl.children.length > 1) {
                    item.title = figureEl.children[1].innerHTML; 
                }

                if(linkEl.children.length > 0) {
                    item.msrc = linkEl.children[0].getAttribute('src');
                } 

                item.el = figureEl;
                items.push(item);
            }
            return items;
        };

        var closest = function closest(el, fn) {
            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
        };

        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if(!clickedListItem) {
                return;
            }

            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;

            for (var i = 0; i < numChildNodes; i++) {
                if(childNodes[i].nodeType !== 1) { 
                    continue; 
                }

                if(childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }
					
            if(index >= 0) {
                openPhotoSwipe( index, clickedGallery );
            }
            return false;
        };

        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
                params = {};

            if(hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if(!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');  
                if(pair.length < 2) {
                    continue;
                }           
                params[pair[0]] = pair[1];
            }

            if(params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            options = {
                // Buttons/elements
                captionEl: false,
                closeEl: true,
                arrowEl: true,
                fullscreenEl: false,
                shareEl: false,
                counterEl: false,
                zoomEl: false,
                maxSpreadZoom: 1,
			    barsSize: { top: 40, bottom: 40, left: 40, right: 40 },
                closeElClasses: [
                    "item",
                    "caption",
                    "zoom-wrap",
                    "ui",
                    "top-bar",
                    "img"
                ],
                // define gallery index (for URL)
			    galleryUID: 0,
                //galleryUID: galleryElement.getAttribute("data-pswp-uid"),
                getDoubleTapZoom: function(isMouseClick, item) {
                    return item.initialZoomLevel;
                },
                pinchToClose: false,
                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName("img")[0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect();
                    return { x: rect.left, y: rect.top + pageYScroll, w: rect.width };
                }
            };

            // PhotoSwipe opened from URL
            if(fromURL) {
                if(options.galleryPIDs) {
                    for(var j = 0; j < items.length; j++) {
                        if(items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            if( isNaN(options.index) ) {
                return;
            }

            if(disableAnimation) {
                options.showAnimationDuration = 0;
            }

            gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        var galleryElements = document.querySelectorAll( gallerySelector );
            for(var i = 0, l = galleryElements.length; i < l; i++) {
                galleryElements[i].setAttribute('data-pswp-uid', i+1);
                galleryElements[i].onclick = onThumbnailsClick;
            }

        var hashData = photoswipeParseHash();
        if(hashData.pid && hashData.gid) {
            openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
        }
    };

    // execute above function
    initPhotoSwipeFromDOM('.photoswiper');
	
	
    /*-----------------------------------------------------------------
	  24. Subscribe form
    -------------------------------------------------------------------*/
  
    $(".newsletter-form").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formErrorSub();
            submitMSGSub(false, "Please enter your email correctly.");
        } else {
            // everything looks good!
            event.preventDefault();
        }
    });

    function callbackFunction (resp) {
        if (resp.result === "success") {
            formSuccessSub();
        }
        else {
            formErrorSub();
        }
    }

    function formSuccessSub(){
        $(".newsletter-form")[0].reset();
        submitMSGSub(true, "Thank you for subscribing!");
        setTimeout(function() {
            $("#validator-newsletter").addClass('hide');
        }, 4000)
    }

    function formErrorSub(){
        $(".newsletter-form").addClass("animated shake");
	    setTimeout(function() {
            $(".newsletter-form").removeClass("animated shake");
        }, 1000)
    }

    function submitMSGSub(valid, msg){
        if(valid){
            var msgClasses = "validation-success";
        } else {
            var msgClasses = "validation-danger";
        }
        $("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
    }

    // AJAX MailChimp
    $(".newsletter-form").ajaxChimp({
        url: "http://netgon.us13.list-manage.com/subscribe/post?u=b3954a95f1a55ffe65dd25050&amp;id=50b6fd13c3", // Your url MailChimp
        callback: callbackFunction
    });

 
    /*-----------------------------------------------------------------
      25. Contacts form
    -------------------------------------------------------------------*/

    $("#contact-form").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            formError();
            submitMSG(false, "Please fill in the form...");
        } else {
            event.preventDefault();
            submitForm();
        }
    });

    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val(),
            email = $("#email").val(),
            message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "assets/php/form-contact.php",
            data: "name=" + name + "&email=" + email + "&message=" + message,
            success : function(text){
                if (text == "success"){
                    formSuccess();
                } else {
                    formError();
                    submitMSG(false,text);
                }
            }
        });
    }

    function formSuccess(){
        $("#contact-form")[0].reset();
        submitMSG(true, "Thanks! Your message has been sent.");
    }

    function formError(){
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }
  
    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "validation-success";
        } else {
           var msgClasses = "validation-danger";
        }
        $("#validator-contact").removeClass().addClass(msgClasses).text(msg);
    }
});