<?php 
global $body_class, $header_class;
$header_class = "blog";
$body_class = "blog category post";

get_header(); ?>

        <?php include 'partials/blog-header.php' ?>


        <div class="blog-grid">
          <div class="wrapper_1200">

              <div class="left-side post">
                 
                 <div class="breadcrumb"><a href="<?php echo get_permalink(312); ?>"><?php _e('Blog', 'bonestheme'); ?></a> &gt; <?php if (function_exists('bcn_display')) bcn_display(); ?></div>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                 
                       <div class="headline">
                             <div class="autor-details">
                                 <div class="pic">
                                   <?php echo get_avatar( get_the_author_meta( 'ID' ), 88 ); ?>
                                 </div>
                                 <?php $twitter  = get_the_author_meta('twitter', $author_id); 
                                   if(!empty($twitter)) {
                                      echo '<a title="Follow me on Twitter" href="'.$twitter.'">Follow <img src="http://www.qualityscore.co/wp-content/uploads/2016/04/twitter-128.png" alt="" /></a>';
                                   }
                                ?>
                             </div>
                             <div class="post-title">
                                <h1><?php the_title(); ?></h1>

                                <h5>
                                <?php show_authors(true); ?>
                                </h5>
                             </div>
                         </div>

                         <div class="the-post">
                            <?php the_content(); ?>
                         </div>
                 
                        <div class="commentsbox">
                           <h3><?php _e('Comments', 'bonestheme'); ?></h3>
                           <?php comments_template(); ?>
                         </div>
                 
                       <div class="related-posts">                            
                            <?php 
                              global $post_cta_text;
                              $post_cta_text = __('Read Post', 'bonestheme'); 
                            ?>
                            <?php if( have_rows('related_posts') ): ?>
                            <h3><?php _e('Related Posts', 'bonestheme'); ?></h3>
                            <?php while( have_rows('related_posts') ): the_row();  ?>                                
                                <?php get_template_part('partials/loop', 'posts'); ?>
                            <?php endwhile; endif; ?>

                        </div>

						<?php endwhile; ?>
						<?php endif; ?>
                  </div>
             
             
                  <div class="right-side">
						<?php dynamic_sidebar( 'sidebar-blog' ); ?>
                  </div>

           </div>
         </div>

        <a class="explore-more modalBoxOpen" data-window="modal-subscribe">
             <div class="wrapper_700">
                  <h3><?php the_field('footer_title', 312); ?></h3>
                  <ul>
                          <li><div class="button-white-border"><?php the_field('footer_cta_text', 312); ?></div></li>
                  </ul>
            </div>
        </a>

<?php get_footer('blog'); ?>
