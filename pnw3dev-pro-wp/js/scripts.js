/*jshint multistr: true */
/*global jQuery*/


/** NEATSHOW single blog, portfolio an section background images **/
jQuery(function() {
	jQuery('.single-portfolio-entry img, .single-blogentry img').hide();
	jQuery('.single-portfolio-entry img, .single-blogentry img').neatShow();
});



jQuery(document).ready(function () {

	'use strict';
		
	/** PRELOADER *********************************************************/ 
	jQuery(".home-section .image-fullbg").queryLoader2({
		barColor: "#ccc",
		backgroundColor: "#fffff",
		percentage: false,
		barHeight: 0,
		deepSearch: false,
		completeAnimation: "fade",
		onComplete: function () {
				
			
			/* HOME IMAGE FADE IN ******************************************************/ 
	
	        var newHeight = jQuery(window).height(); 
	        var wpadmin = jQuery('#wpadminbar').height();
	        var topbarHeight = jQuery("#top-bar").height();
	        var windowWidth = jQuery(window).width();
	
	        //home section height
	        jQuery(".home-section.slide.border").css("height", newHeight - wpadmin - topbarHeight - 48);
	        
	        //home section height and width no border
	        jQuery(".home-section.slide.no-border").css("height", newHeight - wpadmin - topbarHeight);
	        jQuery(".home-section.slide.no-border").css("width", windowWidth);
	            
	        //container top margin
	        var containerHeight = jQuery(".home-section .container").height();
	        var newTopMargin = (newHeight - wpadmin - topbarHeight  - containerHeight - 194) / 2;
	        jQuery(".top-space").css("height", newTopMargin);
	   
			// fade in
			jQuery(".home-section .image-fullbg, .fade0").fadeTo(1000,1);
	        jQuery(".fade1").delay(2000).fadeTo(250,1);
	        jQuery(".fade2").delay(3500).fadeTo(250,1);
	        jQuery(".fade3").delay(5000).fadeTo(250,1); 		
			
			
	
	
	  }
	  
	}); 	

	/* after 100ms fade out loader */
	setTimeout(function(){
	/* fade out loader */
		jQuery("#loader-wrapper").addClass('loader-fade');
	},100);	
	
	/* after 500ms delay, hide (not fade out) loader*/
	setTimeout(function(){
	/* hide loader after fading out*/
		jQuery("#loader-wrapper").addClass('loader-hide');
	},500);
	
	// fade in .fade0	
	jQuery(".fade0").fadeTo(1000,1);	

});




/* LAZY LOAD ****************************************************/
	jQuery(document).ajaxStop(function(){
		jQuery('.lazy').lazyload({
		effect: 'fadeIn'
		}).removeClass('lazy');
	});

	jQuery("img.lazy").lazyload({
		effect : "fadeIn",
		threshold : 800
	});




/** DYNAMIC HEIGHTS ***********************************************************/
//Initial load of page
jQuery(window).load(sizeContent);
	
//Every resize of window
jQuery(window).resize(sizeContent);
	
//Dynamically assign height and width
function sizeContent() {
	
		'use strict';
	
		var newHeight = jQuery(window).height(); 
		var wpadmin = jQuery('#wpadminbar').height();
		var topbarHeight = jQuery("#top-bar").height();
		var windowWidth = jQuery(window).width();
		
		//home section height
		jQuery(".home-section.slide.border").css("height", newHeight - wpadmin - topbarHeight - 48);
		
		//home section height and width no border
		jQuery(".home-section.slide.no-border").css("height", newHeight - wpadmin - topbarHeight);
		jQuery(".home-section.slide.no-border").css("width", windowWidth);		

		//searchbar top offset
        jQuery("#searchbar").css("top", topbarHeight + wpadmin); 
        
        //layerslider height
        jQuery(".slider-section.slide").css("height", newHeight - wpadmin - topbarHeight - 48);
        
        //#offset for other slider
        jQuery("#offset").css("height", topbarHeight + wpadmin + 48);

        //container top margin
        var containerHeight = jQuery(".home-section .container").height();
        var newTopMargin = (newHeight - wpadmin - topbarHeight  - containerHeight - 194) / 2;
        jQuery(".top-space").css("height", newTopMargin);

	//logo max width        
        if (jQuery(window).width() < 460) {
               jQuery(".logo").css("max-width", windowWidth - 140);
        }        
	
}





