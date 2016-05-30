<?php
/*
 Template Name: Blog
*/
?>

<?php 
global $body_class, $header_class;
$body_class = "blog";
$header_class = "blog";

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <?php 
    global $post_cta_text;
    $post_cta_text = get_field('post_cta'); 
    ?>

        <?php include 'partials/blog-header.php' ?>

        <div class="blog-grid">
            <div class="wrapper_1200">
                
               <?php 
               $post = get_field('featured_article_top'); 
               setup_postdata($post); 
               ?>

               <div class="element medium high">
                  <div class="boxxx">
                     <div class="imgboxxx full"  style="width: 100%;">
                       <img src="<?php echo bones_get_post_thumb($post->ID); ?>">
                     </div>
                     <div class="txtboxxx full">
                          <div class="pic">
                            <div class="picbox">
                              <?php echo get_avatar( get_the_author_meta( 'ID' ), 56 ); ?>
                            </div>
                             <h5><?php show_authors(false) ?></h5>
                          </div>
                          <div class="ttxt">
                              <a href="<?php the_permalink(); ?>" class="theLink"><h3><?php echo the_title(); ?></h3></a>
                              <p><?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?></p>
                          </div>
                     </div>
                  </div>
                </div>
               
               <?php wp_reset_postdata(); ?>

               <div class="element small high ">
                  <div class="boxxx none">
                     <div class="latest">
                        <h4><?php the_field('latest_articles_title'); ?></h4>
                        <ul>
                          <?php 
                          $posts = get_posts( array( 'posts_per_page' => 3 ) );
                          
                          foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                          <li>
                             <a href="<?php the_permalink(); ?>">
                               <div class="imgbox"><?php the_post_thumbnail('latest-thumbnail'); ?></div>
                               <p><?php the_title(); ?></p>
                             </a>
                          </li>
                          <?php endforeach; 
                            wp_reset_postdata();?>
                        </ul>
                     </div>
                  </div>
                </div>
                
              
                <?php if( have_rows('articles_top') ): while( have_rows('articles_top') ): the_row();  ?>
                    <?php get_template_part('partials/loop', 'posts'); ?>
                <?php endwhile; endif; ?>

              
               <div class="element large banner">
                   <a href="//www.qualityscore.co/" class="boxxx">
                      <span data-picture="" data-alt="blog picture">
                                <?php $item_count = 0; $noscript_image = "";?>
                                <?php if( have_rows('banner_images') ): while( have_rows('banner_images') ): the_row(); 
                                   $img = get_sub_field('image');
                                   if ( $item_count == 0 ) $noscript_image = $img;
                                   ?>
                                      <span data-src="<?php echo $img['url']; ?>" <?php if ( $item_count > 0 ): ?>data-media="(max-width: <?php the_sub_field('max_width') ?>px)"<?php endif; ?>><?php if ( $item_count == 0 ): ?><img alt="<?php echo $img['alt']; ?>" src="<?php echo $img['url']; ?>"><?php endif; ?></span>
                                   <?php                                          
                                   $item_count++;
                                   endwhile; endif; ?>
                                  <noscript><img src="<?php echo $noscript_image['url']; ?>"></noscript>
                      </span>
                   </a>
               </div>

                
                <?php if( have_rows('articles_middle') ): while( have_rows('articles_middle') ): the_row();  ?>
                    <?php get_template_part('partials/loop', 'posts'); ?>
                <?php endwhile; endif; ?>
                
               
               <?php 
               $post = get_field('featured_article_bottom'); 
               setup_postdata($post); 
               ?>

               <div class="element large vhigh">
                  <a href="<?php the_permalink(); ?>" class="boxxx">
                     <div class="imgboxxx full">
                       <img src="<?php echo bones_get_post_thumb($post->ID); ?>">
                     </div>
                     <div class="txtboxxx2 full">
                          <div class="pic">
                            <div class="picbox">
                              <?php echo get_avatar( get_the_author_meta( 'ID' ), 56 ); ?>
                            </div>
                            <h5><?php show_authors(false) ?></h5>
                          </div>
                          <div class="ttxt">
                              <h3><?php echo the_title(); ?></h3>
                              <p><?php echo get_post_meta($post->ID, '_yoast_wpseo_metadesc', true); ?></p>
                          </div>
                     </div>
                  </a>
                </div>
              
                <?php wp_reset_postdata(); ?>
              

                <?php if( have_rows('articles_bottom') ): while( have_rows('articles_bottom') ): the_row();  ?>
                    <?php get_template_part('partials/loop', 'posts'); ?>
                <?php endwhile; endif; ?>
                
                <?php /*
                <div class="element small regular">
                  <!--<a href="#" class="boxxx bkg">
                     
                  </a>-->
                  
                </div>
                */?>
                
            <?php the_field('embed_bottom'); ?>
            </div>
        </div>
      
        <a class="explore-more modalBoxOpen" data-window="modal-subscribe">
             <div class="wrapper_700">
                  <h3><?php the_field('footer_title'); ?></h3>
                  <ul>
                          <li><div class="button-white-border"><?php the_field('footer_cta_text'); ?></div></li>
                  </ul>
            </div>
        </a>

<?php endwhile; endif; ?>


<?php get_footer('blog'); ?>