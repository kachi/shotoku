<?php if (function_exists('wp_list_comments')) : ?>

<div class="comments-tab"> 


<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>
<?php if ($comments) : ?>
<h3>Comments & Trackbacks<?php comments_number('', ' (1)', ' (%)' );?></h3>

<ul class="tabs"> 
  <li><a class="active" href="#simple">Comments</a></li> 
  <li><a href="#lightweight">Trackbacks</a></li> 
 
</ul> 
<div class="clear"></div>



<!-- You can start editing here ;) -->

<ul class="tabs-content">


<li class="active" id="simpleTab">

	<ol class="commentlist">
	
<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>

	<?php foreach ($comments as $comment) : ?>
<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type == 'comment') { ?>

<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>

	<?php } else { $trackback = true; } ?>
<?php endforeach; /* end for each comment */ ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

</li>


<li id="lightweightTab"> 

<?php if ($trackback == true) { ?>
<ol>
<?php foreach ($comments as $comment) : ?>
<?php $comment_type = get_comment_type(); ?>
<?php if($comment_type != 'comment') { ?>
<li><?php comment_author_link() ?></li>
<?php } ?>
<?php endforeach; ?>
</ol>
<?php } ?>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>

</li>
</ul>
</div>
<!-- end tabContainer -->


<?php if ('open' == $post->comment_status) : ?>

<div id="respond"><div class="cancel-comment-reply">
<small><?php cancel_comment_reply_link(); ?></small></div>
<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>


	


<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>



                                <div class="commform-textarea">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>
 
<?php else : ?>




                                <div class="input-area">
                                <div class="input-item">
                                <p>Name <span>*</span><br>
                                    <input type="text" name="author" id="author" tabindex="2" /></p>
                                </div>

                                <div class="input-item input-center">
                                <p>Email <span>*</span><br>
                                    <input type="text" name="email" id="email" tabindex="3" /></p>
                                </div>

                                <div class="input-item">
                                <p>Website<br>
                                    <input type="text" name="url" id="url" tabindex="4" /></p>
                                </div>
                                </div>

<div class="clear"></div>
                                <div class="commform-textarea">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>


<?php endif; ?>



<p><button name="submit" type="submit" id="submit"><span>Submit Comment</span></button>
<?php comment_id_fields(); ?>
</p>
<?php # do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>

<?php else: ?>


<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
			<?php
			return;
		}
	}
/* This variable is for alternating comment background */
$oddcomment = 'comment1';
?>
<h3>Comments<?php comments_number('', ' (1)', ' (%)' );?></h3> 
<?php comments_number('<p>No Comments</p>', '', '' );?>
<?php if ($comments) : $first = true; ?>
<?php foreach ($comments as $comment) : ?>
<div class="<?php echo $oddcomment; ?><?php if ($first) { echo ' first'; $first = false; } ?>" id="comment-<?php comment_ID() ?>">
	<div class="commentdetails">
		<p class="commentauthor"><?php comment_author_link() ?></p>
		<?php if ($comment->comment_approved == '0') : ?>
		<em>Your comment is awaiting moderation.</em>
		<?php endif; ?>
		<p class="commentdate"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?>
		&nbsp; &nbsp; <?php edit_comment_link('Edit Comment','',''); ?>
		</p>
	</div>
	<?php gravatar(80); ?>
	<br class="break" />
	<?php comment_text() ?>
</div>
<?php endforeach; /* end for each comment */ ?>
<?php endif; ?>
<h3 id="respond">Leave a reply</h3>
<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if ( $user_ID ) : ?>
	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>



                                <div class="commform-textarea">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>

	<?php else : ?>



                                <div class="input-item">
                                <p>Name <span>required</span></p>
                                    <input type="text" name="author" id="author" tabindex="2" required>
                                </div>

                                <div class="input-item input-center">
                                <p>Email <span>required</span></p>
                                    <input type="email" name="email" id="email" tabindex="3" required>
                                </div>

                                <div class="input-item">
                                <p>Website</p>
                                    <input type="url" name="url" id="url" tabindex="4">
                                </div>

<div class="clear"></div>
                                <div class="commform-textarea">
                                    <textarea name="comment" id="comment" cols="50" rows="7" tabindex="1"></textarea>
                                </div>


	<?php endif; ?>
	
		<p><button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
		</p>
		<?php # do_action('comment_form', $post->ID); ?>
	</form>

	<?php endif; ?>
	<?php endif; ?>
	
<?php endif; ?>
