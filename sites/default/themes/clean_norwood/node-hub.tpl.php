<?php // $Id: node-hub.tpl.php,v 1.0 2011/03/01 15:30:00 andyb Exp $ ?>
<?php print $pre ?>
<?php //print_r($node); ?>

<div <?php print drupal_attributes($attr) ?>>

  <?php //if (!$page): ?>
    <h3 class='node-title'>
      <span class='node-type-title'><?php print l(t('Markets Place'), 'market') ?> : </span><?php print ucwords($node->title); ?>
    </h3>
  <?php //endif ?>
  
  <div class='node-content-location'>
    <p>
      <?php if(isset($node->location['name'])) print $node->location['name'].' '; ?>
  	  <?php if(isset($node->location['street'])) print $node->location['street'].' '; ?>
  	  <?php if(isset($node->location['postal_code'])) print $node->location['postal_code'].' '; ?>
  	</p>
  </div>

  <!--<?php if ($submitted): ?>
    <div class='node-submitted'>
      <?php print $submitted ?>
    </div>
  <?php endif ?>-->
  
  <?php if (isset($node->field_site_champion[0]['uid'])): ?>
  	<?php $champion_user = user_load($node->field_site_champion[0]['uid']); ?>
    <div class='node-champion'>
      <p><span class='hub-champion-user'>Champion : </span><?php print theme('username',  $champion_user); ?></p>
    </div>
  <?php endif ?>

  <div class='node-content'>
    <?php if(isset($node->content['body']['#value'])) print $node->content['body']['#value']; ?>
    <?php //print $content ?>
  </div>
  
  <div class='node-content-photographs'>
  	<?php if(isset($node->content['field_photographs']['#children'])) print $node->content['field_photographs']['#children']; ?>
  </div>

  <?php if ($links): ?>
    <div class="node-links clear-block"><?php print $links ?></div>
  <?php endif ?>

</div>

<?php print $post ?>
