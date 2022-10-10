<?php
	session_start();
	$user_id= 1 ;
	include('connect.php');
	include('includes/header.php');
	$query = "SELECT * FROM `player_decks` JOIN cards ON player_decks.card_id=cards.id WHERE user_id = '".$user_id."'";
	$result= mysqli_query($conn,$query);
?>
<div class="container">
	<div class="row">
<?php
	if ($result){
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){

?>
		<div class="col-sm">
			<div class="master_card">
				<img class="master_image" src="img/<?php echo $row['picture'];?>">
				<div class="motto"><?php echo $row['description'];?></div>
				<div class="master_info" >
					<div class="master_attack"><p><span><?php echo $row['upg_card_att']?></span>Attack</p></div>
					<div class="master_defense"><p><span><?php echo $row['upg_card_def'];?></span>Defense</p></div>
					<div class="master_name" ><h3><?php echo $row['name'];?></h3></div>
				</div>
			</div>
			<form method="post" id="upgrade" action="upgrade.php?card_id=<?php echo $row['card_id']; ?>">
			<input type="submit" name="upgrade" value="Upgrade">
			</form>
		</div>
<?php
			}
		}
	}
?>
	</div>
</div>
<?php
	include('includes/footer.php');