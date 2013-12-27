<?php 
	class iNoveOptions {
		function getOptions() {
			$options = get_option('inove_options');
			if (!is_array($options)) {
			$options['keywords'] = '';
			$options['description'] = '';
			$options['google_cse'] = false;
			$options['google_cse_cx'] = '';
			$options['menu_type'] = 'pages';
			$options['nosidebar'] = false;
			$options['collapse'] = false;
			$options['notice'] = false;
			$options['notice_content'] = '';
			$options['banner_registered'] = false;
			$options['banner_commentator'] = false;
			$options['banner_visitor'] = false;
			$options['banner_content'] = '';
			$options['post_banner_registered'] = false;
			$options['post_banner_commentator'] = false;
			$options['post_banner_visitor'] = false;
			$options['post_banner_content'] = '';
			$options['showcase_registered'] = false;
			$options['showcase_commentator'] = false;
			$options['showcase_visitor'] = false;
			$options['showcase_caption'] = false;
			$options['showcase_title'] = '';
			$options['showcase_type'] = '4sq';
			$options['showcase_content1'] = '';
			$options['showcase_content2'] = '';
			$options['showcase_content3'] = '';
			$options['showcase_content4'] = '';
			$options['showcase_content5'] = '';
			$options['author'] = true;
			$options['categories'] = true;
			$options['tags'] = true;
			$options['feed_url'] = '';
			$options['feed_email'] = false;
			$options['feed_url_email'] = '';
			$options['social'] = false;
			$options['social_name'] = 'sina';
			$options['twitter_url'] = '';
			$options['sina_url'] = '';
			$options['tencent_url'] = '';
			$options['douban_url'] = '';
			$options['analytics'] = false;
			$options['analytics_content'] = '';
			$options['wumii_is_enabled'] = true;
			update_option('inove_options',$options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['inove_save'])) {
			$options = iNoveOptions::getOptions();
			$options['keywords'] = stripslashes($_POST['keywords']);
			$options['description'] = stripslashes($_POST['description']);
			if ($_POST['google_cse']) {
				$options['google_cse'] = (bool)true;
			}else {
				$options['google_cse'] = (bool)false;
			}
			$options['google_cse_cx'] = stripslashes($_POST['google_cse_cx']);
			$options['menu_type'] = stripslashes($_POST['menu_type']);
			if ($_POST['nosidebar']) {
				$options['nosidebar'] = (bool)true;
			}else {
				$options['nosidebar'] = (bool)false;
			}
			if ($_POST['collapse']) {
				$options['collapse'] = (bool)true;
			}else {
				$options['collapse'] = (bool)false;
			}
			$options['wumii_is_enabled'] = $_POST['wumii_is_enabled'];
			if ($_POST['notice']) {
				$options['notice'] = (bool)true;
			}else {
				$options['notice'] = (bool)false;
			}
			$options['notice_content'] = stripslashes($_POST['notice_content']);
			if (!$_POST['banner_registered']) {
				$options['banner_registered'] = (bool)false;
			}else {
				$options['banner_registered'] = (bool)true;
			}
				if (!$_POST['banner_commentator']) {
					$options['banner_commentator'] = (bool)false;
				}else {
					$options['banner_commentator'] = (bool)true;
				}
				if (!$_POST['banner_visitor']) {
					$options['banner_visitor'] = (bool)false;
				}else {
					$options['banner_visitor'] = (bool)true;
				}
				$options['banner_content'] = stripslashes($_POST['banner_content']);
				if (!$_POST['post_banner_registered']) {
					$options['post_banner_registered'] = (bool)false;
				}else {
					$options['post_banner_registered'] = (bool)true;
				}
				if (!$_POST['post_banner_commentator']) {
					$options['post_banner_commentator'] = (bool)false;
				}else {
					$options['post_banner_commentator'] = (bool)true;
				}
				if (!$_POST['post_banner_visitor']) {
					$options['post_banner_visitor'] = (bool)false;
				}else {
					$options['post_banner_visitor'] = (bool)true;
				}
				$options['post_banner_content'] = stripslashes($_POST['post_banner_content']);
				if (!$_POST['showcase_registered']) {
					$options['showcase_registered'] = (bool)false;
				}else {
					$options['showcase_registered'] = (bool)true;
				}
				if (!$_POST['showcase_commentator']) {
					$options['showcase_commentator'] = (bool)false;
				}else {
					$options['showcase_commentator'] = (bool)true;
				}
				if (!$_POST['showcase_visitor']) {
					$options['showcase_visitor'] = (bool)false;
				}else {
					$options['showcase_visitor'] = (bool)true;
				}
				if ($_POST['showcase_caption']) {
					$options['showcase_caption'] = (bool)true;
				}else {
					$options['showcase_caption'] = (bool)false;
				}
				$options['showcase_type'] = stripslashes($_POST['showcase_type']);
				$options['showcase_title'] = stripslashes($_POST['showcase_title']);
				$options['showcase_content1'] = stripslashes($_POST['showcase_content1']);
				$options['showcase_content2'] = stripslashes($_POST['showcase_content2']);
				$options['showcase_content3'] = stripslashes($_POST['showcase_content3']);
				$options['showcase_content4'] = stripslashes($_POST['showcase_content4']);
				$options['showcase_content5'] = stripslashes($_POST['showcase_content5']);
				if ($_POST['author']) {
					$options['author'] = (bool)true;
				}else {
					$options['author'] = (bool)false;
				}
				if ($_POST['categories']) {
					$options['categories'] = (bool)true;
				}else {
					$options['categories'] = (bool)false;
				}
				if (!$_POST['tags']) {
					$options['tags'] = (bool)false;
				}else {
					$options['tags'] = (bool)true;
				}
				$options['feed_url'] = stripslashes($_POST['feed_url']);
				if ($_POST['feed_email']) {
					$options['feed_email'] = (bool)true;
				}else {
					$options['feed_email'] = (bool)false;
				}
				$options['feed_url_email'] = stripslashes($_POST['feed_url_email']);
				if ($_POST['social']) {
					$options['social'] = (bool)true;
				}else {
					$options['social'] = (bool)false;
				}
				$options['social_name'] = stripslashes($_POST['social_name']);
				$options['sina_url'] = stripslashes($_POST['sina_url']);
				$options['twitter_url'] = stripslashes($_POST['twitter_url']);
				$options['tencent_url'] = stripslashes($_POST['tencent_url']);
				$options['douban_url'] = stripslashes($_POST['douban_url']);
				if ($_POST['analytics']) {
					$options['analytics'] = (bool)true;
				}else {
					$options['analytics'] = (bool)false;
				}
				$options['analytics_content'] = stripslashes($_POST['analytics_content']);
				update_option('inove_options',$options);
			}else {
				iNoveOptions::getOptions();
		}
	add_theme_page(__('Current Theme Options','inove'),__('Current Theme Options','inove'),'edit_themes',basename(__FILE__),array('iNoveOptions','display'));
	}
	function display() {
		$options = iNoveOptions::getOptions();
?>
<form action="#" method="post" enctype="multipart/form-data" name="inove_form" id="inove_form">
	<div class="wrap">
		<h2><?php _e('Current Theme Options','inove'); ?></h2>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Meta','inove'); ?>						<br/>
						<small style="font-weight:normal;"><?php _e('Just in effect homepage','inove'); ?></small>
					</th>
					<td>
						<?php _e('Keywords','inove'); ?>						<label><?php _e('( Separate keywords with commas )','inove'); ?></label><br/>
						<input type="text" name="keywords" id="keyword" class="code" size="136" value="<?php echo($options['keywords']); ?>">
						<br/>
						<?php _e('Description','inove'); ?>						<label><?php _e('( Main decription for your blog )','inove'); ?></label>
						<br/>
						<input type="text" name="description" id="description" class="code" size="136" value="<?php echo($options['description']); ?>">
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Search','inove'); ?></th>
					<td>
						<label>
							<input name="google_cse" type="checkbox" value="checkbox" <?php if($options['google_cse']) echo "checked='checked'"; ?> />
							 <?php _e('Using google custom search engine.','inove'); ?>						</label>
						<br/>
						<?php _e('CX:','inove'); ?>						 <input type="text" name="google_cse_cx" id="google_cse_cx" class="code" size="40" value="<?php echo($options['google_cse_cx']); ?>">
						<br/>
						<?php printf(__('Find <code>name="cx"</code> in the <strong>Search box code</strong> of <a href="%1$s">Google Custom Search Engine</a>, and type the <code>value</code> here.<br/>For example: <code>014782006753236413342:1ltfrybsbz4</code>','inove'),'http://www.google.com/coop/cse/'); ?>					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Menubar','inove'); ?></th>
					<td>
						<label style="margin-right:20px;">
							<input name="menu_type" type="radio" value="pages" <?php if($options['menu_type'] != 'categories') echo "checked='checked'"; ?> />
							 <?php _e('Show pages as menu.','inove'); ?>						</label>
						<label>
							<input name="menu_type" type="radio" value="categories" <?php if($options['menu_type'] == 'categories') echo "checked='checked'"; ?> />
							 <?php _e('Show categories as menu.','inove'); ?>						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Sidebar','inove'); ?></th>
					<td>
						<label>
							<input name="nosidebar" type="checkbox" value="checkbox" <?php if($options['nosidebar']) echo "checked='checked'"; ?> />
							 <?php _e('Hide sidebar from all pages.','inove'); ?>						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Theme style','inove'); ?></th>
					<td>
						<label>
							<input name="collapse" type="checkbox" value="checkbox" <?php if($options['collapse']) echo "checked='checked'"; ?> />
							 <?php _e('Switch theme to collapse style.','inove'); ?>						</label>
					</td>
				</tr>
			</tbody>
		</table>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('相关文章','inove'); ?></th>
					<td>
						<label>
							<input name="wumii_is_enabled" type="checkbox" value="checkbox" <?php if($options['wumii_is_enabled']) echo "checked='checked'"; ?> />
							 <?php _e('启用无觅相关文章插件','inove'); ?>						</label><br/>
						<?php _e('设置无觅相关文章展示样式请登录：<a href=\"http://www.wumii.com/site/index.htm\">无觅网站管理中心</a>','inove'); ?>					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Notice','inove'); ?>						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled','inove'); ?></small>
					</th>
					<td>
						<!-- notice START -->
						<label>
							<input name="notice" type="checkbox" value="checkbox" <?php if($options['notice']) echo "checked='checked'"; ?> />
							 <?php _e('This notice bar will display at the top of posts on homepage.','inove'); ?>						</label>
						<br />
						<label>
							<textarea name="notice_content" id="notice_content" cols="50" rows="10" style="width:98%;font-size:12px;" class="code"><?php echo($options['notice_content']); ?></textarea>
						</label>
						<!-- notice END -->
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Title Banner','inove'); ?>						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled','inove'); ?></small>
					</th>
					<td>
						<!-- banner START -->
						<?php _e('This banner will display at the right of header. (height: 60 pixels)','inove'); ?>						<br/>
						<?php _e('Who can see?','inove'); ?>						<label style="margin-left:10px;">
							<input name="banner_registered" type="checkbox" value="checkbox" <?php if($options['banner_registered']) echo "checked='checked'"; ?> />
							 <?php _e('Registered Users','inove'); ?>						</label>
						<label style="margin-left:10px;">
							<input name="banner_commentator" type="checkbox" value="checkbox" <?php if($options['banner_commentator']) echo "checked='checked'"; ?> />
							 <?php _e('Commentator','inove'); ?>						</label>
						<label style="margin-left:10px;">
							<input name="banner_visitor" type="checkbox" value="checkbox" <?php if($options['banner_visitor']) echo "checked='checked'"; ?> />
							 <?php _e('Visitors','inove'); ?>						</label>
						<br/>
						<label>
							<textarea name="banner_content" id="banner_content" cols="50" rows="10" style="width:98%;font-size:12px;" class="code"><?php echo($options['banner_content']); ?></textarea>
						</label>
						<!-- banner END -->
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Post Banner','inove'); ?>						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled','inove'); ?></small>
					</th>
					<td>
						<!-- post banner START -->
						<?php _e('This showcase will display at the bottom of post. (width: 300 pixels)','inove'); ?>						<br/>
						<?php _e('Who can see?','inove'); ?>						<label style="margin-left:10px;">
							<input name="post_banner_registered" type="checkbox" value="checkbox" <?php if($options['post_banner_registered']) echo "checked='checked'"; ?> />
							 <?php _e('Registered Users','inove'); ?>						</label>
						<label style="margin-left:10px;">
							<input name="post_banner_commentator" type="checkbox" value="checkbox" <?php if($options['post_banner_commentator']) echo "checked='checked'"; ?> />
							 <?php _e('Commentator','inove'); ?>						</label>
						<label style="margin-left:10px;">
							<input name="post_banner_visitor" type="checkbox" value="checkbox" <?php if($options['post_banner_visitor']) echo "checked='checked'"; ?> />
							 <?php _e('Visitors','inove'); ?>						</label>
						<br/>
						<label>
							<textarea name="post_banner_content" id="post_banner_content" cols="50" rows="10" style="width:98%;font-size:12px;" class="code"><?php echo($options['post_banner_content']); ?></textarea>
						</label>
						<!-- post banner END -->
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Sidebar Showcase','inove'); ?>						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled','inove'); ?></small>
					</th>
					<td>
						<!-- sidebar showcase START -->
						<?php _e('This showcase will display at the top of sidebar.','inove'); ?>						<br/>
						<?php _e('Who can see?','inove'); ?>						<label style="margin-left:10px;">
							<input name="showcase_registered" type="checkbox" value="checkbox" <?php if($options['showcase_registered']) echo "checked='checked'"; ?> />
							 <?php _e('Registered Users','inove'); ?>						</label>
						<label style="margin-left:10px;">
							<input name="showcase_commentator" type="checkbox" value="checkbox" <?php if($options['showcase_commentator']) echo "checked='checked'"; ?> />
							 <?php _e('Commentator','inove'); ?>						</label>
						<label style="margin-left:10px;">
							<input name="showcase_visitor" type="checkbox" value="checkbox" <?php if($options['showcase_visitor']) echo "checked='checked'"; ?> />
							 <?php _e('Visitors','inove'); ?>						</label>
						<br/>
						<label>
							<input name="showcase_caption" type="checkbox" value="checkbox" <?php if($options['showcase_caption']) echo "checked='checked'"; ?> />
							 <?php _e('Title:','inove'); ?>						</label>
						 <input type="text" name="showcase_title" id="showcase_title" class="code" size="40" value="<?php echo($options['showcase_title']); ?>" />
						<br/>
						<label>
							<input name="showcase_type" type="radio" value="4sq" <?php if($options['showcase_type'] != '1sq') echo "checked='checked'"; ?> />
							 <?php _e('Show 4 squares showcase content. (square size: 125 x 125 pixels)','inove'); ?>						</label>
						<br/>
						<label>
							<?php _e('Squre1:','inove'); ?> <textarea name="showcase_content1" id="showcase_content1" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['showcase_content1']); ?></textarea>
						</label>
						<label>
							<?php _e('Squre2:','inove'); ?> <textarea name="showcase_content2" id="showcase_content2" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['showcase_content2']); ?></textarea>
						</label>
						<label>
							<?php _e('Squre3:','inove'); ?> <textarea name="showcase_content3" id="showcase_content3" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['showcase_content3']); ?></textarea>
						</label>
						<label>
							<?php _e('Squre4:','inove'); ?> <textarea name="showcase_content4" id="showcase_content4" cols="50" rows="2" style="width:98%;font-size:12px;" class="code"><?php echo($options['showcase_content4']); ?></textarea>
						</label>
						<label>
							<input name="showcase_type" type="radio" value="1sq" <?php if($options['showcase_type'] == '1sq') echo "checked='checked'"; ?> />
							 <?php _e('Show single showcase content. (width: 250 pixels)','inove'); ?>						</label>
						<br/>
						<label>
							<textarea name="showcase_content5" id="showcase_content5" cols="50" rows="10" style="width:98%;font-size:12px;" class="code"><?php echo($options['showcase_content5']); ?></textarea>
						</label>
						<!-- sidebar showcase END -->
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Posts','inove'); ?></th>
					<td>
						<label style="margin-right:20px;">
							<input name="author" type="checkbox" value="checkbox" <?php if($options['author']) echo "checked='checked'"; ?> />
							 <?php _e('Show author on posts.','inove'); ?>						</label>
						<label style="margin-right:20px;">
							<input name="categories" type="checkbox" value="checkbox" <?php if($options['categories']) echo "checked='checked'"; ?> />
							 <?php _e('Show categories on posts.','inove'); ?>						</label>
						<label>
							<input name="tags" type="checkbox" value="checkbox" <?php if($options['tags']) echo "checked='checked'"; ?> />
							 <?php _e('Show tags on posts.','inove'); ?>						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Feed','inove'); ?></th>
					<td>
						 <?php _e('Custom feed URL:','inove'); ?> <input type="text" name="feed_url" id="feed_url" class="code" size="60" value="<?php echo($options['feed_url']); ?>">
						<br/>
						<label>
							<input name="feed_email" type="checkbox" value="checkbox" <?php if($options['feed_email']) echo "checked='checked'"; ?> />
							 <?php _e('Show email feed in reader list.','inove'); ?>						</label>
						<br />
						 <?php _e('Email feed URL:','inove'); ?> <input type="text" name="feed_url_email" id="feed_url_email" class="code" size="60" value="<?php echo($options['feed_url_email']); ?>">
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><?php _e('Social','inove'); ?></th>
					<td>
						<label>
							<input name="social" type="checkbox" value="checkbox" <?php if($options['social']) echo "checked='checked'"; ?> />
							<?php _e('Add Social button.','blocks'); ?>						</label>
						<br />
						<div>
							<?php _e('Default Social.','blocks'); ?>							<select name="social_name" size="1">
								<option value="sina" <?php if($options['social_name'] == 'sina') echo ' selected '; ?>><?php _e('Sina','blocks'); ?></option>
								<option value="twitter" <?php if($options['social_name'] == 'twitter') echo ' selected '; ?>><?php _e('Twitter','blocks'); ?></option>
								<option value="tencent" <?php if($options['social_name'] == 'tencent') echo ' selected '; ?>><?php _e('Tencent','blocks'); ?></option>
								<option value="douban" <?php if($options['social_name'] == 'douban') echo ' selected '; ?>><?php _e('Douban','blocks'); ?></option>
							</select>
						</div>
						 <?php _e('Sina URL:','inove'); ?>						 <input type="text" name="sina_url" id="sina_url" class="code" size="40" value="<?php echo($options['sina_url']); ?>">
						<br />
						 <?php _e('Twitter URL:','inove'); ?>						 <input type="text" name="twitter_url" id="twitter_url" class="code" size="40" value="<?php echo($options['twitter_url']); ?>">
						<br />
						 <?php _e('Tencent URL:','inove'); ?>						 <input type="text" name="tencent_url" id="tencent_url" class="code" size="40" value="<?php echo($options['tencent_url']); ?>">
						<br />
						 <?php _e('Douban URL:','inove'); ?>						 <input type="text" name="douban_url" id="douban_url" class="code" size="40" value="<?php echo($options['douban_url']); ?>">
						<br />
						<a href="http://www.firekyrin.com/" onclick="window.open(this.href);return false;">Follow FireKyrin</a>
						 | <a href="http://twitter.com/jevonszhou/" onclick="window.open(this.href);return false;">Follow Jevons Zhou</a>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">
						<?php _e('Web Analytics','inove'); ?>						<br/>
						<small style="font-weight:normal;"><?php _e('HTML enabled','inove'); ?></small>
					</th>
					<td>
						<label>
							<input name="analytics" type="checkbox" value="checkbox" <?php if($options['analytics']) echo "checked='checked'"; ?> />
							 <?php _e('Add web analytics code to your site. (e.g. Google Analytics, Yahoo! Web Analytics, ...)','inove'); ?>						</label>
						<label>
							<textarea name="analytics_content" cols="50" rows="10" id="analytics_content" class="code" style="width:98%;font-size:12px;"><?php echo($options['analytics_content']); ?></textarea>
						</label>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input class="button-primary" type="submit" name="inove_save" value="<?php _e('Save Changes','inove'); ?>" />
		</p>
	</div>
