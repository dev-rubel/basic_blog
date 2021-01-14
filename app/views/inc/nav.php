<nav class="nav1">
	<?php if (isset($_SESSION["admin"])) { ?>
	<a href="<?=BASE_URL;?>home/all">Home</a> |
	<?php } ?>	
	<?php if (!isset($_SESSION["admin"])) { ?>
	<a href="<?=BASE_URL;?>login">Login</a> |
	<a href="<?=BASE_URL;?>reg">Registration</a> |
	<?php } ?>	
	<?php if (isset($_SESSION["admin"])) { ?>
	 <a href="<?=BASE_URL;?>home">Dashboard</a> 
	 	<?php if ($_SESSION["user_type"] == 'admin') { ?>
			| <a href="<?=BASE_URL;?>home/settings">Settings</a> 
		<?php } ?>	
	<?php } ?>	
</nav>