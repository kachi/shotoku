<?php
/*
 * Template Name: FacebookPage
 */
get_header(2); ?>

<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script> 
<script language="JavaScript">
 FB.init({ appId: '<?php $key="fb_app_id"; echo get_post_meta($post->ID, $key, true); ?>', status: true, cookie: true, xfbml: true }); 
window.fbAsyncInit = function() { FB.Canvas.setSize(); } 
function sizeChangeCallback() { FB.Canvas.setSize(); </script>
</head> 

<body class="fb_fangate_file">

<script> FB.Canvas.setSize({ width: 520, height: <?php $key="fb_height"; echo get_post_meta($post->ID, $key, true); ?> }); </script>
	<div class="container"> 


		<header>
				<h1>Powered by <a href="<?php echo get_option('home'); ?>/" target="_blank"><?php bloginfo('name'); ?></a></h1> 
		</header>

<!-- This content is for fans only. -->

	<article>

      <?php if (have_posts()) : ?>
         <?php while (have_posts()) : the_post(); ?>
		<section class="eleven single-main page"> 
			<h2 class="fangate_h2"><?php the_title(); ?></h2>

	<?php the_content(); ?>
		</section> 
         <?php endwhile; ?>
      <?php else : ?>
      <?php endif; ?>
				<div class="clear"></div>
	</article>

			<div class="clear"></div>

<?php get_footer(); ?>
