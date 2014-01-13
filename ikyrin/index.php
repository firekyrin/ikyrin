<?php get_header(); ?>
<?php 
	$options = get_option('ikyrin_options');
	if (function_exists('wp_list_comments')) {
		add_filter('get_comments_number','comment_count',0);
	}
?>
<?php if ($options['notice'] &&$options['notice_content']) : ?>
	<div id="notice">
		<div class="content">
			<?php echo($options['notice_content']); ?>
		</div>
	</div>
<?php elseif(function_exists (news_announcement)) : ?>
	<div id="notice">
		<div class="content">
			<?php news_announcement(); ?>
		</div>
	</div>
<?php endif; ?>

<?php if (have_posts()) : $i=0;while (have_posts()) : $i++;the_post();update_post_caches($posts); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<div id="post-info" class="info clearfix">
			<span class="date"><?php the_time(__('F jS, Y','ikyrin')) ?></span>
			<?php if( method_exists( $GoogleTranslation,'google_ajax_translate_button') ) : ?>
				<span id="translate_button_post-<?php the_ID(); ?>" class="translate"><a href="javascript:void(0);" onclick="show_translate_popup(\'en\', \'post\', <?php the_ID(); ?>);" rel="nofollow">Translate</a></span>
			<?php endif; ?>
			<?php if ($options['categories']) : ?>
				<span class="cata"><?php the_category(', '); ?></span>
			<?php endif; ?>
			<!-- ?php if ($options['author']) : ?>
				<span class="author" --><!-- ?php the_author_posts_link(); ?></span -->
			<!-- ?php endif; ? -->
			<span><?php if(function_exists('the_ratings')) { the_ratings(); } ?></span>
			<?php edit_post_link(__('Edit','ikyrin'),'<span class="editpost">','</span>'); ?>
			<span class="comments">
				<?php comments_popup_link(__('No comments','ikyrin'),__('1 comment','ikyrin'),__('% comments','ikyrin'),'',__('Comments off','ikyrin')); ?>
				<span class="views"><?php if (function_exists('the_views')) the_views(true,' | ',''); ?></span>
			</span>
		</div>
		<div class="content clearfix">
			<?php the_content(__('Read more...','ikyrin')); ?>
			<!-- ?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 290,"..."); ? -->
		</div>
		<!-- div class="under">
			<a rel="nofollow" href=" --> <!-- ?php the_permalink() ?>" title="阅读全文" class="more-link">阅读全文...</a>
		</div -->
	</div>
		<!-- ?php if ($options['tags']) : ?>
			<div class="under"><span class="tag" --><!-- ?php the_tags('',', ',''); ?></span></div --><!-- ?php endif; ?>	</div -->
		<?php endwhile;else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.','ikyrin'); ?>	</div>
<?php endif; ?>
<div id="pagenavi" class="clearfix">
	<?php if(function_exists('wp_pagenavi')) : ?>
		<?php wp_pagenavi() ?>
	<?php else : ?>
		<span class="newer"><?php previous_posts_link(__('Newer Entries','ikyrin')); ?></span>
		<span class="older"><?php next_posts_link(__('Older Entries','ikyrin')); ?></span>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
