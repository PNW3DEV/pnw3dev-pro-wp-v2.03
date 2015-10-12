<?php
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>

<?php 

global $post;

$args=array(
	'orderby' => 'menu_order',                                        
	'order' => 'ASC',
  	'post_type' => 'page',
  	'posts_per_page' => -1,
  	'post_status' => 'publish'
);
query_posts($args);

$i = 1;

if ( have_posts() ) : while ( have_posts() ) : the_post();

 		//test if mobile device
        $detect = new Mobile_Detect();

        if( $detect->isMobile() && !$detect->isTablet() ){
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mobile');
        } else { 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
        }

	$title = get_the_title();
	
	$homefade = of_get_option('gg_homefade');

        $display = rwmb_meta( 'gxg_display' );
        $layout = rwmb_meta( 'gxg_section_layout' );
        $bgcolor = rwmb_meta( 'gxg_bgcolor' );
        $textcolor = rwmb_meta( 'gxg_textcolor' );
        
        $offset_tablet = rwmb_meta( 'gxg_offset_tablet' );
        $offset_mobile = rwmb_meta( 'gxg_offset_mobile' );
        
        $title = rwmb_meta( 'gxg_title' );   
        $hometitlesize = of_get_option('gg_hometitlesize');  
        $minhometitlesize = of_get_option('gg_minhometitlesize');  
        $sectiontitlesize = of_get_option('gg_sectiontitlesize');  
        $minsectiontitlesize = of_get_option('gg_minsectiontitlesize');
        $titlecolor = rwmb_meta( 'gxg_titlecolor' );
        $description = rwmb_meta( 'gxg_description' );
        $descriptioncolor = rwmb_meta( 'gxg_descriptioncolor' );
        $descriptionalignment = rwmb_meta( 'gxg_descriptionalignment' );
        $button1text = rwmb_meta( 'gxg_button1text' );
        $button1url = rwmb_meta( 'gxg_button1url' );
        $button1color = rwmb_meta( 'gxg_button1color' );
        $button2text = rwmb_meta( 'gxg_button2text' );
        $button2url = rwmb_meta( 'gxg_button2url' );
		$button2color = rwmb_meta( 'gxg_button2color' );
	
        if ( of_get_option('gg_homeimageborder') ) { 
				$homeimageborder = 'no-border';
        } else {
				$homeimageborder = 'border';        			
        } 	
	
	
        if ( $display && $layout == 'home-section-slider' ) {
        ?>	
	        <section id="section-<?php the_ID(); ?>" class="slide slider-section">
			<?php the_content(); ?>
		</section>
		<div id="offset"></div>
        <?php }
        
        
        elseif ( $display && $layout == 'video-section' ) {
        ?>	
	        <section id="section-<?php the_ID(); ?>" class="slide video-section">
                        <div class="videoWrapper">
                                <?php echo $post->post_content; ?><br />
                        </div>
		</section>
        <?php }	
	

        elseif ( $display && $layout == 'home-section-image' ) {
        	
        $placeholder_image = get_template_directory_uri() . '/images/ll.png';
        
        ?>     
                <section id="section-<?php the_ID(); ?>" class="slide home-section <?php echo $homeimageborder; ?>">
                
                <div id="loader-wrapper">
				    <div class="spinner">
					  <div class="rect1"></div>
					  <div class="rect2"></div>
					  <div class="rect3"></div>
					  <div class="rect4"></div>
					  <div class="rect5"></div>
					</div>
				</div>
				

			
			<div id="home-image" class="image-fullbg" <?php if( !$detect->isMobile() && $image != '' ){ ?> data-stellar-background-ratio="0"  <?php } ?> style="background-image: url(<?php echo $image[0]; ?>); <?php if( $detect->isTablet() && $image != '' ){ ?> background-position: 50% <?php echo $offset_tablet; ?>px; <?php }  if( $detect->isMobile() && !$detect->isTablet() && $image != '' ){ ?> background-position: 50% <?php echo $offset_mobile; ?>px; <?php } ?> "></div>
			

			
			
                        <div class="top-space"></div>                        
                        <div class="container clearfix">
	
				<div class="<?php echo $layout; ?>">
                                
                                
	
	                                <?php if($title) { ?>
                                                <div class="<?php if($homefade) { echo 'fade1'; } else { echo 'fade0'; } ?>">
                                                        <h1 class="home-title" style="color:<?php echo $titlecolor; ?>; font-size:<?php echo $hometitlesize; ?>px;">
                                                        		<div class="min-home-title" style="font-size:<?php echo $minhometitlesize; ?>px;"></div>
                                                                <?php echo $title; ?>	
                                                                
                                                        </h1>
                                                </div>
	                                <?php } ?>
                                        
                                        <div class="clear"></div>
	                              
	                                <?php
                                        $content = get_the_content();
                                              
                                        if($description  ||  $content) { ?>

                                                <div class="<?php if($homefade) { echo 'fade2'; } else { echo 'fade0'; } ?>">
                                                        <div class="home-subtitle" style="color:<?php echo $descriptioncolor; ?>; text-align:<?php echo $descriptionalignment; ?>;">
                                                        <?php echo $description; ?>
                                                	</div>
                                                	
                                                	<?php
						$content = the_content();
						if($content != '') { ?>
                                                	<div class="clear"></div>
                                                	<div class="section-content home-content">
	                                        		<?php the_content(); ?>
	                                		</div>
	                                		<?php } ?>
	                                		
                                                </div>
	                                <?php } ?>

                                        <?php if($button1text || $button2text) { ?>
                                        <div class="<?php if($homefade) { echo 'fade3'; } else { echo 'fade0'; } ?>">
                                        
                                        	<ul class="sectionbuttons">
                                        		<?php if($button1text) { ?>
                                        		<li><a href="<?php echo $button1url; ?>" class="button1" style="background:<?php echo $button1color;  ?>;"><?php echo $button1text; ?></a></li>
						<?php } ?>
						<?php if($button2text) { ?>
						<li><a href="<?php echo $button2url; ?>" class="button1" style="background:<?php echo $button2color;  ?>;"><?php echo $button2text; ?></a></li>
	                                		<?php } ?>
	                                	</ul>
                                        </div>
                                        <?php } ?>

				</div>
	
			</div>
		
		</section>
                <div class="clear"></div>

        <?php }
        elseif ( $display && $layout != 'home-section-image' && $layout != 'home-section-slider' && $layout != 'video-section') 
        {
        
        $placeholder_image = get_template_directory_uri() . '/images/ll.png';	
        	
        ?>

	        <section id="section-<?php the_ID(); ?>" class="slide slide-<?php echo $layout; ?>">


			
                        <div class="image-fullbg" <?php if( !$detect->isMobile() && $image != '' ){ ?> data-stellar-background-ratio="0"  <?php } ?> style="background-color:<?php echo $bgcolor  ?>; <?php if( $image != '' ){ ?>background-image: url(<?php echo $image[0]; ?>); <?php } ?> ; <?php if( $detect->isTablet() && $image != '' ){ ?> background-position: 50% <?php echo $offset_tablet; ?>px; <?php }  if( $detect->isMobile() && !$detect->isTablet() && $image != '' ){ ?> background-position: 50% <?php echo $offset_mobile; ?>px; <?php } ?> "></div>
			


  			<div class="container clearfix">
	
				<div class="<?php echo $layout; ?>">
				
                                        <?php if($title || $description) { ?>
                                        <div class="section-intro">
                
                                                <?php if($title) { ?>
                                                <h1 class="slide-title" style="color:<?php echo $titlecolor; ?>; font-size:<?php echo $sectiontitlesize; ?>px; min-font-size:<?php echo $minsectiontitlesize; ?>px;">
                                                        <div class="min-slide-title" style="font-size:<?php echo $minsectiontitlesize; ?>px;"></div>
                                                        <?php echo $title; ?>
                                                </h1>
                                                <?php } ?>
                                              
                                                <?php if($description) { ?>
                                                <div class="slide-description" style="color:<?php echo $descriptioncolor; ?>; text-align:<?php echo $descriptionalignment; ?>;">
                                                        <?php echo $description; ?>
                                                </div>
                                                <?php } ?>
                                                        
                                        </div>
                                        <?php } 
        
                                        if ($layout == 'contact-section') { ?>
                                        
                                        <div class="contact-boxes-wrap">
                                                
                                        <?php if ( of_get_option('gg_googlemap') ) { 
                                                $grid =  'grid_4'; 
                                                $gmclass ='gmy';
                                        } else { 
                                                $grid =  'grid_6';
                                                $gmclass =''; 
                                        } ?>
                                                        
                                                <div class="contact-form equalheight <?php echo $grid; ?>">
                                                        <?php if ( of_get_option('gg_cf7') ) {
                                                                echo do_shortcode( of_get_option('gg_cf7') ); 
                                                        } ?>
                                                </div>
                                                
                                                <?php
                                                if ( of_get_option('gg_googlemap') ) {
                                                ?>
                                                        <div  class="google-maps equalheight grid_4">
                                                                <?php echo do_shortcode( '[bgmp-map]' ); ?>
                                                        </div>
                                                <?php } ?>  
                                                
                                                <div class="contact-content equalheight <?php echo $grid, ' ', $gmclass; ?> omega">
                                                        <div class="contact-content-box">
                                                                <?php the_content(); ?>
                                                        </div>
                                                </div> 
                                                                
                                        </div>                                                
                                                
                                        <?php } ?>
                                        
	                                
                                        <?php if ($layout != 'contact-section') { ?>
                                                <div class="section-content">
                                                        <?php the_content(); ?>
                                                </div>        
                                        <?php } ?>

	                                <?php if ($layout == 'portfolio-section') { ?> 
	                                		<div id="portfolio-isotope-<?php echo $i++; ?>"> 
	                                		<?php get_template_part( 'portfolio-section' ); ?> 
	                                		</div> <?php
	                                } ?> 

	                                <?php if ($layout == 'blog-section') {
	                                        get_template_part( 'blog-section' );
	                                } ?> 

	                                <?php if ($layout == 'client-section') {
	                                        get_template_part( 'clients-section' );
	                                } ?> 

	                                <?php if ($layout == 'team-section') {
	                                        get_template_part( 'team-section' );
	                                } ?> 
	                                
	                                <?php if ($layout == 'social-section') {
	                                        get_template_part( 'social-section' );
	                                } ?> 	                                

	                                <?php if ($layout == 'twitter-section') {
	                                        get_template_part( 'twitter-section' );
	                                } ?>
	
				</div>
				
				<?php if($button1text || $button2text) { ?>
                                        	<ul class="sectionbuttons">
                                        		<?php if($button1text) { ?>
                                        		<li><a href="<?php echo $button1url; ?>" class="button1" style="background:<?php echo $button1color;  ?>;"><?php echo $button1text; ?></a></li>
						<?php } ?>
						<?php if($button2text) { ?>
						<li><a href="<?php echo $button2url; ?>" class="button1" style="background:<?php echo $button2color;  ?>;"><?php echo $button2text; ?></a></li>
	                                		<?php } ?>
	                                	</ul>
                                <?php } ?>

			</div>

		</section>
	
	<?php 
	}
	endwhile; endif; wp_reset_query(); ?>
        
<?php get_footer(); ?>