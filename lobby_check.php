<?php
include 'connect.php';
session_start();
$sql = "SELECT * FROM pre_battles WHERE player_one OR player_two = '".$_SESSION['player_one']."'";
$result = mysqli_query($conn,$sql); 
$total = $result->num_rows;  
while($row = $result->fetch_assoc()) {

			if($row["player_one"] !=0 && $row["player_two"] != 0){
				$rdy = 1;
			}else{
				$rdy = 0;
			}
}

echo $rdy;
