<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>HS FAQ Settings</h2>
	
	<div id="poststuff">
	
		<div id="post-body" class="metabox-holder columns-2">
		
			<!-- main content -->
			<div id="post-body-content">
				
				<div class="meta-box-sortables ui-sortable">
					
					<div class="postbox">
						<h3><span><?php _e( 'How to use the Shortcodes', 'hsfaq' ); ?></span></h3>
						
                                                <div class="inside">
                                                    <h2><?php _e( 'Display All FAQs on a single page', 'hsfaq' ); ?></h2>
                                                    <p><?php _e( 'To display all FAQs on a page. Add Following Shortcode to your page.', 'hsfaq' ); ?></p>
                                                    <code>[hs-faq limit="-1"]</code>
                                                    <p><?php _e( 'Where limit specifies the number of posts to display. -1 will display all the posts.', 'hsfaq' ); ?><br />
                                                       <?php _e( 'So if you want to display only 5 FAQs. Then use following shortcode.', 'hsfaq' ); ?>
                                                    </p>
                                                    
                                                    <code>[hs-faq limit="5"]</code>
                                                    
                                                    <h2><?php _e( 'To display FAQs of a specific category.', 'hsfaq' ); ?></h2>
                                                    
                                                    <p><?php _e( 'To display  FAQs of a specific category on a page. Add Following Shortcode to your page.', 'hsfaq' ); ?></p>
                                                    <code>[hs-faq-cat id="14"]</code>
                                                    <p><?php _e( 'Where 14 is the category ID.', 'hsfaq' ); ?></p>
                                                    
                                                    <h2><?php _e( 'Use shortcode in a PHP file, outside the post editor.', 'hsfaq' ); ?></h2>
                                                    <p><?php _e( 'You can also use the shortcode outside the post editor on a custom template.', 'hsfaq' ); ?></p>
                                                    <p> <code>echo do_shortcode('[hs-faq limit="-1"]'); </code></p>
						</div> <!-- .inside -->
                                                
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables .ui-sortable -->
				
			</div> <!-- post-body-content -->
			
			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">
				
				<div class="meta-box-sortables">
					
					<div class="postbox">
                                            
						<h3><span>About Helios Solutions</span></h3>
						<div class="inside">
                                                    <a href="http://heliossolutions.in/" target="_blank">
                                                        <img src="<?php echo $url = plugins_url('hs-simple-faq/images/cmp_logo.png'); ?>">
                                                    </a>
                                                    <p>Helios Solution is an Indian IT outsourcing company who works on many IT technologies such as wordpress, magento, joomla, drupal, opencart, cakephp, .NET etc </p>
						</div> <!-- .inside -->
                                                
					</div> <!-- .postbox -->
					
				</div> <!-- .meta-box-sortables -->
				
			</div> <!-- #postbox-container-1 .postbox-container -->
			
		</div> <!-- #post-body .metabox-holder .columns-2 -->
		
		<br class="clear">
	</div> <!-- #poststuff -->
	
</div> <!-- .wrap -->

<div class="wrap">
		
		<h2><?php _e( 'Add your custom CSS here', 'hsfaq' ); ?></h2>
		<form name="sccss-form" action="options.php" method="post" enctype="multipart/form-data">
			<?php settings_fields( 'hscss_settings_group' ); ?>
			
                        <div id="template">
				<?php do_action( 'hscss-form-top' ); ?>
				<div>
					<textarea cols="10" rows="10" name="hscss_settings[hscss-content]" id="hscss_settings[hscss-content]" style="width:88%"><?php echo esc_html( $content ); ?></textarea>
				</div>
				<?php do_action( 'hscss-textarea-bottom' ); ?>
				<div>
					<?php submit_button( __( 'Save Custom CSS', 'hsfaq' ), 'primary', 'submit', true ); ?>
				</div>
				<?php do_action( 'hscss-form-bottom' ); ?>
			</div>
                    
		</form>
</div> <!-- .wrap -->