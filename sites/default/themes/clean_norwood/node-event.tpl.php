<?php // $Id: node-hub.tpl.php,v 1.0 2011/03/01 15:30:00 andyb Exp $ ?>
<?php print $pre ?>
<?php //print_r($node); ?>

<div <?php print drupal_attributes($attr) ?>>

  <?php //if (!$page): ?>
    <h3 class='node-title'>
      <span class='node-type-title'><?php print l(t('Event'), 'map/event') ?> : </span><?php print ucwords($node->title); ?>
    </h3>
  <?php //endif ?>
  
  <div class='node-content-date'>
    <p>
      <?php if(isset($node->field_date_one_off[0]['view']) && $node->field_date_one_off[0]['view']!='') print $node->field_date_one_off[0]['view'].'. '; ?>
      <?php
      if (isset($node->field_repeat_period[0]['view']) && $node->field_repeat_period[0]['view'] != '') {
      		$numElements = count($node->field_repeat_period);
      		$countElements = 1;
	      	foreach ($node->field_repeat_period as $field_repeat_period) {
	      		print $field_repeat_period['view'];
	      		if ($countElements == ($numElements -1)) print ' &amp; '; elseif ($countElements < $numElements) print ', '; else print ' ';
	      		$countElements++;
	      	}
      		$numElements = count($node->field_repeat_day_of_week);
	      	$countElements = 1;
	      	foreach ($node->field_repeat_day_of_week as $field_repeat_day_of_week) {
	      		print $field_repeat_day_of_week['view'];
	      		//if ($node->field_repeat_period[0]['view'] != 'Every') print '\'s';
	      		if ($countElements == ($numElements -1)) print ' &amp; '; elseif ($countElements < $numElements) print ', '; else print '. ';
	      		$countElements++;
	      	}
      	}
      ?>
      <br />
      <?php if(isset($node->field_time[0]['view'])) print $node->field_time[0]['view'].' '; ?>
  	</p>
  </div>
  
  <?php if ($submitted): ?>
    <div class='node-submitted'>
      <?php
      	//print $node->field_private_who_is_owner[0]['uid'];
      	if (isset($node->field_private_who_is_owner[0]['uid'])) {
      		$whospace = user_load($node->field_private_who_is_owner[0]['uid']);
      	} else {
      		$whospace = user_load($node->uid);
      	}
      ?>
      <span class="label">Submitted By :</span> <span><?php print theme('username',  $whospace); ?></span>
    </div>
  <?php endif ?>
  
  <div class='node-contacts'>
	  <div class='node-content-web'>
	  	<?php if(isset($node->field_bus_web[0]['value'])): ?>
	  		<span class="label">Web : </span>
	  		<?php print '<a href="http://'.$node->field_bus_web[0]['value'].'">'.$node->field_bus_web[0]['value'].'</a>'; ?>
	  	<?php endif; ?>
	  </div>
	  
	  <div class='node-content-email'>
	  	<?php if(isset($node->field_bus_email[0]['value'])): ?>
	  		<span class="label">Email : </span>
	  		<?php print '<a href="mailto:'.$node->field_bus_email[0]['value'].'">'.$node->field_bus_email[0]['value'].'</a>'; ?>
	  	<?php endif; ?>
	  </div>
	  
	  <div class='node-content-phone'>
	  	<?php if(isset($node->field_bus_phone[0]['value'])) : ?>
	  		<span class="label">Phone Number : </span>
	  		<?php print $node->field_bus_phone[0]['value']; ?>
	  	<?php endif; ?>
	  </div>
  </div>
  
  <div class='node-content-location'>
    <p>
      <?php if(isset($node->location['name'])) print $node->location['name'].' '; ?>
  	  <?php if(isset($node->location['street'])) print $node->location['street'].' '; ?>
  	  <?php if(isset($node->location['postal_code'])) print $node->location['postal_code'].' '; ?>
  	</p>
  </div>

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
