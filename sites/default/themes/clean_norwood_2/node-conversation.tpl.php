<?php // $Id: node-conversation.tpl.php,v 1.0 2011/16/01 01:25:00 andyb Exp $ ?>
<?php print $pre ?>
<?php //print_r($node); ?>

<div <?php print drupal_attributes($attr) ?>>

  <?php if ($page): ?>
  
	  <?php if (isset($node->field_site_reference[0]['safe']['title'])): ?>
	    <div class='node-content-site-attach'>
	    	<?php print l('<span class="arrow">&larr;</span> '.strtolower(t('conversation about '.$node->field_site_reference[0]['safe']['title'])), 'node/'.$node->field_site_reference[0]['nid'], array('html' => TRUE)); ?>
	    </div>
	  <?php endif; ?>
	
	  <?php //if (!$page): ?>
	    <!--<h3 class='node-title'>
	      <?php //print ucwords($node->title); ?>
	    </h3>-->
	  <?php //elseif ($page): ?>
	    <h1 class="page-title">
	      <?php print ucwords($node->title); ?>
	    </h1>
	  <?php //endif ?>
	    
	  <?php if ($submitted): ?>
	    <div class='node-submitted'>
	      <?php
	      	//print $node->field_private_who_is_owner[0]['uid'];
	      	if (isset($node->field_private_who_is_owner[0]['uid'])) {
	      		$whospace = user_load($node->field_private_who_is_owner[0]['uid']);
	      	} else {
	      		$whospace = user_load($node->uid);
	      	}
	      	$timepost = date('D, d/m/y H:i', $node->created);
	      ?>
	      <span class="label">Started By :</span> <span><?php print theme('username',  $whospace); ?></span><br /> on <span class="post-date-conversation"><?php print $timepost; ?></span>
	    </div>
	  <?php endif ?>
	  
	  <div class='node-content'>
	    <?php if(isset($node->content['body']['#value'])) print $node->content['body']['#value']; ?>
	    <?php //print $content ?>
	  </div>
	
	  <?php if ($links): ?>
	    <div class="node-links clear-block"><?php print $links ?></div>
	  <?php endif ?>
	
	</div>
	
  <?php endif; ?>

<?php print $post ?>
