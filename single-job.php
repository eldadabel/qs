<?php
/*
 * JOB TEMPLATE
 *
*/
?>

<?php 
global $body_class;
$body_class = "clients";

get_header(); 
?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="half-banner careerspage-bkg" <?php bones_bg_image('header_banner'); ?>>
                                    <div class="overlay"></div>
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap leaderstxt">
                                                                <div class="wrapper_800">
                                                                     <h1><?php the_title(); ?></h1>

                                                                     <div class="border"></div>
                                                                     
                                                              </div>
                                                        </div>
                                              </div>
                                  </div>        
          </div><!--end of top banner-->


       <div class="middle-text career">
                 <div class="wrapper_800">
                         <div class="inner-wrap">
                         
                              
                              <div class="answer">
                                  <?php the_content(); ?>

                                  <div class="button-blue-border modalBoxOpen" data-window="modal-careers"><?php the_field('apply_cta_text') ?></div> 
                              </div> 
                         </div>
                  </div>
        </div>


        <a class="explore-more" href="<?php the_field('footer_cta_link'); ?><?php the_field('footer_cta_anchor'); ?>">
             <div class="wrapper_700">
                        <h3><?php the_field('footer_title'); ?></h3>
                        <ul>
                              <li><div class="button-white-border"><?php the_field('footer_cta_text'); ?></div></li>
                        </ul>
            </div>
        </a>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
