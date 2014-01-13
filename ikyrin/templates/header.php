<!-- header START -->
<?php $options = get_option('ikyrin_options'); ?>
<div id="header">
	<div class="inner clearfix">
	<div id="caption">
		<span id="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></span>
		<div id="tagline"><?php echo html_entity_decode(get_bloginfo('description')); ?></div>
	</div>

	<!-- banner START -->
	<?php if( $options['banner_content'] &&(
		($options['banner_registered'] &&$user_ID) ||
		($options['banner_commentator'] &&!$user_ID &&isset($_COOKIE['comment_author_'.COOKIEHASH])) ||
		($options['banner_visitor'] &&!$user_ID &&!isset($_COOKIE['comment_author_'.COOKIEHASH]))
) ) : ?>
		<div class="banner">
			<?php echo($options['banner_content']); ?>
		</div>
	<?php endif; ?>
	<!-- banner END -->
	</div>
</div>
<!-- header END -->

<!-- navigation START -->
<div id="navi">
	<?php //wp_nav_menu(array('depth' => 3, 'container_class' => 'inner clearfix', 'menu_id' => 'menus', 'theme_location'=>'menu-header')); ?>
	<!-- fix start -->
	<div class="inner clearfix">
	<!-- menus START -->
	<ul id="menus">
		<li class="<?php echo($home_menu); ?>"><a class="home" href="<?php echo get_settings('home'); ?>/"><?php _e('Home','ikyrin'); ?></a></li>
		<?php 
			if($options['menu_type'] == 'categories') {
				wp_list_categories('title_li=0&orderby=name&show_count=0');
			}
			elseif($options['menu_type'] == 'pages') {
				$pages = wp_list_pages('echo=0&exclude=247&title_li=0&sort_column=menu_order');
				echo preg_replace('/title=\"(.*?)\"/','',$pages);
			}
			else {
				//wp_nav_menu(array('depth' => 3, 'container_class' => 'inner clearfix', 'menu_id' => 'menus', 'theme_location'=>'menu-header'));
				wp_list_categories('title_li=0&orderby=name&include=4,5&show_count=0');
				$pages = wp_list_pages('echo=0&exclude=2&title_li=0&sort_column=menu_order');
				echo preg_replace('/title=\"(.*?)\"/','',$pages);
		} ?>
	</ul>
	<!-- menus END -->
	</div>
	<!-- fix end -->
</div>
<!-- navigation END -->
