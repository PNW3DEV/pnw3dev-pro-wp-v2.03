<?php

function options_panel_styles() {
        
        ?>        
        <style type="text/css">
        <?php


	/** Mobile detect CSS *************************************************/
	$detect = new Mobile_Detect();
        	if( $detect->isMobile() ){ 
                        ?>       
                        .image-fullbg {  
                                background-attachment: scroll !important;
                        }
                        <?php      
        	}
        	
        	
        /* Fullscreen home image **********************************************/
        $homeimage = of_get_option('gg_homeimage');
        if ( of_get_option('gg_homeimage') ) {
        ?>
                .home-section,
                .home-section.slide,
                .home-section .image-fullbg {        
			height: 100%;         
		}
        <?php
	} else { 
	?>
		.home-section.slide  {        
			height: auto !important;         
		}
		
		.home-section .container {
  			margin:120px auto;
		}
		
		.top-space {        
			height: 0 !important; 
			min-height: 0 !important;        
		}
		
		.home-section .sectionbuttons {
  			margin-bottom: 0;
		}	
	<?php
	} 


        /* home image border remove **********************************************/
        $homeimageborder = of_get_option('gg_homeimageborder');
        if ( of_get_option('gg_homeimageborder') ) {
        ?>
				.home-section.slide.no-border {
				    margin-left: -24px;
				    margin-right: -24px;
				    margin-top: 0;
				}        
		
        <?php 
        }
              

        /* Contact Form 7 textarea height *************************************/
        $homeimage = of_get_option('gg_googlemap');
        if ( of_get_option('gg_googlemap') ) {
        ?>
		.contact-section .wpcf7 textarea {
		    height: 320px;
		}
        <?php
	} 

        
        /** Portfolio gutter **************************************************/
        $gutter = of_get_option('gg_gutter')/2;
        $gutter2 = of_get_option('gg_gutter');
        
        if ( of_get_option('gg_gutter') ) {
                ?>
                .gutter {
                        width: <?php echo $gutter; ?>px;
                }

                .portfolio-items {
                        margin-left: -<?php echo $gutter; ?>px;
                        margin-right: -<?php echo $gutter; ?>px;
                }
                
                .isotope .element {
                        margin-left: <?php echo $gutter; ?>px;
                        margin-right: <?php echo $gutter; ?>px;
                        margin-bottom: <?php echo $gutter2; ?>px;
                }     
                <?php
	} 
        
        
        
        
        /** CUSTOM STYLES (THEME OPTIONS PANEL) *******************************/
        
        
	/* Convert hexdec color string to rgb(a) string */
	function hex2rgba($overlaycolor, $opacity = false) {
	
		$default = 'rgb(10,15,20)';
	
		//Return default if no color provided
		if(empty($overlaycolor))
	          return $default; 
	
		//Sanitize $color if "#" is provided 
	        if ($overlaycolor[0] == '#' ) {
	        	$overlaycolor = substr( $overlaycolor, 1 );
	        }
	
	        //Check if color has 6 or 3 characters and get values
	        if (strlen($overlaycolor) == 6) {
	                $hex = array( $overlaycolor[0] . $overlaycolor[1], $overlaycolor[2] . $overlaycolor[3], $overlaycolor[4] . $overlaycolor[5] );
	        } elseif ( strlen( $overlaycolor ) == 3 ) {
	                $hex = array( $overlaycolor[0] . $overlaycolor[0], $overlaycolor[1] . $overlaycolor[1], $overlaycolor[2] . $overlaycolor[2] );
	        } else {
	                return $default;
	        }
	
	        //Convert hexadec to rgb
	        $rgb =  array_map('hexdec', $hex);
	
	        //Check if opacity is set(rgba or rgb)
	        if($opacity){
	        	if(abs($opacity) > 1)
	        		$opacity = 1.0;
	        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	        } else {
	        	$output = 'rgb('.implode(",",$rgb).')';
	        }
	
	        //Return rgb(a) color string
	        return $output;
	}
        

 	/* portfolio overlay opacity and color ********************************/
        if ( of_get_option('gg_overlaycolor') ) {
		$overlaycolor = of_get_option('gg_overlaycolor');
        }  else {
        		$overlaycolor = '#0a0f14';
        	} 

        if ( of_get_option('gg_overlayopacity') ) {  
		$opacity = of_get_option('gg_overlayopacity');
        }  else {
        		$opacity = '0.7';
        	} 
            
	$rgb = hex2rgba($overlaycolor);
	$rgba = hex2rgba($overlaycolor, $opacity);
        
        ?>
	.overlay .mask { 
	    	background-color: <?php echo $rgba; ?>;
		}
        <?php


        /* clients *************************************************/
        $clientbordercolor = of_get_option('gg_clientbordercolor');
        if ( of_get_option('gg_clientbordercolor') ) {
        ?>
        .clientlogos li {
                border: 1px solid <?php echo $clientbordercolor; ?>;
                border-left: 0;
                border-top: 0;
                }        
        <?php
	}	
	
        $clientcenter = of_get_option('gg_clientcenter');
        if ( of_get_option('gg_clientcenter') ) {
        ?>
        .clientlogos {
            text-align: center;
        }     
        <?php
	}	        
        
        
        

        /* post info color *************************************************/
        $postinfocolor = of_get_option('gg_postinfocolor');
        if ( of_get_option('gg_postinfocolor') == "transparent" ) {
        ?>
                .postinfo {
		    background-color: transparent;
		    color: #888888;
		    padding: 0;
		    margin-top: -4px;
		}
		
		.postinfo a, .postinfo a:link, .postinfo a:visited {
		    color: #BBBBBB;
		}
        <?php
	}


        /* social icons color *************************************************/
        $socialcolor = of_get_option('gg_socialcolor');
        if ( of_get_option('gg_socialcolor') ) {
        ?>
                .socialicons i {
                        color: <?php echo $socialcolor; ?>;
                }
        <?php
	}


        /* tweets color *******************************************************/
        $tweetcolor = of_get_option('gg_tweetcolor');
        if ( of_get_option('gg_tweetcolor') ) {
        ?>
                .twitter-section .twitter-feed {
                        color: <?php echo $tweetcolor; ?>;
                }
        <?php
	}        
        
        
        /* link underline *******************************************************/
        $underline = of_get_option('gg_underline');
        if ( of_get_option('gg_underline') ) {
        ?>
		p a,
		.slide-description a,
		.home-subtitle a {
		        border-bottom: 0;
		        }
        <?php
	} 

   
        /* primary color **********************************************************/
        $color = of_get_option('gg_primary_color');
        if ( of_get_option('gg_primary_color') ) {
        ?>
        
        .sf-menu a.active,
        .sf-menu li:hover,
        .sf-menu .sfHover,
        .sf-menu a:hover,

        .sf-menu .current_page_parent a,
        .current-menu-ancestor a,
        .current-menu-parent a,
        
        ul.sf-menu .current-menu-item:not(.gxg-home) a,
    
        h1.blogtitle a,
        .postinfo a:hover,
        
        a, 
        a:active,
        a:visited,
        h1 a:hover, h1 a:active,
        h2 a:hover, h2 a:active,
        h3 a:hover, h3 a:active,
        h4 a:hover, h4 a:active,
        h5 a:hover, h5 a:active,
        h6 a:hover, h6 a:active,
        #footer-widget-area a:hover,
        #footer-widget-area a:active,
        
        .sf-menu ul li a:hover,
        
        #topnavi .sbOptions a:hover,
        #topnavi .sbOptions a:focus,
        #topnavi .sbOptions a.sbFocus,
        
	#sidebar a:hover,

	.single-blogentry .share a:hover,
	 
	h1.team-title,
        
        .comment-nr a:hover,
        ul.single-postinfo li a:hover,
        
        li.author a:hover,
        .socialicons i:hover, 
        #footer .socialicons i:hover {
                color: <?php echo $color; ?>;
                }

        
        .sticky {
                border-left: 6px solid <?php echo $color; ?>;
                }
        
        <?php
        }
        
        
        /* colorpicker ********************************************************/
        $colorpicker = of_get_option('gg_primary_color_colorpicker');
        if ( of_get_option('gg_primary_color_colorpicker') ) {
        ?>
        .sf-menu a.active,
        .sf-menu li:hover,
        .sf-menu .sfHover,
        .sf-menu a:hover,

        .sf-menu .current_page_parent a,
        .current-menu-ancestor a,
        .current-menu-parent a,
        
        ul.sf-menu .current-menu-item:not(.gxg-home) a,
    
        h1.blogtitle a,
        .postinfo a:hover,
        
        a, 
        a:active,
        a:visited,
        h1 a:hover, h1 a:active,
        h2 a:hover, h2 a:active,
        h3 a:hover, h3 a:active,
        h4 a:hover, h4 a:active,
        h5 a:hover, h5 a:active,
        h6 a:hover, h6 a:active,
        #footer-widget-area a:hover,
        #footer-widget-area a:active,
        
        .sf-menu ul li a:hover,
        
        #topnavi .sbOptions a:hover,
        #topnavi .sbOptions a:focus,
        #topnavi .sbOptions a.sbFocus,
        
	#sidebar a:hover,

	.single-blogentry .share a:hover,
	 
	h1.team-title,
        
        .tags a:hover,
        .comment-nr a:hover,
        ul.single-postinfo li a:hover,
        
        li.author a:hover,
        .socialicons i:hover, 
        #footer .socialicons i:hover {
                color: <?php echo $colorpicker; ?>;
                }
        
        .button1,
        .buttonS,
        ul.tabs li a,
        .pagination_main a:hover,
        .pagination_main .current,
        ul.login li a:hover,
        span.page-numbers,
        a.page-numbers:hover,
        li.comment .reply,
        .moretext,
        .gallery-resize-icon
                {
                background-color: <?php echo $colorpicker; ?>;
                }           

        <?php
        }
        
        
        /* secondary color ****************************************************/
        $secondarycolor = of_get_option('gg_secondary_color');
        if ( of_get_option('gg_secondary_color') ) {
        ?>
     
        .moretext,
        .button1,
        .buttonS,
        .highlight1,
        .highlight2,
        .redsun-tabs li a,
        li.comment .reply,
        #sidebar .tagcloud a,
        .pagination_main .current,
        .pagination_main a:hover {
                background-color: <?php echo $secondarycolor; ?>;
                }
                
        .themecolor {
                color: <?php echo $secondarycolor; ?>;
                }            


        .page-numbers.current, 
        .pagination_main a:hover,
        .pagination_main .current,
        ul.login li a:hover,
        span.page-numbers,
        a.page-numbers:hover,
	.form-submit > input,
        #commentform #submit,
        input.wpcf7-submit 
                {
                background-color: <?php echo $secondarycolor; ?>;
                }
                
        <?php
        }


        /* secondary color colorpicker ****************************************/
        $secondarycolor_colorpicker = of_get_option('gg_secondary_color_colorpicker');
        if ( of_get_option('gg_secondary_color_colorpicker') ) {
        ?>
     
        .moretext,
        #sidebar .tagcloud a, 

        .button1,
        .buttonS,
        .highlight1,
        .highlight2,
        .redsun-tabs li a,

        
        li.comment .reply,
        .pagination_main .current,
        .pagination_main a:hover {
                background-color: <?php echo $secondarycolor_colorpicker; ?>;
                }
                
        .themecolor {
                color: <?php echo $secondarycolor_colorpicker; ?>;
                }   
                
        .page-numbers.current ,
        .pagination_main a:hover,
        .pagination_main .current,
        ul.login li a:hover,
        span.page-numbers,
        a.page-numbers:hover,
        .form-submit > input,
        #commentform #submit,
        input.wpcf7-submit        
                {
                background-color: <?php echo $secondarycolor_colorpicker; ?>;
                }      
                
        <?php
        }


        /* hover color ********************************************************/
        $hovercolor = of_get_option('gg_hovercolor');
        if ( of_get_option('gg_hovercolor') ) {
        ?>
 
        a:hover,
        h1.team-title:hover,
        h1.blogtitle a:hover {
                color: <?php echo $hovercolor; ?>;
                }
        
        .button1:hover,
        .moretext:hover,
	#sidebar .tagcloud a:hover,
        input.wpcf7-submit:hover,
        li.comment .reply:hover,
        #submit:hover {
                background-color: <?php echo $hovercolor; ?> !important;
                }
        <?php
        }


        /* search color *******************************************************/
        $searchcolor = of_get_option('gg_searchcolor');
        if ( of_get_option('gg_searchcolor') ) {
        ?>
        #searchbutton,
        #searchbar  #searchinput {
                background-color: <?php echo $searchcolor; ?>;
                }
        <?php
        }
        
        $searchcolor_colorpicker = of_get_option('gg_searchcolor_colorpicker');
        if ( of_get_option('gg_searchcolor_colorpicker') ) {
        ?>
        #searchbutton,
        #searchbar  #searchinput {
                background-color: <?php echo $searchcolor_colorpicker; ?>;
                }
        <?php
        }


        /* input fields color *************************************************/
        $inputcolor = of_get_option('gg_inputcolor');
        if ( of_get_option('gg_inputcolor') ) {
        ?>
        textarea, input {
                background-color: <?php echo $inputcolor; ?>;
                }
        <?php
        }

        $inputtextcolor = of_get_option('gg_inputtextcolor');
        if ( of_get_option('gg_inputtextcolor') ) {
        ?>
        textarea, input {
                color: <?php echo $inputtextcolor; ?>;
                }
        <?php
        }

        
        /* font ***************************************************************/
	$font = of_get_option('gg_font');
	if ( of_get_option('gg_font') ) {
	?>
        h1, h2, h3, h4, h5, h6,
        .details,
        .dropcap,
        ul.tabs li a,
       .commentlist cite, .commentlist .vcard cite.fn, .commentlist .vcard cite.fn a.url,
        .logo,
        .single-blogentry  .sharetitle
	        {
	        font-family: <?php echo $font; ?>;
	        }         
	<?php
	}

	$fontweight = of_get_option('gg_fontweight');
	if ( of_get_option('gg_fontweight') ) {
	?>
         h1, h2, h3, h4, h5, h6,
        .details,
        .dropcap,
        ul.tabs li a,
        .ogo,
        h3.widgettitle,
        .overlay h2,
        .commentlist cite, .commentlist .vcard cite.fn, .commentlist .vcard cite.fn a.url,
        .single-blogentry  .sharetitle,
        h1.single-portfolio,
        h2.single-portfolio,
        .portfolio1 .posttitle,
        h1.single-blogtitle,
        h1.slide-title,
        h1.home-title,
        h1.blogtitle,
        h1.pagetitle,
        .team-title
	        {
	        font-weight: <?php echo $fontweight; ?>;
	        }         
	<?php
	}
        
        
	$trans = of_get_option('gg_trans');
	if ( of_get_option('gg_trans') ) {
	?>
	 h1, h2, h3, h4, h5, h6,
        .details,
        .dropcap,
        ul.tabs li a,
        .logo,
        h3.widgettitle,
        .overlay h2,
        .commentlist cite, .commentlist .vcard cite.fn, .commentlist .vcard cite.fn a.url,
        .single-blogentry  .sharetitle,
        h1.single-portfolio,
        h2.single-portfolio,
        .portfolio1 .posttitle,
        h1.slide-title,
        h1.home-title,
        h1.blogtitle,
        h1.pagetitle,
        .team-title
	        {
	        text-transform: <?php echo $trans; ?>;
	        }         
	<?php
	}
	        
        
        /* letter spacing *****************************************************/
	if ( of_get_option('gg_letterspacing') ) {
	?>
	 h1, h2, h3, h4, h5, h6,
        .details,
        .dropcap,
        ul.tabs li a,
        .logo,
        h3.widgettitle,
        .overlay h2,
        .team-title, 
        .single-blogentry  .sharetitle,
        h1.single-portfolio,
        h2.single-portfolio,
        .portfolio1 .posttitle,
        h1.single-blogtitle,
        h1.slide-title,
        h1.home-title,
        h1.blogtitle,
        h1.pagetitle
	        {
	        letter-spacing: 0;
	        }         
	<?php
	}
        
        
        /* custom css */
        echo of_get_option('gg_custom_css');


        ?>
        </style>
        <?php

}
add_action( 'wp_head', 'options_panel_styles', 100 );

?>