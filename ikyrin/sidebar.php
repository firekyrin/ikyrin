<?php 
	$options = get_option('inove_options');
	if($options['feed'] &&$options['feed_url']) {
		if (substr(strtoupper($options['feed_url']),0,7) == 'HTTP://') {
			$feed = $options['feed_url'];
		}else {
			$feed = 'http://'.$options['feed_url'];
		}
	}else {
		$feed = get_bloginfo('rss2_url');
	} ?>

<!-- sidebar START -->
<div id="sidebar"  class="grid-extra">

<!-- sidebar north START -->
<?php if ( !function_exists('dynamic_sidebar') ||!dynamic_sidebar('north_sidebar') ) : ?>

	<!-- posts -->
	<?php 
		if (is_single()) {
			//$posts_widget_title = 'Recent Posts';
			$posts_widget_title = '最新文章';
		}else {
			//$posts_widget_title = 'Random Posts';
			$posts_widget_title = '随机文章';
		}
	?>

	<div class="widget">
		<div class="title"><?php echo $posts_widget_title; ?></div>
		<ul>
			<?php 
				if (is_single()) {
					$posts = get_posts('numberposts=5&orderby=post_date');
				}else {
					$posts = get_posts('numberposts=5&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="'.get_permalink() .'">'.get_the_title() .'</a></li>';
				}
				$post = $posts[0]; ?>
		</ul>
	</div>

	<!-- showcase -->
	<?php if( ($options['showcase_content1'] ||$options['showcase_content2'] ||$options['showcase_content3'] ||$options['showcase_content4'] ||$options['showcase_content5']) &&(
($options['showcase_registered'] &&$user_ID) ||
($options['showcase_commentator'] &&!$user_ID &&isset($_COOKIE['comment_author_'.COOKIEHASH])) ||
($options['showcase_visitor'] &&!$user_ID &&!isset($_COOKIE['comment_author_'.COOKIEHASH]))
) ) : ?>
		<div class="widget widget_ads clearfix">
			<?php if($options['showcase_caption']) : ?>
				<div class="title"><?php if($options['showcase_title']){echo($options['showcase_title']);}else{_e('Showcase','inove');} ?></div>
			<?php endif; ?>
			<ul>

			<?php 
				$no_ad = '<li><a href="http://www.firekyrin.com/contact/#contact"><img src="/wp-content/themes/ikyrin/sai/0.gif" alt="" width="125" height="125"/></a></li>';
				if($options['showcase_type'] == '4sq'){
					$ads = array();
					if($options['showcase_content1'] !='') $ads[] = $options['showcase_content1'];
					if($options['showcase_content2'] !='') $ads[] = $options['showcase_content2'];
					if($options['showcase_content3'] !='') $ads[] = $options['showcase_content3'];
					if($options['showcase_content4'] !='') $ads[] = $options['showcase_content4'];
					shuffle($ads);
					foreach ($ads as $ad){
						$html .= "<li>".$ad ."</li>\n";
					}

					for ($i = 1;$i <= 4 -count($ads);$i++){
						$html .= $no_ad;
					}
					echo $html;
				}else{
					echo($options['showcase_content5']);
				} ?>
			</ul>
		</div>
	<?php endif; ?>

	<!-- Posts View  -->
	<?php if (is_home() &&function_exists('get_most_viewed')): ?>
		<div class="widget">
			<div class="title"><?php _e('Hot Posts', 'inove'); ?></div>
		   <ul>
			  <?php get_most_viewed('post',5); ?>
		   </ul>
		</div>

	<?php elseif (is_tag() &&function_exists('get_most_viewed_tag') &&!empty($tag_id)): ?>
		<div class="widget">
			<div class="title"><?php _e('Hot Posts', 'inove'); ?></div>
			<ul>
			  <?php get_most_viewed_tag($tag_id,'post',5); ?>
			</ul>
		</div>

	<?php elseif (is_category() &&function_exists('get_most_viewed_category') &&!empty($cat)): ?>
		<div class="widget">
			<div class="title"><?php _e('Hot Posts', 'inove'); ?></div>
			<ul>
			<?php get_most_viewed_category($cat,'post',5); ?>
			</ul>
		</div>

	<?php elseif (function_exists('get_most_viewed')) : ?>
		<div class="widget">
			<div class="title"><?php _e('Hot Posts', 'inove'); ?></div>
		   <ul>
			  <?php get_most_viewed('post',5); ?>
		   </ul>
		</div>
	<?php endif; ?>

	<!-- recent comments -->
	<?php if( function_exists('wp_recentcomments') ) : ?>
		<div class="widget">
			<div class="title"><?php _e('Recent Comments', 'inove'); ?></div>
			<ul>
				<?php wp_recentcomments('limit=5&length=16&post=false&smilies=true'); ?>
			</ul>
		</div>
	<?php endif; ?>

	<!-- tag cloud -->
	<div id="tag-cloud" class="widget">
		<div class="title"><?php _e('Tag Cloud', 'inove'); ?></div>
		<?php wp_tag_cloud('smallest=8&largest=16'); ?>
	</div>

	<!-- top commentators -->
	<?php 
		if (is_home()) {
			$query="SELECT COUNT(comment_ID) AS cnt, comment_author, comment_author_url, comment_author_email FROM (SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->posts.ID=$wpdb->comments.comment_post_ID) WHERE comment_date > date_sub( NOW(), INTERVAL 1 MONTH ) AND user_id='0' AND comment_author_email != '819277740@qq.com' AND post_password='' AND comment_approved='1' AND comment_type='') AS tempcmt GROUP BY comment_author_email ORDER BY cnt DESC LIMIT 12";
			$wall = $wpdb->get_results($query);
			foreach ($wall as $comment){
				if( $comment->comment_author_url )
					$url = $comment->comment_author_url;
				else $url="#";
				$tmp = "<li><a rel='external nofollow' href='".$url."' title='".$comment->comment_author." (".$comment->cnt.")'>".get_avatar($comment->comment_author_email,32)."</a></li>";
				$output .= $tmp;
			}
			//$output = "<div class='widget commentators clearfix'><div class='title'>Top Commentators</div><ul>".$output."</ul></div>";
			$output = "<div class='widget commentators clearfix'><div class='title'>活跃读者</div><ul>".$output."</ul></div>";
			echo $output ;
		}
?>

<?php endif; ?>
<!-- sidebar north END -->

<div class="widget clearfix">

	<!-- sidebar east START -->
	<div id="eastsidebar">
	<?php if ( !function_exists('dynamic_sidebar') ||!dynamic_sidebar('east_sidebar') ) : ?>

		<!-- categories -->
		<div class="widget_categories">
			<div class="title"><?php _e('Categories', 'inove'); ?></div>
			<ul>
				<?php wp_list_cats('sort_column=name&optioncount=0&depth=1'); ?>
			</ul>
		</div>
	<?php endif; ?>
	</div>

	<!-- sidebar east END -->

	<!-- sidebar west START -->
	<div id="westsidebar">
	<?php if ( !function_exists('dynamic_sidebar') ||!dynamic_sidebar('west_sidebar') ) : ?>

		<!-- archives -->
		<div class="title"><?php _e('Archives', 'inove'); ?></div>
		<?php if(function_exists('wp_easyarchives_widget')) : ?>
			<?php wp_easyarchives_widget("mode=none&limit=6"); ?>
		<?php else : ?>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
	</div>

	<!-- sidebar west END -->
</div>

<!-- sidebar south START -->
<?php if ( !function_exists('dynamic_sidebar') ||!dynamic_sidebar('south_sidebar') ) : ?>

	<!-- meta -->
	<div class="widget">
		<div class="title"><?php _e('Meta', 'inove'); ?></div>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</div>

<?php endif; ?>
<!-- sidebar south END -->

</div>

<!-- sidebar END -->

