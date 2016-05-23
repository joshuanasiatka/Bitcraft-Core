<?php
if (!($myACL->hasPermission('super_admin'))) {
	echo "Unauthorized access!";
}?>
<div class="row">
	<div class="col-md-12 skew-up">
		<h3>Welcome to the Admin Area</h3>
		<p>Now that you're here, try not to break anything!</p>
	</div>
</div>
