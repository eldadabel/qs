<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,target-densitydpi=device-dpi, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        

		<title><?php wp_title(''); ?></title>
        

		<!--link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"-->

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

	</head>
    
    <?php global $body_class, $header_class; ?>
    
	<body class="<?php echo $body_class; ?>" >

    <?//php include_once("analyticstracking.php") ?>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WXG2JT"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WXG2JT');</script>
    <!-- End Google Tag Manager -->


        <div class="header <?php echo $header_class; ?>">
          <div class="wrapper_2000">
                 <div class="logo">
                         <a href="<?php echo home_url(); ?>" class="xtr_logo"><?php bloginfo('name'); ?></a>
                 </div>
                 <a class="burgWrapper navBtn">
                        <div class="burg"></div>
                 </a>
          </div>
        </div>
        
        