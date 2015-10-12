<?php

function optionsframework_option_name() {
        
        // This gets the theme name from the stylesheet (lowercase and without spaces)    
        if (function_exists('wp_get_theme')){
                $theme_data = wp_get_theme('theme-name');
                $themename = $theme_data->Name;
        } else {
                $theme_data = wp_get_theme(STYLESHEETPATH . '/style.css');
                $themename = $theme_data['Name'];
        }    
        $themename = preg_replace("/\W/", "", strtolower($themename) );
        
        $optionsframework_settings = get_option('optionsframework');
        $optionsframework_settings['id'] = $themename;
        update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options() {
   
    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }

    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }

    // If using image radio buttons, define a directory path
    $imagepath =  get_template_directory_uri() . '/includes/admin/images/';
    
    
    // VARIABLES        
    $shortname = "gg";    
    $skin = array("light" => __('light','gxg_textdomain'), "dark" => __('dark','gxg_textdomain'),);
    $fonts = array("Lato" => "default (Lato)",
                   "Source Sans Pro" => "Source Sans Pro",
                   "Open Sans" => "Open Sans",
                   "Open Sans Condensed" => "Open Sans Condensed",
                   "Montserrat" => "Montserrat",
                   "Bree Serif" => "Bree Serif",
                   "Patua One" => "Patua One",
                   "Croissant One" => "Croissant One",
                   "Cherry Swash" => "Cherry Swash",
                    "Ruda" => "Ruda",
                    "Dosis" => "Dosis",
                    "Ubuntu Mono" => "Ubuntu Mono",
                    "Anonymous Pro" => "Anonymous Pro",
                    "Love Ya Like A Sister" => "Love Ya Like A Sister",
                    "Patrick Hand" => "Patrick Hand",
                    "Rancho" => "Rancho" );
    
    $bloglayout = array("1col" => "1 column with sidebar", "masonry" => "masonry", "masonrysidebar" => "masonry with sidebar");
    
    $trans = array("none" => "none", "uppercase" => "uppercase");
 
    $topbar = array("dark" => "dark", "white" => "white with grey border");  
 
    $contactsection = array("dark" => "dark", "white" => "white with grey border");  
 
    $postinfo = array("black" => "black", "transparent" => "transparent");          
    

    // Pull all the slider posts into an array
    $args = array("numberposts" => -1 , "orderby" => "post_date" , "post_type" => "slider"); 
    $options_slides = array();
    $options_slides_obj = get_posts($args);
    $options_slides[''] = 'Select a slider:';
    foreach ($options_slides_obj as $page) {
        $options_slides[$page->ID] = $page->post_title;
    }
 
 
     // Pull all the pages into an array
    
    $options_layout = array();
    $options_layout_obj = get_pages();
    $options_layout[''] = 'Select a page:';
    foreach ($options_layout_obj as $layout) {
        $options_layout[$layout->ID] = $layout->post_title;
    }
    
    
    
    // OPTIONS    
    $options = array();        

