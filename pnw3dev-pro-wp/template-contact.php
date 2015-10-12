<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<div class="contact-page">

<h1 class="pagetitle"> <?php the_title(); ?> </h1>

	<?php if ( of_get_option('gg_googlemap') ) { 
		$grid =  'grid_4'; 
		$gmclass ='gmy';
	} else { 
		$grid =  'grid_6';
		$gmclass =''; 
	} ?>

	<div class="contact-form contact-section equalheight <?php echo $grid; ?>">
                <?php
                if ( of_get_option('gg_cf7') ) {
                        echo do_shortcode( of_get_option('gg_cf7') ); 
                } 
                ?>
	</div>          


        <?php
        if ( of_get_option('gg_googlemap') ) {
        ?>
        <div  class="google-maps equalheight grid_4">
                <?php echo do_shortcode( '[bgmp-map]' ); ?>
        </div>
        <?php }
        ?>  
        
        
        <div class="contact-content equalheight <?php echo $grid, ' ', $gmclass; ?> omega">
                <div class="contact-content-box">
                
                        <!-- Start the Loop. -->
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 
                        <!-- Display the Post's Content in a div box. -->
                        <?php the_content(); ?>

                        <div class="clear"> </div>                        

                        <!-- Stop The Loop (but note the "else:" - see next line). -->
                        <?php endwhile; else: ?>
 
                        <!-- what if there are no Posts? -->
                        <p><?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>

                        <!-- REALLY stop The Loop. -->
                        <?php endif; ?>
                
                </div>
        </div> 

</div><!-- .contact-->
    
<?php get_footer(); ?>