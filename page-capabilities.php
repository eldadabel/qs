<?php
/*
 Template Name: Capabilities
*/
  global $header_class;
$header_class = "home";
?>

<?php get_header(); ?>
            
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="half-banner capabilities-bkg" <?php bones_bg_image('header_banner'); ?>>
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


          <div class="middle-text capabilities">
                      <div class="wrapper_900">
                         <?php the_field('header_text'); ?>
                      </div>
          </div>
                       
          <div class="middle-text capa">
                     <div class="wrapper_1000">
                         <h3><?php the_field('how_title'); ?></h3>
                     </div>

                     <div class="wrapper_1470">
                         <div class="iconsboxx">
                          <ul>
                            <?php $item_count = 1; ?>
                            <?php if( have_rows('how_items') ): while( have_rows('how_items') ): the_row(); ?>
                              
                            <li>
                              <a href="<?php the_sub_field('anchor_link'); ?>" data-scroll="" data-speed="1000" data-easing="easeInOutCubic">
                                <?php $img = get_sub_field('icon'); ?>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                <h4><?php the_sub_field('title'); ?></h4>
                                <?php the_sub_field('text'); ?>
                              </a>
                            </li>
                              
                            <?php $item_count++; ?>                              
                            <?php endwhile; endif; ?>
                          </ul>
                        </div>
                      </div>

           
          </div>

          <?php $item_count = 1; ?>
          <?php if( have_rows('how_sections') ): while( have_rows('how_sections') ): the_row(); ?>

          <div class="capa-part" id="<?php echo "part$item_count";?>">
              <div class="platform-banner capa-pic <?php echo "bkg$item_count";?> black-bkg">
                          <div class="floating-content" <?php bones_bg_image('banner', true); ?> data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0">            
                               <div class="text-middle">
                                         <div class="inside-wrap">
                                              <?php $img = get_sub_field('icon'); ?>
                                              <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                                <h3><?php the_sub_field('title'); ?></h3>
                                         </div>
                               </div>
                          </div>  
               </div>
               <div class="txtwrapp">
                        <div class="arrowup"></div>
                        <div class="wrapper_900">
                           <?php the_sub_field('text'); ?>
                        </div>
               </div>
          </div>

          <?php $item_count++; ?>                              
          <?php endwhile; endif; ?>


        <a class="explore-more capa modalBoxOpen" data-window="modal-contact" data-modal-category="contact" data-modal-action="website" data-modal-label="pagebottom">
             <div class="wrapper_700">
                        <h3><?php the_field('footer_title'); ?></h3>
                        <ul>
                              <li><div class="button-blue-border"><?php the_field('footer_cta_text'); ?></div></li>
                        </ul>
            </div>
        </a>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
