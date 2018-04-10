<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Section</title>
    <link href="css/loginstyle.css" rel="stylesheet">
</head>
<body>
	
<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.html">Home</a></li>
			</ul>
			<div class="nav-login">
				<?php
					if(isset($_SESSION['u_id'])){
						echo '<form action="includes/logout.inc.php" method="POST">
							  <button type="submit" name="submit">Logout</button>
							  </form>';
					} else{
						echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="Username/e-mail">
								<input type="text" name="pwd" placeholder="Password">
								<button type="submit" name="submit">Login</button>
							  </form>
			  				<a href="signup.php">Sign Up</a>';
					}
				?>
		</div>
	</div>
	</nav>
</header>