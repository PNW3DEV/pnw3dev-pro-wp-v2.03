<?php

$prefix = 'gxg_';

global $meta_boxes;

$meta_boxes = array();


/** FRONTPAGE **/
$meta_boxes[] = array(
        'id' => 'general',
        'title' =>  __('GENERAL (Frontpage sections settings)','gxg_textdomain'), 
        'pages' => array('page'),
        'fields' => array(     
                array(
                        'name' =>   __('Help','gxg_textdomain'),             
                        'desc' => 'NEED HELP? PLEASE CHECK OUT THE <a href="http://www.files.red-sun-design.com/redfolio/readme/readme.html" target="_blank">DOCUMENTATION</a>',        
                        'id' => $prefix . 'help',      
                        'type' => '',          
                        'std' => '',                    
                ),                   
                array(
                        'name' =>   __('Front Page section?','gxg_textdomain'),             
                        'desc' => 'Do you want to display this page content as a section on the Front Page?',        
                        'id' => $prefix . 'display',      
                        'type' => 'checkbox',          
                        'std' => '',                    
                ),            
                array(
                        'name' =>   __('Layout','gxg_textdomain'),             
                        'desc' => 'Choose the layout for his section.',        
                        'id' => $prefix . 'section_layout',      
                        'type' => 'select_advanced',
                        'options' => array (
                                'default-section' => 'Default',
                                'home-section-image' => 'Home Fullscreen Image',
                                'home-section-slider' => 'Home Slider',
                                'video-section' => 'Video',
                                'portfolio-section' => 'Portfolio',
                                'blog-section' => 'Blog',      
                                'client-section' => 'Clients',      
                                'team-section' => 'Team',                       
                                'social-section' => 'Social',
                                'twitter-section' => 'Twitter',
                                'contact-section' => 'Contact'
                                ),
                        'std' => '',                    
                ),            
                array(
                        'name' =>   __('Background Color','gxg_textdomain'),  
                        'desc' => 'Choose a background color for his section.',            
                        'id' => $prefix . 'bgcolor',      
                        'type' => 'color',          
                        'std' => '#eeeeee',                    
                ),
                array(
                        'name' =>   __('Parallax Image','gxg_textdomain'),             
                        'desc' => 'In order to display a background image with parallax effect,
                                        upload a </br> <strong>Featured Image</strong> on the right hand side.',                         
                		'id' => $prefix . 'parallax',  
                		'type' => '', 
                ),           
                
        ),
);



