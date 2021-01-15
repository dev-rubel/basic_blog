<?php
	include __DIR__.'/../inc/header.php';

	$posted = '';
	// featured post count
	$featuredQuery = $this->db->query("SELECT COUNT(*) as featuredCount FROM post WHERE featured=1");
	$featuredRow = $featuredQuery->fetchArray();

	$userType = $_SESSION['user_type'];
	$userId = $_SESSION['id'];
	$userPost = $userType=='user'?" AND user_id=$userId":"";
	// single post
	$query = $this->db->query("SELECT * FROM post WHERE id='$id' $userPost");
	$postCount = $query->numRows();

	// unable to acces anoter user post
	if(!$postCount) {
		header("location: ".BASE_URL.'home/all');
	}
	$row = $query->fetchArray();
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
	textarea{
		height: 100px;
   		width: 110%;
		background: transparent;
		outline: none;
		border:none;
		border-bottom: 1px solid #2c3e50;
	}
</style>
		
<form method="post" action="<?=BASE_URL?>home/changesinglefeedimg" enctype="multipart/form-data">
    <p>
        <?php 
        	if (isset($_SESSION['posted'])) {
				$message = $_SESSION['posted'];
				unset($_SESSION['posted']);
				echo $message;
			} 
		?>
    </p>
    <input type="hidden" value="999999999999999" />
    <input type="hidden" name="id" value="<?=$row['id'];?>" />
    <input type="hidden" name="previous_img" value="<?php echo $row["image"] ?>" />
    <label>
        <input style="display: none;" id="file" type="file" name="image" onchange="proccess(window.lastFile=this.files[0])" />
        <div style="margin: 0px; padding: 0px;">
            <!--Sample image uploaded begins HERE -->
            <p>Change Feed Image:</p>
            <img id="image" style="width: 100%;height: auto;cursor: pointer;margin-left:0px;" class="ui centered large image" src="../image/<?php echo $row["image"] ?>"/>
            <!--Sample image uploaded ends HERE -->
        </div>
    </label>
    <input type="submit" name="updatelogo" value="Update Image" style="width: 100%" />
</form>
<form method="post" action="<?=BASE_URL?>home/updatesinglefeed">
	<input type="hidden" name="id" value="<?=$row['id'];?>" />
    <p>Feed Title:</p>
    <input type="text" name="title" placeholder="Enter your title" value="<?php echo $row["title"] ?>">
    <p>Feed Tags:</p>
    <input type="text" name="category" placeholder="Enter your tag (,) seperat" value="<?php echo $row["category"] ?>">
    <?php if(($featuredRow['featuredCount'] < 3 || $row["featured"] == 1) && $_SESSION['user_type'] == 'admin') {?>
    <p>Featured Feed:</p>
    <input type="checkbox" name="featured" placeholder="Enter your tag (,) seperat" <?= $row["featured"]==1?'checked':''; ?>>
    <?php } ?>
    <p>Feed Contents:</p>
    <textarea name="text" style="font-family: calibri; width: 100%;"><?php echo $row["text"] ?></textarea>
    <input type="submit" name="update" value="Update Feed" style="width: 100%" />
    <center style="margin-top: 5px;">
        <a style="font-family: calibri; background: #2c3e50; padding: 5px; color: white; text-decoration: none;" href="javascript:history.go(-1)">&larr; Go Back</a>
    </center>
</form>

<?php include __DIR__.'/../inc/footer.php'; ?>