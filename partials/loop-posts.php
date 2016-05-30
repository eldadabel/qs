               <?php 
                    global $post_cta_text;
                    
                    $post = get_sub_field('article'); 
                    setup_postdata($post);
                    $user = get_user_meta($post->post_author); 
                ?>
                
               <div class="element small regular">
                  <div class="boxxx">
                     <div class="picture-box">
                        <img src="<?php echo bones_get_post_thumb($post->ID); ?>">
                     </div>
                     <div class="autor-details">
                        <div class="pic">
                          <?php echo get_avatar( get_the_author_meta( 'ID' ), 46 ); ?>
                        </div>
                        <h5><?php _e('By', 'bonestheme'); ?> <span><?php the_author(); ?></span></h5>
                     </div>
                     <div class="infopost">
                        <a href="<?php the_permalink(); ?>" class="theLink h3"><?php echo the_title(); ?></a>
                        <p><?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?></p>
                        <div class="btn"><?php echo $post_cta_text; ?></div>
                     </div>
                  </div>
                </div>

                <?php wp_reset_postdata(); ?>