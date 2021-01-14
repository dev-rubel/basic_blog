<?php 
	include 'inc/header.php';
 ?>
<style type="text/css">
	form{
		margin-right: auto;
		margin-left: auto;
		width: 50%;
		margin-top: 10px;
		margin-bottom: 10px;
	}
	h2{
		text-align: center;
	}
	input{
		height: 30px;
		background: transparent;
		outline: none;
		border:none;
		border-bottom: 1px solid #2c3e50;
	}
	.social-login{
		width: 100%;
		text-align: center;
	}
	.social-login i{
		font-size: 40px;
		border: 1px solid gray;
		padding: 10px;
	}
</style>
	<?php 
		include 'partials/alert.php';
	?>
 	<form method="post" action="<?=BASE_URL;?>login/login">
 		<h2>Login</h2>
 		<div class="social-login">
	 		<a href="#"><i class="fa fa-google" style="color: #ea4335"></i></a>
	 		<i class="fa fa-apple"></i>
 		</div>
 		<label for="username">Username</label>
 		<input type="text" name="username" id="username">
 		<label for="password">Password</label>
 		<input type="password" name="password" id="password">
 		<input type="submit" name="login" value="Login">
 	</form>
<?php include 'inc/footer.php'; ?>