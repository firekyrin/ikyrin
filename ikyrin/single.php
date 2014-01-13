<?php get_header(); ?>
<?php $options = get_option('ikyrin_options'); ?>
<?php if (have_posts()) : the_post();update_post_caches($posts); ?>
	<div id="crumb">
		<?php $cur_cat = get_the_category(); ?>
		<a rel="nofollow" href="<?php echo get_settings('home'); ?>/"><?php _e('Home','ikyrin'); ?></a>
		  &gt; <?php the_category(', '); ?>
	</div>

	<div class="post post_without_border" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
		<div id="post-info" class="info clearfix">
			<span class="date"><?php the_time(__('F jS, Y','ikyrin')) ?></span>
			<?php if( method_exists( $GoogleTranslation,'google_ajax_translate_button') ) : ?>
				<span id="translate_button_post-<?php the_ID(); ?>" class="translate"><a href="javascript:void(0);" onclick="show_translate_popup(\'en\', \'post\', <?php the_ID(); ?>);" rel="nofollow">Translate</a></span>
			<?php endif; ?>
			<?php if ($options['author']) : ?><span class="author"><?php the_author_posts_link(); ?></span><?php endif; ?>
			<span><?php if(function_exists('the_ratings')) { the_ratings(); } ?></span>
			<?php edit_post_link(__('Edit','ikyrin'),'<span class="editpost">','</span>'); ?>
			<?php if ($comments ||comments_open()) : ?>
				<span class="addcomment"><a rel="nofollow" href="#respond"><?php _e('Leave a comment','ikyrin'); ?></a></span>
				<span class="comments"><a rel="nofollow" href="#comments"><?php _e('Go to comments','ikyrin'); ?></a></span>
			<?php endif; ?>
		</div>
		<div class="content clearfix">
			<?php the_content();wumii_get_related_items(); ?>
			<?php if (function_exists('multipagebar')) : ?>
				<?php multipagebar(); ?>
			<?php endif; ?>
			<div id="announce" class="msg-info">
				<strong>声明:</strong> 本文采用 <a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" rel="nofollow external"><abbr title="署名-非商业性使用-相同方式共享">BY-NC-SA</abbr></a> 协议进行授权. 转载请注明转自: <a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</div>
		</div>
	</div>

	<div id="posts" class="clearfix">
		<?php 
			if(function_exists('wp23_related_posts')) {
				echo '<div id="related-posts">';
				echo '<div class="caption">More Articles about <h2>';
				the_tags('',', ','');
				echo '</h2></div>';
				wp23_related_posts();
				echo '</div>';
			} ?>

		<!-- banner START -->
		<?php if( $options['post_banner_content'] &&(
			($options['post_banner_registered'] &&$user_ID) ||
			($options['post_banner_commentator'] &&!$user_ID &&isset($_COOKIE['comment_author_'.COOKIEHASH])) ||
			($options['post_banner_visitor'] &&!$user_ID &&!isset($_COOKIE['comment_author_'.COOKIEHASH]))
) ) : ?>
			<div  id="ads">
				<?php echo($options['post_banner_content']); ?>
			</div>
		<?php endif; ?>

		<!-- banner END -->
	</div>

	<div id="postnavi" class="block">
		<div class="content">
			<?php next_post_link('<span class="prev">%link</span>') ?>
			<?php previous_post_link('<span class="next">%link</span>') ?>
			<div class="fixed"></div>
		</div>
	</div>

	<?php include('templates/comments.php'); ?>
<?php else : ?>
	<div class="errorbox">
		<?php _e('Sorry, no posts matched your criteria.','ikyrin'); ?>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