/** BACK TOP BUTTON ***********************************************************/
// hide #back-top first
jQuery(function() {
        jQuery("#back-top").hide();
});

// fade in #back-top
jQuery(function () {
        jQuery(window).scroll(function () {
                if (jQuery(this).scrollTop() > 600) {
                        jQuery('#back-top').fadeIn();
                } else {
                        jQuery('#back-top').fadeOut();
                }
        });

        // scroll body to 0px on click
        jQuery('#back-top a').click(function () {
                jQuery('body,html').animate({
                        scrollTop: 0
                }, 2000, 'easeInOutQuint');
                return false;
        });
});





/** CONTACT SECTION EQUAL HEIGHT *************************************/
//Initial load of page
jQuery(document).ready(resetHeight);
        
//Every resize of window
jQuery(window).resize(resetHeight);   

	function resetHeight() {
                var maxHeight = 0;
                jQuery(".equalheight").height("auto").each(function(){ 
			maxHeight = jQuery(this).height() > maxHeight ? jQuery(this).height() : maxHeight; 
		}).height(maxHeight);
	}
	
resetHeight();





// DOCUMENT READY
jQuery(document).ready(function () {

	'use strict';
	

	/** STICKY TOP *******************************************************/
	jQuery('.stickytop').waypoint('sticky');
        
        
        
        /** FIT TEXT **********************************************************/
        var sectiontitlesize = jQuery('.slide-title').css("font-size");
        var minsectiontitlesize = jQuery('.slide-title .min-slide-title').css("font-size");
        var hometitlesize = jQuery('.home-title').css("font-size");
        var minhometitlesize = jQuery('.home-title .min-home-title').css("font-size");
        
        jQuery(".slide-title").fitText(1.0, { minFontSize: minsectiontitlesize, maxFontSize: sectiontitlesize });
        jQuery(".home-title").fitText(1.0, { minFontSize: minhometitlesize, maxFontSize: hometitlesize });

        jQuery(".pagetitle").fitText(1.0, { minFontSize: '38px', maxFontSize: '60px' });     
        jQuery(".single-blogtitle").fitText(1.0, { minFontSize: '28px', maxFontSize: '60px' });     
        
        
	/** STYLE SELECT BOXES  ***********************************************/
        jQuery("#sidebar select").selectbox();
        jQuery(".responsive-menu").selectbox();
        
        /*WooCommerce
        jQuery("#pa_color").selectbox();
        */     
         jQuery(".orderby").selectbox();
            
                
        /** SEARCH ************************************************************/
	jQuery("#searchbutton").click(function () {
                jQuery("#searchbutton i").toggle();
                return false;
	});

	jQuery("#searchbutton").click(function () {
		jQuery("#searchbar").slideToggle();
		return false;
	});

	jQuery("#searchbutton").click(function () {
		jQuery("#searchinput").focus();
	});



	/** RESPONSIVE VIDEOS *************************************************/
	jQuery(".single-blog-content").fitVids();
        jQuery(".single-portfolio-entry").fitVids();
        jQuery(".page-content").fitVids();



        /** SUPERFISH NAVIGATION **********************************************/
        if (jQuery().superfish) {
                    jQuery('ul.sf-menu').superfish({
                             autoArrows: true, // arrow mark-up
                             dropShadows: false, // drop shadows                        
                             animationOpen:    {height:'show'},
                             animationClose:    {height:'hide',opacity:'hide'},
                             delay:        200,
                             speed:        200
                    });
        }
        
        jQuery('ul.sf-menu li').hover(
               function(){
                        jQuery(this).addClass('sfHover');
                },
               function(){
                        jQuery(this).removeClass('sfHover');
                }        
        );


	/** PARALLAX *********************************************************/
        jQuery(window).stellar({
                horizontalOffset: 48,
                verticalOffset: 48,
                        horizontalScrolling: false,
                        verticalScrolling: true,
                        hideDistantElements: true
        });



        /** SELECT MENU FOR SMALLER SCREENS ***********************************/
        jQuery( ".responsive-menu, .mobile-menu" ).change(
            function() {
                window.location = jQuery(this).find("option:selected").val();
            }
        );

        jQuery(".responsive-menu option, .mobile-menu option").each(function () {
            if (jQuery(this).val() === window.location.toString()) {
                jQuery(this).prop('selected', true);
            }
        });
   
   
        
        /** HIDE EMPTY SPAN (used for Reply Button in Comments) ***************/
        jQuery('.commentlist span:empty').remove();
               
                
                
        /** TOGGLE ************************************************************/	
        jQuery(".toggle_container").hide(); 
        jQuery("h6.trigger").click(function(){
               jQuery(this).toggleClass("active").next().slideToggle("fast");
               return false; //Prevent the browser jump to the link anchor
        });
        
        
        
        /** TABS **************************************************************/
        jQuery(".redsun-tabs").tabs();



        /**  PRETTYPHOTO LIGHTBOX *********************************************/
        
        if (jQuery().prettyPhoto) {
                jQuery("a[data-rel^='prettyPhoto']:not(a.isotope-hidden)").prettyPhoto({
                        animation_speed: 'fast', // fast/slow/normal 
                        slideshow: false, // false OR interval time in ms 
                        autoplay_slideshow: false, // true/false 
                        opacity: 0.90, // Value between 0 and 1 
                        show_title: false, // true/false 
                        allow_resize: true, // Resize the photos bigger than viewport. true/false 
                        default_width: 540,
                        default_height: 540,
                        deeplinking: false,
                        overlay_gallery: false,
                        counter_separator_label: '/', // The separator for the gallery counter 1 "of" 2
                        theme: 'red_sun', // light_rounded / dark_rounded / light_square / dark_square / facebook
                        horizontal_padding: 20, // The padding on each side of the picture 
                        autoplay: true, // Automatically start videos: True/False
                        markup: '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
							<div class="pp_right"> \
								<div class="pp_content"> \
									<div class="pp_loaderIcon"></div> \
									<div class="pp_fade"> \
										<div id="resizetoggle"> \
										<a href="#" class="pp_expand"> \
											<i class="fa fa-expand"></i>  \
											<i class="fa fa-compress"></i> \
										</a> \
										</div> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#"><div class="pp_next_inner"><i class="fa fa-chevron-right"></i></div></a> \
											<a class="pp_previous" href="#"><div class="pp_previous_inner"><i class="fa fa-chevron-left"></i></div></a> \
										</div> \
										<div id="pp_full_res"></div> \
										<div class="pp_details"> \
											<div class="pp_nav"> \
												<a href="#" class="pp_arrow_previous"><i class="fa fa-chevron-left"></i></a> \
												<p class="currentTextHolder">0/0</p> \
												<a href="#" class="pp_arrow_next"><i class="fa fa-chevron-right"></i></a> \
											</div> \
											<p class="pp_description"></p> \
											{pp_social} \
											<a class="pp_close" href="#"><i class="fa fa-times"></i></a> \
										</div> \
									</div> \
								</div> \
							</div> \
							</div> \
						</div> \
						<div class="pp_bottom"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
					</div> \
					<div class="pp_overlay"></div>',
                        social_tools: false
                });
        }

        if (jQuery().prettyPhoto) {
                jQuery("a[data-rel^='prettyPhoto-video']").prettyPhoto({
                        animation_speed: 'fast', // fast/slow/normal 
                        slideshow: false, // false OR interval time in ms 
                        autoplay_slideshow: false, // true/false 
                        opacity: 0.90, // Value between 0 and 1 
                        show_title: false, // true/false 
                        allow_resize: true, // Resize the photos bigger than viewport. true/false 
                        default_width: 840,
                        default_height: 540,
                        deeplinking: false,
                        counter_separator_label: '/', // The separator for the gallery counter 1 "of" 2
                        theme: 'red_sun', // light_rounded / dark_rounded / light_square / dark_square / facebook
                        horizontal_padding: 20, // The padding on each side of the picture 
                        autoplay: true, // Automatically start videos: True/False
                        markup: '<div class="pp_pic_holder"> \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
							<div class="pp_right"> \
								<div class="pp_content"> \
									<div class="pp_loaderIcon"></div> \
									<div class="pp_fade"> \
										<div id="resizetoggle"> \
										<a href="#" class="pp_expand"> \
											<i class="fa fa-expand"></i>  \
											<i class="fa fa-compress"></i> \
										</a> \
										</div> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#"><div class="pp_next_inner"><i class="fa fa-chevron-right"></i></div></a> \
											<a class="pp_previous" href="#"><div class="pp_previous_inner"><i class="fa fa-chevron-left"></i></div></a> \
										</div> \
										<div id="pp_full_res"></div> \
										<div class="pp_details"> \
											<div class="pp_nav"> \
												<a href="#" class="pp_arrow_previous"><i class="fa fa-chevron-left"></i></a> \
												<p class="currentTextHolder">0/0</p> \
												<a href="#" class="pp_arrow_next"><i class="fa fa-chevron-right"></i></a> \
											</div> \
											<p class="pp_description"></p> \
											{pp_social} \
											<a class="pp_close" href="#"><i class="fa fa-times"></i></a> \
										</div> \
									</div> \
								</div> \
							</div> \
							</div> \
						</div> \
						<div class="pp_bottom"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
					</div> \
					<div class="pp_overlay"></div>',
                        social_tools: false
                });
        }


     
}); // END DOCUMENT READY





