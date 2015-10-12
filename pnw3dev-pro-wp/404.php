<?php get_header(); ?>

        <div class="blog-content page-wrap grid_12">

		       <div id="error404"> <!-- Error Message -->
		       <?php
		       if ( of_get_option('gg_404error') ) {
		       ?>
		       		<?php echo stripslashes(of_get_option('gg_404error')); ?>
		       <?php } else {
		       ?>
		       		<h1> <?php _e('404', 'gxg_textdomain'); ?></h1>  
		       		<h2> <?php _e('Not Found', 'gxg_textdomain'); ?></h2> 	
		       		<p> <?php _e('The page you requested does not exist.', 'gxg_textdomain'); ?></p> 
		       <?php       
		       }
		       ?>
		       </div><!-- #error-->   
        
        </div>
        
<?php get_footer(); ?> 