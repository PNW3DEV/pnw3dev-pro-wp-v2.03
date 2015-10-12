<?php

// REGISTER EVENTS POST TYPE

add_action('init', 'posttype_team');

function posttype_team() {
        $labels = array(
                'name' => __('Team', 'gxg_textdomain'),
                'singular_name' => __('Team Member', 'gxg_textdomain'),
                'add_new' => __('Add Team Member', 'gxg_textdomain'),
                'add_new_item' => __('Add New Team Member','gxg_textdomain'),
                'edit_item' => __('Edit Team Member','gxg_textdomain'),
                'new_item' => __('New Team Member','gxg_textdomain'),
                'view_item' => __('View Team Member','gxg_textdomain'),
                'search_items' => __('Search Team','gxg_textdomain'),
                'not_found' =>  __('No Team Member was found with that criteria','gxg_textdomain'),
                'not_found_in_trash' => __('No Team Member was found in the Trash with that criteria','gxg_textdomain'),
                'view' =>  __('View Team Member','gxg_textdomain')
        );

        $imagepath =  get_template_directory_uri() . '/images/posttypeimg/';

        global $wp_version;
	if( version_compare( $wp_version, '3.8', '>=') ) {
	    	$img =  'st.png';
	} else {
		$img =  'st_.png';
	}

        $args = array(
                'labels' => $labels,
                'description' => 'This is the holding location for all Team Members',
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'rewrite' => true,
                'hierarchical' => true,
                'menu_position' => 5,
                'menu_icon' => $imagepath . $img,
                'supports' => array('thumbnail', 'editor', 'title','revisions'),
        );

register_post_type('team',$args);
}

?>