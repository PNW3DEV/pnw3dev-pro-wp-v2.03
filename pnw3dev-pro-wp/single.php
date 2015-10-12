<?php get_header(); ?>
   
        <!-- Start the Loop. -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <div class="blog-content  grid_9">
        
                <article class="single-blogentry">
        
                        <?php if ( has_post_thumbnail() ) { ?>
                                <div class="tnail">
                                <?php   the_post_thumbnail('single'); ?>
                                </div> <!-- .tnail -->
                        <?php } ?>

                        <div class="post-date-single">
                                <?php the_time('Y / M / d') ?>
                        </div> <!-- .post-date-->

                        <?php if (of_get_option('gg_share') ) { ?> 
                                <div class="social-share">    
                                        <ul class="share">
                                                <li class="sharetitle"><?php _e('share:', 'gxg_textdomain'); ?></li>
                                                <li class="fb-share">
                                                        <a href="#" 
                                                        onclick="
                                                            window.open(
                                                                'http://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo get_permalink( $post->ID ); ?>&amp;p[title]=<?php the_title(); ?>', 
                                                                'facebook-share-dialog', 
                                                                'width=626,height=436'); 
                                                                return false;">
                                                        <i class="fa fa-facebook"></i>
                                                        </a>
                                                </li>
                                                <li class="twitter-share">
                                                        <a href="#" 
                                                        onclick="
                                                        window.open(
                                                                'https://twitter.com/intent/tweet?text=<?php the_title(); ?> <?php echo get_permalink( $post->ID ); ?>', 
                                                                'twitter-share', 
                                                                'width=626,height=460'); 
                                                                return false;">
                                                        <i class="fa fa-twitter"></i>
                                                        </a>
                                                </li>                                                          
                                        </ul>                                                     
                                </div>                                        
                        <?php } ?>  
                        <div class="clear"></div>
                                                  
                        <h1 class="single-blogtitle"> <?php the_title(); ?> </h1>  
  
                        <div class="postinfo">
                                <ul>    
                                        <li class="categories">
                                                posted in: <?php echo get_the_category_list(', '); ?>
                                        </li>
                                        
                                        <?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { ?> 
                                                <li class="comment-nr">
                                                        / with <a href="<?php comments_link(); ?>">
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
  
                        <div class="single-blog-content">  
                                <?php the_content(); ?>
                        </div>
                  
                        <div class="clear"> </div>
                        
                        <div class="single-post-pagination"> 
                                <?php wp_link_pages(); ?>
                        </div>
                
	                <?php endwhile; else: ?>
	                
	                <!-- what if there are no Posts? -->
	                <div id="no_posts">
	                <p> <br /> <br />  <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
	                </div>
	                
	                <!-- REALLY stop The Loop. -->
	                <?php endif; ?>
                
                </article> <!-- .single-blogentry -->
        
        
        <?php if (!of_get_option('gg_commentremove') &&  comments_open() ) { 
                        comments_template();   
        } ?>                           
        
        </div> <!-- .grid9 -->

        <aside id="sidebar" class="grid_3 omega widget-area">
                <?php  if ( is_active_sidebar( 'main_sidebar' ) ) :  ?>
                     	<?php dynamic_sidebar( 'main_sidebar' ); ?>
                <?php endif; ?>
        </aside>    
        
<?php get_footer(); ?>