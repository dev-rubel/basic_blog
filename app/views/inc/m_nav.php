<nav id="nav">
	<ul style="list-style-type: none;margin-right: 80px;">
		<li style="background: white;color: #2c3e50;padding: 10px;margin-bottom: 10px;">
			<a href="<?=BASE_URL;?>" style="color: #2c3e50;">Home</a>
		</li>
		<?php if (!isset($_SESSION["admin"])) { ?>
		<li style="background: white;color: #2c3e50;padding: 10px;margin-bottom: 10px;">
			<a href="<?=BASE_URL;?>admin/login" style="color: #2c3e50;">Login</a>
		</li>
		<li style="background: white;color: #2c3e50;padding: 10px;margin-bottom: 10px;">
			<a href="<?=BASE_URL;?>admin/reg" style="color: #2c3e50;">Registration</a>
		</li>
		<?php } ?>
		<?php if (isset($_SESSION["admin"])) { ?>
		<li style="background: white;color: #2c3e50;padding: 10px;margin-bottom: 10px;">
			<a href="<?=BASE_URL;?>admin" style="color: #2c3e50;">Dashboard</a>
		</li>
		<?php } ?>	
	</ul>
</nav>