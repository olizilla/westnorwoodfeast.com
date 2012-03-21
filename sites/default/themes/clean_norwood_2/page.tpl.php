<?php // $Id: page.tpl.php,v 2.0 2011/09/29 19:00:00 andyb Exp $ ?>
<?php 
	$curr_url = 'http://westnorwood.spacemakers.org.uk'.request_uri();
	$curr_url_enc = check_plain($curr_url);
	global $user;
	$is_admin = false;
	$is_content_editor = false;
	$is_hub_champion = false;
	foreach ($user->roles as $roles) {
		if ($roles == 'content editor') $is_content_editor = true;
		if ($roles == 'hub champion') $is_hub_champion = true;
		if ($roles == 'administrator') $is_admin = true;
	}
	$type = '';
	$arg1 = arg(1);
	if (is_numeric($arg1) && arg(0) == 'node') {
		$node = node_load($arg1);
		$type = $node->type;
		if ($type == 'business' || $type == 'shop' || $type == 'event' || $type == 'organisation' || $type == 'conversation') $primary_links = str_replace('class="menu-1400', 'class="menu-1400 active-trail', $primary_links);
		if ($type == 'story') $primary_links = str_replace('class="menu-1067', 'class="menu-1067 active-trail', $primary_links);
		if ($type == 'hub') $primary_links = str_replace('class="menu-1854', 'class="menu-1854 active-trail', $primary_links);
	}
	if (arg(0) == 'node' && arg(1) == 'add') {
		if (arg(2) == 'business' || arg(2) == 'shop' || arg(2) == 'event' || arg(2) == 'organisation' || arg(2) == 'conversation') {
			$primary_links = str_replace('class="menu-1400', 'class="menu-1400 active-trail', $primary_links);
		}
		if (arg(2) == 'market') {
			$primary_links = str_replace('class="menu-1854', 'class="menu-1854 active-trail', $primary_links);
		}
		if (arg(2) == 'profile') {
			$primary_links = str_replace('class="menu-987', 'class="menu-987 active-trail', $primary_links);
		}
		if (arg(2) == 'story') {
			$primary_links = str_replace('class="menu-1067', 'class="menu-1067 active-trail', $primary_links);
		}
	}
	$fullname == '';
	if (is_numeric($arg1) && arg(0) == 'user') {
		$user_profile = user_load($arg1);
		$fullname = get_users_full_name($user_profile->uid);
		$primary_links = str_replace('class="menu-987', 'class="menu-987 active-trail', $primary_links);
		$head_title = $fullname.' | West Norwood Feast';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
	<?php print $head ?>
	<link href="/rss.xml" rel="alternate" type="application/rss+xml" title="West Norwood Feast" />
	<?php print $styles ?>
	<?php print $scripts ?>
	<!--[if lt IE 8]>
		<style type="text/css">
		#page  {
			margin-top:10px;
		}
		</style>
	<![endif]-->
	<title><?php print $head_title ?></title>
</head>

<body <?php print drupal_attributes($attr) ?>>

<?php if ($header): ?>
	<div id='header'>
		<div class='limiter clear-block'>
			<?php print $header ?>
			<?php print $search_box ?>
		</div>
	</div>
<?php endif ?>

<div id="top-blocks">

	<div id="branding">
		<div class="limiter clear-block">
			<?php //print $logo ?>
			<h1 id="site-name-header"><a href="/"><span><?php print $site_name ?></span></a></h1>
			<?php //print $site_slogan ?>
		</div>
	</div>
	
	<?php if (($primary_links || $skip_link || $secondary_links)): ?>
	<div id="navigation">
		<div class='limiter clear-block'>
			<?php //print $skip_link ?>
			<?php print $primary_links ?>
		</div>
	</div>
	<?php endif; ?>
	
</div>

<?php if ($messages || $help): ?>
	<div id='console'>
		<div class='limiter clear-block'>
			<?php print $messages ?>
			<?php print $help ?>
		</div>
	</div>	
<?php endif ?>
			
<div id="page">
	<div class="limiter clear-block">

		<?php //print $breadcrumb ?>
			
		<?php if ($left): ?>
			<div id="left" class="sidebar">
				<?php print $left ?>
			</div>
		<?php endif ?>

		<div id="content">
			<?php print $tabs ?>
			<?php if ($is_front): ?>
				<h1 class="page-title home-title">Be part of the West Norwood Feast</h1>
			<?php elseif ((arg(0) == 'map' || $type == 'business' || $type == 'shop' || $type == 'event' || $type == 'organisation') && arg(2)!= 'edit'): ?>
				<h1 class="page-title">What's Going on in West Norwood?</h1>
			<?php elseif (arg(0) == 'market' || $type == 'hub'): ?>
				<h1 class="page-title">What you'll find at the Feast!</h1>
			<?php //elseif (arg(0) == 'people') :?>
			<?php elseif ($fullname != '' && arg(0) == 'user'): ?>
				<h1 class="page-title"><?php print $fullname; ?><span class="username"> (<?php print $user_profile->name; ?>)</span></h1>
			<?php //elseif ($type == 'conversation' || 'story'):?>
			<?php elseif ($type == 'feast'): ?>
			<?php elseif ($type == 'story'): ?>
				<h1 class="page-title">Blog</h1>
			<?php elseif ($type == 'page' || 'panel'): ?>
				<h1 class="page-title"><?php print $title ?></h1>
			<?php elseif ($title): ?>
				<h1 class="page-title"><?php print $title ?></h1>
			<?php endif ?>
			<?php print $content ?>
		</div>
			
		<?php //if ($right): ?>
			<div id="right" class="sidebar">
				<?php if ($secondary_links): ?>
					<div class="secondary-links">
						<?php print ($secondary_links); ?>
					</div>
				<?php endif; ?>
				<?php print $right ?>
			</div>
		<?php //endif ?>
		
	</div>
</div>

<div id="footer">
	<div class="limiter clear-block">
		<p class="sharethis">Share this page on <a href="http://www.facebook.com/sharer.php?u=<?php print $curr_url_enc; ?>" target="_blank">Facebook</a> or <a href="http://twitter.com/home?status=<?php print $curr_url_enc; ?>" target="_blank">Twitter</a></p>
		<p class="sociallinks">Follow the Conversations on our <a href="http://facebook.com/wnfeast" target="_blank">Facebook Page</a> or on Twitter as <a href="http://twitter.com/wn_feast" target="_blank">@wn_feast</a> and <a href="http://twitter.com/#!/search/%23wnfeast">#wnfeast</a></p>
		<?php print $feed_icons ?>
		<?php print $footer ?>
		<?php print $footer_message ?>
	</div>
</div>

<div id="brandlogos">
	<div class="limiter clear-block">
		<a id="sma-logo" href="http://spacemakers.org.uk" border="0" /><span>Space Makers Agency</span></a>
	</div>
</div>
	
	<?php print $closure ?>
</body>
</html>