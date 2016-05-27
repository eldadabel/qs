<?php
/*
 * LEADER TEMPLATE
 *
*/
?>

<?php 
global $body_class;
$body_class = "clients";

get_header(); 
?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="half-banner" <?php bones_bg_image('header_banner'); ?>>
                                    <div class="overlay"></div>
                                   <div class="floating-content">            
                                               <div class="text-middle">
                                                         <div class="inside-wrap leaderstxt">
                                                                <div class="wrapper_800">
                                                                     <h1><?php the_title(); ?></h1>
                                                                     <h2><?php the_field('header_subtitle'); ?></h2>
                                                                     <div class="border"></div>
                                                                     
                                                              </div>
                                                        </div>
                                              </div>
                                  </div>        
          </div><!--end of top banner-->


       <div class="middle-text leader">
                 <div class="wrapper_800">
                         <div class="inner-wrap">
                             <?php the_content(); ?>
                         </div>
                  </div>
        </div>

          <div class="middle-text leadership more">
                      <div class="wrapper_700">
                         <div class="border"></div>
                      </div>
                      <div class="wrapper_1470">
                         <?php                                             
                             $next_post = bones_get_next_post('leader'); 
                             $prev_post = bones_get_prev_post('leader');
                              
                             $next_thumb = bones_get_post_thumb($next_post->ID);                                         
                             $prev_thumb = bones_get_post_thumb($prev_post->ID);                                     
                         ?>
                          <ul>
                             <li>
                               <a href="<?php echo get_post_permalink( $prev_post->ID ); ?>"><div class="btnwrp"><div class="btn"><?php echo get_field('name_title', $prev_post->ID); ?></div></div></a>
                               <img src="<?php echo $prev_thumb; ?>">
                             </li>
                             <li>
                               <a href="<?php echo get_post_permalink( $next_post->ID ); ?>"><div class="btnwrp"><div class="btn"><?php echo get_field('name_title', $next_post->ID); ?></div></div></a>
                               <img src="<?php echo $next_thumb; ?>">
                             </li>
                          </ul>
                      </div>
          </div>

        <a class="explore-more" href="<?php the_field('footer_cta_link'); ?><?php the_field('footer_cta_link_anchor_(optional)'); ?>">
             <div class="wrapper_700">
                        <h3><?php the_field('footer_title'); ?></h3>
                        <ul>
                              <li><div class="button-white-border"><?php the_field('footer_cta_text'); ?></div></li>
                        </ul>
            </div>
        </a>


    <?php endwhile; endif; ?>

<?php get_footer(); ?>
