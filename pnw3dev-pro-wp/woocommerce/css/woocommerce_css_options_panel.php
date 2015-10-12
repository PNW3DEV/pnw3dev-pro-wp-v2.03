<?php

function options_panel_styles_woo() {
        
        ?>        
        <style type="text/css">
        <?php


		/* WOOCOMMERCE ******************************************************/
                
                
                /* Color */
                
	        $secondarycolor = of_get_option('gg_secondary_color');
	        if ( of_get_option('gg_secondary_color') ) {
	        ?>
		a.button, 
		button.button, 
		input.button, 
		#respond input#submit, 
		#content input.button,
		#content div.product .woocommerce_tabs ul.tabs li,
		#content div.product .woocommerce-tabs ul.tabs li,
		.woocommerce #searchsubmit,
		.woocommerce .nav-next a,
		.woocommerce .nav-previous a,
		.widget_price_filter .ui-slider .ui-slider-range
		        {
		        background-color: <?php echo $secondarycolor; ?>;
		        }
		        
		ul.products li.product .price,
		div.product span.price,
		div.product p.price,
		#content div.product span.price,
		#content div.product p.price
		        {
		        color: <?php echo $secondarycolor; ?>;
		        }        
		<?php
		}
		
	        $secondarycolor_colorpicker = of_get_option('gg_secondary_color_colorpicker');
	        if ( of_get_option('gg_secondary_color_colorpicker') ) {
	        ?>
		a.button, 
		button.button, 
		input.button, 
		#respond input#submit, 
		#content input.button,
		#content div.product .woocommerce_tabs ul.tabs li,
		#content div.product .woocommerce-tabs ul.tabs li,
		.woocommerce #searchsubmit,
		.woocommerce .nav-next a,
		.woocommerce .nav-previous a,
		.widget_price_filter .ui-slider .ui-slider-range
		        {
		        background-color: <?php echo $secondarycolor_colorpicker; ?>;
		        }
		        
		ul.products li.product .price,
		div.product span.price,
		div.product p.price,
		#content div.product span.price,
		#content div.product p.price
		        {
		        color: <?php echo $secondarycolor_colorpicker; ?>;
		        } 
		<?php
		}
		
		
		
		/* hover color ********************************************************/
	        $hovercolor = of_get_option('gg_hovercolor');
	        if ( of_get_option('gg_hovercolor') ) {
	        ?>
	 
	        a.button:hover, 
		button.button:hover, 
		input.button:hover, 
		#respond input#submit:hover, 
		#content input.button:hover,
		#content div.product .woocommerce_tabs ul.tabs li:hover,
		#content div.product .woocommerce-tabs ul.tabs li:hover,
		.woocommerce #searchsubmit:hover,
		.woocommerce .nav-next a:hover,
		.woocommerce .nav-previous a:hover {
	                background-color: <?php echo $hovercolor; ?> !important;
	                }
	        <?php
	        }
		
		
		
		 /* Fonts */
		 
		$font = of_get_option('gg_font');
		
		if ( of_get_option('gg_font') ) {
		?>
		a.button, 
		button.button, 
		input.button,
		.woocommerce #searchsubmit,
		#respond input#submit, 
		#content input.button
		         {
		         font-family: "<?php echo $font; ?>" , "Helvetica Neue", Arial, "sans-serif";
		         }
		<?php
		}
		
		$trans = of_get_option('gg_trans');
		if ( of_get_option('gg_trans') ) {
		?>
		.woocommerce #searchsubmit,
		#respond input#submit, 
		.woocommerce #content input.button, 
		.woocommerce #respond input#submit, 
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button, 
		.woocommerce-page #content input.button, 
		.woocommerce-page #respond input#submit, 
		.woocommerce-page a.button, 
		.woocommerce-page button.button, 
		.woocommerce-page input.button {
		         text-transform: <?php echo $trans; ?>;
		         }         
		<?php
		}
		
		$fontweight = of_get_option('gg_fontweight');
		if ( of_get_option('gg_fontweight') ) {
		?>
	         .woocommerce #searchsubmit,
		#respond input#submit, 
		.woocommerce #content input.button, 
		.woocommerce #respond input#submit, 
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button, 
		.woocommerce-page #content input.button, 
		.woocommerce-page #respond input#submit, 
		.woocommerce-page a.button, 
		.woocommerce-page button.button, 
		.woocommerce-page input.button {
		        font-weight: <?php echo $fontweight; ?>;
		        }         
		<?php
		}


        
	        /* letter spacing *****************************************************/
		if ( of_get_option('gg_letterspacing') ) {
		?>
		.woocommerce #searchsubmit,
		#respond input#submit, 
		.woocommerce #content input.button, 
		.woocommerce #respond input#submit, 
		.woocommerce a.button, 
		.woocommerce button.button, 
		.woocommerce input.button, 
		.woocommerce-page #content input.button, 
		.woocommerce-page #respond input#submit, 
		.woocommerce-page a.button, 
		.woocommerce-page button.button, 
		.woocommerce-page input.button {
		        letter-spacing: 0;
		        }         
		<?php
		}


		
		
		
		
        ?>
        </style>
        <?php

}
add_action( 'wp_head', 'options_panel_styles_woo', 100 );

?>