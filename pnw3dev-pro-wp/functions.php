<?php

/****************************************
*****************************************
** ! Be very cautious editing this file
** so that you don't break the theme.
** I recommend making a copy before you
** edit this file !  
*****************************************
****************************************/

/** SIDEBARS ******************************************************************/
if ( function_exists('register_sidebar') ) {

register_sidebar(array(
        'name'=>'sidebar main',
        'id' => 'main_sidebar',
        'description' => __( 'main sidebar', 'gxg_textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle"> ',
        'after_title' => '</h3>',
        ));
}




/** MENUS *********************************************************************/

//regular menu
if (function_exists('wp_nav_menu')) {
        function gg_register_my_menus() {
                register_nav_menus(
                array(
                        'main-menu' => __( 'RED:FOLIO Main Menu', 'gxg_textdomain' ),
                )
         	);
        }
        add_action( 'init', 'gg_register_my_menus' );

}

//responsive menu
function wp_nav_menu_select( $args = array() ) {
     
        $defaults = array(
                'theme_location' => '',
                'menu_class' => 'select-menu',
        );
         
        $args = wp_parse_args( $args, $defaults );
         
        if ( ( $menu_locations = get_nav_menu_locations() ) && isset( $menu_locations[ $args['theme_location'] ] ) ) {
                $menu = wp_get_nav_menu_object( $menu_locations[ $args['theme_location'] ] );
             
                $menu_items = wp_get_nav_menu_items( $menu->term_id );

                ?>
                        <select id="menu-<?php echo $args['theme_location'] ?>" class="<?php echo $args['menu_class'] ?>">
                                <?php
                                foreach( (array) $menu_items as $key => $menu_item ) :
                                
                                        $display = get_post_meta($menu_item->object_id, "gxg_display", true);
                                        $pageID = get_post_meta( $menu_item->ID, '_menu_item_object_id', true );

					if ( $menu_item->object == 'page' && $display == true && is_page_template('template-frontpage.php') ) {
						$menuURL = '#section-' . $pageID;
					} elseif ( $menu_item->object == 'page' && $display == true ) {                                                     
						$menuURL = home_url() . '#section-' . $pageID;
					} else {              
						$menuURL = $menu_item->url;
					}
					
                                        ?>
                                        <option value="<?php echo $menuURL; ?>" class="<?php echo $menu_item->classes[0]; ?>"><?php echo $menu_item->title; ?></option>
                                <?php endforeach; ?>
                        </select>
                        <div id="navi-icon"><i class="fa fa-bars"></i></div>
                <?php
        }
}

//menu walker
if( !class_exists('ID_walker') ){

class ID_walker extends Walker_Nav_Menu {
	

        
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                
                global $wp_query;
                                
                $postID = get_post($item->object_id);                
                $pageID = get_post_meta( $item->ID, '_menu_item_object_id', true );                
                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';     
                $class_names = $value = '';    
                $classes = empty( $item->classes ) ? array() : (array) $item->classes;     
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
                $class_names = ' class="gxg-'. $postID->post_name . ' ' . esc_attr( $class_names ) . ' "';
                     
                $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
     
                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

                $display = get_post_meta($item->object_id, "gxg_display", true);
                
                if ( $item->object == 'page' && is_front_page() && $display == true  ) {
	                $attributes .= ' class="section-' . $pageID . '" href="#' . 'section-' . $pageID . '"';
	        	} elseif ( $item->object == 'page' && !is_front_page() && $display == true ) {			
	                $attributes .= ' class="section-' . $pageID . '" href="' . home_url() . '#' . 'section-' . $pageID . '"'; 	                		
				} else {			
	                $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';		
				}                
     
                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
                //$item_output .= $description.$args->link_after;
                $item_output .= '</a>';
                $item_output .= $args->after;
     
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
        
}




/** EXCERPT LENGTH AND READ MORE LINK *****************************************/
function gg_new_excerpt_length($length) {
        return 30;
}
add_filter('excerpt_length', 'gg_new_excerpt_length');

function gg_new_excerpt_more($more) {
global $post;
return '...<br /><br /><a class="moretext" href="'.
get_permalink($post->ID) . '"> read more</a>';
}
add_filter('excerpt_more', 'gg_new_excerpt_more');

function gg_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'gg_remove_more_link_scroll' );




/** SORT SEARCH RESULT ********************************************************/
function gg_searchfilter($query) {
    if ($query->is_search && !is_admin()) {
        if (isset($query->query["post_type"])) {
            $query->set('post_type', $query->query["post_type"]);
        } else {
            $query->set('post_type', 'portfolio');
        }
    }
    return $query;
}
add_filter('pre_get_posts','gg_searchfilter');





/** CONTENT WIDTH *************************************************************/
if ( ! isset( $content_width ) )
        $content_width = 1000;




/** THUMBNAILS ****************************************************************/
if (function_exists('add_theme_support')) {
        add_theme_support( 'post-thumbnails' );  
        set_post_thumbnail_size(630, 400, true); // default
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size('single', 840, 340, true);
	add_image_size('mobile', 840, 0, false);
	add_image_size('square-small', 225, 225, true); 
	add_image_size('square', 450, 450, true); 
	add_image_size('landscape', 450, 285, true);
	add_image_size('video', 450, 254, true);
	add_image_size('portrait', 450, 675, true);
	add_image_size('portrait2', 250, 500, true);
}




/** FEED LINKS ****************************************************************/
add_theme_support('automatic-feed-links');


/** INCLUDE SHORTCODES ********************************************************/
include_once(get_template_directory() . '/includes/shortcodes/shortcodes.php');


/** INCLUDE THEME OPTIONS******************************************************/
$admin_path = get_template_directory() . '/includes/admin/';
require_once ($admin_path . 'options-framework.php');


/** INCLUDE RETINA STYLES ******************************************************/
$options_path = get_template_directory() . '/css/';
include_once ($options_path . 'retina.php');


/** INCLUDE THEME FUNCTIONS ***************************************************/
$functions_path = get_template_directory() . '/includes/functions/';
include_once ($functions_path . 'theme_functions.php');
include_once ($functions_path . 'mobile_detect.php');


/** INCLUDE TGM PLUGIN ACTIVATION *********************************************/
$tgm_path = get_template_directory() . '/includes/tgm-plugin-activation/';
include_once ($tgm_path . 'tgm-activation.php');


/** INCLUDE CUSTOM POST TYPES *************************************************/
include_once(get_template_directory() . '/includes/posttypes/portfolio.php');
include_once(get_template_directory() . '/includes/posttypes/team.php');


/** THEME TRANSLATION *********************************************************/
$lang = get_template_directory();
load_theme_textdomain('gxg_textdomain', $lang);




/** INCLUDE META BOXES*********************************************************/
define( 'RWMB_URL', trailingslashit( get_template_directory_uri().'/includes/metaboxes' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory().'/includes/metaboxes' ) );
require_once RWMB_DIR . 'meta-box.php';
include get_template_directory().'/includes/metaboxes/config-meta-boxes.php';




/** CUSTOM GRAVATAR ***********************************************************/
function gg_custom_gravatar( $avatar_defaults ) {
    $gg_avatar = of_get_option('gg_gravatar');
    $avatar_defaults[$gg_avatar] = 'Custom Gravatar';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'gg_custom_gravatar' );


/** FLUSH PERMALINKS **********/
function rewrite_rules_on_theme_activation() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'rewrite_rules_on_theme_activation' );


