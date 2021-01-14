<?php if(isset($_SESSION['message'])) {?>
	<?=$_SESSION['message'];?>
<?php } ?>



<?php
	unset($_SESSION['message']);
?>