	</div>
	<!-- main END -->
	</div>

	<?php 
		$options = get_option('ikyrin_options');
		global $ikyrin_nosidebar;
		if(!$options['nosidebar'] &&!$ikyrin_nosidebar) {
			get_sidebar();
		}
		if($options['feed_url']) {
			if (substr(strtoupper($options['feed_url']),0,7) == 'HTTP://') {
				$feed = $options['feed_url'];
			}else {
				$feed = 'http://'.$options['feed_url'];
			}
		}else {
			$feed = get_bloginfo('rss2_url');
		}
	 ?>
	</div>
</div>
<!-- content END -->

<!-- footer START -->
<div id="footer">
	<div class="inner clearfix">
	
	<div id="copyright">
		<?php 
			global $wpdb;
			$post_datetimes = $wpdb->get_row($wpdb->prepare("SELECT YEAR(min(post_date_gmt)) AS firstyear, YEAR(max(post_date_gmt)) AS lastyear FROM $wpdb->posts WHERE post_date_gmt > 1970"));
			if ($post_datetimes) {
				$firstpost_year = $post_datetimes->firstyear;
				$lastpost_year = $post_datetimes->lastyear;
				$copyright = __('Copyright &copy; ','ikyrin') .$firstpost_year;
				if($firstpost_year != $lastpost_year) {
					$copyright .= '-'.$lastpost_year;
				}
				$copyright .= ' ';
				echo $copyright;
			}
		 ?><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a>. All rights reserved.
		<div class="theme">
			<?php printf(__('Powered by <a href="%1$s">WordPress</a>. Theme by <a href="%2$s">FireKyrin</a>, designed by <a href="%3$s">FireKyrin</a>. Valid <a rel="external nofollow" href="%4$s">XHTML 1.1</a> and <a rel="external nofollow" href="%5$s">CSS 3</a>.','ikyrin'),'http://wordpress.org/','http://www.firekyrin.com/','http://www.firekyrin.com/','http://validator.w3.org/check?uri=referer','http://jigsaw.w3.org/css-validator/check/referer?profile=css3'); ?> | 沪ICP备12019676号-1 | <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F648d7ddde548614a1698325ab1ddb1a1' type='text/javascript'%3E%3C/script%3E"));
</script>
			<span style="vertical-align:middle">
			<?php 
				$options = get_option('ikyrin_options');
				if ($options['analytics']) {
					echo($options['analytics_content']);
				}
			 ?>
			</span>
		</div>
	</div>
	<span id="mt"></span>

	<?php //wumii_add_load_script(5,3); ?>
	</div>
</div>
<!-- footer END -->

</div>
<!-- container END -->

<script type="text/javascript">
//<![CDATA[
var global = {
	serverUrl			:'<?php bloginfo('url'); ?>',
	templateUrl			:'<?php bloginfo('template_url'); ?>',
	countryCode			:'CN',

	colapseTheme		:'<?php echo($options['collapse']); ?>',
	includeEmailFeed	:'<?php echo($options['feed_email']); ?>',
	emailFeedUrl		:'<?php echo($options['feed_url_email']); ?>',
	feedUrl				:'<?php echo $feed; ?>',
	includeSocial		:'<?php echo($options['social']); ?>',
	socialName			:'<?php echo($options['social_name']); ?>',
	sinaUrl				:'<?php echo($options['sina_url']); ?>',
	twitterUrl			:'<?php echo($options['twitter_url']); ?>',
	tencentUrl			:'<?php echo($options['tencent_url']); ?>',
	doubanUrl			:'<?php echo($options['douban_url']); ?>',
	subcount			:'<?php if(function_exists('get_feedsky_count')) {echo get_feedsky_count();} ?>',
	githubUrl			:'http://github.com/firekyrin',

	cse					:'<?php echo($options['google_cse']); ?>',
	cseCx				:'<?php echo($options['google_cse_cx']); ?>',
	cseUrl				:'<?php bloginfo('url'); ?>/cse',
	searchKeywords		:''
};
//]]>
</script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>

<?php 
	wp_footer();
?>
</body>
</html>
