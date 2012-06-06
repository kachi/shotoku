
			<?php if (is_page_template('page-facebook-template.php')): ?>
			<?php else : ?>

	<footer class="footer">
		<ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<li class="one-third column"> 
			<h3>Categories</h3>
	<ul>
	<?php wp_list_categories('title_li='); ?>
	</ul>
		</li> 

		<li class="one-third column"> 
			<h3 class="widget-title">Links</h3>	
	<ul>
	<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
	</ul>
		</li> 

		<li class="one-third column"> 
			<h3 class="widget-title">Meta</h3>	
	<ul>
	<?php wp_register(); ?>
	<li><?php wp_loginout(); ?></li>
	<?php wp_meta(); ?>
	</ul>
		</li> 

			<?php endif; ?>
		</ul>

	</footer>
			<?php endif; ?>
			<div class="clear"></div>

	<p class="copyright"><span class="f_links"><a href="<?php bloginfo('rss2_url'); ?>">Articles (RSS)</a>,<a href="<?php bloginfo('comments_rss2_url'); ?>">Commentaires (RSS)</a>| </span><span class="f_links"> Designed by <a href="http://kachibito.net/">Shiro</a>,Powered by <a href="http://wordpress.org/">WordPress</a></span> </p>
	<small class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> . All Rights Reserved.</small>
	</div><!-- container --> 

<?php wp_footer(); ?>

</body> 
</html>