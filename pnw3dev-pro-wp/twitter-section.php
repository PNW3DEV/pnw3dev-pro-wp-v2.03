<?php if ( of_get_option('gg_twitter_id') ) {
	
	$id = of_get_option('gg_twitter_id');
	?>
	
	<div id="gg-twitter-feed" class="twitter-feed" data-option-value="<?php echo $id; ?>">
		<i class="fa fa-twitter"></i>
	    <div id="twitter-timeline">
	    </div>
	</div>

<?php } ?>






<!-- KEBO TWITTER PLUGIN -->

<?php
if (function_exists('kebo_twitter_get_tweets')) { ?>

	<div class="twitter-feed">
		
	        <?php
	        $tweets = kebo_twitter_get_tweets();
	        
	        $i = 0;
	        
	        $allowed_html = array(
	                'a' => array(
	                'href' => array(),
	                'title' => array(),
	                'target' => array()
	                )
	        );
	        ?>
	        
	        <ul class="kebo-tweets">
	         
	                <?php
	                $format = get_option( 'date_format' );
	                $corruption = 0;	
	                
	                if ( ! empty( $tweets->{0}->created_at ) ) : 
	                
	                        foreach ( $tweets as $tweet ) : 
	                
	                        // Skip if no Tweet data.
	                        if ( empty( $tweet->created_at ) ) {
	                                $corruption++;
	                                continue;
	                        }
	                        
	                        //Retweets?
	                         if ( !of_get_option('gg_retweets') ) {
	                                // Skip Re-Tweets
	                                if ( ! empty( $tweet->retweeted_status ) ) {
	                                        continue;
	                                }
	                        } 
	                        
	                        // User Name
	                        $screen_name =  $tweet->user->screen_name ;
	                    
	                        // Retweet Name
	                        $retweet_name = ( ! empty( $tweet->retweeted_status ) ) ? $tweet->retweeted_status->user->screen_name : '' ;
	                        
	                        // Prepare Date Formats
	                        if ( date( 'Ymd' ) == date( 'Ymd', strtotime( $tweet->created_at ) ) ) {
	                                // Covert created at date into timeago format
	                                $created = human_time_diff( date( 'U', strtotime( $tweet->created_at ) ), current_time( 'timestamp', $gmt = 1 ) );
	                        } else {
	                                // Convert created at date into easily readable format.
	                                $created = date( strtotime( $tweet->created_at ) + $tweet->user->utc_offset );
	                                $created = date('d M', $created);
	                        }
	                        
	                        // Check if we should display replies and hide if so and this is a reply.
	                        if ( !of_get_option('gg_replies') && ( ! empty( $tweet->in_reply_to_screen_name ) || ! empty( $tweet->in_reply_to_user_id_str ) || ! empty( $tweet->in_reply_to_status_id_str ) ) ) {
	                            continue; // skip this loop without changing the counter
	                        } ?>
	                
	                <li class="ktweet">
	                
	                        <i class="fa fa-twitter"></i>
	                
	                        <p class="ktext">
	                                <?php if ($retweet_name) { ?>
	                                        RT <a class="kaccount" href="<?php echo esc_url( 'https://twitter.com/' . $retweet_name ); ?>" target="_blank"> @<?php echo esc_html( $retweet_name ); ?>
	                                        </a>
	                                <?php } ?>
	                                
	                                <?php echo wp_kses( ( ! empty( $tweet->retweeted_status ) ) ? $tweet->retweeted_status->text : $tweet->text, $allowed_html ); ?>
	                        </p>
	                            
	                        <time title="<?php esc_attr_e( 'Time posted', 'kebo_twitter' ); ?>: <?php echo date_i18n( 'dS M Y H:i:s', strtotime( $tweet->created_at ) + $tweet->user->utc_offset ); ?>" datetime="<?php echo date_i18n( 'c', strtotime( $tweet->created_at ) + $tweet->user->utc_offset ); ?>" aria-label="<?php esc_attr_e('Posted on ', 'kebo_twitter'); ?><?php echo date_i18n( 'dS M Y H:i:s', strtotime( $tweet->created_at ) + $tweet->user->utc_offset ); ?>"><?php echo esc_html ( $created ); ?>
	                        </time>		
	                
	                </li>
	        
	                <?php 
	                if (++$i == 1) break;
	                endforeach; 
	                ?>
	        
	        </ul>	
	 
		<div class="kfollow">
			follow <a class="kaccount" href="<?php echo esc_url( 'https://twitter.com/' . $screen_name ); ?>" target="_blank"> @<?php echo esc_html( $screen_name ); ?></a>
		</div>
		        
		<?php else : ?>
		        
		        <p><?php _e( 'Sorry, no Tweets were found.', 'kebo_twitter' ); ?></p>
		        
		<?php endif; ?>
		        
		<?php if ( 1 < $corruption ) : ?>
		        
		        <p><?php _e( 'Sorry, the Tweet data is not in the expected format.', 'kebo_twitter' ); ?></p>
		        
		<?php endif; ?>
		        
		<?php unset( $tweets ); ?>
	
	</div><!-- .twitter-feed-->

<?php }  ?>