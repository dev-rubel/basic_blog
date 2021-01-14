<?php
	include __DIR__.'/../inc/header.php';
?>
<div class="more">
	<!-- Featured post begins here -->
	<div class="featured">
		<h2 class="h2">Featured Post</h2>
		<?php 
			$query = $this->db->query("SELECT * FROM post WHERE featured=1 LIMIT 3");
			$row = $query->fetchAll($query);
		?>
		<?php if(isset($row[0])){?>
		<a href="post.php?id=<?php echo $row[0]['id']; ?>">
				<!-- Featured post layer 1 -->
			<div class="featured1" style="background-image: url('image/<?php echo $row[0]['image']; ?>');">
				<div class="featuredtext">
					<h2><?php echo $row[0]['title']; ?></h2>
					<p>
						<?php echo substr($row[0]['text'],0,170)."..."; ?>
					</p>
				</div>
			</div>
		</a>
		<?php }?>
		<!-- Featured post layer 1 ends here -->

		<!-- Featured post layer 2 -->
		<div class="featured2">
			<?php if(isset($row[1])){?>
			<!-- Featured post layer-inner 1 -->
			<a href="post.php?id=<?php echo $row[1]['id']; ?>">
				<div class="inner two" style="background-image: url('image/<?php echo $row[1]['image']; ?>');">
					<div class="featuredtext2">
						<h2><?php echo $row[1]['title']; ?></h2>
						<p>
							<?php echo substr($row[1]['text'],0,100)."..."; ?>
						</p>
					</div>
				</div>
			</a>
			<?php }?>
			<!-- Featured post layer-inner 1 ends here-->
			<?php if(isset($row[2])){?>
			<!-- Featured post layer-inner 2 -->
			<a href="post.php?id=<?php echo $row[2]['id']; ?>">
				<div class="inner2 t3" style="background-image: url('image/<?php echo $row[2]['image']; ?>');">
				<div class="featuredtext3">
					<h2 class="title"><?php echo $row[2]['title']; ?></h2>
					<p>
						<?php echo substr($row[2]['text'],0,100)."..."; ?>
					</p>	
				</div>
				</div>
			</a>
			<?php }?>
			<!-- Featured post layer-inner 2 ends here -->
		</div>
	</div>
	<!-- Featured post ends here -->

	<!-- Featured post seperator start here -->
	<div class="clearfix">
		<h2 style="padding: 10px 0px">All Posts</h2>
	</div>
		<!-- Featured post seperator ends here -->

	<div class="mainbody">

		<!-- body post start here -->
		<div class="body1">
		<?php 
			if (isset($_GET['pageno'])) {
	            $pageno = $_GET['pageno'];
	        } else {
	            $pageno = 1;
	        }
	        $no_of_records_per_page = 2;
	        $offset = ($pageno-1) * $no_of_records_per_page;

	        $total_pages_sql = "SELECT COUNT(*) as count FROM post";
	        $result = $this->db->query($total_pages_sql);
	        $total_rows = $query->fetchArray($result)['count'];
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
					<a href="post.php?id=<?php echo $row['id']; ?>">
					<!-- Post thumbnail start here -->
						<div class="postimage sidebarimage" style="background-image: url('image/<?php echo $row['image']; ?>');">
						</div>
					 </a>
					 <!-- Post thumbnail ends here -->

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
						<a class="link" href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
					</p>
					<!-- Post read more ends here -->
					<hr>
			</div>
		<?php } ?>
		<ul class="pagination">
	        <li><a href="?pageno=1">First</a></li>
	        <?php if($pageno != 1) {?>
	        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
	            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
	        </li>
		    <?php }?>
	        <?php if($pageno != $total_pages) {?>
	        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
	            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
	        </li>
		    <?php }?>
	        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
	    </ul>
		</div>
		<!-- body post ends here -->


		<!-- Sidebar Started here -->
		<div class="body2">
			<!-- Sidebar Search begin here -->
			<div class="sidebar1">
				<h3 class="sidebartitle">
				Search Post: 
			</h3>
				<p>
					<form action="" method="post">
      				<input class="search" type="text" placeholder="Enter full title to search" onkeyup="showHint(this.value)">
          			<div id="txtHint" class="searchbox">
		            </div>
   				</form>
				</p>
			</div>
			<!-- Sidebar Search ends here -->

			<!-- Sidebar Recent Post start here -->
			<div class="sidebar2">
				<h3 class="sidebartitle">
					Recent Post: 
			</h3>
			<?php 	
				$query = $this->db->query("SELECT * FROM post ORDER BY id DESC LIMIT 3");
				foreach ($query->fetchAll() as $row) {
				?>
				<a href="post.php?id=<?php echo $row['id']; ?>">
					<div class="sidediv">
						<div class="postdiv">
							<div class="postimagee sidepic" style="background-image: url('image/<?php echo $row['image']; ?>');"></div>
						</div>
						<div class="sidediv2">
							<h3 class="sidedivh3">
								<?php echo $row['title']; ?>
							</h3>
							<small class="sidedivsmall">Date: <?php echo $row["date"]; ?></small>
							<p class="sidedivp">
								<?php echo substr($row['text'],0,60)."..."; ?>
							<a class="sidediva" href="post.php?id=<?php echo $row['id']; ?>"></a>
							</p>	
						</div>
				
					</div>
				</a>
				<br><hr><br>

			<?php } ?>
			</div>
			<!-- Sidebar Recent Post ends here -->
		</div>
		<!-- Sidebar ends here -->
	</div>
</div>
<?php include __DIR__.'/../inc/footer.php'; ?>