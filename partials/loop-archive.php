                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                           <div class="element">
                              <a href="<?php the_permalink(); ?>" class="boxxx">
                                 <div class="picture-box">
                                    <img src="<?php echo bones_get_post_thumb($post->ID); ?>">
                                 </div>
                                 <div class="autor-details">
                                    <div class="pic">
                                      <?php echo get_avatar( get_the_author_meta( 'ID' ), 46 ); ?>
                                    </div>
                                    <h5><?php show_authors(false) ?></h5>
                                 </div>
                                 <div class="infopost">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?></p>
                                    <div class="btn"><?php _e('Read Post', 'bonestheme'); ?></div>
                                 </div>
                              </a>
                            </div>

                            <hr>

							<?php endwhile; ?>
                               
                           <?php if ( bones_show_posts_nav() ) : ?>
                           <div class="pages">
                              <h5>Pages</h5>
                              <?php bones_page_navi(); ?>
                            </div>
                            <?php endif; ?>

                         <?php endif; ?>
