                         <?php $jobs = get_posts( array(
                            'post_type' => 'job',
                            'posts_per_page' => 1000
                          ));
                          
                          if ($jobs): foreach ( $jobs as $job ): ?>
                        
                            <li class="question-single">
                                  <div class="question">
                                    <h4><?php echo $job->post_title; ?></h4>
                                     <div class="cross"></div>
                                  </div>
                                  <div class="answer">
                                      <a href="<?php echo get_post_permalink($job->ID); ?>" class="button-blue-border"><?php the_field('careers_cta_text'); ?></a>          
                                  </div>
                            </li>
                        
                        <?php endforeach; endif; ?>
