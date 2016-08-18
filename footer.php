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
                <?php wp_nav_menu(array(
                    'container' => 'div',                           
                    'container_class' => 'foot-navbox',        
                    'menu' => __( 'Footer Menu', 'bonestheme' ),   
                    'menu_class' => 'navlist',            
                    'theme_location' => 'footer-menu',             
                    'before' => '',                                 
                    'after' => '',                                  
                    'link_before' => '',                            
                    'link_after' => '',                            
                    'depth' => 0,                                   
                    'fallback_cb' => 'bones_footer_links_fallback' 
                ));  ?>
            
              <div class="credits-section">
                       <div class="wrapper_2000">
                               <div class="inner">
                                           <div class="left">
                                               <span>All Rights Reserved to Quality Score LTD 2016</span>
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

          <!--MODAL WINDOW - modal-contact -->
            
          <div class="ajax-loader">
          </div>

          <div class="modal-box" id="modal-contact">
                <div class="overlay">
                       <div class="hider close-modal"></div>
                       <div class="middle">
                                   <div class="content">
                                             <div class="wrapper_600">
                                                     <div class="inner-wrap">
                                                           <a class="closingXWrapper close-modal">
                                                                  <div class="closingX"></div>
                                                           </a>
                                                           <div class="form-wrapper">
                                                                       <h3>Contact Us</h3>
                                                                       
                                                                       <form id="form_contact" method="post" name="contact-form">
                                                                               <ul>
                                                                                     <li>
                                                                                          <input type="text" name="first_name" placeholder="First Name"/>
                                                                                     </li>
                                                                                     <li>
                                                                                          <input type="text" name="last_name" placeholder="Last Name"/>
                                                                                     </li>
                                                                                     <li>
                                                                                        <input type="email" name="email" placeholder="Email" required />
                                                                                     </li>
                                                                                     <li>
                                                                                        <textarea name="message"  placeholder="Leave a message"></textarea>
                                                                                     </li>
                                                                           
                                                                                     
                                                                                     <li>
                                                                                        <button type="submit">Send</button>
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


<!--MODAL WINDOW - modal-careers -->
          <div class="modal-box" id="modal-careers">
                <div class="overlay">
                       <div class="hider close-modal"></div>
                       <div class="middle">
                                   <div class="content">
                                             <div class="wrapper_600">
                                                     <div class="inner-wrap">
                                                            <a class="closingXWrapper close-modal">
                                                                  <div class="closingX"></div>
                                                           </a>
                                                           <div class="form-wrapper">
                                                                       <h3>Join Us as <?php echo get_the_title(); ?></h3>
                                                                       
                                                                       <form id="career_contact" class="career_contact1" method="post" name="contact-form">
                                                                               <ul>
                                                                                     <li>
                                                                                          <input type="text" name="first_name" placeholder="First Name"/>
                                                                                     </li>
                                                                                     <li>
                                                                                          <input type="text" name="last_name" placeholder="Last Name"/>
                                                                                     </li>
                                                                                     <li>
                                                                                        <input type="email" name="email" placeholder="Email" required />
                                                                                     </li>
                                                                                     <li>
                                                                                        <textarea name="message"  placeholder="Tell us about you"></textarea>
                                                                                     </li>
                                                                                     <li style="display:none;">
                                                                                     <input type="text" name="position"  value="<?php echo get_the_title(); ?>" />
                                                                                     </li>
                                                                                     <li>
                                                                                        <label>Upload your CV</label>
                                                                                        <input name="file" type="file">
                                                                                     </li>

                                                                                     <li>
                                                                                        <button type="submit">Send</button>
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
          </div><!--End Of MODAL WINDOW -  modal-careers  --> 


		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> 
