<?php
/*
 Template Name: Home
*/

 global $header_class;
$header_class = "home";
?>

<?php get_header(); ?>
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="page-wrap animated fadein">            
        
            <?php 
            $img = get_field( 'header_banner' );            
            if ($img): ?>
                <style type="text/css">
                    @media screen and (max-width: 1040px) {
                        .top-banner {
                            background-image: url(<?php echo $img['url']; ?>);
                        }
                    }
                </style>                
            <?php endif; ?>
            
            <div class="top-banner fullHeight">
                                   <div class="video-container">
                                             <div class="inside-wrap">
                                                      <video loop="loop" class="video" autoplay="" preload="">
                                                             <!-- <source src:"movies/home-movie.webm" type="video/webm">  -->
                                                             <source src="<?php the_field('video'); ?>" type="video/mp4"> 
                                                      </video>
                                               </div>
                                   </div>
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap">
                                                            <div class="wrapper_1000">
                                                              <h1><?php the_field('header_title'); ?></h1>
                                                              <h2><?php the_field('Header_subtitle'); ?></h2>
                                                              <a class="button-blue centered" href="<?php the_field('header_cta_link'); ?>" data-scroll="" data-speed="500" data-easing="easeInOutCubic"><?php the_field('header_cta_text'); ?></a>
                                                            </div>
                                                        </div>
                                               </div>
                                   </div>        
            </div><!--end of top banner-->



          <div class="middle-text home" id="part1">
                      <div class="wrapper_700">
                         <h3><?php the_field('intro_title'); ?></h3>
                         <!-- <div class="border"></div> -->
                      </div>
                      <div class="wrapper_1000">
                         <?php the_field('intro_text'); ?>
                      </div>
          </div>

          <div class="platform-banner methodology black-bkg">
                          <div class="floating-content">
                               <a href="<?php the_field('methodology_cta_link'); ?>" class="q-pic q-mode"><div class="qimg"></div></a>          
                               <div class="text-middle">
                                         <div class="inside-wrap">
                                                  <h3><?php the_field('methodology_title'); ?></h3>
                                                  <!-- <span class="border"></span> -->
                                                  <?php the_field('methodology_text'); ?>
                                                  
                                                  <div class="clear"></div>
                                                  <a href="<?php the_field('methodology_cta_link'); ?>" class="button-blue-border"><?php the_field('methodology_cta_text'); ?></a>
                                         </div>
                               </div>
                          </div>  
          </div><!--end of platform banner-->

          <div class="platform-banner home-bkg black-bkg state1">
                          <div class="floating-content" <?php bones_bg_image('capabilities_banner'); ?> data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">            
                               <div class="text-middle">
                                         <div class="inside-wrap">
                                                  <h3><?php the_field('capabilities_title'); ?></h3>
                                                  <!-- <span class="border-white"></span> -->
                                                  <div class="clear"></div>
                                                  <div class="iconsboxx">
                                                    <ul>
                                                    <?php if( have_rows('capabilities_items') ): while( have_rows('capabilities_items') ): the_row(); ?>
                                                      <?php $img = get_sub_field('icon'); ?>
                                                      <li>
                                                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                                        <h4><?php the_sub_field('text'); ?></h4>
                                                      </li>
                                                    <?php endwhile; endif; ?>
                                                    </ul>
                                                  </div>
                                                  <a href="<?php the_field('capabilities_cta_link'); ?>" class="button-white-border"><?php the_field('capabilities_cta_text'); ?></a>
                                        </div>
                               </div>
                          </div>  
          </div><!--end of platform banner-->

          <div class="middle-text">
                      <div class="wrapper_700">
                         <h3><?php the_field('clients_title'); ?></h3>
                         <!-- <div class="border"></div> -->
                      </div>
                      <div class="partners">
                         <div class="wrapper_1550">
                               <ul>
                               <?php if( have_rows('clients_images') ): while( have_rows('clients_images') ): the_row(); ?>
                                  <?php $img = get_sub_field('image'); ?>
                                  <li>
                                     <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                  </li>
                               <?php endwhile; endif; ?>
                               </ul>
                         </div>
                      </div>

              <div class="testimonials">
                <div class="wrapper_1200">
                  <div id="content-slider" class="royalSlider contentSlider rsDefault">
                  <?php if( have_rows('clients_testimonials') ): while( have_rows('clients_testimonials') ): the_row(); ?>

                    <div class="slid">
                        <div class="customer_testimonial">
                          <blockquote>
                           <?php the_sub_field('quote'); ?>
                         </blockquote>
                        </div>
                        <div class="customer_profile">
                          <p class="job_title"><?php the_sub_field('name'); ?></p>
                        </div>
                    </div>
                      
                  <?php endwhile; endif; ?>
                  </div>     
                </div>
              </div><!--end of testimonials-->
              <div class="clients-btnbox">
                <a href="<?php the_field('testimonials_cta_link'); ?>" class="button-blue-border"><?php the_field('testimonials_cta_text'); ?></a>
              </div>
          </div>

          <div class="platform-banner team-bkg black-bkg">
                          <div class="floating-content" <?php bones_bg_image('team_banner'); ?> data-stellar-background-ratio="0.3" data-stellar-vertical-offset="0">            
                               <div class="text-middle">
                                         <div class="inside-wrap">
                                                  <h3><?php the_field('team_title'); ?></h3>
                                                  <!-- <span class="border"></span> -->
                                                  <?php the_field('team_text'); ?>
                                                  <div class="clear"></div>
                                                  <a href="<?php the_field('team_cta_link'); ?>" class="button-blue-border"><?php the_field('team_cta_text'); ?></a>
                                        </div>
                               </div>
                          </div>  
          </div><!--end of platform banner-->


        <div class="middle-banner second-pic">
                    <div class="image-wrap">
                               <span data-picture="" data-alt="blog picture">
                                <?php $item_count = 0; $noscript_image = "";?>
                                <?php if( have_rows('culture_banner') ): while( have_rows('culture_banner') ): the_row(); 
                                   $img = get_sub_field('image');
                                   if ( $item_count == 0 ) $noscript_image = $img;
                                   ?>
                                      <span data-src="<?php echo $img['url']; ?>" <?php if ( $item_count > 0 ): ?>data-media="(max-width: <?php the_sub_field('max_width') ?>px)"<?php endif; ?>><?php if ( $item_count == 0 ): ?><img alt="<?php echo $img['alt']; ?>" src="<?php echo $img['url']; ?>"><?php endif; ?></span>
                                   <?php                                          
                                   $item_count++;
                                   endwhile; endif; ?>
                                      <noscript><img src="<?php echo $noscript_image['url']; ?>"></noscript>
                              </span>
                     </div>
                     <div class="content">
                            <div class="inner-wrap">
                                   <div class="middle">
                                        <h3><?php the_field('culture_title'); ?></h3>
                                        <!-- <span class="border"></span> -->
                                        <?php the_field('culture_text'); ?>
                                        <a href="<?php the_field('culture_cta_link'); ?>" class="button-blue-border"><?php the_field('culture_cta_text'); ?></a>
                                  </div>
                            </div>
                     </div>
          </div>



          <div class="middle-text blog-tease">
                      <div class="wrapper_700">
                         <h3><?php the_field('blog_title'); ?></h3>
                         <!-- <div class="border"></div> -->
                      </div>
                      <div class="articles blog-grid" >
                         <div class="wrapper_1550">
                               <?php 
                              global $post_cta_text;
                              $post_cta_text = __('Read Post', 'bonestheme'); 
                            ?>
                            <?php if( have_rows('blog_articles') ): ?>
                            <?php while( have_rows('blog_articles') ): the_row();  ?>                                
                                <?php get_template_part('partials/loop', 'homepage-posts'); ?>
                            <?php endwhile; endif; ?>

                         </div>

                      </div>
                      <div class="clients-btnbox">
                        <a href="/blog" class="button-blue-border"><?php the_field('blog_cta'); ?></a>
                      </div>


          </div>



        <a class="explore-more modalBoxOpen" data-window="modal-contact" data-modal-category="contact" data-modal-action="website" data-modal-label="pagebottom">
             <div class="wrapper_700">
                        <h3><?php the_field('footer_title'); ?></h3>
                        <ul>
                              <li><div class="button-white-border"><?php the_field('footer_cta_text'); ?></div></li>
                        </ul>
            </div>
        </a>



                
<?php endwhile; endif; ?>

<?php get_footer(); ?>
