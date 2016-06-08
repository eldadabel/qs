<?php
/*
 Template Name: Clients
*/
  global $header_class;
$header_class = "home";
?>

<?php 
global $body_class;
$body_class = "clients";

get_header(); ?>
            
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="half-banner customers-bkg" <?php bones_bg_image('header_banner'); ?>>
                                    <div class="overlay"></div>
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



          <div class="middle-text">
                      <div class="wrapper_700">
                         <h3><?php the_field('clients_title'); ?></h3>
                         <div class="border"></div>
                      </div>

                      <div class="more-section study clients">
                        <div class="wrapper_1200">
                                                        
                                   <ul>
                                       <?php if( have_rows('clients') ): while( have_rows('clients') ): the_row(); 
                                         
                                         $logo = get_sub_field('logo'); 
                                         $case_study = get_sub_field('case_study');
                                         ?>
                                         <li>
                                             <a <?php if( $case_study ) : ?>href="<?php the_sub_field('link'); ?>"<?php endif; ?> >
                                                   <div class="image-wrapper">
                                                          <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                                                   </div>
                                                   <div class="clear"></div>
                                                   <?php if( get_sub_field('case_study') ): ?>
                                                   <div class="content">
                                                              <div class="button-blue">Case Study</div>
                                                   </div>
                                                   <?php endif; ?>

                                             </a>
                                         </li>
                                       <?php endwhile; endif; ?>
                                         
                                   </ul>
                        </div>
                       </div><!--end of more section-->
          </div>

          <div class="middle-text testimonials">
                      <div class="wrapper_700">
                         <h3><?php the_field('testimonials_title'); ?></h3>
                         <div class="border"></div>
                      </div>
                      <div class="testimonials-section">
                          <div class="wrapper_1200">
                                      <ul>
                                       <?php if( have_rows('testimonials') ): while( have_rows('testimonials') ): the_row();                                          
                                         $logo = get_sub_field('logo'); 
                                        ?>

                                            <li>
                                                <div class="testi-wrap">
                                                      <div class="image-wrap">
                                                           <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
                                                      </div>
                                                      <div class="content">
                                                             <?php the_sub_field('quote'); ?>
                                                             <span class="name"><?php the_sub_field('name'); ?></span>
                                                             <span class="job"><?php the_sub_field('position'); ?></span>
                                                      </div>
                                                </div>
                                            </li>
                                       <?php endwhile; endif; ?>

                                      </ul>
                          </div>         
                      </div><!--end of textimonials section-->       
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
