<?php
/*
 Template Name: Company
*/
?>

<?php get_header(); ?>
            
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="half-banner company-bkg" <?php bones_bg_image('header_banner'); ?>>
                                    <div class="overlay"></div>
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap">
                                                                <div class="wrapper_900">
                                                                     <h1><?php the_field('header_title'); ?></h1>
                                                                     <div class="border"></div>
                                                                </div>
                                                                <div class="wrapper_800">
                                                                     <h2><?php the_field('header_subtitle'); ?></h2>
                                                                </div>
                                                        </div>
                                              </div>
                                  </div>        
          </div><!--end of top banner-->

          <div class="middle-text leadership">
                      <div id="team"></div>
                      <div class="wrapper_700">
                         <h3><?php the_field('leadership_title'); ?></h3>
                         <div class="border"></div>
                         <?php the_field('leadership_subtitle'); ?>
                      </div>
                      <div class="wrapper_1470">
                          <ul>
                             <?php $leaders = get_posts( array(
                                        'post_type' => 'leader',
                                        'posts_per_page' => 1000
                                    ));
                              if ($leaders): foreach ( $leaders as $leader ):
                             ?>
                             
                             <li>
                              <img src="<?php echo bones_get_post_thumb($leader->ID); ?>">
                               <a href="<?php echo get_post_permalink($leader->ID); ?>">
                                <div class="btnwrp">
                                  <div class="explorebtn"><?php _e('Explore', bonestheme); ?></div>
                                  <div class="btn"><?php echo get_field('name_title', $leader->ID); ?></div>
                                </div>
                              </a>
                             </li>
                              
                              <?php                              
                              endforeach; endif;
                              ?>
                          </ul>
                      </div>
          </div>

          <div class="middle-text team">
                      <div id="team-members"></div>
                      <div class="wrapper_1000">
                         <h3><?php the_field('team_title'); ?></h3>
                         <div class="border"></div>
                         <?php the_field('team_subtitle'); ?>
                      </div>
                      <div class="wrapper_1470">
                          <ul>
                           <?php if( have_rows('team_members') ): while( have_rows('team_members') ): the_row();                                          
                             $img = get_sub_field('image'); 
                            ?>

                             <li>
                              <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                               <a>
                                 <div class="btnwrp">
                                   <div class="btn">
                                     <h4><?php the_sub_field('name'); ?></h4>
                                     <h5><?php the_sub_field('position'); ?></h5>
                                   </div>
                                 </div>
                               </a>                               
                             </li>
                            <?php endwhile; endif; ?>

                             <li>
                               <?php $img = get_field('job_image'); ?>
                               <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                               <a href="<?php the_field('job_link'); ?><?php the_field('job_link_anchor'); ?>">
                                <div class="btnwrp">
                                   <div class="btn">
                                     <h4><?php the_field('job_text'); ?></h4>
                                     <h5></h5>
                                   </div>
                                 </div>
                                </a>
                              
                             </li>

                                                          
                            <!--  <li>
                               <a>
                                 <div class="btnwrp">
                                   <div class="btn">
                                     <h4>name family</h4>
                                     <h5>Job title</h5>
                                   </div>
                                 </div>
                               </a>
                               <img src="images/team/12.jpg">
                             </li> -->

                             <!--<li>
                               <a>
                                 <div class="btnwrp">
                                   <div class="btn">
                                     <h4>name family</h4>
                                     <h5>Job title</h5>
                                   </div>
                                 </div>
                               </a>
                               <img src="images/team/6.jpg">
                             </li> -->
                                                                             
                             <!-- <li>
                               <a>
                                 <div class="btnwrp">
                                   <div class="btn">
                                     <h4>Lahan Mor</h4>
                                     <h5>PPC Campaign Manager</h5>
                                   </div>
                                 </div>
                               </a>
                               <img src="images/team/15.jpg">
                             </li> -->

                          </ul>
                      </div>
          </div>


          <div class="middle-text story">
                  <div class="wrapper_1000">
                     <h3><?php the_field('our_story_title'); ?></h3>
                     <div class="border"></div>
                      <?php the_field('our_story_subtitle'); ?>
                  </div>
                  <div class="wrapp-story">
                      <div class="wrapper_1000">
                          <div class="corner">
                            <div class="image a"><?php the_field('timeline_start_title'); ?></div>
                          </div>
                          <ul class="storybox">
                           <?php 
                             $timeline_count = 0;
                             if( have_rows('timeline') ): while( have_rows('timeline') ): the_row();                                          
                               $img = get_sub_field('image'); 
                            ?>

                            <li class="story-module">
                              <div class="circle"></div>
                              <?php if ( $timeline_count % 2 == 0): ?>
                               <div class="item left">
                                <div class="arrowpic"></div>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                              </div>
                              <div class="item right">
                                <div class="arrowpic"></div>
                                <?php the_sub_field('text'); ?>
                              </div>
                                
                              <?php else: ?>
                                
                               <div class="item left">
                                <div class="arrowpic"></div>
                                <?php the_sub_field('text'); ?>
                              </div>
                              <div class="item right">
                                <div class="arrowpic"></div>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                              </div>                  
                                
                              <?php endif; ?>
                            </li>
                            <?php $timeline_count++; ?>
                            <?php endwhile; endif; ?>

                          </ul>
                        <div class="corner">
                          <div class="image b"><?php the_field('timeline_end_title'); ?></div>
                        </div>
                      </div>
                </div>
          </div>


          <a class="explore-more modalBoxOpen" data-window="modal-contact">
               <div class="wrapper_700">
                          <h3><?php the_field('footer_title'); ?></h3>
                          <ul>
                                  <li><div class="button-white-border"><?php the_field('footer_cta_text'); ?></div></li>
                          </ul>
              </div>
          </a>

          <?php endwhile; endif; ?>


<?php get_footer(); ?>
