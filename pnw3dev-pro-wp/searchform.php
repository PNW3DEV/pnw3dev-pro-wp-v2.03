<!-- searchform-->
<div>
         <form id="searchform" method="get" action="<?php echo home_url() ?>/">
                 <div>
                         <input type="text" name="s" id="searchinput" value="<?php _e('Search here ...', 'gxg_textdomain') ?>" 
                         onblur="if (this.value == '') {this.value = '<?php _e('Search here ...', 'gxg_textdomain') ?>';}" 
                         onfocus="if (this.value == '<?php _e('Search here ...', 'gxg_textdomain') ?>') {this.value = '';}"
                         onkeyup="SendQuery(this.value)"
                         />
                 </div>
         </form>
</div>

<div class="clear">
</div>
<!-- .clear-->