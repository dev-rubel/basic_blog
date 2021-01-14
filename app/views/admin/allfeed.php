<?php
	include __DIR__.'/../inc/header.php';
?>
<div class="more">
	<div class="sidebar1">
		<h3 class="sidebartitle">
			Search Feed: 
		</h3>
		<p>
			<form action="" method="post">
				<input class="search" type="text" placeholder="Enter full title to search" onkeyup="showHint(this.value)">
  			<div id="txtHint" class="searchbox">
            </div>
			</form>
		</p>
	</div>
	<!-- Featured post seperator start here -->
	<div class="clearfix"></div>
		<!-- Featured post seperator ends here -->

	<div class="mainbody">

		<!-- body post start here -->
		<div class="body1">
		<?php 
	        $no_of_records_per_page = $sitedetails["per_page"];
	        $offset = ($pageno-1) * $no_of_records_per_page;

	        $total_pages_sql = "SELECT COUNT(*) as count FROM post";
	        $result = $this->db->query($total_pages_sql);
	        $total_rows = $result->fetchArray($result)['count'];
	        // dd($total_rows);
	        $total_pages = ceil($total_rows / $no_of_records_per_page);

			$query = $this->db->query("SELECT * FROM post ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
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
		<ul class="pagination">
	        <li><a href="<?=BASE_URL;?>home/all">First</a></li>
	        <?php if($pageno != 1) {?>
	        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
	            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo BASE_URL."home/all/".($pageno - 1); } ?>">Prev</a>
	        </li>
		    <?php }?>
	        <?php if($pageno != $total_pages) {?>
	        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
	            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo BASE_URL."home/all/".($pageno + 1); } ?>">Next</a>
	        </li>
		    <?php }?>
	        <li><a href="<?=BASE_URL;?>home/all/<?php echo $total_pages; ?>">Last</a></li>
	    </ul>
		</div>
		<!-- body post ends here -->
	</div>
</div>
<?php include __DIR__.'/../inc/footer.php'; ?>
<script>
	$(window).scroll(function() {
	   if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
	       alert("near bottom!");
	   }
	});
</script>
