<?php
//button press necessary to ensure users cannot jump to login via URL
if(isset($_POST['submit'])){

	include_once 'dbh.inc.php'; //Connect to database

	$first = mysqli_real_escape_string($conn, $_POST['first']); //real escape prevents basic code injection
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check for empty fields
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
		header("Location: ../signup.php?signup=empty"); //Returns header with error message
		exit();
	} else{
		//Check if input characters are valid
		//pregmatch checks first variable for invalid characters selected
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else{
			//Check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=email");
				exit();
			}
			else{
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);//Check if any rows were returned

				if($resultCheck > 0){
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}
				else{
					//Password hashing so I can't read the passwords inside the database
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users(user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first', '$last', '$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}


} else{
	header("Location: ../signup.php"); //If the button is not pressed locate back to the signup page
	exit();
}