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
</style>
 	<form method="post" action="<?=BASE_URL;?>reg/reg">
 		<h2>Registration</h2>
 		<label for="first">First Name</label>
 		<input type="text" name="first">

 		<label for="last">Last Name</label>
 		<input type="text" name="last">

 		<label for="username">Username</label>
 		<input type="text" name="username" required>

 		<label for="password">Password</label>
 		<input type="password" name="password" required>

 		<input type="submit" name="reg" value="Sign Up">
 	</form>
<?php include 'inc/footer.php'; ?>