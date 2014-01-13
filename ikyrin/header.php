<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php 
	global $inove_nosidebar;
	$options = get_option('inove_options');
	if (is_home()) {
		$home_menu = 'current_page_item';
	}else {
		$home_menu = 'page_item';
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="Content-Language" content="zh-CN" />
	<meta name="keywords" content="<?php if (is_home()) {echo($options['keywords']);}elseif (is_single()) {$tags = wp_get_post_tags($post->ID);foreach ($tags as $tag ) {$keywords = $keywords .$tag->name .", ";}echo $keywords;}else {echo '';} ?>" />
	<meta name="description" content="<?php if ( is_home() ) {echo($options['description']);}elseif (is_single()) {if (has_excerpt()) {the_excerpt();}else {echo mb_strimwidth(strip_tags(apply_filters('the_content',$post->post_content)),0,160,"...");}}elseif (is_category()) {printf(single_cat_title('',false));}elseif (is_tag()) {printf(single_tag_title('',false));}elseif (is_day()) {printf(get_the_time(__('F jS, Y','inove')));}elseif (is_month()) {printf(get_the_time(__('F, Y','inove')));}elseif (is_year()) {printf(get_the_time(__('Y','inove')));}else {the_title('');} ?>" />
	<title><?php if ( is_single() ||is_page() ||is_category() ||is_tag() ) {wp_title('');}else {bloginfo('name');} ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts','inove'); ?>" href="<?php echo $feed; ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all comments','inove'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=121120" type="text/css" media="screen" />
	<?php if (strtoupper(get_locale()) == 'ZH_CN'||strtoupper(get_locale()) == 'ZH_TW') : ?>		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/chinese.css" type="text/css" media="screen" />
	<?php endif; ?>	<?php if ($options['collapse']) : ?>		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/collapse.css" type="text/css" media="screen" />
	<?php endif; ?>	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css?v=101700" type="text/css" media="screen" />
	<![endif]-->

	<?php wp_head(); ?>
</head>

<?php flush(); ?>
<body>
<!-- container START -->
<div id="container" <?php if($options['nosidebar'] ||$inove_nosidebar){echo 'class="one-column"';} ?> >

<?php include('templates/header.php'); ?>
<!-- content START -->
<div id="content" class="clearfix">
	<div class="inner">

	<div class="grid-main">
	<!-- main START -->
	<div id="main" class="grid-wrap">

