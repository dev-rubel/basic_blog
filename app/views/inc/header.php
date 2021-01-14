<?php 
	/*
		Developer = dev-rubel
		Developer URL = http://www.dev-rubel.com
	*/
	$sitedetails = $this->db->query('SELECT * FROM sitedetails')->fetchArray();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
	<base href="<?=BASE?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keyword" content="php blog">
	<meta name="description" content="<?php echo $sitedetails["sitetagline"] ?>">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="css/jssocials-theme-classic.css" />
	<link rel="icon" href="img/<?php echo $sitedetails["sitelogo"] ?>">
	
</head>
<body>
<div class="container">
	<div class="header">
		<!--Logo begin Here -->
		<div class="logo">
			<a href=""><img align="center" class="sitelogo" src="image/<?php echo $sitedetails["sitelogo"] ?>"></a>
		</div>
		<!--Logo ends Here -->
		<div class="mainhead">
			<!-- Site title begins here -->
			<h2><?php echo $sitedetails["sitetitle"] ?></h2>
			<!-- Site title ends here -->

			<!-- Site tagline begins here -->
			<span class="sitetagline"><?php echo $sitedetails["sitetagline"] ?></span>
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
	<?php 
		include __DIR__.'/../partials/alert.php';
	?>