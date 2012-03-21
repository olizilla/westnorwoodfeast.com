<?php // $Id: node-story.tpl.php,v 1.0 2011/16/01 19:29:00 andyb Exp $ ?>
<?php print $pre ?>
<?php //print_r($node); ?>

<div <?php print drupal_attributes($attr) ?>>
  
   <div class='node-content-back-to-blog'>
    	<?php print l('<span class="arrow">&larr;</span> '.t('return to blog'), 'blog', array('html' => TRUE)); ?>
   </div>
   
   <?php if (!$page): ?>
    <h3 class='node-title'>
      <?php print ucwords($node->title); ?>
    </h3>
  <?php elseif ($page): ?>
    <h1 class="page-title">
      <?php print ucwords($node->title); ?>
    </h1>
  <?php endif ?>
  
  <?php if ($submitted): ?>
    <div class='node-submitted'>
      <?php
      	//print $node->field_private_who_is_owner[0]['uid'];
      	$whospost = user_load($node->uid);
	  	$timepost = date('l jS F Y, g:i a', $node->created);
      ?>
      <span class="label">Posted By :</span> <span><?php print theme('username',  $whospost); ?></span> on <span class="blog-post-date"><?php print $timepost; ?></span>
    </div>
  <?php endif ?>
  
  <div class='node-content-photographs'>
  	<?php if(isset($node->content['field_photographs']['#children'])) print $node->content['field_photographs']['#children']; ?>
  </div>
  
  <div class='node-content'>
    <?php if(isset($node->content['body']['#value'])) print $node->content['body']['#value']; ?>
    <?php //print $content ?>
    <?php foreach($node->field_html_code as $html_code): ?>
    	<a name="media" id="media"></a>
    	<div class="html-code">
   			<?php print $html_code['value']; ?>
   		</div>
   	<?php endforeach; ?>
  </div>

  <?php if ($links): ?>
    <div class="node-links clear-block"><?php print $links ?></div>
  <?php endif ?>

</div>

<?php print $post ?>
