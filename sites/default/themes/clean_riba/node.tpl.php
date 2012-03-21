<?php // $Id: Clean_RIBA.info,v 1.0 2010/01/27 00:31:00 andyb Exp $ ?>
<?php print $pre ?>

<div <?php print drupal_attributes($attr) ?>>

  <?php if (!$page): ?>
    <h2 class='node-title'>
      <?php print $title ?>
    </h2>
  <?php endif ?>

  <?php if ($submitted): ?>
    <div class='node-submitted clear-block'>
      <?php print $submitted ?>
    </div>
  <?php endif ?>

  <?php if ($picture): ?>
    <div class="node-picture">
      <?php print $picture ?>
    </div>
  <?php endif ?>

  <div class="node-content clear-block">
    <?php print $content ?>
  </div>

  <?php if ($links): ?>
    <div class="node-links clear-block"><?php print $links ?></div>
  <?php endif ?>

</div>

<?php print $post ?>