$meta_boxes[] = array(
        'id' => 'title',
        'title' =>  __('SECTION TITLE AND SUBTITLE','gxg_textdomain'), 
        'pages' => array('page'),
        'fields' => array(          
                array(
                        'name' => __('Title text','gxg_textdomain'),              
                        'desc' => 'Enter a title to display for this section',        
                        'id' => $prefix . 'title',
                        'type' => 'textarea',               
                        'std' => '',                    
                ),            
                array(
                        'name' =>   __('Title Color','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'titlecolor',      
                        'type' => 'color',          
                        'std' => '#1a1c1e',                    
                ),
               array(
                        'name' =>   __('Subtitle','gxg_textdomain'),             
                        'id' => $prefix . 'divider1',      
                        'type' => 'divider',          
                ),                 
                array(
                        'name' => __('Subtitle text','gxg_textdomain'),              
                        'desc' => 'Enter a subtitle for this section.
                                        It will be displayed below the section title.',        
                        'id' => $prefix . 'description',
                        'type' => 'textarea',               
                        'std' => '',                    
                ),
                array(
                        'name' =>   __('Subtitle Color','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'descriptioncolor',      
                        'type' => 'color',          
                        'std' => '#aaaaaa',                    
                ),
                array(
                        'name' =>   __('Subtitle alignment','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'descriptionalignment',      
                        'type'		=> 'select',
			'multiple'	=> false,
			'options' => array(
				'justify' => 'justify',
				'center' => 'center'
			),
			'std' => 'justify',                         
    
                ),                
                
        ),
);




$meta_boxes[] = array(
        'id' => 'buttons',
        'title' =>  __('SECTION BUTTONS','gxg_textdomain'), 
        'pages' => array('page'),
        'fields' => array(               
                array(
                        'name' => __('Button 1 Text','gxg_textdomain'),              
                        'id' => $prefix . 'button1text',
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' => __('Button 1 URL','gxg_textdomain'),              
                        'desc' => 'Enter full URL including http://',        
                        'id' => $prefix . 'button1url',
                        'type' => 'text',               
                        'std' => '',                    
                ),           
                array(
                        'name' => __('Button 1 Color','gxg_textdomain'),              
                        'id' => $prefix . 'button1color',
                        'type' => 'color',               
                        'std' => '',                    
                ),   
                array(
                        'name' => __('Button 2 Text','gxg_textdomain'),              
                        'id' => $prefix . 'button2text',
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' => __('Button 2 URL','gxg_textdomain'),              
                        'desc' => 'Enter full URL including http://',        
                        'id' => $prefix . 'button2url',
                        'type' => 'text',               
                        'std' => '',                    
                ),           
                array(
                        'name' => __('Button 2 Color','gxg_textdomain'),              
                        'id' => $prefix . 'button2color',
                        'type' => 'color',               
                        'std' => '',                    
                ),                              
        ),
);



$meta_boxes[] = array(
        'id' => 'advanced',
        'title' =>  __('ADVANCED','gxg_textdomain'), 
        'pages' => array('page'),
        'priority' => 'low',
        'fields' => array(     
                array(
                        'name' =>   __('SECTION BACKGROUND IMAGE','gxg_textdomain'),             
                        'desc' => 'On mobile devices, parallax effect is turned off. If you want to change
                                        position of your background image (move up or down)
                                        enter the offset value here. Minus values will push the image down. Example: enter -200 if you want to push your image down by 200px.',        
                        'id' => $prefix . 'help',      
                        'type' => '',          
                        'std' => '',                    
                ),                   

                array(
                        'name' => __('Offset on Tablets','gxg_textdomain'),              
                        'id' => $prefix . 'offset_tablet',
                        'type' => 'text',               
                        'std' => '',                    
                ),                
 
                 array(
                        'name' => __('Offset on Mobile Phones','gxg_textdomain'),              
                        'id' => $prefix . 'offset_mobile',
                        'type' => 'text',               
                        'std' => '',                    
                ),   
                
        ),
);





/** PORTFOLIO **/
$meta_boxes[] = array(
        'id' => 'portfolio1',
        'title' =>  __('PORTFOLIO ITEM SETTINGS','gxg_textdomain'), 
        'pages' => array('portfolio'),
        'fields' => array(
                array(
                        'name' =>   __('Portfolio Thumbnail','gxg_textdomain'),             
                        'desc' => 'In order to display a portfolio thumbnail image,
                                        upload a </br> <strong>Featured Image</strong> on the right hand side.',                         
                		'id' => $prefix . 'thumb',  
                		'type' => '', 
                ),                   
                array(
                        'name' =>   __('select image size','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'psize',      
                        'std' => 'width1',  
                        'type'		=> 'select',
			'multiple'	=> false,
			'options' => array(
				'size1' => 'small square',
				'size2' => 'big square',
                                'video' => 'video',
                                'portrait1' => 'small portrait',
                                'portrait2' => 'small portrait high',
                                'portrait3' => 'large portrait',
                                'landscape' => 'landscape',
			)                  
                ),           
                array(
                        'name' =>   __('subtitle','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'portfolio_subtitle',      
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' =>   __('Add browser mockup','gxg_textdomain'),             
                        'desc' => 'This will add a flat, minimal browser mockup up top of the portfolio item',        
                        'id' => $prefix . 'browsertop',      
                        'type' => 'checkbox',               
                        'std' => '',                    
                ),                 
                array(
                        'name' =>   __('YouTube or Vimeo video','gxg_textdomain'),             
                        'desc' => 'Enter URL',        
                        'id' => $prefix . 'pvideo',      
                        'type' => 'text',               
                        'std' => '',                    
                ),   
                array(
                        'name' =>   __('clicking the portofilio image opens','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'pclick',  
                         'desc' => '(videos will always open in lightbox)',     
                        'std' => 'itempage',  
                        'type'		=> 'select',
			'multiple'	=> false,
			'options' => array(
				'itempage' => 'portfolio item page',
				'lightbox' => 'image in lightbox'
			)                  
                ),
                array(
                        'name' =>   __('Link portfolio item to custom URL','gxg_textdomain'),             
                        'desc' => 'If you would like to link the portfolio item to a custom URL instead of opening an image lightbox or the portfolio item page, enter the full URL including http:// here.',        
                        'id' => $prefix . 'pURL',      
                        'type' => 'text',               
                        'std' => '',                    
                ),  
                        
        ),     
);

$meta_boxes[] = array(
        'id' => 'portfolio',
        'title' =>  __('PORTFOLIO SINGLE ITEM PAGE','gxg_textdomain'), 
        'pages' => array('portfolio'),
        'fields' => array(   
                                  
                array(
                        'name' =>   __('date','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'portfolio_date',      
                        'type' => 'text',               
                        'std' => '',                    
                ),     
                array(
                        'name' =>   __('client','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'client',      
                        'type' => 'text',               
                        'std' => '',                    
                ),     
                array(
                        'name' =>   __('skills','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'skills',      
                        'type' => 'text',               
                        'std' => '',                    
                ),  
                array(
                        'name' =>   __('URL (Launch Project)','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'portfolio_url',      
                        'type' => 'text',               
                        'std' => '',                    
                ),      
               array(
                        'name' =>   __('Subtitle','gxg_textdomain'),             
                        'id' => $prefix . 'divider2',      
                        'type' => 'divider',          
                ),                   
                array(
                        'name' =>   __('Extra field 1','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'extra1',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                  
                array(
                        'name' =>   __('Extra field 2','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'extra2',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                 
                array(
                        'name' =>   __('Extra field 3','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'extra3',      
                        'type' => 'text',               
                        'std' => '',                    
                ),      
               array(
                        'name' =>   __('Subtitle','gxg_textdomain'),             
                        'id' => $prefix . 'divider1',      
                        'type' => 'divider',          
                ),                              
                array(
                        'name' => __('Button 1 Text','gxg_textdomain'),              
                        'id' => $prefix . 'portfolio_button1text',
                        'type' => 'text',               
                        'std' => '',                    
                ),                          
                array(
                        'name' => __('Button 1 URL','gxg_textdomain'),              
                        'desc' => 'Enter full URL including http://',        
                        'id' => $prefix . 'portfolio_button1url',
                        'type' => 'text',               
                        'std' => '',                    
                ),           
                array(
                        'name' => __('Button 1 Color','gxg_textdomain'),              
                        'id' => $prefix . 'portfolio_button1color',
                        'type' => 'color',               
                        'std' => '',                    
                ),   
                array(
                        'name' => __('Button 2 Text','gxg_textdomain'),              
                        'id' => $prefix . 'portfolio_button2text',
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' => __('Button 2 URL','gxg_textdomain'),              
                        'desc' => 'Enter full URL including http://',        
                        'id' => $prefix . 'portfolio_button2url',
                        'type' => 'text',               
                        'std' => '',                    
                ),           
                array(
                        'name' => __('Button 2 Color','gxg_textdomain'),              
                        'id' => $prefix . 'portfolio_button2color',
                        'type' => 'color',               
                        'std' => '',                    
                ),        
                array(
                        'name' =>   __('Open button links in new tab','gxg_textdomain'),             
                        'desc' => '',        
                        'id' => $prefix . 'target',      
                        'type' => 'checkbox',               
                        'std' => '',                    
                ),                                 
                
        ),
);



/** TEAM **/
$meta_boxes[] = array(
        'id' => 'menu',
        'title' => __('TEAM MEMBER INFO','gxg_textdomain'), 
        'pages' => array('team'),
        'fields' => array(
                array(
                        'name' => __('Name','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'name',      
                        'type' => 'text',               
                        'std' => '',                    
                ),                             
                array(
                        'name' => __('Position','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'position',      
                        'type' => 'text',               
                        'std' => '',                    
                ),            
                array(
                        'name' => __('Email','gxg_textdomain'),              
                        'desc' => '',        
                        'id' => $prefix . 'email',      
                        'type' => 'text',               
                        'std' => '',                    
                ),
                array(
                        'name' => __('About','gxg_textdomain'),              
                        'desc' => '(You can use HTML too.)',        
                        'id' => $prefix . 'about',      
                        'type' => 'textarea',               
                        'std' => '',                    
                ),                 
        )
);





/** CHOSE MENU CATEGORY ON PAGES WITH MENU TEMPLATE  **/
$meta_boxes[] = array(
	'id' => 'portfoliocat',
	'title' => __('PORTFOLIO settings','gxg_textdomain'), 
	'pages' => array( 'page' ),
	'fields' => array(
		array(
			'name'    => __('Portfolio Categories','gxg_textdomain'), 
			 'desc' => __('Choose the portfolio categories that you want to display in this section / on this page.','gxg_textdomain'), 
			'id'      => $prefix . 'portfoliocat',
			'type'    => 'taxonomy',
                        	'multiple'    => 'true',
			'options' => array(                                
				'taxonomy' => 'portfolio_category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree' or 'select'. Optional
				'type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'args' => array(
                                        //'parent' => 0
                                )
			),
		),
                array(
                        'name' => __('Portfolio Items Number','gxg_textdomain'),  
                        'desc' => __('Enter the total number of portfolio items you want displayed in this section / on this page (if you want to display ALL items, enter: -1)','gxg_textdomain'),                 
                        'id' => $prefix . 'pmax',      
                        'type' => 'text',               
                        'std' => '-1',                    
                ),  		
	),
);





/**
 * Register meta boxes
 *
 * @return void
 */
function rw_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}

			new RW_Meta_Box( $meta_box );
		}
	}
}

add_action( 'admin_init', 'rw_register_meta_boxes' );

/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			/*case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;*/
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}

?>