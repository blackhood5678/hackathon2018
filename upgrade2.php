<?php
session_start();
$id=$_SESSION['id'];
include('connect.php');
$query = "SELECT * FROM `cards` WHERE card_id = '".$id."'";
	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	$res_cost_value=$row['res_cost_value'];
	$res_cost_value++;
	header("Location: profile.php");