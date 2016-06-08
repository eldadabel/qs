<?php
/*
 Template Name: Careers
*/
  global $header_class;
$header_class = "home";
?>

<?php 
global $body_class;
$body_class = 'clients';

get_header(); ?>
            
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="half-banner careerspage-bkg" <?php bones_bg_image('header_banner'); ?>>
                                    <div class="overlay"></div>
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap leaderstxt">
                                                                <div class="wrapper_800">
                                                                     <h1><?php the_field('header_title'); ?></h1>
                                                                     <h2><?php the_field('header_subtitle'); ?></h2>
                                                                     <div class="border"></div>
                                                                     
                                                              </div>
                                                        </div>
                                              </div>
                                  </div>        
          </div><!--end of top banner-->


     
       
       <div class="culture-part">
            
            

             <div class="wrapper_900">
               <?php the_field('header_text'); ?>
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

<?php  /*
        <a class="explore-more" href="<?php the_field('footer_cta_link'); ?><?php the_field('footer_cta_anchor'); ?>">
             <div class="wrapper_700">
                        <h3><?php the_field('footer_title'); ?></h3>
                        <ul>
                              <li><div class="button-white-border"><?php the_field('footer_cta_text'); ?></div></li>
                        </ul>
        </div>
</a>
*/ ?>

    <?php endwhile; endif; ?>


<?php get_footer(); ?>
