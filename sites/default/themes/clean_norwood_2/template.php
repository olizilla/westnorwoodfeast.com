<?php // $Id: templaye.php,v 1.0 2011/03/01 15:30:00 andyb Exp $ 
//drupal_rebuild_theme_registry();

function phptemplate_username($object) {
	
  $name= ucwords(get_users_full_name($object->uid));
  $name = str_replace(' Van ', ' van ', $name);

  if ($object->uid && $name) {
    // Shorten the name when it is too long or it will break many tables.
    if (drupal_strlen($name) > 34) {
      $name = drupal_substr($name, 0, 30) . '...';
    }
    else {
      //$name = $object->name;
    }

    if (user_access('access user profiles')) {
      $output = l($name, 'user/' . $object->uid, array('title' => t('View user profile.')));
    }
    else {
      $output = check_plain($name);
    }
  }
  else if ($object->name) {
    // Sometimes modules display content composed by people who are
    // not registered members of the site (e.g. mailing list or news
    // aggregator modules). This clause enables modules to display
    // the true author of the content.
    if ($object->homepage) {
      $output = l($object->name, $object->homepage);
    }
    else {
      $output = check_plain($object->name);
    }

    $output .= ' (' . t('not verified') . ')';
  }
  else {
    $output = variable_get('anonymous', t('Anonymous'));
  }

  return $output;
}

function phptemplate_content_view_multiple_field($items, $field, $values) {
  //print_r($field);
  //print '<br>';
  $numElements = count($items);
  $countElements = 1;      		
  $output = '';
  if ($field['field_name'] == 'field_repeat_period') {
  	foreach ($items as $item) {
	    if (!empty($item) || $item == '0') {
	      $output .= '<span class="field-item field-item-repeat-period">'. $item .'</span>';
	      if ($countElements == ($numElements -1)) $output .= ' &amp; '; elseif ($countElements < $numElements) $output .= ', '; else $output .= ' ';
	      $countElements++;
	    }
	  }
  } elseif ($field['field_name'] == 'field_repeat_day_of_week') {
  	foreach ($items as $item) {
	    if (!empty($item) || $item == '0') {
	      $output .= '<span class="field-item field-item-day-of-week">'. $item .'</span>';
	      if ($countElements == ($numElements -1)) $output .= ' &amp; '; elseif ($countElements < $numElements) $output .= ', '; else $output .= '';
	      $countElements++;
	    }
  	}
  } else {
	  foreach ($items as $item) {
	    if (!empty($item) || $item == '0') {
	      $output .= '<div class="field-item">'. $item .'</div>';
	    }
	  }
  }
  return $output;
}


function get_users_full_name($uid) {
	$user_profile = content_profile_load('profile', $uid);
	if (isset($user_profile->title) || $user_profile->title != '') {
		return ucwords($user_profile->title);
	} else {
		$user = user_load($uid);
		return ucwords($user->name);
	}
}

?>