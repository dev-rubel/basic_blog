<?php
	include __DIR__.'/../inc/header.php';
?>
  <div class="more">
	<h2 class="h2admin">(<?=$_SESSION['user'];?>) Your feed <a href="<?=BASE_URL?>home/addfeed"><small>Add New feed</small></a></h2>
	<?php 
		$userType = $_SESSION['user_type'];
		$userId = $_SESSION['id'];
		$userPost = $userType=='user'?"WHERE user_id=$userId":"";
		$query = $this->db->query("SELECT * FROM post $userPost ORDER BY id DESC");

		$postCount = $query->numRows();
		if($postCount > 0) {
		foreach ($query->fetchAll() as $row) {
	?>

	<div style="clear: both;margin-bottom: 50px;">
	
		<div style="width: 40%;float: left;">
			<a href="<?=BASE_URL?>home/single/<?php echo $row['id'] ?>">
			<div class="adminpost" style="background-image: url('../image/<?php echo $row['image']; ?>');
		    background-position: center top !important;
		    background-size: cover;
		    background-repeat: no-repeat;
		    height: 190px;
		    width: 83%;
		    margin-left: 11px;
		    border: 5px solid #2c3e50;" loading="lazy"></div>
		</a>
		</div>
		<div style="width:60%;float: right;">
		<h3 style="color: black;margin: 0px;">
			<?php echo $row['title']; ?>
			<?php if($row['featured'] == 1){?>
			<i class="fa fa-star" style="color: red;" title="Featured"></i>
			<?php }?>
		</h3>
		<small style="margin: 0px;background: black none repeat scroll 0% 0%;color: white;padding: 3px;font-size: 10px;">Date: <?php echo $row["date"]; ?></small>
		<small style="margin: 0px;background: black none repeat scroll 0% 0%;color: white;padding: 3px;font-size: 10px;">Tags: <?php echo $row["category"]; ?></small>
		<p style="color: black;" >
			<?php echo substr($row['text'],0,300)."..."; ?>
		</p>	
		</div>
		
		<p style="font-family: calibri; "><a style="background: #2c3e50;padding: 5px;color: white;text-decoration: none;" href="<?=BASE_URL?>home/single/<?php echo $row['id'] ?>">Read More</a> <a style="background: #2c3e50;padding: 5px;color: white;text-decoration: none;" href="<?=BASE_URL?>home/singleedit/<?php echo $row['id'] ?>">Edit feed</a>
		<a style="background: #2c3e50;padding: 5px;color: white;text-decoration: none;" href="<?=BASE_URL?>home/singledelete/<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a></p>
	
	</div><br><hr><br>

	<?php } ?>
	<?php } else { ?>
		<p style="text-align: center;">No feed submit yet!</p>
	<?php } ?>
</div>
<?php include __DIR__.'/../inc/footer.php'; ?>