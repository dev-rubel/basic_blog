<?php 
	/*
		Developer = dev-rubel
		Developer URL = http://www.dev-rubel.com
	*/
	include('functions.php');	
	session_start(); 
	include 'db.php';
	// Program to display current page URL. 
  
	$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 
	 
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php $id = $_GET["id"];
		$query = mysqli_query($con, "SELECT * FROM post WHERE id='$id' ");
		$row2 = mysqli_fetch_assoc($query); echo $row2["title"]; ?></title>
	<meta charset="utf-8">
	<base href="/php_blog/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keyword" content="php blog">
	<meta name="description" content="<?php echo substr($row2['text'],0,180).'...'; ?>">
	
	<?php
		$query = mysqli_query($con, "SELECT * FROM sitedetails");
		$row = mysqli_fetch_assoc($query);
	?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="icon" href="img/<?php echo $row["sitelogo"] ?>">
	<script src="js/jquery.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/search.js"></script>

</head>
<body>
<div class="container">
	<div class="header">
		<!--Logo begin Here -->
		<div class="logo">
			<a href=""><img align="center" class="sitelogo" src="image/<?php echo $row["sitelogo"] ?>"></a>
		</div>
		<!--Logo ends Here -->
		<div class="mainhead">
			<!-- Site title begins here -->
			<h2><?php echo $row["sitetitle"] ?></h2>
			<!-- Site title ends here -->

			<!-- Site tagline begins here -->
			<span class="sitetagline"><?php echo $row["sitetagline"] ?></span>
			<!-- Site tagline ends here -->
		</div>
		<br>
		<!-- Site navigation link begins here -->
		<?php
			include 'nav.php';
		?>
		<!-- Site navigation link ends here -->
	</div>
	<div class="featured" id="nav2">
   		<!-- Site Navigation Mobile -->
		<h2 class="h2" id="show"><i class="fa fa-list"></i></h2>
		<h2 class="h2" id="hide"><i class="fa fa-close"></i></h2>
		<?php
			include 'm_nav.php';
		?>
	</div>