<?php

// Custom Taxonomy Portfolio Category
add_action( 'init', 'taxonomy_portfoliocategory', 0 );

function taxonomy_portfoliocategory() {
        $labels = array(
                'name' => __( 'Portfolio Categories', 'gxg_textdomain' ),
                'singular_name' => __( 'Portfolio Category', 'gxg_textdomain' ),
                'search_items' =>  __( 'Search Portfolio Category', 'gxg_textdomain' ),
                'all_items' => __( 'All Portfolio Categories', 'gxg_textdomain' ),
                'parent_item' => __( 'Parent Portfolio Category', 'gxg_textdomain' ),
                'parent_item_colon' => __( 'Parent Portfolio Category:', 'gxg_textdomain' ),
                'edit_item' => __( 'Edit Portfolio Category', 'gxg_textdomain' ), 
                'update_item' => __( 'Update Portfolio Category', 'gxg_textdomain' ),
                'add_new_item' => __( 'Add New Portfolio Category', 'gxg_textdomain' ),
                'new_item_name' => __( 'New Portfolio Category Name', 'gxg_textdomain' ),
                'menu_name' => __( 'Portfolio Category', 'gxg_textdomain' ),
        ); 	

register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'portfoliocategory' ),
        )
);
} 


// REGISTER PORTFOLIO POST TYPE

add_action('init', 'posttype_portfolio');

function posttype_portfolio() {
        $labels = array(
                'name' => __('Portfolio', 'gxg_textdomain'),
                'singular_name' => __('Portfolio Item', 'gxg_textdomain'),
                'add_new' => __('Add Portfolio Item', 'gxg_textdomain'),
                'add_new_item' => __('Add New Portfolio Item','gxg_textdomain'),
                'edit_item' => __('Edit Portfolio Item','gxg_textdomain'),
                'new_item' => __('New Portfolio Item','gxg_textdomain'),
                'view_item' => __('View Details','gxg_textdomain'),
                'search_items' => __('Search Portfolio Items','gxg_textdomain'),
                'not_found' =>  __('No Portfolio Item found with that criteria','gxg_textdomain'),
                'not_found_in_trash' => __('No Portfolio Item was found in the Trash with that criteria','gxg_textdomain'),
                'view' =>  __('View Portfolio Item','gxg_textdomain')
        );

        $imagepath =  get_template_directory_uri() . '/images/posttypeimg/';
        
        global $wp_version;
	if( version_compare( $wp_version, '3.8', '>=') ) {
	    	$img =  'po.png';
	} else {
		$img =  'po_.png';
	}

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Events',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => array( 'slug' => 'portfolioitem' ),
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . $img,
                'supports' => array('thumbnail','title', 'editor','revisions')

        );

register_post_type('portfolio',$args);
}

?>