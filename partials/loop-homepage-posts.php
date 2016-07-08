               <?php 
                    global $post_cta_text;
                    
                    $post = get_sub_field('article'); 
                    setup_postdata($post);
                    $user = get_user_meta($post->post_author); 
                ?>
                
               <div class="element small regular linkable" style="min-height: 0;">
                  <div class="boxxx">
                     <div class="picture-box">
                        <img src="<?php echo bones_get_post_thumb($post->ID); ?>">
                     </div>
                     <div class="autor-details">
                        <div class="pic">
                          <?php echo get_avatar( get_the_author_meta( 'ID' ), 46 ); ?>
                        </div>
                        <h5><?php show_authors(false); ?></h5>
                     </div>
                     <div class="infopost" style="padding-bottom: 0">
                        <a href="<?php the_permalink(); ?>" class="theLink h3" style="text-align: left;"><?php echo the_title(); ?></a>
                     </div>
                  </div>
                </div>

                <?php wp_reset_postdata(); ?>