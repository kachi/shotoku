<?php get_header(); ?>
		
	<article>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<section class="eleven single-main page"> 
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
	<?php the_content(); ?>
		<?php if(current_user_can('read_private_pages')) :?>
			<aside class="tags">
				<ul>
			<li><?php edit_post_link( __( 'Edit this post' ), '<span class="edit-link">', '</span>' ); ?></li>
				</ul>
			</aside>
		<?php endif; ?>
		</section> 
				<div class="clear"></div>
		<?php endwhile; ?>
	<?php endif; ?>
	</article>
<?php get_footer(); ?>
