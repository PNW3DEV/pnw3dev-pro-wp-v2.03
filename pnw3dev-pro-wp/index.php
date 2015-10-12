<?php get_header(); ?>

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

<?php get_footer(); ?>