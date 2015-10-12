<?php

function retina_styles() { ?>

        <style type="text/css">

                /* RETINA IMAGES */
                
						@media 
						(-webkit-min-device-pixel-ratio: 2), 
						(min-resolution: 192dpi) { 
                
                
                        <?php 
                        if ( of_get_option('gg_logo_retina') ) {
                        ?>

                                .logo-retina{
                                        display: table-cell;  
                                        }
                                        
                                .logo-regular {
                                        display: none;
                                        }                

                        <?php }  ?>                
                
                }

        </style>
        
<?php }

add_action( 'wp_head', 'retina_styles', 100 );

?>