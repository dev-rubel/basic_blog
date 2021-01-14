<hr>
<!-- Share button ends-->
<div style="margin-top: 0px;padding-top: 0px;">
	
	<h3 style="margin-top: 0px;padding-top: 0px;font-family: calibri;">Comment Below:</h3>
	<?php  
	$query = $this->db->query("SELECT * FROM comment WHERE postid='$id' ORDER BY id DESC");
	foreach ($query->fetchAll() as $row) {
	?>
	<div>
		<p style="font-family: calibri;padding: 3px;"><span style="background: rgb(44 62 80);color: white;padding: 3px;font-weight: bold;font-family: calibri;"><?php echo $row['name']; ?>:</span> <?php echo $row['message']; ?></p>
		<hr>
	</div>
	<?php } ?>

	<form method="post" action="<?=BASE_URL?>home/comment">
		<?php
			$userName = '';
			if(isset($_SESSION['user'])) {
				$userName = $_SESSION['user'];
			}
		?>
		<input type="text" name="name" placeholder="Enter you name" required="" style="width: 100%;" value="<?=$userName?>" <?=$userName!=''?'readonly':'';?>>
		<!-- Getting ID from post -->
		<?php 
			$query = $this->db->query("SELECT * FROM post WHERE id='$id' ");
			$row2 = $query->fetchArray();
		?>
		<input type="hidden" name="postid" value="<?php echo $row2['id']; ?>" required="">
		<?php if(isset($_SESSION['id'])) {?>
		<input type="hidden" name="user_id" value="<?= $_SESSION['id']; ?>" required="">
		<?php }?>
		<!-- Getting ID from post -->
		<p>Message</p>
		<textarea placeholder="Enter your text" rows="5" cols="53" name="message" required="" style="width: 100%;"></textarea><br>
		<input type="submit" name="submit" value="Submit" style="width: 100%;">
	</form>
	<br>
</div>