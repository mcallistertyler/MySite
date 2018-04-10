<?php
	include_once 'header.php'; //includes the header.php page
?>


<section class="main-container">
	<div class="main-wrapper">
		<h2>Home</h2>
		<?php
			//You can use isset() to change any content on any page when a user is logged in
			if(isset($_SESSION['u_id'])){ 
				echo "You are currently logged in as " . $_SESSION['u_uid'] . "!";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>