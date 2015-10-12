<?php get_header(); ?>

        <!-- Start the Loop. -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="single-team-entry">  		                      
                        
                <?php if ($name){
                ?>                                                            
                <h1 class="pagetitle text-center"> <?php the_title_attribute(); ?> </h1>
                <?php
                }

                $team_thumb = get_the_post_thumbnail($post->ID, 'square', array('title' => ''));                                                             
                $name = rwmb_meta( 'gxg_name' );
                $position = rwmb_meta( 'gxg_position' );
                $email = rwmb_meta( 'gxg_email' );
                $about = rwmb_meta( 'gxg_about' );
                ?>

                        <div class="text-center">
                                
                                <?php if($team_thumb) { ?>
                                        <div class="team-thumb">                                                
                                                <?php echo $team_thumb; ?> 
                                        </div> 
                                <?php } ?>
                                
                                <?php if ($position){ ?>   
                                        <div class="team-position"><i class="fa fa-user"></i> <?php echo $position; ?> </div>
                                <?php } ?>                                                        
                                
                                <?php if ($email){ ?>   
                                        <div class="team-email"><i class="fa fa-envelope"></i> <?php echo $email; ?> </div>
                                <?php } ?>                                                        
                                
                                <?php if ($about){ ?>   
                                        <div class="team-about"> <p><?php echo $about; ?></p> </div>
                                <?php } ?>                                                        
        
                        </div> 
                
                <div class="separator-line"> </div>
                
                <div class="team-content">
                        <?php the_content(); ?>
                </div>        
        
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