/** INCLUDE WOOCOMMERCE FUCTIONS IF ACTIVATED IN THEME OPTIONS PANEL **********/
if ( of_get_option('gg_woo') ) {

        //declare WooCommerce support
        add_theme_support('woocommerce');
        
        //include woocommerce functions
        $functions_path = TEMPLATEPATH . '/woocommerce/functions/';
        include_once ($functions_path . 'woocommerce_functions.php');

        //register woocommerce sidebar
        register_sidebar(array(
                  'name'=>'sidebar woocommerce',
                  'id' => 'woocommerce_sidebar',
                  'description' => __( 'sidbar for woocommerce template', 'gxg_textdomain' ),
                  'before_widget' => '<div id="%1$s" class="widget %2$s">',
                  'after_widget' => '</div>',
                  'before_title' => '<h3 class="widgettitle">',
                  'after_title' => '</h3>', ));
        
        //deactivate default WooCommerce styles
        add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
        function jk_dequeue_styles( $enqueue_styles ) {
        unset( $enqueue_styles['woocommerce-general'] ); // Remove the gloss
        return $enqueue_styles;
        }

         // load woo stylesheets       	     
	function gg_woo() {		
         	if (!is_admin()) { 
                	wp_register_style('woo', get_template_directory_uri().'/woocommerce/css/woocommerce.css', false, 'screen');
                        wp_enqueue_style('woo');
         	}	                  	                            
	}
	add_action('init', 'gg_woo');   
       
	
        
        
	// load woo dynamic styles
	$options_path = get_template_directory() . '/woocommerce/css/';
	include_once ($options_path . 'woocommerce_css_options_panel.php');
                 
}



/** FLUSH REWRITE RULES ON THEME ACTIVATION ***********************************/
add_action( 'after_switch_theme', 'gg_flush_rewrite_rules' );

function gg_flush_rewrite_rules() {
     flush_rewrite_rules();
}



