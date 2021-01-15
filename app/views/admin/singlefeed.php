<?php
	include __DIR__.'/../inc/header.php';
?>
<style type="text/css">
	.share-icons .icon {
	    font-size: 30px;
	    display: inline-block;
	}
	.share-icons .sharre {
		float: right;
		color: rgb(240 128 128) !important;
	}
	.share-icons .like a {
		color: rgb(144 238 144) !important;
	}
	.share-icons .click-like,.click-sharre {
		cursor: pointer;
	}
</style>
<div class="content">
    <?php
		$query = $this->db->query("SELECT * FROM post WHERE id='$id' "); $row2 = $query->fetchArray(); ?>
    <div class="main">
        <div class="nicetitle" style="background: url(image/<?=$row2['image'];?>);">
            <div class="breadcrum">
                <h3><?=$row2["title"]; ?></h3>
            </div>
        </div>
        <!-- Full post container start here-->
        <div class="postside">
            <!-- Full Post Start Here -->

            <!-- Post Title start Here -->
            <h3 style="margin-top: 10px; padding-top: 0px; font-family: calibri; text-align: left; color: #afafaf; font-weight: normal; font-size: initial;">
                <a href="<?=BASE_URL?>" style="color: black;"><?=$sitedetails["sitetitle"] ?></a> »
                <?=$row2['title']; ?>
            </h3>
            <!-- Post Title ends Here -->

            <!-- Post and date start Here -->
            <small style="margin: 0px; background: black none repeat scroll 0% 0%; color: white; padding: 3px; font-size: 10px;">
                Date:
                <?=$row2["date"]; ?>
            </small>
            <small style="margin: 0px; background: black none repeat scroll 0% 0%; color: white; padding: 3px; font-size: 10px;">
                Tag:
                <?=$row2["category"]; ?>
            </small>
            <br />
            <br />
            <!-- Post and date ends Here -->

            <!-- Post thumbnail start Here -->
            <center>
                <div class="postthumbnail">
                    <img src="image/<?=$row2['image']; ?>" width="100%" height="auto" />
                </div>
            </center>
            <!-- Post thumbnail ends Here -->

            <!-- Post editing option for admin start Here -->
            <br />
            <a href="<?=BASE_URL?>home/singleedit/<?=$row2['id'];?>">
                <small style="margin: 0px; margin-left: 0px; background: black none repeat scroll 0% 0%; color: white; padding: 3px; font-size: 10px;">Edit Feed </small>
            </a>
            <!-- Post editing option for admin ends Here -->

            <!-- Post full write up start here -->
            <p style="font-family: calibri; font-size: large;"><?=$row2["text"]; ?></p>
            <!-- Post full write up ends here -->

            <hr>
            <div style="margin-top: 0px;padding-top: 0px;">
	
				<h3 style="margin-top: 0px;padding-top: 0px;font-family: calibri;">Like, Comment & Share Below:</h3>
				<div class="share-icons">
					<?php
						$likeCount = 0;
						$userLike = false;
						$postId = $row2['id'];
						$userId = $_SESSION['id'];
						$likeUrl = BASE_URL."home/feedlike/".$row2['id'];
						$likeQuery = $this->db->query("SELECT COUNT(*) as count FROM post_likes WHERE post_id='$postId'");
						if($likeQuery->numRows() > 0) {
							$likeCount = $likeQuery->fetchArray()['count'];
						}
						$userLikeQuery = $this->db->query("SELECT * FROM post_likes WHERE post_id='$postId' AND user_id='$userId'");
						if($userLikeQuery->numRows() > 0) {
							$userLike = true;
							$likeUrl = CURRENT_URL;
						}
					?>
					<div class="icon like click-like">
						<a href="<?=$likeUrl?>">
							<?=$userLike==false?'Like':'Already Liked';?>: 
							<i class="fa fa-thumbs-up"></i> 
							(<?=$likeCount;?>)</a>
					</div>
				</div>
				<br>
				<div id="share"></div>
				<br>
			</div>
            <!-- Post comment start here -->
            <?php  include __DIR__.'/../inc/comment.php'; ?>
            <!-- Post comment ends here -->
        </div>
        <!-- Full post container ends here-->

        <!-- Go home navigation start here -->
        <p style="font-family: calibri; clear: both;">
            <a style="background: #2c3e50; padding: 5px; color: white; text-decoration: none;" href="javascript:history.go(-1)">&larr; Go Back </a>
        </p>
        <!-- Go home navigation ends here -->

    </div>
</div>
<?php include __DIR__.'/../inc/footer.php'; ?>
<script>
    $('.jssocials-share-link').on('click', function() {
        $.ajax({
            url: '<?=BASE_URL?>home/feedshare',
            method: 'post',
            data: {
                postId: '<?=$postId?>'
            },
            success: function(res) {
                console.log(res);
            }, 
            error: function(err) {
                console.log(err);
            }
        })
    });
</script>
