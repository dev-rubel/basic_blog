
	<div class="footer" style="margin-bottom: -18px;">
		<p>Copyright &copy; 2019 Blog</p>
	</div>
</div>
<?php if (isset($_SESSION["admin"])) { ?>
	<a href="<?=BASE_URL;?>logout" class="float">
		<i class="fa fa-sign-out my-float"></i>
	</a>
<?php }; ?>

<script src="js/jquery.min.js"></script>
<script src="js/jssocials.min.js"></script>
<script>
    $("#share").jsSocials({
    	url: "<?=CURRENT_URL;?>",
    	shareIn: "popup",
        shares: ["twitter", "facebook", "pinterest", "whatsapp"]
    });
</script>
<script src="js/index.js"></script>
<script src="js/search.js"></script>

</body>
</html>