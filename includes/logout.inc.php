<?php

if(isset($_POST['submit'])){
	session_start();
	session_unset();//unsets all session variables
	session_destroy();//destroys any sessions running
	header("Location: ../login.php");
	exit();
}