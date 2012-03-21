<?php // $Id: page.tpl.php,v 1.1.2.5.2.14.2.12 2010/03/01 13:37:46 psynaptic Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html<?php print drupal_attributes($html_attr); ?>>

<head>
  <?php print $head; ?>
  <?php print $styles; ?>
  <!--[if lt IE 8]><link type="text/css" rel="stylesheet" media="all" href="<?php print $base_theme; ?>css/ie-lt8.css" /><![endif]-->
  <?php print $scripts; ?>
  <title><?php print $head_title; ?></title>
</head>

<body<?php print drupal_attributes($attr); ?>>

  <?php if ($header): ?>
    <div id="header">
      <div class="limiter clear-block">
        <?php print $header; ?>
      </div>
    </div>
  <?php endif; ?>

  <div id="branding">
    <div class="limiter clear-block">
      <?php print $logo_themed; ?>
      <?php print $site_name_themed; ?>
      <?php print $site_slogan_themed; ?>
      <?php print $mission_themed; ?>
      <?php print $search_box; ?>
    </div>
  </div>

  <div id="navigation">
    <div class="limiter clear-block">
      <?php print $skip_link; ?>
      <?php print $primary_links; ?>
      <?php print $secondary_links; ?>
      <?php print $breadcrumb; ?>
    </div>
  </div>

  <div id="page">
    <div class="limiter clear-block">
      <div id="main" class="clear-block">

        <?php if ($left): ?>
          <div id="left" class="sidebar">
            <?php print $left; ?>
          </div>
        <?php endif; ?>

        <div id="content" class="clear-block">
          <?php print $tabs; ?>
          <?php print $messages; ?>
          <?php print $help; ?>

          <?php if ($title): ?>
            <h1 class="page-title"><?php print $title; ?></h1>
          <?php endif; ?>

          <?php print $content; ?>
        </div>

        <?php if ($right): ?>
          <div id="right" class="sidebar">
            <?php print $right; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div id="footer">
    <div class="limiter clear-block">
      <?php print $feed_icons; ?>
      <?php print $footer; ?>
      <?php print $footer_message; ?>
    </div>
  </div>

  <?php print $closure; ?>
</body>
</html>
