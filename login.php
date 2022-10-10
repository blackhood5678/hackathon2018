<?php
	session_start();
	include('connect.php');
	if(isset($_POST['user']) && isset($_POST['pass']))
	{
			
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$query = "SELECT * FROM `users` WHERE username='$user' ";
			$sql = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($sql);
			// var_dump($row);
			if (password_verify($pass, $row['password'])) 
			{

				$_SESSION['user_id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
				header("Location: logger.php");
			}
			else
			{
				echo 'Your username or password are incorrect!';
				echo '<p></p>';
				echo '<a href="signup_login.php">Go Back</a>';
			}	
	}		
	else
	{
		echo 'You havent filled all the boxes';
		echo '<p></p>';
		echo '<a href="signup_login.php">Go Back</a>';
	}
	
