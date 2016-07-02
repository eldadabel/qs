<?php 
global $body_class, $header_class;
$header_class = "blog";
$body_class = "blog category";

get_header(); ?>

        <?php include 'partials/blog-header.php' ?>

        <div class="blog-grid">
            <div class="wrapper_1200">

              <div class="left-side">
                 
						<h1 class="archive-title"><span><?php _e( 'Search results for ...', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php get_template_part('partials/loop', 'archive'); ?>         
               </div>

               <div class="right-side">
						<?php dynamic_sidebar( 'sidebar-blog' ); ?>
               </div>
               
           </div>
         </div>

        <a class="explore-more modalBoxOpen" data-window="modal-subscribe" data-modal-category="signup" data-modal-action="newsletter" data-modal-label="postbottom">
             <div class="wrapper_700">
                        <h3><?php echo ot_get_option( 'category_footer_cta_title' ); ?></h3>
                        <ul>
                           <li><div class="button-white-border"><?php echo ot_get_option( 'category_footer_cta_text' ); ?></div></li>
                        </ul>
             </div>
        </a>
					
<?php get_footer('blog'); ?>
