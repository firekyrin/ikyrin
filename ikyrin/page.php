<?php get_header(); ?>
<?php if (have_posts()) : the_post();update_post_caches($posts); ?>
	<div class="post post_without_border" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
		<div class="info clearfix">
			<?php if( method_exists( $GoogleTranslation,'google_ajax_translate_button') ) : ?>
				<span id="translate_button_post-<?php the_ID(); ?>" class="translate"><a href="javascript:void(0);" onclick="show_translate_popup(\'en\', \'post\', <?php the_ID(); ?>);" rel="nofollow">Translate</a></span>
			<?php endif; ?>
			<?php edit_post_link(__('Edit','ikyrin'),'<span class="editpost">','</span>'); ?>
			<?php if ($comments ||comments_open()) : ?>
				<span class="addcomment"><a href="#respond"><?php _e('Leave a comment','ikyrin'); ?></a></span>
				<span class="comments">
					<a href="#comments"><?php _e('Go to comments','ikyrin'); ?></a>
					<span class="views"><?php if (function_exists('the_views')) the_views(true,' | ',''); ?></span>
				</span>
			<?php endif; ?>
		</div>
		<div class="content clearfix">
			<?php the_content(); ?>
		</div>
	</div>

	<?php include('templates/comments.php'); ?>
<?php else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.','ikyrin'); ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>
