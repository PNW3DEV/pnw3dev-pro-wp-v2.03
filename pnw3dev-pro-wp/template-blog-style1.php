<?php
/*
Template Name: Blog 1 Column with Sidebar
*/
?>

<?php get_header(); ?>

<div class="blog-style1-wrap">

        <div class="blog-content grid_9">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="topcontent">
                <?php the_content(); ?>
                </div>
        <?php endwhile; endif; ?>                 
                
	        <ul class="blog-regular">        
	
 			<?php
			$query = new WP_Query();
			$postsperpage = get_option('posts_per_page');
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	                
			$args = array(                                      
                        	'posts_per_page' => $postsperpage,
                        	'paged' => $paged
                        );
			$query->query($args);
	                
			// Pagination fix
			$temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $query;
	                
	                while ($query->have_posts()) : $query->the_post(); 
			
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single');
			$placeholder_image = get_template_directory_uri() . '/images/ll.png'; // lazyload
			$detect = new Mobile_Detect();	
	                ?>
  
                        <li id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
                
                        <?php if ( has_post_thumbnail() ) { ?>
                        	<div class="tnail">
                                        <a href="<?php the_permalink() ?>">
					
						<?php if ( !$detect->isMobile() && of_get_option('gg_lazyload') ) { ?>
							<img data-original="<?php echo $thumb[0]; ?>" class="lazy" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="" src="<?php echo $placeholder_image; ?>">
						<?php } else { ?>
							<img src="<?php echo $thumb[0]; ?>" width="<?php echo $thumb[1]; ?>" height="<?php echo $thumb[2]; ?>" alt="" >
						<?php } ?>
						
                                        </a>                            
			</div> <!-- .tnail -->
                        <?php }
                        ?>
                 
                                <div class="post-content">                        
                
                                        <div class="post-date-regular">
                                                <div class="date-t">
                                                        <div class="m"><?php the_time('M') ?></div>
                                                        <div class="y"><?php the_time('Y') ?></div>
                                                </div> 			        
                                                <div class="d"><?php the_time('d') ?></div>
                                        </div> <!-- .post-date-->   
                                        
                                         <div class="post-date-responsive">
                                                        <?php the_time('Y / M / d') ?>
                                                        <div class="clear"></div>
                                        </div> <!-- .post-date-->          
                             
                                        <div class="blog-right">
                                                
                                                <h1 class="blogtitle">
                                                        <a href="<?php the_permalink() ?>" class="primary-color" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?>
                                                        </a>
                                                </h1>
                       
                                                <div class="postinfo">
                                                        
                                                        <ul>   
                                                                <li class="categories">
                                                                        <?php _e('poste in', 'gxg_textdomain'); ?> <?php echo get_the_category_list(', '); ?>
                                                                </li>
                                                                
                                                                <?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?> 
                                                                        <li class="comment-nr">
                                                                                / <?php _e('with', 'gxg_textdomain'); ?>
                                                                                <a href="<?php comments_link(); ?>">
                                                                                <?php                                                
                                                                                echo comments_number(' 0 ', ' 1 ', ' % ');
                                                                                _e('comments', 'gxg_textdomain');
                                                                                ?> </a> 
                                                                        </li>
                                                                <?php } ?>                                               
                                                                
                                                                <?php if (of_get_option('gg_author') &&  comments_open() ) { ?> 
                                                                        <li class="author">
                                                                                / <?php _e('by', 'gxg_textdomain'); ?> <?php echo the_author_posts_link(); ?>
                                                                        </li>
                                                                <?php } ?> 
                                                                
                                                              <?php if ( has_tag() ) { ?>
                                                              <li class="tags">                                                
                                                                        / <?php _e('tags', 'gxg_textdomain'); ?>: <?php echo the_tags('', ', ', '' ); ?>
                                                              </li>  
                                                              <?php } ?>	                                                                 
                                                        </ul>
                                                        
                                                </div> <!-- .postinfo --> 		                                
                      
                                                <div class="excerpt">
                                                        <?php global $more; $more = 0; ?>
                                                        <?php the_content(__('<span class="moretext"> read more </span>', 'gxg_textdomain')); ?>     
                                                </div>
                                                
                                        </div>
                                        
                                </div>
                
                        </li>

	                <?php endwhile;  ?>
	        </ul>
                
                <div id="pagination">
                        <?php gg_pagination(); ?>
                </div><!-- #pagination-->

		<?php 
		// Reset main query object
		$wp_query = NULL;
		$wp_query = $temp_query;
		?>
                
        </div>       
   
        <aside id="sidebar" class="grid_3 omega">
                <?php  if ( is_active_sidebar( 'main_sidebar' ) ) :  ?>
                <div id="main_sidebar" class="widget-area">
                     	<?php dynamic_sidebar( 'main_sidebar' ); ?>
                </div><!-- #main_sidebar .widget-area -->
                <?php endif; ?>
        </aside>  

</div>
    
<?php get_footer(); ?>