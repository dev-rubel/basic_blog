<?php
	include __DIR__.'/../inc/header.php';
?>
<style type="text/css">
    form {
        width: 50%;
        float: left;
        margin-top: 10px;
        margin-bottom: 10px;
        clear: both;
    }
    h2 {
        text-align: center;
    }
    input {
        height: 30px;
        background: transparent;
        outline: none;
        border: none;
        border-bottom: 1px solid #2c3e50;
    }
    textarea {
        height: 100px;
        background: transparent;
        outline: none;
        border: none;
        width: 100%;
        border-bottom: 1px solid #2c3e50;
    }
</style>

<div class="more">
    <div class="postside">
        <h3 style="margin-top: 10px; padding-top: 0px; font-family: calibri; background: #2c3e50; text-align: left; padding: 5px; color: white;">Add a new post</h3>

        <form method="post" action="<?=BASE_URL;?>home/insertfeed" enctype="multipart/form-data" style="width: 100%; float: left; margin-top: 0px; margin-bottom: 10px; clear: both;">
            <p>Post Title:</p>
            <input type="text" name="title" placeholder="Enter your title" />
            <input type="hidden" value="999999999999999" />
            <label>
                <input style="display: none;" id="file" type="file" name="image" onchange="proccess(window.lastFile=this.files[0])" />
                <div style="margin: 0px; padding: 0px;">
                    <!--Sample image uploaded begins HERE -->
                    <img id="image" style="width: 100%; height: auto; cursor: pointer; margin-left: 0px; border: 0px;" class="ui centered large image" src="<?=BASE;?>image/postthumbnail.png" />
                    <!--Sample image uploaded ends HERE -->
                </div>
            </label>
            <p>Post Tags:</p>
            <input type="text" name="category" placeholder="Set tag seperat with (,)" />
            <p>Post content:</p>
            <textarea name="text" style="font-family: calibri;" placeholder="Enter content..."></textarea>
            <input type="submit" value="Post" name="submit" />
        </form>
    </div>
</div>

<?php include __DIR__.'/../inc/footer.php'; ?>
