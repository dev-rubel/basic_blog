<?php 
	$dataFound = false;    
	if($query->numRows() > 0) {
		$dataFound = true;
	foreach ($query->fetchAll() as $row) {
?>
	<div class="thumbnailh">
		<!-- Post title start here -->
		<h3 class="posttitle">
			<?php echo $row['title']; ?>
		</h3>
		<!-- Post title ends here -->
		<a href="<?=BASE_URL;?>home/single/<?php echo $row['id']; ?>">
		<!-- Post thumbnail start here -->
			<div class="postimage sidebarimage" style="background-image: url('image/<?php echo $row['image']; ?>');">
			</div>
		 </a>
		 <!-- Post thumbnail ends here -->
	</div>
	<div class="feed-shot-des">
		  <!-- Post date start here -->
		<small class="belowpost">Date: <?php echo $row["date"]; ?></small>
		<small class="belowpost">Tags: <?php echo $row["category"]; ?></small>
		 <!-- Post date ends here -->

		  <!-- Post contents start here -->
		<p>
			<?php echo substr($row['text'],0,200)."..."; ?>
		</p>
		<!-- Post contents ends here -->

		<!-- Post read more start here -->
		<p>
			<a class="link" href="<?=BASE_URL;?>home/single/<?php echo $row['id']; ?>">Read More</a>
		</p>
		<!-- Post read more ends here -->
		<hr>
	</div>
	<?php } ?>
	<?php } else {?>
		
	<?php } ?>