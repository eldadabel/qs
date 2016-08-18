<?php 
	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
?>

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
				<h2>sorry, this page was not found</h2>

				<?php if (strpos($current_url, 'blog') !== false): ?>		
					<a href="<?php echo home_url(); ?>/blog/">
				<?php else: ?>
					<a href="<?php echo home_url(); ?>">
				<?php endif; ?>
					<img class="icon" src="<?php echo get_template_directory_uri(); ?>/library/css/images/404-icon.png" />
					Back to safe ground!
				</a>
			</div>
		</div>

<?php get_footer(); ?>