/** JQUERY AND STYLESHEETS ****************************************************/
function gg_register_scripts() {
        if (!is_admin()) {
                wp_register_script('waypoints', get_template_directory_uri().'/js/jquery.waypoints.js', array('jquery'), '2.0.4', true);
                wp_register_script('waypoints-sticky', get_template_directory_uri().'/js/jquery.waypoints-sticky.js', array('jquery'), '2.0.4', true);
                wp_register_script('scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'), ' ', true);
				wp_register_script('queryloader', get_template_directory_uri().'/js/jquery.queryloader2.js', array('jquery'), '2.9.0', true);
                wp_register_script('neatload', get_template_directory_uri().'/js/jquery.neatshow.js', array('jquery'), '1.2', true);
                wp_register_script('prettyphoto', get_template_directory_uri().'/js/jquery.prettyphoto.js', array('jquery'), '3.1.5', true);   
                wp_register_script('stellar', get_template_directory_uri().'/js/jquery.stellar.js', array('jquery'), '0.6.1', true);
                wp_register_script('parallax', get_template_directory_uri().'/js/jquery.parallax.js', array('jquery'), '1.1.3', true);
                wp_register_script('easing', get_template_directory_uri().'/js/jquery.easing.js', array('jquery'), '1.3', true);                          
                wp_register_script('superfish', get_template_directory_uri().'/js/jquery.superfish.js', array('jquery'), '1.4.8', true);
                wp_register_script('lazyload', get_template_directory_uri().'/js/jquery.lazyload.min.js', array('jquery'), '1.9.3', true);
                wp_register_script('isotope', get_template_directory_uri().'/js/jquery.isotope.js', array('jquery'), '1.5.25', true);
                wp_register_script('fittext', get_template_directory_uri().'/js/jquery.fittext.js', array('jquery'), '1.1', true);
                wp_register_script('fitvids', get_template_directory_uri().'/js/jquery.fitvids.js', array('jquery'), '1.1', true);
                wp_register_script('selectbox', get_template_directory_uri().'/js/jquery.selectbox.js', array('jquery'), '0.2', true);

                wp_register_style('ruda', '//fonts.googleapis.com/css?family=Ruda:400,700,900', false, 'screen');
                wp_register_style('sourcesanspro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:100,400,700,900', false, 'screen'); 
                wp_register_style('lato', '//fonts.googleapis.com/css?family=Lato:400,700,900', false, 'screen');               
                wp_register_style('iconfont', get_template_directory_uri().'/fonts/fontawesome/font-awesome.min.css', false, 'screen');
                wp_register_style('prettyphoto', get_template_directory_uri().'/css/prettyphoto.css', false, 'screen');
                wp_register_style('shortcodes', get_template_directory_uri().'/css/shortcodes.css', false, 'screen');
                wp_register_style('responsive', get_template_directory_uri().'/css/layout-responsive.css', false, 'screen');   
        }
}
add_action('init', 'gg_register_scripts');


function gg_enqueue_scripts() {
        
        global $wp_styles;
        
        if (!is_admin()) {
                wp_enqueue_script('jquery');
                wp_enqueue_script('jquery-ui-core');
                wp_enqueue_script('jquery-ui-widget');
                wp_enqueue_script('jquery-ui-tabs');  
				wp_enqueue_script('queryloader');		
                wp_enqueue_script('waypoints');
                wp_enqueue_script('waypoints-sticky');
                wp_enqueue_script('neatload');
                wp_enqueue_script('stellar');
                wp_enqueue_script('parallax');
                wp_enqueue_script('prettyphoto');
                wp_enqueue_script('easing');
                wp_enqueue_script('superfish');
                wp_enqueue_script('lazyload');
                wp_enqueue_script('isotope');
                wp_enqueue_script('fittext');
                wp_enqueue_script('fitvids');
                wp_enqueue_script('selectbox');
                wp_enqueue_script('scripts');              
                
                wp_enqueue_style('style', get_stylesheet_uri() );
                wp_enqueue_style('dashicons');
                wp_enqueue_style('ruda');
                wp_enqueue_style('sourcesanspro');
                wp_enqueue_style('lato');
                wp_enqueue_style('iconfont');
                wp_enqueue_style('prettyphoto');
                wp_enqueue_style('shortcodes');
                wp_enqueue_style('responsive');
        }
}
add_action('wp_enqueue_scripts', 'gg_enqueue_scripts');


// load on frontpage template
function gg_frontpage_scripts() {
	
	if (is_page_template('template-frontpage.php') && of_get_option('gg_twitter_id'))
                wp_register_script('twitter', get_template_directory_uri().'/js/jquery.twitterpostfetcher.js', array('jquery'), '13.0', true);
   				wp_enqueue_script('twitter');   
   				             
}
add_action('wp_enqueue_scripts', 'gg_frontpage_scripts');


// load dynamic Google fonts
if ( of_get_option('gg_font') ) {
        function gg_register_fonts() {
                $font = of_get_option('gg_font');
                  
		if ( of_get_option('gg_fontweight') ) { 
                		$fontweight = of_get_option('gg_fontweight');
                	} else { 
                		$fontweight = '700,900';
                	}
        	
                if (!is_admin() && of_get_option('gg_font')) {
                        wp_register_style('googleFont', '//fonts.googleapis.com/css?family='.$font.':400,'.$fontweight); 
                }
        }
        add_action('init', 'gg_register_fonts');

        function gg_enqueue_fonts() {
                global $wp_styles;
                if (!is_admin()) {
                        wp_enqueue_style( 'googleFont');  
                }
        }
        add_action('wp_enqueue_scripts', 'gg_enqueue_fonts');       
}


// load on single pages
function gg_single_scripts() {
        if ( is_singular() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );
        }
add_action('wp_enqueue_scripts', 'gg_single_scripts');




/** INCLUDE DYNAMIC CSS STYLES ****************************************/
$options_path = get_template_directory() . '/css/';
include_once ($options_path . 'dynamic-css.php');

?>