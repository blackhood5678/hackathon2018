<?php
include './includes/header.php';
include 'connect.php';
session_start();
$_SESSION['player_one'] = $_SESSION['user_id'];


if($_SESSION['player_one']){
		$redirect = false;
		$brefore_pre = "SELECT * FROM pre_battles";
		$result_pre = mysqli_query($conn,$brefore_pre); 
		$total_pre = $result_pre->num_rows;  

		if ($total_pre > 0) {
			while($row = $result_pre->fetch_assoc()) {
				if($row['player_one'] != $_SESSION['player_one']){
					$pre_query = "UPDATE pre_battles SET player_two=".$_SESSION['player_one'].",pl_two_rdy = '1' WHERE player_one = '".$row['player_one']."'";
				}else{
					$pre_query = "UPDATE pre_battles SET player_one=".$_SESSION['player_one'].",pl_one_rdy = '1' WHERE player_one = '".$row['player_one']."'";
				}
				$pl_one = $row['player_one'];
				$pl_two = $row['player_two'];
				// if($row['player_one'] != 0 && $row['player_two'] != 0){
				// 	$redirect = true;
				// }
			}
		}else{
			$pre_query = "INSERT INTO pre_battles (player_one,player_two,pl_one_rdy,pl_two_rdy) VALUES ('".$_SESSION['player_one']."','0','1','0')";
		} 
		if(isset($pre_query)){
			if (mysqli_query($conn,$pre_query)) {
				if(isset($pl_one) && isset($pl_two)){
					if($pl_two == 0){
						$game_check = "SELECT * FROM pre_battles WHERE player_one = '".$pl_one."' AND  player_two != '".$pl_two."'";
					}else{
						$game_check = "SELECT * FROM pre_battles WHERE player_one = '".$pl_one."' AND  player_two = '".$pl_two."'";
						$_SESSION['player_two'] = $pl_two;
					}

					// echo $game_check;
					$result_game = mysqli_query($conn,$game_check);
					$total_pre_battle = $result_game->num_rows; 
					if($total_pre_battle > 0){
						// session_destroy();
						header("Location: ./in-battle.php"); /* Redirect browser */
						// exit();
					}
				}
				echo "Please wait another player to enter battle lobby!";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}	
			
	}
	
?>
<br>
<span id="timer"></span>
<script type="text/javascript">
	$(document).ready(function ajaxCall() {
		var time = 15000;
		$.ajax({
	            url: "lobby_check.php",
	            success: function( response ) {
	            	console.log(response);
	            	if( response != 0 ){
	            		window.location.replace("./in-battle.php");
	            	}
	            }
	    });
	    setInterval(ajaxCall, time);  
	     clearInterval(counter);
    counter = setInterval(timer, 10); 
	});           
</script>
<script type="text/javascript">
	var initial = 3000;
var count = initial;
var counter; //10 will  run it every 100th of a second

function timer() {
    if (count <= 0) {
        clearInterval(counter);
        return;
    }
    count--;
    displayCount(count);
}

function displayCount(count) {
    var res = count / 100;
    console.log(res);
    document.getElementById("timer").innerHTML = res.toPrecision(count.toString().length) + " secs";
}

displayCount(initial);
</script>
<?php
include'./includes/footer.php'; ?> 
