<?php 
session_start();
$id= $_GET['card_id'];
$_SESSION['id']=$_GET['card_id'];
$user_id= 1 ;
include('connect.php');
if(isset($_POST['upgrade'])){

	$query = "SELECT * FROM `player_decks`JOIN cards ON player_decks.card_id=cards.id WHERE card_id = '".$id."'";
	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	// var_dump($row);
	$sql="SELECT * FROM user_resources WHERE user_id ='".$user_id."'";
	$res=mysqli_query($conn,$sql);
	if (mysqli_num_rows($res) > 0){
		while($sec_row = mysqli_fetch_assoc($res)){

			$resource_id=$sec_row['resource_id'];
			$res_cost_type=$row['res_cost_type'];
			$res_cost_value=$row['res_cost_value'];
			$res_value=$sec_row['res_value'];
			if ($id == $row['card_id']) {
				// var_dump($resource_id);
				if($resource_id === $res_cost_type){
					if($res_value >= $res_cost_value){

						$upgraded =$row['upgraded'];
						$upg_card_att= $row['upg_card_att'];
						$upg_card_def=$row['upg_card_def'];
						$attack= $row['attack'];
						$defence=$row['defence'];

						$upg_card_att=$upg_card_att + ($attack+4);
						$upg_card_def=$upg_card_att + ($defence+4);
						$update="UPDATE player_decks SET upgraded ='1', upg_card_att='".$upg_card_att."', upg_card_def='".$upg_card_def."' WHERE card_id = '".$id."'";
						mysqli_query($conn,$update);
						$update_res="UPDATE user_resources SET res_value ='".($res_value - $res_cost_value)."' WHERE user_id = '".$user_id."' AND resource_id='".$res_cost_type."'";
						mysqli_query($conn,$update_res);
						header("Location: upgrade2.php");
					}else{
						echo "not enough resources";
					}
				}else{
					echo "you dont have the needed resources";
				}
			}
		}
	}
}