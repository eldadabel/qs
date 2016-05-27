<?php get_header(); ?>
		<script type="text/javascript"> jQuery('body').addClass('header-stick');</script>
		<div class="blog-header">
		   <div class="header-title" style="height: 80px;">
	     	 <div class="wrapper_700">
	        
	      </div>
	   </div>
		   <?php get_template_part('partials/nav', 'blog'); ?>
		  
		</div>
		<div id="content" class="not-found-page">
			<div class='container'>
				<img class="ship" src="<?php echo get_template_directory_uri(); ?>/library/css/images/404-hero.png" />
				<h1>404 Error</h1>
				<h2>sorry, the page not found</h2>
				
				<a href="<?php echo home_url(); ?>">
					<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/css/images/404-icon.png" />
					Back to safe ground!
				</a>
			</div>
		</div>

<?php get_footer(); ?>
