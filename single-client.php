<?php
/*
 * CLIENT TEMPLATE
 *
*/
?>

<?php 
global $body_class;
$body_class = "study";

get_header(); 
?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="half-banner single">
                                   <div class="overlay"></div>
                                   <?php $img = get_field('header_background'); ?>
                                   <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap">
                                                              <div class="wrapper_800">
                                                                    <h1><?php the_title(); ?></h1>
                                                                    <div class="border"></div>
                                                                    <h2><?php the_field('header_subtitle'); ?></h2>
                                                              </div>
                                                        </div>
                                              </div>
                                  </div>        
          </div><!--end of top banner-->

          <div class="post-section">
                <div class="wrapper_800">
                         <div class="content">
                             <?php the_content(); ?>
                         </div>
                </div>
          </div><!--end of post section-->


          <div class="author-section">
                    <div class="wrapper_800">
                                   <!--  <div class="title">
                                         <h4>Author</h4>
                                    </div> -->
                                    <div class="author-wrap">
                                                        <div class="gravatar-image">
                                                              <?php $img = get_field('testimonial_image'); ?>
                                                              <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                                        </div>
                                                        <div class="profile-details">
                                                              <?php the_field('testimonial_text'); ?>
                                                        </div>
                                    </div>
                    </div>
           </div>

           <div class="more-section study">
                        <div class="wrapper_1200">
                                  <h3><?php _e('Explore More', 'bonestheme'); ?></h3>
                                   <ul>
                                         <!-- <li>
                                             <a href="kibo.html">
                                                   <div class="image-wrapper">
                                                          <img src="images/partners_logo11.jpg">
                                                   </div>
                                                   <div class="clear"></div>
                                                   <div class="content">
                                                              <div class="button-blue">Case Study</div>
                                                   </div>
                                             </a>
                                         </li> -->
                                       <?php if( have_rows('more_case_studies') ):
                                       while( have_rows('more_case_studies') ): the_row(); 
                                       $case_study = get_sub_field('case_study'); 
                                       $thumb = bones_get_post_thumb($case_study->ID);?>
                                         <li>
                                             <a href="<?php echo get_post_permalink( $case_study->ID ); ?>">
                                                   <div class="image-wrapper">
                                                          <img src="<?php echo $thumb; ?>">
                                                   </div>
                                                   <div class="clear"></div>
                                                   <div class="content">
                                                              <div class="button-blue"><?php the_sub_field('cta_text'); ?></div>
                                                   </div>
                                             </a>
                                         </li>
                                       <?php endwhile; endif; ?>
                                   </ul>
                        </div>
          </div><!--end of more section-->

          <a class="explore-more modalBoxOpen" data-window="modal-contact">
               <div class="wrapper_700">
                          <h3><?php the_field('footer_title', 19); ?></h3>
                          <ul>
                                  <li><div class="button-white-border"><?php the_field('footer_cta_text', 19); ?></div></li>
                          </ul>
              </div>
          </a>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
