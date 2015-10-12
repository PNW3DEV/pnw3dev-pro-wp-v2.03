<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<div class="portfolio">        

<h1 class="pagetitle"> <?php the_title(); ?> </h1>

         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                   <div class="portfolio-page-entry">
                           <?php the_content(); ?>
                   </div>
         <?php endwhile; endif; ?>     
         
         <div class="clear">
         </div><!-- .clear-->   

	<div id="options" class="clearfix">
		<ul id="filters" class="option-set clearfix" data-option-key="filter">
			<li><a href="#filter" data-option-value="*" class="selected"><?php _e('show all', 'gxg_textdomain'); ?></a></li>
	      	
				<?php                       
		                $cat_args = array(   
		                 	'taxonomy' => 'portfolio_category',                                  
	                                'menu_order' => 'ASC',
				);
		
	                        $categories = wp_get_post_terms($post->ID, 'portfolio_category', $cat_args);
		                     	
		                foreach($categories as $category) {  ?>
			        	<li><a href="#filter" data-option-value=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></a></li>
		                <?php } ?>      	
	      	</ul>
  	</div> <!-- #options -->
  	
  	
        <!-- PORTFOLIO ITEMS -->  
	<ul class="isotope portfolio-items clearfix">

	<?php  
		global $post;
	
		$categoryarray = array();			
		foreach($categories as $category) { 
		 	 $categoryarray[] = $category->slug; 
		} 
		
		$catsstring = implode(",",$categoryarray);
		$pmax = rwmb_meta( 'gxg_pmax' );
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		                
                	$args = array(                                      
                        	'post_type' => 'portfolio',
                        	'posts_per_page' => $pmax,
                                'orderby' => 'menu_order',
                                'order' => 'ASC',                        	
                        	'portfolio_category' => $catsstring,
                        	'paged' => $paged
                            );
  
                	$loop = new WP_Query( $args );
                	
		// Pagination fix
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $loop;
               
                	if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
                	
                		$psize = rwmb_meta( 'gxg_psize' );                        
                        	$video = get_post_meta($post->ID, 'gxg_pvideo', true);

			$terms = wp_get_post_terms($post->ID, 'portfolio_category', $cat_args);
						
			if ( $terms && ! is_wp_error( $terms ) ) : 
	
				$pcat = array();
	
				foreach ( $terms as $term ) {
					$pcat[] = $term->slug;
				}
						
				$pcats = join( " ", $pcat);
				
			endif; ?> 			


                        <?php if ($video) {
                                
                        //video thumb
                        $psize = rwmb_meta( 'gxg_psize' );
                        $thumb_path = wp_get_attachment_image_src(get_post_thumbnail_id(), $psize);
                        $video_thumb = get_the_post_thumbnail($post->ID, 'video', array('title' => '')) ;
                        
                        // YOUTUBE
                        if (strpos($video,'youtu') !== false) {

                                $video_ID = str_replace("http://youtu.be/", "", $video);
                                if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]
                                +/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', 
                                $video, $match)) {
                                        $video_ID = $match[1];
                                }
                                
                                if (get_the_post_thumbnail($post->ID, 'video', array('title' => '')) == false){
                        
                                        // check for highest resolution preview image from youtube, the @ disables warnings   
                                        if(@file_get_contents('http://img.youtube.com/vi/'. $video_ID .'/maxresdefault.jpg')) {     
                                                        $video_thumb = '<img src="http://img.youtube.com/vi/'. $video_ID .'/maxresdefault.jpg" class="attachment-video wp-post-image" alt="" title="" />';
                                                        
                                        }  
                                         // if highest resolution dosn't exists check for the next   
                                         else if(@file_get_contents('http://img.youtube.com/vi/'. $video_ID .'/hqdefault.jpg')) {   
                                                        $video_thumb = '<img src="http://img.youtube.com/vi/'. $video_ID .'/hqdefault.jpg" class="hqdefault attachment-video wp-post-image" alt="" title="" />';
                                                    
                                        }   
                                         // no high resolution preview images - take the default   
                                         else {     
                                                        $video_thumb = '<img src="http://img.youtube.com/vi/'. $video_ID .'/0.jpg" class="hqdefault attachment-video wp-post-image" alt="" title="" />';
                                         } 
                                
                                }
                                
                                //open videos on mobile device in browser and not in youtube app
                                $embed = $video;
                                $repl = "http://youtu.be/";
                                $emb = "http://www.youtube.com/embed/";                        
                                $mobile_embed = str_replace($repl, $emb, $embed);  

                        }
                        
                        // VIMEO
                        if (strpos($video,'vimeo') !== false) {
                                
                                sscanf(parse_url($video, PHP_URL_PATH), '/%d',  $vimeoID);
                                $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeoID.php"));
                                $video_thumb_URL = $hash[0]['thumbnail_large'];
                                $video_thumb = '<img src="' . $video_thumb_URL . '" class="attachment-video wp-post-image" alt="" title="" />';
                                
                        }
                        
                        ?>                          
                        <li class="element <?php echo $psize; ?> <?php echo $pcats; ?>" data-category="<?php echo $pcats; ?>">    
			
                                <?php 
                                
                                if ($psize == 'size1' || $psize == 'size2') {
                                	$tsize = 'square';
                                } 
                                elseif ($psize == 'landscape') {
                                	$tsize = 'landscape';
                                	}
                                elseif ($psize == 'video') {
                                	$tsize = 'video';
                                	}
                                elseif ($psize == 'portrait1' || $psize == 'portrait3') {
                                	$tsize = 'portrait';
                                	}
                                elseif ($psize == 'portrait2') {
                                	$tsize = 'portrait2';
                                	}  
                                else {
                                	$tsize = 'video';
                                }
                                	
                                $pthumb = the_post_thumbnail($tsize);
                                
                                $psub = rwmb_meta( 'gxg_portfolio_subtitle' );

               			?>    
               			
               			<a href="<?php echo $video; ?>" data-rel="prettyPhoto-video[pp_gallery]" title="<?php the_title(); ?>" class='portfolio2_thumblink'>
               				<div class='overlay'>
               				
               					<?php if ($pthumb) {
               						echo $pthumb; 
               					}
               					else {  
               						echo $video_thumb; 
               					} ?>
               						<div class='mask'>
               							<h2><?php the_title(); ?><br /><span class="dash">---</span></h2>
               							<p><?php echo $psub; ?></p>
               						</div>
               						<i class="videoicon fa fa-play-circle-o"></i>
               				</div>
               			</a>  

                        </li>
                        
                        <?php
                        } 
                        
                        else {
                                
                        $browsertop = rwmb_meta( 'gxg_browsertop' );
                        ?>  
			<li class="element <?php echo $psize; ?> <?php echo $pcats; ?>" data-category="<?php echo $pcats; ?>">                
			
                                <?php
                                if ($browsertop) { ?>
                                        <div class='browser'>
                                            <div class='browser-top-container'>
                                                <ul class='browser-right-buttons'>
                                                    <li><!-- --></li>
                                                    <li><!-- --></li>
                                                    <li class='bb-last'><!-- --></li>
                                                </ul>
                                                <div class='clear'></div>
                                    	</div>
                                        </div>
                                <?php } ?>
                
                                <?php 
                                $psize = rwmb_meta( 'gxg_psize' );
                                
                                if ($psize == 'size1' || $psize == 'size2') {
                                	$tsize = 'square';
                                } 
                                elseif ($psize == 'landscape') {
                                	$tsize = 'landscape';
                                	}
                                elseif ($psize == 'video') {
                                	$tsize = 'video';
                                	}
                                elseif ($psize == 'portrait1' || $psize == 'portrait3') {
                                	$tsize = 'portrait';
                                	}
                                elseif ($psize == 'portrait2') {
                                	$tsize = 'portrait2';
                                	}  
                               else {
                                	$tsize = 'video';
                                }
                                	
				$pthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $tsize);
				$placeholder_image = get_template_directory_uri() . '/images/ll.png'; // lazyload
				$detect = new Mobile_Detect();
				
                                $pthumbfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                $psub = rwmb_meta( 'gxg_portfolio_subtitle' );
                                $pclick = rwmb_meta( 'gxg_pclick' );
                                $pURL = rwmb_meta( 'gxg_pURL' );

                                if ($pURL) {  
                                	?><a href='<?php echo $pURL ?>' class='portfolio2_thumblink'> <?php
                                }                                
                                elseif ($pclick == 'lightbox') {
                                	?><a href="<?php echo $pthumbfull[0] ?>" data-rel="prettyPhoto[pp_gallery]" title="<?php the_title(); ?>" class="portfolio2_thumblink"  > <?php
                                } 
                                else { 
                                	?><a href='<?php the_permalink() ?>' class='portfolio2_thumblink'> <?php
                                }
                                ?>    
               				<div class='overlay <?php if ($browsertop) { ?> browsertop<?php } ?>'>
					
						<?php if ( !$detect->isMobile() && of_get_option('gg_lazyload') ) { ?>
							<img data-original="<?php echo $pthumb[0]; ?>" class="lazy" width="<?php echo $pthumb[1]; ?>" height="<?php echo $pthumb[2]; ?>" alt="<?php the_title(); ?>" src="<?php echo $placeholder_image; ?>">
						<?php } else { ?>
							<img src="<?php echo $pthumb[0]; ?>" width="<?php echo $pthumb[1]; ?>" height="<?php echo $pthumb[2]; ?>" alt="<?php the_title(); ?>" >
						<?php } ?>
						
                                                <div class='mask'>
                                                        <h2><?php the_title(); ?><br /><span class="dash">---</span></h2>
                                                        <p><?php echo $psub; ?></p>

                                                        <?php if ($pclick == 'lightbox') { 
                                                                ?><i class="p-open-icon fa fa-expand"></i> <?php
                                                        } 
                                                        else { 
                                                                ?><i class="p-open-icon fa fa-link"></i><?php
                                                        } ?>                                                                
                                                </div>
               				</div>
               			</a>
			</li>
                        
			<?php }
                        
                        endwhile;
                
                        else:  ?>
                                <!-- what if there are no items? -->
                                <li> <?php _e('No portfolio items found.', 'gxg_textdomain'); ?> </li>
                        <?php
                 
                        endif;
	                	
	                // Reset postdata
			wp_reset_postdata();
	                
	                ?>
                	
                	</ul>

                	<div class="clear">
        		</div><!-- .clear-->
        		
        	<div id="pagination">
                        <?php gg_pagination(); ?>
                </div><!-- #pagination-->
                   
		<?php 
		// Reset main query object
		$wp_query = NULL;
		$wp_query = $temp_query;
		?>	
        
<div class="gutter"></div>
</div><!-- .portfolio-->
    
<?php get_footer(); ?>