</form>

<?php 
		}
	}
	add_action('admin_menu',array('iNoveOptions','add'));
	function theme_init(){
		load_theme_textdomain('inove',get_template_directory() .'/languages');
	}
	add_action ('init','theme_init');
	if( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'name'=>'north_sidebar',
			'before_widget'=>'<div id="%1$s" class="widget %2$s">',
			'after_widget'=>'</div>',
			'before_title'=>'<div class="title">',
			'after_title'=>'</div>'
			));
		register_sidebar(array(
			'name'=>'south_sidebar',
			'before_widget'=>'<div id="%1$s" class="widget %2$s">',
			'after_widget'=>'</div>',
			'before_title'=>'<div class="title">',
			'after_title'=>'</div>'
			));
		register_sidebar(array(
			'name'=>'west_sidebar',
			'before_widget'=>'<div id="%1$s" class="%2$s">',
			'after_widget'=>'</div>',
			'before_title'=>'<div class="title">',
			'after_title'=>'</div>'
			));
		register_sidebar(array(
			'name'=>'east_sidebar',
			'before_widget'=>'<div id="%1$s" class="%2$s">',
			'after_widget'=>'</div>',
			'before_title'=>'<div class="title">',
			'after_title'=>'</div>'
			));
	}
	if ( function_exists('register_nav_menus') ) {
		register_nav_menus(array(
			'menu-header' => 'Header Autodefine Menu',
			'menu-footer' => 'Footer Autodefine Menu',
			'primary'=>'PrimaryNavigation'
		));
	}
	remove_action('wp_head','wp_generator');
	remove_action('wp_head','wlwmanifest_link');
	remove_action('wp_head','rsd_link');
	remove_action('wp_head','index_rel_link');
	remove_action('wp_head','wp_shortlink_wp_head',10,0 );
	remove_action('wp_head','feed_links_extra',3 );
	remove_action('wp_head','start_post_rel_link');
	remove_action('wp_head','adjacent_posts_rel_link_wp_head',10,0);
	add_action('widgets_init','my_remove_recent_comments_style');
	wp_deregister_script('l10n');
	function my_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action('wp_head',array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'],'recent_comments_style'));
	}
	if( !is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery',("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"),false,'1.4.2');
		wp_enqueue_script('jquery');
	}
	function load_post() {
		if($_GET['action'] == 'load_post'&&$_GET['id'] != '') {
			$id = $_GET["id"];
			$output = '';
			global $wpdb,$post;
			$post = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE ID = %d LIMIT 1",$id));
			if($post) {
				$content = $post->post_content;
				$output = balanceTags($content);
				$output = wpautop($output);
				$output = convert_smilies($output);
				$output = do_shortcode($output);
			}
			echo $output;
			die();
		}
	}
	add_action('init','load_post');
	function add_nofollow_to_link($link) {
		return str_replace('<a','<a rel="nofollow"',$link);
	}
	add_filter('the_content_more_link','add_nofollow_to_link',0);
	function add_nofollow_to_comments_popup_link(){
		return ' rel="nofollow" ';
	}
	add_filter('comments_popup_link_attributes','add_nofollow_to_comments_popup_link');
	if (function_exists('wp_list_comments')) {
		function comment_count( $commentcount ) {
			global $id;
			$_comments = get_comments('status=approve&post_id='.$id);
			$comments_by_type = &separate_comments($_comments);
			return count($comments_by_type['comment']);
		}
	}
	function load_comment(){
		if($_GET['action'] =='load_comment'&&$_GET['id'] != ''){
			$comment = get_comment($_GET['id']);
			if(!$comment) {
				fail(printf('Whoops! Can\'t find the comment with id  %1$s',$_GET['id']));
			}
			custom_comments($comment,null,null);
			die();
		}
	}
	add_action('init','load_comment');
	function custom_comments($comment,$args,$depth) {
		$GLOBALS['comment'] = $comment;
		global $commentcount;
		if(!$commentcount) {
			$page = get_query_var('cpage')-1;
			$cpp=get_option('comments_per_page');
			$commentcount = $cpp * $page;
			if ($commentcount <0) $commentcount = 0;
		}
?>
	<li class="hreview clearfix <?php if($comment->comment_author_email == get_the_author_email()) {echo 'admincomment'; }else {echo 'evencomment'; } ?>" id="comment-<?php comment_ID() ?>">
		<div class="info clearfix">
			<?php if (function_exists('get_avatar') &&get_option('show_avatars')) {echo get_avatar($comment,32);} ?>
			<?php if (get_comment_author_url()) : ?>
				<a class="reviewer" id="reviewer-<?php comment_ID() ?>" href="<?php comment_author_url() ?>" rel="external nofollow">
			<?php else : ?>
				<span class="reviewer" id="reviewer-<?php comment_ID() ?>">
			<?php endif; ?>
			<?php comment_author(); ?>
			<?php if(get_comment_author_url()) : ?>
				</a>
			<?php else : ?>
				</span>
			<?php endif; ?>
				 | <a class="anchor" rel="nofollow" href="#comment-<?php comment_ID() ?>"><?php printf('#%1$s',++$commentcount); ?></a>
			<div class="dtreviewed"><?php printf( __('%1$s at %2$s','inove'),get_comment_time(__('F jS, Y','inove')),get_comment_time(__('H:i','inove')) ); ?><?php if (function_exists('useragent_output_custom')) {printf(' | ');echo useragent_output_custom();} ?></div>
		</div>

		<?php if ($comment->comment_approved == '0') : ?>
			<p><small><?php _e('Your comment is awaiting moderation.','inove'); ?></small></p>
		<?php endif; ?>		
		<div class="description" id="commentbody-<?php comment_ID() ?>">
			<?php comment_text(); ?>
		</div>

<?php 
	}
	function wumii_get_related_items() {
		require_once(ABSPATH .'wp-admin/includes/plugin.php');
		$themeOptions = get_option('inove_options');
		$is_enabled = $themeOptions['wumii_is_enabled'];
		global $post,$wumii_should_display;
		$wumii_should_display = $is_enabled &&!is_plugin_active('wumii-related-posts/wumii-related-posts.php') &&
		get_post_status($post->ID) == 'publish'&&get_post_type() == 'post'&&
		empty($post->post_password) &&!is_preview();
		if (!$wumii_should_display) {
			return;
		}
		$escapedUrl = wumii_html_escape(get_permalink());
		$escapedTitle = wumii_html_escape(the_title('','',false));
		$escapedPic = wumii_html_escape(wumii_get_thumbnail_src());
		echo "    
		<div class=\"wumii-hook\">
		    <input type=\"hidden\" name=\"wurl\" value=\"$escapedUrl\" />
		    <input type=\"hidden\" name=\"wtitle\" value=\"$escapedTitle\" />
		    <input type=\"hidden\" name=\"wpic\" value=\"$escapedPic\" />
		</div>";
	}
	function wumii_add_load_script($num = 4,$mode = 3) {
		global $wumii_should_display;
		if (!$wumii_should_display) {
			return;
		}
		$sitePrefix = function_exists('home_url') ?home_url() : get_bloginfo('url');
		$themeName = urlencode(get_current_theme());
		echo "
		<p style=\"margin:0;padding:0;height:1px;\">
	    <script type=\"text/javascript\"><!--
        	var wumiiSitePrefix = \"$sitePrefix\";
	    //--></script>
	    <script type=\"text/javascript\" src=\"http://widget.wumii.com/ext/relatedItemsWidget.htm?type=1&amp;num=$num&amp;mode=$mode&amp;pf=WordPress&amp;theme=$themeName\"></script>
	    <a href=\"http://www.wumii.com/widget/relatedItems.htm\" style=\"border:0;\">
        	<img src=\"http://static.wumii.com/images/pixel.png\" alt=\"无觅相关文章插件\" style=\"border:0;padding:0;margin:0;\" />
	    </a>
		</p>";
	}
	function wumii_html_escape($str) {
		return htmlspecialchars(html_entity_decode($str,ENT_QUOTES,'UTF-8'),ENT_QUOTES,'UTF-8');
	}
	function wumii_get_thumbnail_src() {
		if (!function_exists('get_post_thumbnail_id')) {
			return;
		}
		$image_info = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
		if ($image_info) {
			return $image_info[0];
		}
	}
?>
