<!-- Start the Loop. -->
    
<ul id="blog-list" class="isotope-fluid">                
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
        <li id="post-<?php the_ID(); ?>" <?php post_class('element-blog'); ?>>
                
                        <?php if ( has_post_thumbnail() ) { ?>
                        	<div class="tnail">
                                        <a href="<?php the_permalink() ?>">
                                        	<?php  the_post_thumbnail(); ?>
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
                                                        posted in <?php echo get_the_category_list(', '); ?>
                                                </li>
                                                
                                                <?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?> 
                                                        <li class="comment-nr">
                                                                / with
                                                                <a href="<?php comments_link(); ?>">
                                                                <?php                                                
                                                                echo comments_number(' 0 ', ' 1 ', ' % ');
                                                                _e('comments', 'gxg_textdomain');
                                                                ?> </a> 
                                                        </li>
                                                <?php } ?>                                               
                                                
                                                <?php if (of_get_option('gg_author') &&  comments_open() ) { ?> 
                                                        <li class="author">
                                                                / by <?php echo the_author_posts_link(); ?>
                                                        </li>
                                                <?php } ?>
                                                
                                                <?php if ( has_tag() ) { ?>
                                                <li class="tags">                                                
                                                        / tags: <?php echo the_tags('', ', ', '' ); ?>
                                                </li>  
                                                <?php } ?> 
                                                
                                        </ul>
                                        
                                </div> <!-- .postinfo --> 		                                
      
                                <div>
                                       <?php the_content(__('<span class="moretext"> read more </span>', 'gxg_textdomain')); ?>   
                                </div>
                                
                        </div>
                        
                </div>

        </li>

        <?php endwhile; else: ?>
        
        <!-- what if there are no Posts? -->
        <li id="no_posts" class="">
        <p> <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
        </li>
        
        <!-- REALLY stop The Loop. -->
        <?php endif; ?>
     
</ul>