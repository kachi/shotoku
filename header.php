<!doctype html> 
	<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]--> 
	<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]--> 
	<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]--> 
	<!--[if (gte IE 9)|!(IE)]><!--> 	
	<html <?php language_attributes(); ?>> 
	<!--<![endif]--> 
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title ( '|', true,'right' ); ?><?php bloginfo('name'); ?></title>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]--> 
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico"> 
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png"> 
	
<script src="<?php bloginfo('template_url'); ?>/js/app.js"></script> 

   <script type="text/javascript">
      $(window).load(function() {
         $('article.index_article').masonry({
      itemSelector: '.feature',
      isAnimated: true
    });
  });
   </script>

</head> 


<body <?php body_class(''); ?>>

	<div class="toggle eleven"><span>Search</span></div>

		<div class="toggle_container"> 
			<form method="get" id="headsearchform" action="<?php bloginfo('url'); ?>">
				<fieldset class="sixteen">
	<input name="s" type="text" onfocus="if(this.value=='Search on <?php bloginfo('name'); ?>') this.value='';" onblur="if(this.value=='') this.value='Search on <?php bloginfo('name'); ?>';" value="Search on <?php bloginfo('name'); ?>" />
				</fieldset>
			</form>
		</div> 


	<div class="container"> 

		<header>

			<hgroup class="eleven"> 
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1> 
				<h2><?php bloginfo( 'description' ); ?></h2>
			</hgroup> 


		<nav id="nav" class="sixteen"> 
	<?php wp_nav_menu( array( 'theme_location' => 'main', 'sort_column' => 'menu_order','container_class' => 'menu-header' ) ); ?>
		</nav> 
				<div class="clear"></div>
	
		</header>
