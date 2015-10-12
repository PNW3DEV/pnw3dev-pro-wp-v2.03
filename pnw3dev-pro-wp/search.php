<?php get_header(); ?>

	<div id="searchresults" class="grid_12 ">

                <h1 class="pagetitle text-center">
                        <?php _e('Search Results for ', 'gxg_textdomain'); 
                        $key = esc_html($s, 1);
                        ?>
                        <span class="themecolor">
                        <?php echo $key; ?>
                        </span>
                </h1>
                
                <?php wp_reset_query(); ?>


                <?php
                /* Blog Results ******************************************/
                $s = isset($_GET["s"]) ? $_GET["s"] : "";
                $posts = new WP_Query("s=$s&post_type=post");
                
                /* Search Count */
                $bkey = esc_html($s, 1);
                $bcount = $posts->post_count;
                ?>
                        
                        <h2 class="searchresults blogresults"><?php echo $bcount; _e(' blog results', 'gxg_textdomain'); ?></h2>
                        <ul class="isotope-fluid">
                        
                        <?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>

	                        <li id="post-<?php the_ID(); ?>" <?php post_class('grid_4 element-blog'); ?>>
                
                                <div class="tnail">
                                        <?php if ( has_post_thumbnail() ) {
                                                the_post_thumbnail();
                                        }
                                        ?>
                                </div> <!-- .tnail -->
                 
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
                
                                                                <?php if ( has_tag() ) { ?>
                                                                <li>
                                                                          <ul class="tags">
                                                                                <li>                                                
                                                                                        <?php echo the_tags('', ', ', '' ); ?>
                                                                                </li>  
                                                                        </ul> <!-- .tags -->   
                                                                </li>                                                  
                                                                <?php } ?>
                                                                
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
                                                                
                                                                <li class="author">
                                                                        / by <?php echo the_author_posts_link(); ?>
                                                                </li>   
                                                                
                                                                <div class="clear"></div>    
                                                        </ul>                
                                                </div> <!-- .postinfo --> 		                                
                      
                                                <div class="">
                                                        <?php the_excerpt(); ?>    
                                                </div>
                                                
                                        </div>
                                        
                                </div>
                
                        </li>	
	
	                <?php 
                        endwhile;
                        wp_reset_postdata();
                        endif;
                        ?>
                    </ul>



                <?php
                /* Page Results ******************************************/
                $s = isset($_GET["s"]) ? $_GET["s"] : "";
                $posts = new WP_Query("s=$s&post_type=page");
                
                $pkey = esc_html($s, 1);
                $pcount = $posts->post_count;
                ?>
                
                        <!-- remove this line if you want to show page results
                        
                        
                        <h2 class="searchresults pageresults"><?php echo $pcount; _e(' page results', 'gxg_textdomain'); ?></h2>
                        <ul class="isotope-fluid">
                        
                        <?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>

	                        <li id="post-<?php the_ID(); ?>" <?php post_class('grid_4 element-blog'); ?>>
	                
	                                <div class="tnail">
	                                        <?php if ( has_post_thumbnail() ) {
	                                                the_post_thumbnail();
	                                        }
	                                        ?>
	                                </div> 
	                 
	                                <div class="post-content">                        
	                
	                                        <div class="post-date">
	                                                <div class="date-t">
	                                                        <div class="m"><?php the_time('M') ?></div>
	                                                        <div class="y"><?php the_time('Y') ?></div>
	                                                </div> 			        
	                                                <div class="d"><?php the_time('d') ?></div>
	                                        </div>       
	                
	                                                
	                                        <div class="blog-right">
	                                                
	                                                <h1 class="blogtitle">
	                                                        <a href="<?php the_permalink() ?>" class="primary-color" rel="bookmark" title="<?php _e('Permanent link to', 'gxg_textdomain') ?> <?php the_title_attribute(); ?>"><?php the_title(); ?>
	                                                        </a>
	                                                </h1>
	                       
	                                                <div class="postinfo">
	                                                        
	                                                        <ul>  
	                
	                                                                <?php if ( has_tag() ) { ?>
	                                                                <li>
	                                                                          <ul class="tags">
	                                                                                <li>                                                
	                                                                                        <?php echo the_tags('', ', ', '' ); ?>
	                                                                                </li>  
	                                                                        </ul> <!-- .tags -->   
	                                                                </li>                                                  
	                                                                <?php } ?>
	                                                                
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
	                                                                
	                                                                <li class="author">
	                                                                        / by <?php echo the_author_posts_link(); ?>
	                                                                </li>   
	                                                                
	                                                                <div class="clear"></div>    
	                                                        </ul>                
	                                                </div> 		                                
	                      
	                                                <div class="">
	                                                        <?php the_excerpt(); ?>    
	                                                </div>
	                                                
	                                        </div>
	                                        
	                                </div>
	                
	                        </li>
	
	
	                <?php 
                        endwhile;
                        wp_reset_postdata();
                        endif;
                        ?>
                    </ul>
                  
                    
		//remove this line if you want to show page results --> 


                
                <?php
                /* Portfolio Results ******************************************/
                $s = isset($_GET["s"]) ? $_GET["s"] : "";

		$args1 = array(
		's' => $s,
		'post_type' => 'portfolio'
		);
		
		$args2 = array(
			'post_type' => 'portfolio',
			'meta_key' => 'gxg_portfolio_subtitle', 
			'meta_value' => $s,
			'orderby' => 'menu_order',
            'order' => 'ASC',
			'meta_compare' => 'LIKE'
		);		
				
		$args = array_merge($args1, $args2);
		

		/*$posts = new WP_Query( $args1 );*/
		
		$query1 = new WP_Query($args1);
		$query2 = new WP_Query($args2);

		$posts->posts = array_merge( $query1->posts, $query2->posts );

		$posts->post_count = count( $posts->posts );	

                
                /* Search Count */
                $pkey = esc_html($s, 1);
                $pcount = $posts->post_count;
                ?>

                <?php if ( $posts->have_posts() ) : ?>
 
                <h2 class="searchresults portfolioresults"><?php echo $pcount; _e(' portfolio results', 'gxg_textdomain'); ?></h2>        
                <ul class="isotope portfolio-items clearfix">               
                
                <?php while ( $posts->have_posts() ) : $posts->the_post();

                $psize = rwmb_meta( 'gxg_psize' );
                $video = get_post_meta($post->ID, 'gxg_pvideo', true);
                	
			$terms = get_the_terms( $post->ID, 'portfolio_category' );
						
			if ( $terms && ! is_wp_error( $terms ) ) : 
	
				$pcat = array();
	
				foreach ( $terms as $term ) {
					$pcat[] = $term->name;
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
                                	
                                $pthumb = the_post_thumbnail($tsize);
                                
                                $pthumbfull = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                                $psub = rwmb_meta( 'gxg_portfolio_subtitle' );
                                $pclick = rwmb_meta( 'gxg_pclick' );
                                $pURL = rwmb_meta( 'gxg_pURL' );

                                if ($pURL) {  
                                	?><a href='<?php echo $pURL ?>' class='portfolio2_thumblink'> <?php
                                }                                
                                elseif ($pclick == 'lightbox') {
                                	?><a href="<?php echo $pthumbfull[0] ?>" data-rel="prettyPhoto" class="portfolio2_thumblink"  > <?php
                                } 
                                else { 
                                	?><a href='<?php the_permalink() ?>' class='portfolio2_thumblink'> <?php
                                }
                                ?>    
               				<div class='overlay <?php if ($browsertop) { ?> browsertop<?php } ?>'>
               					<?php echo $pthumb; ?>
               						<div class='mask'>
               							<h2><?php the_title(); ?><br />-</h2>
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
                        <?php
                        }
                        
                	endwhile;
                	
                        wp_reset_postdata();
                	endif;
                	?>
                </ul>                         
                <div class="gutter"></div>       
  



                <?php
		
		
		
		
		
	
		
		
		
                /* Team Results ******************************************/
                $s = isset($_GET["s"]) ? $_GET["s"] : "";
                $posts = new WP_Query("s=$s&post_type=team");
                
                /* Search Count */
                $tkey = esc_html($s, 1);
                $tcount = $posts->post_count;

		 if ( $posts->have_posts() ) : ?>

                	<h2 class="searchresults teamresults"><?php echo $tcount; _e(' team results', 'gxg_textdomain'); ?></h2>  
                	      
                	<ul class="team">
                	
                	<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                	
         			<?php
		                        $team_thumb = get_the_post_thumbnail($post->ID, 'square', array('title' => ''));                                                            
		                        $name = rwmb_meta( 'gxg_name' );
		                        $position = rwmb_meta( 'gxg_position' );
		                        $email = rwmb_meta( 'gxg_email' );
		                        $about = rwmb_meta( 'gxg_about' );
		                        
		                        ?>
		                        <li class="">
		                                <div class="text-center">
		                                        
		                                        <?php if($team_thumb) { ?>
		                                        <div class="team-thumb">                                                
		                                                <a href="<?php the_permalink() ?>">
		                                                        <?php echo $team_thumb; ?> 
		                                                </a>  
		                                        </div> 
		                                        <?php } ?>
		
		                                        <?php if ($name){ ?>   
		                                        <a href="<?php the_permalink() ?>">
		                                               <h1 class="team-title text-center"> <?php the_title_attribute(); ?> </h1> 
		                                        </a>                                                                                                                   
		                                        <?php } ?>
		                                        
		                                        <?php if ($position){ ?>   
		                                                <div class="team-position"><i class="fa fa-user"></i> <?php echo $position; ?> </div>
		                                        <?php } ?>                                                        
		                                        
		                                        <?php if ($email){ ?>   
		                                                <div class="team-email"><i class="fa fa-envelope"></i> <?php echo $email; ?> </div>
		                                        <?php } ?>                                                        
		                                        
		                                        <?php if ($about){ ?>   
		                                                <div class="team-about"> <?php echo $about; ?> </div>
		                                        <?php } ?>                                                        
		
		                                </div> 
		                        </li>

                        <?php     
                	endwhile;
                        wp_reset_postdata();
                	endif;
                	?>
                </ul>       

        </div>       

<?php get_footer(); ?>