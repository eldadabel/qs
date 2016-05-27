            <div class="blog-nav">
              <div class="navv-wrapp">
                  <div class="blognav-xbtn"></div>
                  <div class="wrapper_1200">
                    <h2>Select a Category</h2>
                    <?php wp_nav_menu(array(
                        'container' => '',                           
                        'menu' => __( 'Blog Menu', 'bonestheme' ),   
                        'menu_class' => 'categories',            
                        'theme_location' => 'blog-menu',             
                        'before' => '',                                 
                        'after' => '',                                  
                        'link_before' => '',                            
                        'link_after' => '',                            
                        'depth' => 0,                                   
                        'fallback_cb' => 'bones_footer_links_fallback' 
                    ));  ?>
                    <?php /* <ul class="categories">
                       <li class="on"><a href="blog.html">Main</a></li>
                       <li><a href="category.html">Category A</a></li>
                       <li><a href="category.html">Category B</a></li>
                       <li><a href="category.html">Category C</a></li>
                       <li><a href="category.html">Category D</a></li>
                    </ul> */ ?>

                    <form id="searchbox" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                       <div class="formbox">
                           <input class="input" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e('Search ...', 'bonestheme'); ?>">
                           <input type="submit" value="" class="btn" />
                       </div>
                    </form>

                   </div>
             </div>
           </div>