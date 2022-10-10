<?php
	session_start();
	include('connect.php');
	if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass_confirm']) && isset($_POST['race'])){

		$user= $_POST['user'];
		$pass= $_POST['pass'];
		$pass_confirm= $_POST['pass_confirm'];
		$race= $_POST['race'];
		$passlen=strlen($pass);
		$containsLetter  = preg_match('/[a-zA-Z]/', $pass);
		$containsDigit   = preg_match('/\d/', $pass);

		if($pass = $pass_confirm){
			if($passlen<6 || $passlen>16){
				echo 'The password that you have given is not valid.';
		        echo '<p></p>';
				echo '<a href="signup_login.php">Go Back</a>';
			}else{
				if ($containsLetter && $containsDigit){
		        	$sql= mysqli_query($conn, "SELECT username  FROM users WHERE username = '".$user."'");
					if(mysqli_num_rows($sql)>=1){
			    		echo"username already exists";
			    		echo '<p></p>';
						echo '<a href="signup_login.php">Go Back</a>';
			   		}else{
			   			$hashed_pass = crypt($pass);

			   			$query = "INSERT into users (username, password, race) VALUES ('".$user."','".$hashed_pass."','".$race."')";
						mysqli_query($conn, $query);

						$query = "SELECT id FROM users WHERE username='".$user."'";
						$result = mysqli_query($conn, $query);
						while ($row = mysqli_fetch_assoc($result)) 
						{
							$user_id = $row['id'];
						}
						/* SESSION FOR USER ID */
						$_SESSION['user_id'] = $user_id;

						$sql1="INSERT INTO player_decks (user_id, card_id, upgraded, upg_card_att, upg_card_def) VALUES ('".$user_id."', '13', '0', '4','6')";
						$result1 = mysqli_query($conn, $sql1);
						$sql2="INSERT INTO player_decks (user_id, card_id, upgraded, upg_card_att, upg_card_def) VALUES ('".$_SESSION['user_id']."', '14', '0', '1','1')";
						$result2 = mysqli_query($conn, $sql2);
						$sql3="INSERT INTO player_decks (user_id, card_id, upgraded, upg_card_att, upg_card_def) VALUES ('".$_SESSION['user_id']."', '15', '0', '9','8')";
						$result3 = mysqli_query($conn, $sql3);

						$sql4="INSERT INTO player_decks (user_id, card_id, upgraded, upg_card_att, upg_card_def) VALUES ('".$_SESSION['user_id']."', '16', '0', '20','24')";
						$result4 = mysqli_query($conn, $sql4);

						$sql5 = "INSERT INTO user_resources(user_id,resource_id,res_value) VALUES ('".$user_id."','1','15')";
						mysqli_query($conn, $sql5);

						$sql6 = "INSERT INTO user_resources(user_id,resource_id,res_value) VALUES ('".$user_id."','2','15')";
						mysqli_query($conn, $sql6);

						header("Location:signup_login.php");
			   		}
		        }else{
		        	echo 'The password that you have given is not valid.';
		        	echo '<p></p>';
					echo '<a href="signup_login.php">Go Back</a>';
		        }
		    }
		}else{
			echo"the passwords are not matching";
			echo '<p></p>';
			echo '<a href="signup_login.php">Go Back</a>';
		}
	}else{
		echo 'You havent filled all the boxes';
	}
	

