<!DOCTYPE html>   
<!--[if IE 8 ]>    <html dir="ltr" lang="en-US" class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js"><!--<![endif]-->        
<!--[if IE]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->

<head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        
        <!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
        <!-- Pingbacks -->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <?php if ( of_get_option('gg_favicon') ) { ?>
                <!-- Favicon -->
                <link rel="shortcut icon" href="<?php echo of_get_option('gg_favicon'); ?>" />
        <?php } ?>

        <?php if ( of_get_option('gg_google_analytics') ) { ?>
                <script type="text/javascript">
                <!-- Google Analytics -->
                <?php echo of_get_option('gg_google_analytics'); ?>
                </script>
        <?php } ?>
 
        <!-- Calls Wordpress head functions -->
        <?php wp_head(); ?>                

</head><!-- END head -->

<!-- BEGIN body -->
<body <?php body_class(); ?>>
        
	<header id="top-bar" <?php if ( of_get_option('gg_sticky_header') ) { ?> class="stickytop" <?php }  ?> >
	
                <?php
                if ( of_get_option('gg_logo_retina') ) {
                ?><div id="logo-img-retina" class="logo logo-retina">
                        <a href="<?php echo home_url(); ?>"> <img class="logoimage" alt="<?php bloginfo('name'); ?>" src="<?php echo of_get_option('gg_logo_retina'); ?>"   <?php if ( of_get_option('gg_logo_width') ) { ?> width="<?php echo of_get_option('gg_logo_width'); ?>"<?php } ?> <?php if ( of_get_option('gg_logo_height') ) { ?> height="<?php echo of_get_option('gg_logo_height'); ?>"<?php } ?> /> </a>
                </div> <!-- #logo-->
                <?php }  	
                if ( of_get_option('gg_logo_image') ) {
                ?><div id="logo-img" class="logo logo-regular">
                        <a href="<?php echo home_url(); ?>" > <img class="logoimage" alt="<?php bloginfo('name'); ?>" src="<?php echo of_get_option('gg_logo_image'); ?>"   <?php if ( of_get_option('gg_logo_width') ) { ?> width="<?php echo of_get_option('gg_logo_width'); ?>"<?php } ?> <?php if ( of_get_option('gg_logo_height') ) { ?> height="<?php echo of_get_option('gg_logo_height'); ?>"<?php } ?> /> </a>
                </div> <!-- #logo-->
                <?php }	                
                elseif ( of_get_option('gg_logo_text') ) {
                ?><div id="logo-text" class="logo logo-regular">
                        <a href="<?php echo home_url(); ?>" > <?php echo of_get_option('gg_logo_text'); ?>  </a>
                   </div> <!-- #logo-->
                <?php }		
                else {
                ?><div id="logo-bloginfo" class="logo logo-regular">
                        <a href="<?php echo home_url(); ?>" > <?php bloginfo('name'); ?> </a>
                   </div> <!-- #logo-->
                <?php }  ?>	
                
                <nav id="topnavi">   
                <?php if (has_nav_menu('main-menu')) {
                        wp_nav_menu( array(
                                'theme_location' => 'main-menu',
                                'menu_class' => 'sf-menu regular-menu',
                                'fallback_cb' => 'wp_page_menu',
                                'walker' => new ID_walker()
                                )
                        );
                } 
                
                //test if mobile device
                $detect = new Mobile_Detect;
                
                if ($detect->isMobile() ) {
                        wp_nav_menu_select( array(
                                'theme_location' => 'main-menu',
                                /*'menu_class' => 'sf-menu mobile-menu',*/
                                'menu_class' => 'sf-menu responsive-menu',
                                'fallback_cb' => 'wp_page_menu'
                                )
                        );
                } else {        
                         wp_nav_menu_select( array(
                                'theme_location' => 'main-menu',
                                'menu_class' => 'sf-menu responsive-menu',
                                'fallback_cb' => 'wp_page_menu'
                                )
                        );                         
                } ?>                         
                </nav> <!-- #topnavi-->
        
                <?php if ( of_get_option('gg_searchbar') ) { ?> 
                <div id="searchbutton">
                <a href="#">
                        <i class="fa fa-search"></i>
                        <i class="fa fa-times"></i>
                </a>
                </div> <!-- #search-->
                <?php }  ?>
                   
	</header><!-- #top-bar -->
	
        <div id="searchbar">
                <?php get_template_part( 'searchform' ); ?>
        </div> <!-- #searchbar-->
         
	<div class="clear"></div>

        <div id="wrapper">	

                <div id="content-wrap">          