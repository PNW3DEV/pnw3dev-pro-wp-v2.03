<?php


/** AUTOMATICALLY ADD REL PRETTYPHOTO TO <A> TAGS THAT LINK TO AN IMAGE********/
add_filter('the_content', 'gg_lightboxrel_replace', 12);
add_filter('get_comment_text', 'gg_lightboxrel_replace');

function gg_lightboxrel_replace ($content) {
         global $post;
         $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
         $replacement = '<a$1href=$2$3.$4$5 class="pretty_image" data-rel="prettyPhoto['.$post->ID.']"$6>$7</a>';
         $content = preg_replace($pattern, $replacement, $content);
         return $content;
}



/** PAGINATION ****************************************************************/
function gg_pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;

	global $paged;
	if ( empty($paged) ) {
		$paged = 1;
	}
	
	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}

	if (1 != $pages) {
		
	         echo "<div class='pagination_main'>";
	         
	         if ($paged > 2 && $paged > $range+1 && $showitems < $pages) {
	         	echo "<a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a>";
	         }
	         
	         if ($paged > 1 && $showitems < $pages) {
	         	echo "<a href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i></a>";
	         }
	         
	         for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
	             	}
	         }
	
	         if ($paged < $pages && $showitems < $pages) {
	         	echo "<a href='".get_pagenum_link($paged + 1)."'><i class='fa fa-angle-right'></i></a>";
	         }
	         
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
	         echo "<a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a>";
	         }
	         
	         echo "</div>\n";
	}
}



/** STYLE COMMENTS ************************************************************/
function gg_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        
        static $counter;
        if (!isset($counter))
        $counter = $args['per_page'] * ($args['page'] - 1) + 1;
        elseif ($comment->comment_parent==0) {
        $counter++;
        }
        
        ?>   
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        
                <div id="comment-<?php comment_ID(); ?>" class="single-comment">
                
                        <div class="comment-left comment-author vcard">
                           <?php echo get_avatar( $comment->comment_author_email, 56 ); ?>
                        </div>
                        
                        <div class="comment-body">
                                
                                <div class="comment-meta commentmetadata">
                                        <?php printf('<cite class="fn">%s</cite>', get_comment_author_link()) ?>
                                        <div class="comment-date">
                                                <?php comment_time('F jS, Y') ?>
                                        </div>                                  
                                </div>
                                
                                <div class="comment-text">
                                        <?php if ($comment->comment_approved == '0') : ?>
                                           <em class="moderation"><?php _e('Your comment is awaiting moderation.', 'gxg_textdomain') ?></em>
                                           <br />
                                        <?php endif; ?>
                                                    
                                        <?php comment_text() ?>
                                </div>
                        </div>
                        
                        <div class="comment-right">
                                <span class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
                                
                                <div class="comment-counter"><?php echo $counter; ?> </div>
                                <div class="comment-arrow"> <i class="fa fa-arrow-up"></i> </div>
                        </div>        
                </div>
<?php
}



/** MAPS SHORTCODE ON HOMEPAGE ************************************************/

function bgmpShortcodeCalled() {
	global $post;

	if( ( function_exists( 'is_front_page' ) && is_front_page() ) || ( function_exists( 'is_home_page' ) && is_home_page() ) || is_page_template('template-contact.php') ) {
        		add_filter( 'bgmp_map-shortcode-called', '__return_true' );
        	}
}

add_action( 'wp', 'bgmpShortcodeCalled' );


?>