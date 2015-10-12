<?php get_header(); ?>

	<!--
        <?php
                $args = array(
                                'delimiter' => ' <i class="fa fa-chevron-right"></i> ',
                                'home' => 'Home',
                );
        ?>
        <?php woocommerce_breadcrumb( $args ); ?>
	-->
        
        <div class="grid_9">
                
	        <div class="content page-wrap">
	        
	                <div class="page-content">
                                
                        	<?php woocommerce_content(); ?>
                                
	                </div><!-- .page-content-->
	                
	                <div class="clear">
	                </div><!-- .clear-->
	                
	           </div>
	
	</div>
	                
	                
	                
        <?php if ( is_active_sidebar( 'woocommerce_sidebar' ) ) :  ?>
        
        <div id="sidebar" class="grid_3 omega">  
                 <div id="woocommerce_sidebar" class="widget-area">
                      <?php dynamic_sidebar( 'woocommerce_sidebar' ); ?>
                 </div><!-- #woocommerce_sidebar .widget-area -->
        </div><!-- #sidebar-->
        
        <?php endif; ?> 


        <div class="clear">
        </div><!-- .clear-->

<?php get_footer(); ?>