// WINDOW LOAD
jQuery(window).load(function () {
	
	'use strict';

	/** ISOTOPE *******************************************************************/	

	(function (jQuery) {
	
	    // gutter
	    var gutterHalf = jQuery('.gutter').width();
	   	var gutter = gutterHalf*2;    
	   	
	   	// Define your containers and option sets
	    var jQuerycontainer = [jQuery('#portfolio-isotope-1 .isotope'), jQuery('#portfolio-isotope-2 .isotope'), jQuery('.portfolio .isotope')], jQueryoptionSets = [jQuery('#portfolio-isotope-1 #options .option-set'), jQuery('#portfolio-isotope-2 #options .option-set'), jQuery('.portfolio #options .option-set')],
    		
    		// COLUMNS
    		colWidth = function () {
                     var w = jQuery('.isotope').width(), 
                             columnNum = 2,
                             columnWidth = 0;
                     if (w > 2300) {
                             columnNum  = 12;
                     } else if (w > 1800) {
                             columnNum  = 10;                              
                     } else if (w > 1350) {
                             columnNum  = 8; 
                     } else if (w > 900) {
                             columnNum  = 6;                                
                     } else if (w > 450) {
                             columnNum  = 4;
                     }
                     columnWidth = Math.floor(w/columnNum);
                     jQuery('.isotope').find('.element').each(function() {
                             
                             var jQueryitem = jQuery(this),      
                                     elementsize = (jQueryitem.attr('class').split(' ')[1]);
                                     var width = columnWidth-gutter;
                                     var height = columnWidth-gutter;                                                
                                     if (elementsize  == 'size1') {
                                             width = columnWidth-gutter;
                                             height = columnWidth-gutter;
                                     } else if (elementsize  == 'size2') {
                                             width = columnWidth*2-gutter;
                                             height = columnWidth*2-gutter;        
                                     } else if (elementsize  == 'video') {
                                             width = columnWidth*2-gutter;
                                             height = columnWidth*1.125-gutter;
                                     } else if (elementsize  == 'portrait1') {
                                             width = columnWidth-gutter;
                                             height = columnWidth*1.50-gutter;                                                
                                     } else if (elementsize  == 'portrait2') {
                                             width = columnWidth-gutter;
                                             height = columnWidth*2-gutter;                                                
                                     } else if (elementsize  == 'portrait3') {
                                             width = columnWidth*2-gutter;
                                             height = columnWidth*3-gutter;
                                     } else if (elementsize  == 'landscape') {
                                             width = columnWidth*2-gutter;
                                             height = columnWidth-gutter;                                               
                                     } else {
                                             width = columnWidth*2-gutter; 
                                     }
                                     
                             jQueryitem.css({
                                     width: width,
                                     height: height
                             });
                     });
                     return columnWidth;
            };

		    //Initialize isotope on each container
		   	var jQuerywin = jQuery(window),
				    
		    isotope = jQuery.each(jQuerycontainer, function () {
		        this.isotope({
		        	onLayout: function() {
				        jQuerywin.trigger("scroll");
					jQuery('.isotope').addClass('isotope-ready');
				    },
				resizable: false,		        	
				itemSelector : '.element',
				masonry: {
					columnWidth: colWidth(),		            	
					gutterWidth: gutter
		            }            
		        });
		        
		    });


			// smart resize
			var jQuerycontainer1 = jQuery('.isotope');
			
	        jQuery(window).smartresize(function () {
		        jQuerycontainer1.isotope({
				resizable: false,		        	
				itemSelector : '.element',
				masonry: {
					columnWidth: colWidth(),		            	
					gutterWidth: gutter
		            }            
		        });
   			});
		        

           // COLUMNS BLOG        
           var jQuerycontainerB = jQuery('.isotope-fluid'),
                   colWidthB = function () {
                           var wB = jQuerycontainerB.width(), 
                                   columnNumB = 1,
                                   columnWidthB = 0;
                           if (wB > 959) {
                                   columnNumB  = 3;
                           } else if (wB > 680) {
                                   columnNumB  = 2;
                           }
                           columnWidthB = Math.floor(wB/columnNumB);
                           jQuerycontainerB.find('.element-blog').each(function() {
                                   var jQueryitemB = jQuery(this);
   
                                   jQueryitemB.css({
                                           width: columnWidthB-24
                                   });
                           });
                           return columnWidthB;
                   },
                   isotope = function () {
                           jQuerycontainerB.isotope({
		        	onLayout: function() {
					jQuery('.isotope').addClass('isotope-ready');
				    },			   
                                   resizable: false,
                                   itemSelector: '.element-blog',
                                   masonry: {
                                           columnWidth: colWidthB(),
                                           gutterWidth: 24
                                   }
                           });
                   };
           isotope();
           jQuery(window).smartresize(isotope);





		    // OPTIONS
		    jQuery.each(jQueryoptionSets, function (index, object) {
		        
		        var jQueryoptionLinks = object.find('a');
		
		        jQueryoptionLinks.click(function () {
		            var jQuerythis = jQuery(this), jQueryoptionSet = jQuerythis.parents('.option-set'), options = {},
		                key = jQueryoptionSet.attr('data-option-key'),
		                value = jQuerythis.attr('data-option-value');
		            // don't proceed if already selected
		            if (jQuerythis.hasClass('selected')) {
		                return false;
		            }
		 
		            jQueryoptionSet.find('.selected').removeClass('selected');
		            jQuerythis.addClass('selected');
		    
		            // make option object dynamically, i.e. { filter: '.my-filter-class' }
		            
		            // parse 'false' as false boolean
		            value = value === 'false' ? false : value;
		            options[key] = value;
		            if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
		              // changes in layout modes need extra logic
		                changeLayoutMode(jQuerythis, options);
		            } else {
		              // otherwise, apply new options 
		              jQuerycontainer[index].isotope(options);
		            }
		            
		            return false;
		        });
		    });
    
}(jQuery));
	
	
	  
	
	
	/**  SMOOTH / NAVIGATION SCROLL FOR SECTION BUTTONS ***************************/
        jQuery('#topnavi a[href*=#]:not([href=#]), .sectionbuttons a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                        var target = jQuery(this.hash);
                        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
                        if (target.length) {
                                jQuery('html,body').animate({
                                scrollTop: target.offset().top - 48
                                }, 1000);
                                return false;
                        }
                }
        });
	//home button only
	jQuery('.sf-menu li:first-child a').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html,body').animate({
                                        scrollTop: target.offset().top - 148
				}, 1000);
				return false;
                        }
                }
	});



	/* PREVENTS ANCHOR JUMP TO WRONG POSITION *****************************/
	var hash = window.location.hash;
        if(hash){
                jQuery(document).scrollTop( jQuery(hash).offset().top - 72 );
        }



	/* NAVIGATION HIGHLIGHT ****************************************************/
        jQuery('.slide').waypoint(function(direction) {
                if (direction === 'down') {
                        var navclass = jQuery(this).attr('id');
                        jQuery('.sf-menu a').removeClass('active');
                        jQuery('.sf-menu a.' + navclass).addClass('active');
                }
        }, { offset: 96 });

        jQuery('.slide').waypoint(function(direction) {
                if (direction === 'up') {
                        var navclass = jQuery(this).attr('id');
                        jQuery('.sf-menu a').removeClass('active');
                        jQuery('.sf-menu li a.' + navclass).addClass('active');
                }
        },
        {
                offset: function() {
                return -jQuery(this).height() / 2;
                }
        });
        
                
}); // END WINDOW LOAD