<?php get_header(); ?>
       
        <!-- Start the Loop. -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="single-portfolio-entry">
                
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="grid_7">

                        <?php
                        $browsertop = rwmb_meta( 'gxg_browsertop' );

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

                        <?php the_post_thumbnail('mobile'); ?>
                        
                 </div>   
                 <?php } ?>
                       
                   
                
                <div class="grid_5 omega">
                
                <h1 class="single-portfolio"> <?php the_title(); ?> </h1> 
                        
                <?php
                $psub = rwmb_meta( 'gxg_portfolio_subtitle' );     
                ?>
                        
                <h2 class="single-portfolio"> <?php echo $psub; ?> </h2>                      
                        
                        <ul class="portfolio-postinfo">
                        
                        <?php
                        $date = get_post_meta($post->ID, 'gxg_portfolio_date', true);
                        $client = get_post_meta($post->ID, 'gxg_client', true);
                        $skills = get_post_meta($post->ID, 'gxg_skills', true);
                        $url = get_post_meta($post->ID, 'gxg_portfolio_url', true);
                        $extra1 = get_post_meta($post->ID, 'gxg_extra1', true);
                        $extra2 = get_post_meta($post->ID, 'gxg_extra2', true);
                        $extra3 = get_post_meta($post->ID, 'gxg_extra3', true);
                        $description = get_post_meta($post->ID, 'gxg_portfolio_description', true);
                        ?>

                        <!-- date -->
                                <?php if ($date) { ?>
                                <li>
                                        <i class="fa fa-calendar"></i>
                                        <?php echo $date; ?>
                                </li>
                                <?php } ?>
                              
                                <!-- client -->
                                <?php if ($client) { ?>
                                <li>
                                        <i class="fa fa-male"></i>
                                        <?php echo $client; ?>
                                </li>
                                <?php } ?> 
                              
                                <!-- skills -->
                                <?php if ($skills) { ?>
                                <li>
                                        <i class="fa fa-tasks"></i>
                                        <?php echo $skills; ?>
                                </li>
                                <?php } ?>    
  
                                <!--  extra 1 -->                                                                                          
                                <?php if ($extra1) { ?>
                                <li>
                                        <?php echo $extra1; ?>
                                </li>
                                <?php } ?>                                               

                                <!-- extra 2 -->
                               <?php if ($extra2) { ?>
                                <li>
                                        <?php echo $extra2; ?>
                                </li>
                                <?php } ?> 
                                
                                <!--  extra 3 --> 
                                <?php if ($extra3) { ?>
                                <li>
                                        <?php echo $extra3; ?>
                                </li>
                                <?php } ?>             
                                
                                <!--  URL -->                                                                                     
                                <?php if ($url) { ?>
                                <li>
                                        <a href="<?php echo $url; ?>" target="_blank"><?php _e('launch project', 'gxg_textdomain') ?></a>
                                </li>
                                <?php } ?>
   

                                <?php if (of_get_option('gg_share') ) { ?>
                                <li>        
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
                               </li>
                                <?php } ?>                                                   
                        </ul>
  
                <div class="clear"></div>        


                <!--  buttons --> 
                <ul class="portfoliobuttons">
                <?php
                $portfolio_button1text = rwmb_meta( 'gxg_portfolio_button1text' );
                $portfolio_button1url = rwmb_meta( 'gxg_portfolio_button1url' );
                $portfolio_button1color = rwmb_meta( 'gxg_portfolio_button1color' );
                $portfolio_button2text = rwmb_meta( 'gxg_portfolio_button2text' );
                $portfolio_button2url = rwmb_meta( 'gxg_portfolio_button2url' );
                $portfolio_button2color = rwmb_meta( 'gxg_portfolio_button2color' );
                $target = rwmb_meta( 'gxg_target' );                               

                if($portfolio_button1text || $portfolio_button2text) { ?>
                        
                        <?php if($portfolio_button1text) { ?>
                                <li><a href="<?php echo $portfolio_button1url; ?>" <?php if ($target) { ?> target="_blank" <?php } ?>  class="button1" style="background:<?php echo $portfolio_button2color;  ?>;"><?php echo $portfolio_button1text; ?></a></li>
                        <?php } ?>
                        <?php if($portfolio_button2text) { ?>
                        <li><a href="<?php echo $portfolio_button2url; ?>" <?php if ($target) { ?> target="_blank" <?php } ?> class="button1" style="background:<?php echo $portfolio_button2color;  ?>;"><?php echo $portfolio_button2text; ?></a></li>
                        <?php } ?>
                        
                <?php
                } ?>                                        
                </ul>                                           
                        
                        
                </div>
                
                <div class="clear"></div>
                     
                <?php 
                $content = get_the_content();
                if ($content != '') { ?>                        
                <div class="portfolio-content">  
                        <?php the_content(); ?>
                </div>
                <?php } ?>
        
        </div>
        
        <div class="clear"> </div>                
        
        <?php endwhile; else: ?>
        
        <!-- what if there are no Posts? -->
        <div id="no_posts">
        <p> <br /> <br />  <?php _e('Sorry, no posts matched your criteria.', 'gxg_textdomain'); ?> </p>
        </div>
        
        <!-- REALLY stop The Loop. -->
        <?php endif; ?>
                      
<?php get_footer(); ?>