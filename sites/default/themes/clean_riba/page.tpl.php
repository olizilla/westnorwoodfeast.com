<?php // $Id: Clean_RIBA.info,v 1.0 2010/01/27 00:31:00 andyb Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
	<?php print $head ?>
	<link href="/rss.xml" rel="alternate" type="application/rss+xml" title="All Submitted Spaces" />
	<?php print $styles ?>
	<?php print $scripts ?>
	<title><?php print $head_title ?></title>
</head>

<body <?php print drupal_attributes($attr) ?>>

	<?php if ($header): ?>
		<div id='header'>
			<div class='limiter clear-block'>
				<?php print $header ?>
			</div>
		</div>
	<?php endif ?>

	<div id="branding">
		<div class="limiter clear-block">
			<!-- space makers and riba logos -->
			<!--<div id="orgs-brand-logos">
				<a href="http://www.architecture.com/RegionsAndInternational/UKNationsAndRegions/England/RIBALondon/RIBALondon.aspx"><img src="/sites/default/themes/clean_riba/images/ribaLondon70.png" width="142" height="70" alt="RIBA London" border="0" /></a>
				<a href="http://www.spacemakers.org.uk/"><img src="/sites/default/themes/clean_riba/images/spacemakers100.png" width="156" height="100" alt="Space Makers Agency" border="0" /></a>
			</div>-->
			<!-- end space makers and riba logos -->
			<?php //print $logo ?>
			<h1 id="site-name-header"><?php print $site_name ?></h1>
			<?php print $site_slogan ?>
			<?php print $mission ?>
			<?php print $search_box ?>
		</div>
	</div>

	<div id="navigation">
		<div class='limiter clear-block'>
			<?php print $skip_link ?>
			<?php print $primary_links ?>
			<?php print $secondary_links ?>
		</div>
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

			<div id="main" class="clear-block">
				<?php //print $breadcrumb ?>

				<?php if ($left): ?>
					<div id="left" class="sidebar">
						<?php print $left ?>
					</div>
				<?php endif ?>
	
				<div id="content">
					<?php print $tabs ?>

					<?php if ($title): ?>
						<h1 class="page-title"><?php print $title ?></h1>
					<?php endif ?>

					<?php print $content ?>
				</div>

				<?php if ($right): ?>
					<div id="right" class="sidebar">
						<?php print $right ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>

	<div id="footer">
		<div class="limiter clear-block">
			<?php print $feed_icons ?>
			<?php print $footer ?>
			<?php print $footer_message ?>
		</div>
	</div>

	<?php print $closure ?>
</body>
</html>
