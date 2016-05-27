<?php 
global $body_class, $header_class;
$header_class = "blog";
$body_class = "blog category";

get_header(); ?>

        
       <?php include 'partials/blog-header.php' ?>

        <div class="blog-grid">
            <div class="wrapper_1200">

              <div class="left-side">

							<h1><?php single_cat_title(); ?></h1>
              <p><?php echo category_description(); ?></p>
              <hr>
							
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
