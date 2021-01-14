<?php
	include __DIR__.'/../inc/header.php';
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
		border-bottom: 1px solid rgb(44 62 80);
	}
	textarea{
		height: 100px;
   		width: 100%;
		background: transparent;
		outline: none;
		border:none;
		border-bottom: 1px solid rgb(44 62 80);
	}
</style>
		
	<form method="post" action="<?=BASE_URL?>home/changelogo" enctype="multipart/form-data">
		<p>
		<?php 
			if (isset($_POST["updatelogo"])) {
				echo $posted;
			} 
		?>	
		</p>
		<input type="hidden" value="999999999999999">
		<label>
	 		<input style="display: none;" id="file" type="file" name="image" onchange="proccess(window.lastFile=this.files[0])">  
		<div style="margin: 0px;padding: 0px;">
		 <!--Sample image uploaded begins HERE -->
		 	<p>Site Logo:</p>
			<img id="image" style="width: 100%;height: auto;cursor: pointer;margin-left:0px;" class="ui centered large image" src="../image/<?php echo $sitedetails["sitelogo"] ?>"/>
		 <!--Sample image uploaded ends HERE -->
		</div>
		     
		</label>
		<input type="submit" name="updatelogo" value="Update logo">
     </form>	
	<form method="post" action="<?=BASE_URL?>home/updatesetting">
		<p><?php if (isset($_POST["update"])) {
						echo $posted;
					} ?></p>
					<p>Site Title:</p>
		    <input type="text" name="title" placeholder="Enter your title" value="<?php echo $sitedetails["sitetitle"] ?>">
	      	<p>Site Tagline:</p>
	      	<textarea name="text"><?php echo $sitedetails["sitetagline"] ?></textarea>
	      	<p>Feed Per Page:</p>
		    <input type="number" name="per_page" placeholder="Enter feed per page" value="<?php echo $sitedetails["per_page"] ?>">
		    <p>Feed Like Point:</p>
		    <input type="number" name="per_page" placeholder="Enter feed per page" value="<?php echo $sitedetails["like_point"] ?>">
		    <p>Feed Like Point:</p>
		    <input type="number" name="per_page" placeholder="Enter feed point" value="<?php echo $sitedetails["like_point"] ?>">
		    <p>Feed Comment Point:</p>
		    <input type="number" name="per_page" placeholder="Enter comment point" value="<?php echo $sitedetails["comment_point"] ?>">
			<input type="submit" name="update" value="Update">
			<center style="margin-top: 5px;">
				<a style="font-family: calibri; background: rgb(44 62 80);padding: 5px;color: white;text-decoration: none;" href="javascript:history.go(-1)">&larr; Go Back</a>
			</center>
		</p>
	</form>
<?php include __DIR__.'/../inc/footer.php'; ?>