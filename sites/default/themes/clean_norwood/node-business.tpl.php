<?php // $Id: node-business.tpl.php,v 1.0 2011/03/01 15:30:00 andyb Exp $ ?>
<?php print $pre ?>
<?php //print_r($node); ?>

<div <?php print drupal_attributes($attr) ?>>

  <?php //if (!$page): ?>
    <h3 class='node-title'>
      <span class='node-type-title'><?php print l(t('Business'), 'map/business') ?> : </span><?php print ucwords($node->title); ?>
    </h3>
  <?php //endif ?>
  
  <div class='node-content-location'>
    <p>
      <?php if(isset($node->location['name'])) print $node->location['name'].' '; ?>
  	  <?php if(isset($node->location['street'])) print $node->location['street'].' '; ?>
  	  <?php if(isset($node->location['postal_code'])) print $node->location['postal_code'].' '; ?>
  	</p>
  </div>
  
  <?php if ($submitted): ?>
    <div class='node-submitted'>
      <?php
      	//print $node->field_private_who_is_owner[0]['uid'];
      	if (isset($node->field_private_who_is_owner[0]['uid'])) {
      		$whospace = user_load($node->field_private_who_is_owner[0]['uid']);
      		?><span class="label">Owned By :</span><?php
      	} else {
      		$whospace = user_load($node->uid);
      		?><span class="label">Submitted By :</span><?php
      	}
      ?>
      <span><?php print theme('username',  $whospace); ?></span>
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
  
  <?php if($node->field_open_monday[0]['view']  || $node->field_open_tuesday[0]['view']  || $node->field_open_wednesday[0]['view']  || $node->field_open_thursday[0]['view']  || $node->field_open_friday[0]['view']  || $node->field_open_saturday[0]['view']  || $node->field_open_sunday[0]['view'] ): ?>
	  <div class='node-content-opening-hours'>
	  		<h4 class="open-hours-title">Opening Hours</h4>
	  		<?php if($node->field_open_monday[0]['view'] ): ?>
	  		<div class="open-monday">
	  			<span class="label">Monday </span>
	  			<?php print $node->field_open_monday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  		<?php if($node->field_open_tuesday[0]['view'] ): ?>
	  		<div class="open-tuesday">
	  			<span class="label">Tuesday </span>
	  			<?php print $node->field_open_tuesday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  		<?php if($node->field_open_wednesday[0]['view'] ): ?>
	  		<div class="open-wednesday">
	  			<span class="label">Wednesday </span>
	  			<?php print $node->field_open_wednesday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  		<?php if($node->field_open_thursday[0]['view'] ): ?>
	  		<div class="open-thursday">
	  			<span class="label">Thursday </span>
	  			<?php print $node->field_open_thursday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  		<?php if($node->field_open_friday[0]['view'] ): ?>
	  		<div class="open-friday">
	  			<span class="label">Friday </span>
	  			<?php print $node->field_open_friday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  		<?php if($node->field_open_saturday[0]['view'] ): ?>
	  		<div class="open-saturday">
	  			<span class="label">Saturday </span>
	  			<?php print $node->field_open_saturday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  		<?php if($node->field_open_sunday[0]['view'] ): ?>
	  		<div class="open-sunday">
	  			<span class="label">Sunday </span>
	  			<?php print $node->field_open_sunday[0]['view']; ?>
	  		</div>
	  		<?php endif; ?>
	  </div>
  <?php endif; ?>

  <div class='node-content'>
    <?php if(isset($node->content['body']['#value'])) print $node->content['body']['#value']; ?>
    <?php //print $content ?>
  </div>
  
  <?php if ($node->field_private_who_is_owner[0]['uid']!=''): ?>
  	<div class='node-content-owner-info'>
  		<?php 
  			$owner_profile = content_profile_load('profile', $node->field_private_who_is_owner[0]['uid']); 
  			$owner_user = user_load($node->field_private_who_is_owner[0]['uid']);
  		?>
  		<div class='profile-info'><?php print l(t('From the owner\'s profile&hellip;'), 'user/'.$node->field_private_who_is_owner[0]['uid'], array('html' => TRUE)); ?></div>
	  	<?php if($owner_profile->field_memories_of_west_norwood[0]['value']=='' || $owner_profile->field_see_going_on[0]['value']==''): ?>
	  		<div class='profile-about'>
	  			<?php print $owner_profile->teaser; ?>
	  		</div>
	  	<?php endif; ?>
  		<div class='memories-info'>
  			<?php if ($owner_profile->field_memories_of_west_norwood[0]['value']!=''): ?>
	  			<h5>My memories of West Norwood:</h5>
	  			<p><?php print $owner_profile->field_memories_of_west_norwood[0]['value']; ?></p>
	  		<?php endif; ?>
  		</div>
  		<div class='future-info'>
  			<?php if ($owner_profile->field_see_going_on[0]['value']!=''): ?>
	  			<h5>What I'm excited to get happening:</h5>
	  			<p><?php print $owner_profile->field_see_going_on[0]['value']; ?></p>
	  		<?php endif; ?>
  		</div>
  		<div class='profile-link'><?php print l(t('Read more&hellip;'), 'user/'.$node->field_private_who_is_owner[0]['uid'], array('html' => TRUE)); ?></div>
  	</div>
  <?php endif; ?>
  
  <div class='node-content-photographs'>
  	<?php if(isset($node->content['field_photographs']['#children'])) print $node->content['field_photographs']['#children']; ?>
  </div>

  <?php if ($links): ?>
    <div class="node-links clear-block"><?php print $links ?></div>
  <?php endif ?>

</div>

<?php print $post ?>
