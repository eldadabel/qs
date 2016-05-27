        <div class="footer">
              <div class="folow-section">
                  <h3>Follow us</h3>
                   <?php  wp_nav_menu(array(
                        'container' => 'div',                           
                        'container_class' => 'social',        
                        'menu' => __( 'Footer Social', 'bonestheme' ),   
                        'menu_class' => '',            
                        'theme_location' => 'footer-social',             
                        'before' => '',                                 
                        'after' => '',                                  
                        'link_before' => '',                            
                        'link_after' => '',                            
                        'depth' => 0,                                   
                        'fallback_cb' => 'bones_footer_links_fallback' 
                    ));  ?>
              </div>
          
          <div class="foot-blognav">
                <div class="wrapper_1200">
                <ul>
                   <?php for ($i = 1; $i <= 6;  $i++) : 
                   $menu_name = 'blog-footer-menu-' . $i;
                   ?>
                   <li>
                      <h4><?php echo bones_get_menu_name( $menu_name ); ?></h4>
                      <?php  wp_nav_menu(array(
                           'container' => '',                           
                           'menu' => __( 'Footer Blog ' . $i, 'bonestheme' ),   
                           'menu_class' => '',            
                           'theme_location' => $menu_name,             
                           'before' => '',                                 
                           'after' => '',                                  
                           'link_before' => '',                            
                           'link_after' => '',                            
                           'depth' => 0,                                   
                           'fallback_cb' => 'bones_footer_links_fallback' 
                       ));  ?>
                   </li>
                   <?php endfor; ?>
                </ul>
                </div>
              </div>
          
            
              <div class="credits-section">
                       <div class="wrapper_2000">
                               <div class="inner">
                                           <div class="left">
                                               <span>All Rights Reserved to Quality Score LTD 2016 | &nbsp;</span>
                                               <a>Site Map</a>
                                           </div>

                                           <div class="right">
                                                  <a href="http://www.muze-studio.co.il" target="_blank" class="muze-credit">Site by Muze</a> 
                                           </div>
                               </div>
                       </div>
              </div>
        </div><!--end of footer-->

<?php /* only the homepage needs this closing tag here, yuck */ if ( is_page_template('page-home.php') ): ?></div><!--end of page wrap--><?php endif; ?>

<div class="navigation">
                 <div class="inside-wrap">

                        <?php wp_nav_menu(array(
                            'container' => '',                           
                            'container_class' => '',        
                            'menu' => __( 'Main Menu', 'bonestheme' ),   
                            'menu_class' => 'navlist',            
                            'theme_location' => 'main-menu',             
                            'before' => '',                                 
                            'after' => '',                                  
                            'link_before' => '',                            
                            'link_after' => '',                            
                            'depth' => 0,                                   
                            'fallback_cb' => 'bones_footer_links_fallback' 
						)); ?>



                      <div class="credits-section">
                         <div class="wrapper_2000">
                                 <div class="inner">
                                             <div class="social">
                                                                                            
                                                  <?php  wp_nav_menu(array(
                                                    'container' => 'div',                           
                                                    'container_class' => 'social',        
                                                    'menu' => __( 'Main Menu Social', 'bonestheme' ),   
                                                    'menu_class' => 'navlist',            
                                                    'theme_location' => 'main-social',             
                                                    'before' => '',                                 
                                                    'after' => '',                                  
                                                    'link_before' => '',                            
                                                    'link_after' => '',                            
                                                    'depth' => 0,                                   
                                                    'fallback_cb' => 'bones_footer_links_fallback' 
                                                )); ?>
                                             </div>
                                 </div>
                         </div>
                       </div>
                 </div><!--End of inside wrap -->
</div><!--End of navigation -->



<!---**************************************************MODAL WINDOWS **************************************************-->


          <!--MODAL WINDOW - modal-subscribe -->
          <div class="modal-box" id="modal-subscribe">
                <div class="overlay">
                       <div class="hider close-modal"></div>
                       <div class="middle">
                                   <div class="content">
                                             <div class="wrapper_600">
                                                     <div class="inner-wrap follow">
                                                           <a class="closingXWrapper close-modal">
                                                                  <div class="closingX"></div>
                                                           </a>
                                                           <div class="form-wrapper">
                                                                       <h3><?php _e('Follow Us', 'bonestheme'); ?></h3>
                                                                       
                                                                       <form id="form_contact" name="contact-form" action="//qualityscore.us13.list-manage.com/subscribe/post?u=3ded3b18998ab10a1edf993f9&amp;id=df25c09613" method="post" target="_blank" data-ajax="false">
                                                                               <ul>
                                                                                     <li>
                                                                                        <input type="email" name="EMAIL" placeholder="My Email Address" required />
                                                                                     </li>
                                                                                     <li>
                                                                                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                                                                     </li>
                                                                               </ul>
                                                                       </form>
                                                                       <div class="clear"></div>
                                                           </div>
                                                     </div>
                                            </div>
                                   </div>
                       </div>
                </div>
          </div><!--End Of MODAL WINDOW -  modal-contact  -->


		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>
  

</html> 