//------------------------------------------------------------------------------
// GENERAL
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('GENERAL','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/g.png");

        $options[] = array( "name" => __('Configure the general setup of your theme.','gxg_textdomain'),
        "type" => "info");


        
        $options[] = array( "name" => __('Custom CSS','gxg_textdomain'),
                                                "desc" => __('Want to add any custom CSS code? Put it in here, and the rest is taken care of. This overrides any other stylesheets.','gxg_textdomain'),
                                                "id" => $shortname."_custom_css",
                                                "std" => "",
                                                "type" => "textarea");
                                                         
        $options[] = array( "name" => __('Load WooCommerce stylesheets','gxg_textdomain'),  
                                                "desc" => __('Check this box after you have installed the WooCommerce plugin.','gxg_textdomain'),        
                                                "id" => $shortname."_woo",
                                                "std" => "",
                                                "type" => "checkbox");                                               

        $options[] = array( "name" => __('Lazy load image (for page speed improvements)','gxg_textdomain'),        
                                                "id" => $shortname."_lazyload",
                                                "std" => "1",
                                                "type" => "checkbox");    
						
        $options[] = array( "name" => __('404 Error','gxg_textdomain'),
                                                "desc" => __('Add your own text to display on error pages.','gxg_textdomain'),
                                                "id" => $shortname."_404error",
                                                "std" => "",
                                                "type" => "textarea");

        $options[] = array( "name" => __('Google Analytics Code','gxg_textdomain'),
                                                "desc" => __('Enter your Google Analytics or other tracking code here, it will be added to all pages. (NOTE: you do not need to wrap your code with &lt;script> ... &lt;/script>) ','gxg_textdomain'),
                                                "id" => $shortname."_google_analytics",
                                                "std" => "",
                                                "type" => "textarea");


// LOGO
        $options[] = array( "name" => __('Logo','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
                                        
        $options[] = array( "name" => __('Upload Logo','gxg_textdomain'),
                                                "desc" => __('Upload your Logo.','gxg_textdomain'),
                                                "id" => $shortname."_logo_image",
                                                "type" => "upload");

        $options[] = array( "name" => __('Upload Retina Logo (Optional)','gxg_textdomain'),
                                                "desc" => __('Upload your Retina Logo. This should be your Logo in double size (If your Logo is 140 x 24px, it should be 280 x 48px)','gxg_textdomain'),
                                                "id" => $shortname."_logo_retina",
                                                "type" => "upload");
                                                
        $options[] = array( "name" => __('Original Logo Width (important for Retina Logo to display properly)','gxg_textdomain'),
                                                "desc" => __('Enter the width of the Standard Logo you have uploaded (not the Retina Logo) here. If your Logo has a width of 140px, enter: 140.','gxg_textdomain'),
                                                "id" => $shortname."_logo_width",
                                                "std" => "",
                                                "type" => "text");
                                                
        $options[] = array( "name" => __('Original Logo Height (important for Retina Logo to display properly)','gxg_textdomain'),
                                                "desc" => "Enter the height of the Standard Logo you have uploaded (not the Retina Logo) here. If your Logo has a height of 24px, enter: 24.",
                                                "id" => $shortname."_logo_height",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => __('Logo text instead of image','gxg_textdomain'),
                                                "id" => $shortname."_logo_text",
                                                "type" => "text");
        
        
// THEME CUSTOMIZATION
        $options[] = array( "name" => __('Theme Customization','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
                                                
        $options[] = array( "name" => __('Sticky header','gxg_textdomain'),
                                                "desc" => __('Keep header visible when scrolling down','gxg_textdomain'),   
                                                "id" => $shortname."_sticky_header",
                                                "std" => "1",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('Search Button in header','gxg_textdomain'),
                                                "desc" => __('Display search button in header','gxg_textdomain'),   
                                                "id" => $shortname."_searchbar",
                                                "std" => "1",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('FRONTPAGE Blog Section number of posts','gxg_textdomain'),
                                                "desc" => __('How many blog posts would you like to display in the Frontpage blog section?','gxg_textdomain'),   
                                                "id" => $shortname."_posts_number",
                                                "std" => "3",
                                                "type" => "text");

        $options[] = array( "name" =>  __('Main Blog Page layout','gxg_textdomain'),
                                                "desc" => __('Layout of your Main Blog Page - the page you selected in Settings > Reading > Posts Page','gxg_textdomain'),
                                                "id" => $shortname."_bloglayout",
                                                "std" => "masonry",
                                                "type" => "select",
                                                "options" => $bloglayout);



        $options[] = array( "name" => __('Show author info in the post info section','gxg_textdomain'),
                                                "id" => $shortname."_author",
                                                "std" => "0",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('Remove Comments','gxg_textdomain'),
                                                "id" => $shortname."_commentremove",
                                                "desc" => __('Remove all comment sections from the entire website','gxg_textdomain'),
                                                "std" => "0",
                                                "type" => "checkbox");
                                                  
        $options[] = array( "name" => __('Copyright text','gxg_textdomain'),
                                                "desc" => __('Add your own  copyright text to display below content.','gxg_textdomain'),
                                                "id" => $shortname."_copyright",
                                                "std" => "",
                                                "type" => "textarea");       

// FAVICON
        $options[] = array( "name" => __('Favicon','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Favicon','gxg_textdomain'),
                                                "desc" => __('Upload a 16 x 16 favicon','gxg_textdomain'),
                                                "id" => $shortname."_favicon",
                                                "std" => "",
                                                "type" => "upload");
        
// GRAVATAR
        $options[] = array( "name" => __('Custom Gravatar','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
        
        $options[] = array( "name" => __('Custom Gravatar','gxg_textdomain'),
                                                "desc" => __('Upload a Gravatar.','gxg_textdomain'),
                                                "id" => $shortname."_gravatar",
                                                "std" => "",
                                                "type" => "upload");



//------------------------------------------------------------------------------
// PORTFOLIO
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('PORTFOLIO','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/st.png");

        $options[] = array( "name" => __('Set up the portfolio section / portfolio page','gxg_textdomain'),
        "type" => "info");

        $options[] = array( "name" => __('PORTFOLIO gutter width','gxg_textdomain'),
                                                "desc" => __('Set the space in between portfolio items. If you want to add a space of 4px, enter: 4 . Recommended values: narrow: 4 wide: 24','gxg_textdomain'),   
                                                "id" => $shortname."_gutter",
                                                "std" => "4",
                                                "type" => "text");

        $options[] = array( "name" => __('Portfolio items overlay color','gxg_textdomain'),
                                                "id" => $shortname."_overlaycolor",
                                                "desc" => __('Default color: #14b8f5','gxg_textdomain'),
                                                "std" => "#14b8f5",
                                                "type" => "color"); 

        $options[] = array( "name" => __('Portfolio items overlay opacity','gxg_textdomain'),
                                                "desc" => __('Example 70% opacity, enter: 0.7','gxg_textdomain'),
                                                "id" => $shortname."_overlayopacity",
                                                "std" => "0.7",
                                                "type" => "text");        


   
//------------------------------------------------------------------------------
// TYPOGRAPHY
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('TYPOGRAPHY','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/t.png");

        $options[] = array( "name" =>  __('Style your Headings and links. Remove values to use default settings.','gxg_textdomain'),
        "type" => "info");
       
        $options[] = array( "name" =>  __('Google Web Font for Headings','gxg_textdomain'),
                                                "desc" => __('Simply enter the name of the Google font that you would like to use for Headings here. The rest is taken care of. Default font: Lato','gxg_textdomain'),
                                                "id" => $shortname."_font",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" =>  __('Font Weight for Headings','gxg_textdomain'),
                                                "desc" => __('Set font weight for Headings. Default: 800.  Info: Normal = 400','gxg_textdomain'),
                                                "id" => $shortname."_fontweight",
                                                "std" => "",
                                                "type" => "text");        

        $options[] = array( "name" =>  __('Text Transform for Headings','gxg_textdomain'),
                                                "desc" => __('Some Headings are UPPERCASE letters by default. However, some fonts simply don\'t look right with just uppercase letters. Here you can set the text transform to NONE','gxg_textdomain'),
                                                "id" => $shortname."_trans",
                                                "std" => "uppercase",
                                                "type" => "select",
                                                "options" => $trans);

        $options[] = array( "name" =>  __('Remove Letter spacing from Headings','gxg_textdomain'),
                                                "desc" => __('Some Headings have some extra space in between characters. However, some fonts simply don\'t look right with letter spacing. Here you can remove it.','gxg_textdomain'),
                                                "id" => $shortname."_letterspacing",
                                                "std" => "0",
                                                "type" => "checkbox");
                                                
        $options[] = array( "name" => __('Home Title Font Size','gxg_textdomain'),
                                                "desc" => "Enter the font size for the Home Title. If you would like to use a font size of 80px, enter: 80. (default: 80)",
                                                "id" => $shortname."_hometitlesize",
                                                "std" => "80",
                                                "type" => "text");                                                

        $options[] = array( "name" => __('Home Title Minimum Font Size (for mobile devices)','gxg_textdomain'),
                                                "desc" => "Enter the minimum font size for the Home Title. If you would like to use a font size of 36px, enter: 36. (default: 36)",
                                                "id" => $shortname."_minhometitlesize",
                                                "std" => "36",
                                                "type" => "text");                                                
                                                
                                                
        $options[] = array( "name" => __('Section Title Font Size','gxg_textdomain'),
                                                "desc" => "Enter the font size for the Section Titles. If you would like to use a font size of 80px, enter: 80. (default: 80, min-size: 48)",
                                                "id" => $shortname."_sectiontitlesize",
                                                "std" => "80",
                                                "type" => "text");     
                                                
        $options[] = array( "name" => __('Section Title Minimum Font Size (for mobile devices)','gxg_textdomain'),
                                                "desc" => "Enter the minimum font size for the Section Titles. If you would like to use a font size of 48px, enter: 48. (default: 48)",
                                                "id" => $shortname."_minsectiontitlesize",
                                                "std" => "48",
                                                "type" => "text");  
                                                
         $options[] = array( "name" => __('Remove links underline','gxg_textdomain'),
                                                "id" => $shortname."_underline",
                                                "std" => "0",
                                                "type" => "checkbox");                                                

//------------------------------------------------------------------------------
// COLOR
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('COLOR','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/col.png");

        $options[] = array( "name" => __('Set the theme color.','gxg_textdomain'),
        "type" => "info");


        $options[] = array( "name" => __('Predefined Primary Color','gxg_textdomain'),
                                                "id" => $shortname."_primary_color",
                                                "std" => "#ff4229",
                                                "type" => "images",
                                                "options" => array(
                                                        '#f9ba00' => $imagepath . '/color/f9ba00.jpg',
                                                        '#F1592A' => $imagepath . '/color/f1592a.jpg',
                                                        '#ff4229' => $imagepath . '/color/ff4229.jpg',
                                                        '#ed2528' => $imagepath . '/color/ed2528.jpg',
                                                        '#fb2e2e' => $imagepath . '/color/fb2e2e.jpg',
                                                        '#ff1d4d' => $imagepath . '/color/ff1d4d.jpg',
                                                      
                                                        '#18cece' => $imagepath . '/color/18cece.jpg',
                                                        '#0faf97' => $imagepath . '/color/0faf97.jpg',                                                        
                                                        '#14b8f5' => $imagepath . '/color/14b8f5.jpg',
                                                        '#2980b9' => $imagepath . '/color/2980b9.jpg',
                                                        '#00becc' => $imagepath . '/color/00becc.jpg',
                                                        '#9a8764' => $imagepath . '/color/9a8764.jpg'                                                       
                                                        )
                                                );
        
        $options[] = array( "name" => __('Custom Primary Color','gxg_textdomain'),
                                                "desc" => __('If you prefer a different color than the ones above,  you can select a custom color here. This field has priority over the Predefined Primary Theme Color.','gxg_textdomain'),
                                                "id" => $shortname."_primary_color_colorpicker",
                                                "std" => "",
                                                "type" => "color");

        $options[] = array( "name" => __('Predefined Secondary Color','gxg_textdomain'),
                                                "id" => $shortname."_secondary_color",
                                                "desc" => __('Pick a secondary color (for Buttons, Pagination ...)','gxg_textdomain'),
                                                "std" => "#14b8f5",
                                                "type" => "images",
                                                "options" => array(
                                                        '#f9ba00' => $imagepath . '/color/f9ba00.jpg',
                                                        '#F1592A' => $imagepath . '/color/f1592a.jpg',
                                                        '#ff4229' => $imagepath . '/color/ff4229.jpg',
                                                        '#ed2528' => $imagepath . '/color/ed2528.jpg',
                                                        '#fb2e2e' => $imagepath . '/color/fb2e2e.jpg',
                                                        '#ff1d4d' => $imagepath . '/color/ff1d4d.jpg',

                                                        '#18cece' => $imagepath . '/color/18cece.jpg',
                                                        '#0faf97' => $imagepath . '/color/0faf97.jpg',                                                        
                                                        '#14b8f5' => $imagepath . '/color/14b8f5.jpg',
                                                        '#2980b9' => $imagepath . '/color/2980b9.jpg',
                                                        '#00becc' => $imagepath . '/color/00becc.jpg',
                                                        '#9a8764' => $imagepath . '/color/9a8764.jpg'  
                                                        )
                                                );

        $options[] = array( "name" => __('Custom Secondary Color','gxg_textdomain'),
                                                "desc" => __('If you prefer a different color than the ones above,  you can select a custom color here. This field has priority over the Predefined Secondary Theme Color.','gxg_textdomain'),
                                                "id" => $shortname."_secondary_color_colorpicker",
                                                "std" => "",
                                                "type" => "color");

        $options[] = array( "name" => __('Hover Color','gxg_textdomain'),
                                                "desc" => __('Pick a hover color for all links and buttons. Default: #aaaaaa','gxg_textdomain'),
                                                "id" => $shortname."_hovercolor",
                                                "std" => "#aaaaaa",
                                                "type" => "color");
                                            
        $options[] = array( "name" =>  __('Post info background color','gxg_textdomain'),
                                                "id" => $shortname."_postinfocolor",
                                                "desc" => "Background color of post info below post title (comments, categories,...)",
                                                "std" => "black",
                                                "type" => "select",
                                                "options" => $postinfo);
                                                

// SEARCH
        $options[] = array( "name" => __('Custom Search Color','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Predefined Search Button and Form color in top bar','gxg_textdomain'),
                                                "id" => $shortname."_searchcolor",
                                                "std" => "#14b8f5",
                                                "type" => "images",
                                                "options" => array(
                                                        '#f9ba00' => $imagepath . '/color/f9ba00.jpg',
                                                        '#F1592A' => $imagepath . '/color/f1592a.jpg',
                                                        '#ff4229' => $imagepath . '/color/ff4229.jpg',
                                                        '#ed2528' => $imagepath . '/color/ed2528.jpg',
                                                        '#fb2e2e' => $imagepath . '/color/fb2e2e.jpg',
                                                        '#ff1d4d' => $imagepath . '/color/ff1d4d.jpg',

                                                        '#18cece' => $imagepath . '/color/18cece.jpg',
                                                        '#0faf97' => $imagepath . '/color/0faf97.jpg',                                                        
                                                        '#14b8f5' => $imagepath . '/color/14b8f5.jpg',
                                                        '#2980b9' => $imagepath . '/color/2980b9.jpg',
                                                        '#00becc' => $imagepath . '/color/00becc.jpg',
                                                        '#9a8764' => $imagepath . '/color/9a8764.jpg'  
                                                        )
                                                );

        $options[] = array( "name" => __('Custom Search Button and Form color in top bar','gxg_textdomain'),
                                                "id" => $shortname."_searchcolor_colorpicker",
                                                "desc" => __('If you prefer a different color than the ones above,  you can select a custom color here. This field has priority over the Predefined Search Button and Form Color.','gxg_textdomain'),
                                                "type" => "color");
     

// FORMS
        $options[] = array( "name" => __('Form Colors','gxg_textdomain'),
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Form input fields background color','gxg_textdomain'),
                                                "desc" => __('Pick a background color for input fields (such as contact form and comment form). Default: #a3d7df','gxg_textdomain'),
                                                "id" => $shortname."_inputcolor",
                                                "std" => "#a3d7df",
                                                "type" => "color");

        $options[] = array( "name" => __('Form input fields text color','gxg_textdomain'),
                                                "desc" => __('Pick a text color for input fields (such as contact form and comment form). Default: #ffffff','gxg_textdomain'),
                                                "id" => $shortname."_inputtextcolor",
                                                "std" => "#ffffff",
                                                "type" => "color");


//------------------------------------------------------------------------------
// HOME
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('HOME','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/h.png");

        $options[] = array( "name" => __('Set up the Home section','gxg_textdomain'),
        "type" => "info");


        $options[] = array( "name" => __('Display Home Section Image with 100% height','gxg_textdomain'),
                                                "id" => $shortname."_homeimage",
                                                "std" => "1",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('Remove border around Home Section Image','gxg_textdomain'),
                                                "id" => $shortname."_homeimageborder",
                                                "std" => "0",
                                                "type" => "checkbox");                                                

        $options[] = array( "name" => __('Fade in Title, Subtitle, Buttons in Home Section','gxg_textdomain'),
                                                "id" => $shortname."_homefade",
                                                "desc" => __('Check this box if you would like to fade in the title, subtitle and buttons in the Home Section. If unchecked, they will display immediately.','gxg_textdomain'),
                                                "std" => "1",
                                                "type" => "checkbox");
 
//------------------------------------------------------------------------------
// SOCIAL
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('SOCIAL','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/tw.png");

        $options[] = array( "name" => __('Set up the Twitter Section and enter the info for your social network accounts to display them in the Social Section, and optionally also in the footer.','gxg_textdomain'), 
        "type" => "info");        



// TWITTER SECTION
        $options[] = array( "name" => __('Twitter Section','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
        $options[] = array( "name" => "Twitter ID",
                                                "desc" => __('Enter Twitter ID.<br> This is how you find the Twitter ID:<br> Go to www.twitter.com and log in, go to your Settings page by clicking on your profile image up top and then \'Settings\', then click Widgets on the left hand side. Click \'Create New\', then select \'User timeline\' and click \'Create widget\'. Now look at the URL in your web browser, you will see the ID, which is a long number like this: 554079775447613440.','gxg_textdomain'),
                                                "id" => $shortname."_twitter_id",
                                                "std" => "",
                                                "type" => "text");                                                 
//-----------
//        $options[] = array( "name" => __('Display Retweets?','gxg_textdomain'),
//                                               "id" => $shortname."_retweets",
//                                               "std" => "1",
//                                               "type" => "checkbox");
//        
//       $options[] = array( "name" => __('Display Replies?','gxg_textdomain'),
//                                               "id" => $shortname."_replies",
//                                               "std" => "1",
//                                               "type" => "checkbox");
//-----------

        $options[] = array( "name" => __('Color of tweet text in twitter Section','gxg_textdomain'),
                                                "desc" => __('This affects the color in the twitter Section only, not in the twitter widget.','gxg_textdomain'),   
                                                "id" => $shortname."_tweetcolor",
                                                "std" => "#ffffff",
                                                "type" => "color");        

// SHARE BUTTONS
        $options[] = array( "name" => __('Facebook and Twitter share buttons','gxg_textdomain'),
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");
 
        $options[] = array( "name" => __('Display Facebook and Twitter share icons on single post and portfolio pages?','gxg_textdomain'),
                                                "id" => $shortname."_share",
                                                "std" => "1",
                                                "type" => "checkbox");

// SOCIAL SECTION
        $options[] = array( "name" => __('Social Section & Social Icons in Footer ','gxg_textdomain'),
                                                "desc" => "",
                                                "id" => "general_heading",
                                                "class" => "subheading",
                                                "type" => "info");

        $options[] = array( "name" => __('Display social icons in footer','gxg_textdomain'),
                                                "desc" => __('Display social icons also in footer, next to copyright info','gxg_textdomain'),   
                                                "id" => $shortname."_socialfooter",
                                                "std" => "1",
                                                "type" => "checkbox");

        $options[] = array( "name" => __('Color of icons in Social Section','gxg_textdomain'),
                                                "desc" => __('This affects the color in the social Section only, not in the footer.','gxg_textdomain'),   
                                                "id" => $shortname."_socialcolor",
                                                "std" => "",
                                                "type" => "color");


        $options[] = array( "name" => "Facebook",
                                                "desc" => __('Enter the full URL to your Facebook profile','gxg_textdomain'),
                                                "id" => $shortname."_fb",
                                                "std" => "",
                                                "type" => "text");   
        
        $options[] = array( "name" => "Twitter",
                                                "desc" => __('Enter the full URL to your Twitter profile','gxg_textdomain'),
                                                "id" => $shortname."_twitter",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Google Plus",
                                                "desc" => __('Enter the full URL to your Google Plus profile','gxg_textdomain'),
                                                "id" => $shortname."_googleplus",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Dribbble",
                                                "desc" => __('Enter the full URL to your dribbble profile','gxg_textdomain'),
                                                "id" => $shortname."_dribbble",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Behance",
                                                "desc" => __('Enter the full URL to your Behance profile','gxg_textdomain'),
                                                "id" => $shortname."_behance",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Github",
                                                "desc" => __('Enter the full URL to your Github page','gxg_textdomain'),
                                                "id" => $shortname."_github",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Spotify",
                                                "desc" => __('Enter the full URL to your Spotify profile','gxg_textdomain'),
                                                "id" => $shortname."_spotify",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "YouTube",
                                                "desc" => __('Enter the full URL to your YouTube page','gxg_textdomain'),
                                                "id" => $shortname."_youtube",
                                                "std" => "",
                                                "type" => "text");
 
         $options[] = array( "name" => "Vimeo",
                                                "desc" => __('Enter the full URL to your Vimeo page','gxg_textdomain'),
                                                "id" => $shortname."_vimeo",
                                                "std" => "",
                                                "type" => "text");                                               
 
         $options[] = array( "name" => "Vine",
                                                "desc" => __('Enter the full URL to your Vine page','gxg_textdomain'),
                                                "id" => $shortname."_vine",
                                                "std" => "",
                                                "type" => "text");                                                  
 
         $options[] = array( "name" => "Soundcloud",
                                                "desc" => __('Enter the full URL to your Soundcloud page','gxg_textdomain'),
                                                "id" => $shortname."_soundcloud",
                                                "std" => "",
                                                "type" => "text");                                                   

        $options[] = array( "name" => "Instagram",
                                                "desc" => __('Enter the full URL to your Instagram profile','gxg_textdomain'),
                                                "id" => $shortname."_instagram",
                                                "std" => "",
                                                "type" => "text"); 
        
        $options[] = array( "name" => "Pinterest",
                                                "desc" => __('Enter the full URL to your Pinterest profile','gxg_textdomain'),
                                                "id" => $shortname."_pinterest",
                                                "std" => "",
                                                "type" => "text");        
        
        $options[] = array( "name" => "Flickr",
                                                "desc" => __('Enter the full URL to your Flickr profile','gxg_textdomain'),
                                                "id" => $shortname."_flickr",
                                                "std" => "",
                                                "type" => "text");  

        $options[] = array( "name" => "Deviantart",
                                                "desc" => __('Enter the full URL to your Deviantart profile','gxg_textdomain'),
                                                "id" => $shortname."_deviantart",
                                                "std" => "",
                                                "type" => "text");  

        $options[] = array( "name" => "Stack Overflow",
                                                "desc" => __('Enter the full URL to your Stack Overflow profile','gxg_textdomain'),
                                                "id" => $shortname."_stackoverflow",
                                                "std" => "",
                                                "type" => "text"); 

        $options[] = array( "name" => "LinkedIn",
                                                "desc" => __('Enter the full URL to your LinkedIn profile','gxg_textdomain'),
                                                "id" => $shortname."_linkedin",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Skype",
                                                "desc" => __('Enter the full URL to your Skype profile','gxg_textdomain'),
                                                "id" => $shortname."_skype",
                                                "std" => "",
                                                "type" => "text");
                                                
         $options[] = array( "name" => "Tumblr",
                                                "desc" => __('Enter the full URL to your Tumblr profile','gxg_textdomain'),
                                                "id" => $shortname."_tumblr",
                                                "std" => "",
                                                "type" => "text");                                               
                                                
        $options[] = array( "name" => "Xing",
                                                "desc" => __('Enter the full URL to your Xing profile','gxg_textdomain'),
                                                "id" => $shortname."_xing",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "500px",
                                                "desc" => __('Enter the full URL to your 500px profile','gxg_textdomain'),
                                                "id" => $shortname."_500px",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Houzz",
                                                "desc" => __('Enter the full URL to your Houzz profile','gxg_textdomain'),
                                                "id" => $shortname."_houzz",
                                                "std" => "",
                                                "type" => "text");  

        $options[] = array( "name" => "Tipadvisor",
                                                "desc" => __('Enter the full URL to your Tripadvisor profile','gxg_textdomain'),
                                                "id" => $shortname."_tripadvisor",
                                                "std" => "",
                                                "type" => "text");   

        $options[] = array( "name" => "Amazon",
                                                "desc" => __('Enter the full URL to your Amazon profile','gxg_textdomain'),
                                                "id" => $shortname."_amazon",
                                                "std" => "",
                                                "type" => "text");                                                                                                                                                

//------------------------------------------------------------------------------
// CLIENTS
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('CLIENTS','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/so.png");

        $options[] = array( "name" => __('Upload your client\'s logos to display them in the Clients Section.','gxg_textdomain'), 
        "type" => "info");   

        $options[] = array( "name" => __('Border around client logos','gxg_textdomain'),
                                                "desc" => __('Remove color value if you want to display no border at all.','gxg_textdomain'),   
                                                "id" => $shortname."_clientbordercolor",
                                                "std" => "#eeeeee",
                                                "type" => "color");
        

        $options[] = array( "name" => __('Center logos','gxg_textdomain'),
                                                "desc" => __('Display logos centered on the site instead of left aligned.','gxg_textdomain'),   
                                                "id" => $shortname."_clientcenter",
                                                "std" => "0",
                                                "type" => "checkbox");        

        $options[] = array( "name" => "Client 1",
                                                "desc" => __('Upload logo of client 1','gxg_textdomain'),
                                                "id" => $shortname."_client1",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 1 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client1url",
                                                "std" => "",
                                                "type" => "text");

        $options[] = array( "name" => "Client 2",
                                                "desc" => __('Upload logo of client 2','gxg_textdomain'),
                                                "id" => $shortname."_client2",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 2 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client2url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 3",
                                                "desc" => __('Upload logo of client 3','gxg_textdomain'),
                                                "id" => $shortname."_client3",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 3 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client3url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 4",
                                                "desc" => __('Upload logo of client 4','gxg_textdomain'),
                                                "id" => $shortname."_client4",
                                                "type" => "upload");

        $options[] = array( "name" => "Client 4 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client4url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 5",
                                                "desc" => __('Upload logo of client 5','gxg_textdomain'),
                                                "id" => $shortname."_client5",
                                                "type" => "upload");

        
        $options[] = array( "name" => "Client 5 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client5url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 6",
                                                "desc" => __('Upload logo of client 6','gxg_textdomain'),
                                                "id" => $shortname."_client6",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 6 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client6url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 7",
                                                "desc" => __('Upload logo of client 7','gxg_textdomain'),
                                                "id" => $shortname."_client7",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 7 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client7url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 8",
                                                "desc" => __('Upload logo of client 8','gxg_textdomain'),
                                                "id" => $shortname."_client8",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 8 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client8url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 9",
                                                "desc" => __('Upload logo of client 9','gxg_textdomain'),
                                                "id" => $shortname."_client9",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 9 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client9url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 10",
                                                "desc" => __('Upload logo of client 10','gxg_textdomain'),
                                                "id" => $shortname."_client10",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 10 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client10url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 11",
                                                "desc" => __('Upload logo of client 11','gxg_textdomain'),
                                                "id" => $shortname."_client11",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 11 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client11url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 12",
                                                "desc" => __('Upload logo of client 12','gxg_textdomain'),
                                                "id" => $shortname."_client12",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 12 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client12url",
                                                "std" => "",
                                                "type" => "text");
        
        $options[] = array( "name" => "Client 13",
                                                "desc" => __('Upload logo of client 13','gxg_textdomain'),
                                                "id" => $shortname."_client13",
                                                "type" => "upload");
          
        $options[] = array( "name" => "Client 13 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client13url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 14",
                                                "desc" => __('Upload logo of client 14','gxg_textdomain'),
                                                "id" => $shortname."_client14",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 14 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client14url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 15",
                                                "desc" => __('Upload logo of client 15','gxg_textdomain'),
                                                "id" => $shortname."_client15",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 15 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client15url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 16",
                                                "desc" => __('Upload logo of client 16','gxg_textdomain'),
                                                "id" => $shortname."_client16",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 16 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client16url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 17",
                                                "desc" => __('Upload logo of client 17','gxg_textdomain'),
                                                "id" => $shortname."_client17",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 17 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client17url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 18",
                                                "desc" => __('Upload logo of client 18','gxg_textdomain'),
                                                "id" => $shortname."_client18",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 18 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client18url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 19",
                                                "desc" => __('Upload logo of client 19','gxg_textdomain'),
                                                "id" => $shortname."_client19",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 19 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client19url",
                                                "std" => "",
                                                "type" => "text");
                
        $options[] = array( "name" => "Client 20",
                                                "desc" => __('Upload logo of client 20','gxg_textdomain'),
                                                "id" => $shortname."_client20",
                                                "type" => "upload");
        
        $options[] = array( "name" => "Client 20 URL",
                                                "desc" => __('Enter full URL','gxg_textdomain'),
                                                "id" => $shortname."_client20url",
                                                "std" => "",
                                                "type" => "text");
                
//------------------------------------------------------------------------------
// CONTACT
//------------------------------------------------------------------------------

        $options[] = array( "name" => __('CONTACT','gxg_textdomain'),
                                                "type" => "heading",
                                                "img" => "/includes/admin/images/cont.png");

        $options[] = array( "name" => __('Set up Contact Section / Contact Page','gxg_textdomain'),
        "type" => "info");

        
        
        $options[] = array( "name" => __('Display Google Map','gxg_textdomain'),
                                                "id" => $shortname."_googlemap",
                                                "desc"  =>  __('Display Google Map in contact section / on contact page. This requires the "Basic Google Maps Placemarks" plugin','gxg_textdomain'),
                                                "std" => "0",
                                                "type" => "checkbox"); 
                                                
        $options[] = array( "name" => "Enter Contact Form 7 Shortcode",
                                                "desc" => __('Enter Contact Form 7 Shortcode to display a Contact Form in contact section / on contact page','gxg_textdomain'),
                                                "id" => $shortname."_cf7",
                                                "std" => "",
                                                "type" => "text");                                                

        return $options;
}