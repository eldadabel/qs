<?php 
global $body_class, $header_class;
$header_class = "blog";
$body_class = "blog category";

get_header(); ?>

        <?php include 'partials/blog-header.php' ?>

        <div class="blog-grid author-page">
            <div class="wrapper_1200">

              <div class="left-side">

              <div class="breadcrumb"><a href="<?php echo get_permalink(312); ?>"><?php _e('Blog', 'bonestheme'); ?></a> &gt; <?php if (function_exists('bcn_display')) bcn_display(); ?></div>


              <div class="headline">
                   <div class="author-pic">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 300 ); ?>

                   </div>
                   <div class="author-details">
                      <h1>About <?php echo get_the_author_meta('display_name') ?></h1>
                      <p>
                        <?php echo get_the_author_meta('description') ?>
                      </p>
                      <?php $twitter  = get_the_author_meta('twitter', $author_id); 
                         if(!empty($twitter)) {
                            echo '<a title="Follow me on Twitter" href="'.$twitter.'">Follow ' . get_the_author_meta("first_name")  . ' on Twitter <img src="http://www.qualityscore.co/wp-content/uploads/2016/04/twitter-128.png" alt="" /></a>';
                         }
                      ?>
                   </div>
                   <div class="clear"></div>
               </div>

               <hr>
               <h4>Latest posts by <?php echo get_the_author_meta('first_name') ?>:</h4>

              <?php get_template_part('partials/loop', 'archive'); ?> 
                                   

              </div><!-- end of left-side -->

			    <div class="right-side">  
                  <?php dynamic_sidebar( 'sidebar-blog' ); ?>
                </div>

				</div>

         </div>

        <a class="explore-more modalBoxOpen" data-window="modal-subscribe">
             <div class="wrapper_700">
                        <h3><?php echo ot_get_option( 'category_footer_cta_title' ); ?></h3>
                        <ul>
                           <li><div class="button-white-border"><?php echo ot_get_option( 'category_footer_cta_text' ); ?></div></li>
                        </ul>
             </div>
        </a>

<?php get_footer('blog'); ?>
