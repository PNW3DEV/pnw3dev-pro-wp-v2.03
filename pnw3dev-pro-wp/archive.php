<?php get_header(); ?>
                        
        <div class="blog-content grid_12">
                                        
                      <h1 class="pagetitle text-center">
                        <?php
                        global $wp_query;
                        $curauth = $wp_query->get_queried_object();
                        ?>

                        <?php /* If this is a category archive */ if (is_category()) { ?>
                        <?php echo single_cat_title(); ?>

                        <?php /* If this is a tags archive */ } elseif (is_tag()) { ?>
                        <?php echo single_tag_title(); ?>

                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                        <?php _e('All posts on', 'gxg_textdomain') ?> <span class="themecolor"> <?php the_time('F jS, Y'); ?></span>

                        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                        <?php _e('All posts in', 'gxg_textdomain') ?>  <span class="themecolor"> <?php the_time('F Y'); ?></span>

                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                        <?php _e('All posts in', 'gxg_textdomain') ?>  <span class="themecolor"> <?php the_time('Y'); ?></span>

                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                        <?php _e('Author', 'gxg_textdomain') ?> <span class="themecolor"> <?php echo $curauth->nickname; ?></span>

                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                        <?php _e('Blog Archives', 'gxg_textdomain') ?>
                        <?php } ?>                        
                        </h1>               





			<?php if ( of_get_option('gg_bloglayout') == "masonry" ) { 
			       	$blogclass = 'blog-style2';
			 } elseif ( of_get_option('gg_bloglayout') == "masonrysidebar" ) { 
			        	$blogclass = 'blog-style3';
			 } else { 
			       	$blogclass = 'blog-style1';
			} ?>
			
			
			
			<div class="<?php echo $blogclass; ?>-wrap">
			
				<?php if ( of_get_option('gg_bloglayout') == "masonry" ) { ?>
			        		<div class="blog-content blog-style2 grid_12">
				<?php } elseif ( of_get_option('gg_bloglayout') == "masonrysidebar" ) { ?>
				        	<div class="blog-content blog-style3 grid_9">
				<?php } else {?>
			        		<div class="blog-content blog-style1 grid_9">
				<?php } ?>
			        
					<?php if ( of_get_option('gg_bloglayout') == "1col" ) {
						get_template_part('loop');
					} else {
				                get_template_part('loop-masonry'); 
				          } ?>
			                
			                <nav id="pagination">
						<?php if (function_exists('gg_pagination')) {
							gg_pagination();
						}
						 else {
							 posts_nav_link();
						} ?>
			                </nav><!-- #pagination-->
			                
			        </div>    
			        
				<?php if ( of_get_option('gg_bloglayout') == "1col" or of_get_option('gg_bloglayout') == "masonrysidebar") { ?>
					
			        		<aside id="sidebar" class="sidebar-<?php echo $blogclass; ?> grid_3 omega">
						<?php  if ( is_active_sidebar( 'main_sidebar' ) ) :  ?>
						<div id="main_sidebar" class="widget-area">
							<?php dynamic_sidebar( 'main_sidebar' ); ?>
						</div><!-- #main_sidebar .widget-area -->
						<?php endif; ?>
			        		</aside>  	
			        <?php } ?>
			
			</div>






        </div>
        
        <div class="clear"></div> 
        <nav id="pagination">
                <?php gg_pagination(); ?>
        </nav><!-- #pagination-->             

<?php get_footer(); ?>