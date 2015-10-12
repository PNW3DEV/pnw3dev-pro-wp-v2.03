<?php

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly.');

if ( post_password_required() ) { ?>
        <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'gxg_textdomain') ?></p>
<?php
return;
}
?>


<h6 id="comments-number"> <?php comments_number(__('No Comments.', 'gxg_textdomain'), __('One Comment', 'gxg_textdomain'), __('% Comments', 'gxg_textdomain')); ?></h6>

<!-- Display the comments -->
<?php if ( have_comments() ) { ?>

	<?php $counter = 0; ?>
	
        <ol class="commentlist">
                <?php wp_list_comments('type=comment&callback=gg_comment'); ?>                
        </ol>
        
<?php }  ?>


<div class="nav_pagination_bottom">
        <?php paginate_comments_links( array(
            	'prev_text'    => '<i class="fa fa-angle-left"></i>',
    		'next_text'    => '<i class="fa fa-angle-right"></i>'
       ) ); ?>
</div>
<div class="clear"> </div>


<!-- Display the comment form -->
<?php comment_form(); ?>