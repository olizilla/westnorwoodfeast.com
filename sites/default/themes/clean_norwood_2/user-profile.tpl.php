<?php
// $Id: user-profile.tpl.php,v 1.0 2011/01/11 12:21:00 andyb Exp $ ?>

<?php 
//if (function_exists('does_user_have_profile') && function_exists('content_profile_load')) {
	//if (!does_user_have_profile(arg(1)) && $user->uid == arg(1)) {
		print l('Create a Profile', 'node/add/profile');
	//}
//}
?>
<div class="profile">
  <?php print $user_profile; ?>
</div>
