<?php
include './includes/header.php';
include 'connect.php';
session_start(); 
$planet_id = 1;
$user_id = 1;
$isExisting = "SELECT * FROM rankings WHERE user_id ='".$user_id."'";
$result = mysqli_query($conn,$isExisting); 
$total = $result->num_rows;
$getstart = "SELECT * FROM seasons";
$execute = mysqli_query($conn,$getstart); 
$result = $execute->num_rows;
$datetime_season = $execute->fetch_assoc();
var_dump($datetime_season['season_start']);
$now = Date("Y-m-d H:i:s");
$timeSpent = (strtotime($now) - strtotime($datetime_season['season_start']));
echo $timeSpent;
if($total){
	$insert = "INSERT INTO rankings (user_id,time_spent,finished,planets_count) VALUES ('".$user_id."',')";
}


include'./includes/footer.php'; ?> 