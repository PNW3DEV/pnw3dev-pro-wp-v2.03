        <ul id="home-query" class="isotope-fluid">        

                <?php
                $query = new WP_Query();
                $posts_number = of_get_option('gg_posts_number');
                $query->query('posts_per_page=' . $posts_number);
                while ($query->have_posts()) : $query->the_post(); 
		
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 630,400 ), false );
		$placeholder_image = get_template_directory_uri() . '/images/ll.png'; // lazyload
		$detect = new Mobile_Detect();
                ?>
  
                        <li id="post-<?php the_ID(); ?>" <?php post_class(' element-blog'); ?>>
                
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
                                                                        <?php _e('posted in', 'gxg_textdomain'); ?> <?php echo get_the_category_list(', '); ?>
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