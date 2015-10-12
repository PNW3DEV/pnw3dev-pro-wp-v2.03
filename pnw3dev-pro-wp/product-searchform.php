<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<div>
                <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search for products', 'woocommerce' ); ?>" 
                onblur="if (this.value == '') {this.value = '<?php _e('Search here ...', 'gxg_textdomain') ?>';}" 
                onfocus="if (this.value == '<?php _e('Search here ...', 'gxg_textdomain') ?>') {this.value = '';}"
                onkeyup="SendQuery(this.value)"
                />
                <input type="hidden" name="post_type" value="product" />
	</div>
</form>