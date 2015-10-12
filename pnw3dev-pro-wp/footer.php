                </div><!-- #content-->      
                
                <div id="back-top"> <a href="#top"> <i class="fa fa-arrow-up"></i> </a> </div>

	</div><!-- #wrapper -->
        <div class="clear"></div>

        <footer id="footer">
                <div id="copyright-text" class="small">
                &copy;
                <?php $the_year = date("Y"); echo $the_year; ?>
                
                <?php
                if ( of_get_option('gg_copyright') ) {
                        echo(of_get_option('gg_copyright'));
                } else {
                ?>
                        <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved.', 'gxg_textdomain') ?>
                <?php       
                }
                ?>                           
                </div>
                
                <?php if ( of_get_option('gg_socialfooter') ) {
                        get_template_part( 'social-section' );
                } ?> 
        </footer><!-- #footer -->  

<?php wp_footer();  ?>

</body>

</html>