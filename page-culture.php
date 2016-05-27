<?php
/*
 Template Name: Culture
*/
?>

<?php get_header(); ?>
            
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="half-banner culture-bkg" <?php bones_bg_image('header_banner'); ?>>
                                    <div class="overlay"></div>
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap">
                                                                <div class="wrapper_900">
                                                                     <h1><?php the_field('header_title'); ?></h1>
                                                                     <div class="border"></div>
                                                                </div>
                                                                <div class="wrapper_800">
                                                                     
                                                                </div>
                                                        </div>
                                              </div>
                                  </div>        
          </div><!--end of top banner-->


          <div class="middle-text culture">
                      <div class="wrapper_900">
                         <?php the_field('header_text'); ?>
                         <ul class="anchor-btns">
                           <?php if( have_rows('header_anchor_links') ): while( have_rows('header_anchor_links') ): the_row(); ?>
                             
                            <li><a class="button-blue-border" href="<?php the_sub_field('anchor_link'); ?>" data-scroll="" data-speed="1000" data-easing="easeInOutCubic"><?php the_sub_field('text'); ?></a></li>
                             
                         <?php endwhile; endif; ?>
                         </ul>
                      </div>
          </div>

          <div class="middle-text parts">
          <div class="culture-part">
                      <div id="part1"></div>
                      <div class="wrapper_600">
                         <h3><?php the_field('nonprofit_title'); ?></h3>
                         <div class="border"></div>
                      </div>
                      
                      <div class="part1box">
                         <div class="moviebtn"><a class="play_btn" data-video="first"><?php the_field('nonprofit_play_video_text'); ?></a></div>

                          <div class="slider_wrap culture1">
                             <div class="slider_1600">
                                <div id="culture-slider1" class="royalSlider heroSlider rsMinW rsDefault">
                                    <?php if( have_rows('nonprofit_slideshow') ): while( have_rows('nonprofit_slideshow') ): the_row(); 
                                        $img = get_sub_field('image'); ?>
                                    
                                        <div class="rsContent" data-rsDelay="4000">
                                            <img class="rsImg" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                        </div><!-- End of slide-->

                                    <?php endwhile; endif; ?>
                                 </div><!-- End of slider-->
                             </div>
                          </div><!-- End of Slider Wrap -->

                      </div>
          </div>

          <div id="first" class="video_wrapper">
                <div class="closingXWrapper">
                      <div class="closingX"></div>
                </div>
                <div class="video_content">
                        <div id="responsive_video">
                          <?php the_field('nonprofit_video_embed'); ?>
                        </div>
                </div>
          </div>


          <div class="culture-part">
              <div id="part2"></div>
             <div class="wrapper_600">
               <h3><?php the_field('outings_title'); ?></h3>
               <div class="border"></div>
             </div>
             <div class="part1box">
                 <ul class="boxes">
                    <li class="gutter-sizer"></li>
                   <?php if( have_rows('outings_images') ): while( have_rows('outings_images') ): the_row(); 
                        $img = get_sub_field('image'); ?>

                     <li class="item"><img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"></li>
                     
                   <?php endwhile; endif; ?>                     
                  </ul>
              </div>
          </div>

          <div class="culture-part">
             <div id="careers"></div>
             <div class="wrapper_600">
               <h3><?php the_field('careers_title'); ?></h3>
               <div class="border"></div>
             </div>

             <div class="wrapper_900">
               <?php the_field('careers_text'); ?>
             </div>
             
             <div class="part1box">
                <div class="questions-wrap">
                 <div class="wrapper_1200">
                    <ul class="container">
                        <?php get_template_part('partials/loop', 'jobs'); ?>
                     </ul>
                   </div>
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
