<?php
/*
Template Name: Team
*/
?>

<?php get_header(); ?>

<div class="team-page">

<h1 class="pagetitle"> <?php the_title(); ?> </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="topcontent">
                <?php the_content(); ?>
                </div>
        <?php endwhile; endif; ?>           
        
	<ul class="team">

                <?php  
                global $post;
                
                $args = array(
                        'post_type' => 'team',
                        'orderby' => 'menu_order',
                        'order' => 'ASC',	                                        
                        'posts_per_page' => -1
                        );

                $loop = new WP_Query( $args );
                    
                if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post();
                        
			$team_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'square');
			$placeholder_image = get_template_directory_uri() . '/images/ll.png'; // lazyload
			$detect = new Mobile_Detect();
			
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
						
							<?php if ( !$detect->isMobile() && of_get_option('gg_lazyload') ) { ?>
								<img data-original="<?php echo $team_thumb[0]; ?>" class="lazy" width="<?php echo $team_thumb[1]; ?>" height="<?php echo $team_thumb[2]; ?>" alt="" src="<?php echo $placeholder_image; ?>">
							<?php } else { ?>
								<img src="<?php echo $team_thumb[0]; ?>" width="<?php echo $team_thumb[1]; ?>" height="<?php echo $team_thumb[2]; ?>" alt="" >
							<?php } ?>						
							
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
                endif;
                ?>
        
	</ul>
</div>
    
<?php get_footer(); ?>