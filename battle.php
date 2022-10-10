<?php
	session_start();
	include'./includes/header.php'; 
	include('connect.php');
	$logo ="SELECT logo FROM planets WHERE id = '1'";
	$logo_res= mysqli_query($conn,$logo);
	$logo_row = mysqli_fetch_assoc($logo_res);
	/* TAKING PLANET ID */
	$planetId = $_GET['planetId'];
	/* TAKING CARDS ID FOR PLAYER */
	foreach ($_GET['playerCards'] as $value) 
	{
		$playerCards[] = $value;
	}
	 preg_match_all('!\d+!',$playerCards[0],$numbers);
	 
	 $comp_card1= (int)	$numbers[0][0];
	 $comp_card2= (int)	$numbers[0][1];
	 $comp_card3= (int)	$numbers[0][2];
	 


	$sql = "SELECT * FROM cards WHERE planet_id='".$planetId."'";
	$result = mysqli_query($conn,$sql);

	$sql_pl = "SELECT * FROM player_decks JOIN cards ON player_decks.card_id=cards.id WHERE 
	card_id='".$comp_card1."'";
	$result_pl = mysqli_query($conn,$sql_pl);
	$card1 = mysqli_fetch_assoc($result_pl);

	$sql_pl2 = "SELECT * FROM player_decks JOIN cards ON player_decks.card_id=cards.id WHERE 
	card_id='".$comp_card2."'";
	$result_pl2 = mysqli_query($conn,$sql_pl2);
	$card2 = mysqli_fetch_assoc($result_pl2);

	$sql_pl3 = "SELECT * FROM player_decks JOIN cards ON player_decks.card_id=cards.id WHERE 
	card_id='".$comp_card3."'";
	$result_pl3 = mysqli_query($conn,$sql_pl3);
	$card3 = mysqli_fetch_assoc($result_pl3);

	/*echo "<pre>";
	var_dump($result_pl);
	echo "</pre>";*/
?>
<link rel="stylesheet" type="text/css" href="css/battle.css">
<div>
	<div>
		<div class="pc_player">
<?php
				while ($row = mysqli_fetch_assoc($result))
								{
			?>
			<div class="col-md-4 pc_first_card">
				<div class="human_card">
					<span style="display: none;"><?php echo $row['card_id'];?></span>
					<div style="background-image: url(img/<?php echo $row['picture'];?>);" class="human_image" >
						<div class="card_type">
							<img src="img/<?php echo $logo_alien_row[''] ?>">
						</div>
						<div class="motto"><?php echo $row['description'];?></div>
					</div>
					<div class="human_info" >
						<div class="human_attack"><p><span><?php echo $row['attack']?></span>Attack</p></div>
						<div class="human_defense" ><p><span><?php echo $row['defence'];?></span>Defense</p></div>
						<div class="human_name" ><h3><?php echo $row['name'];?></h3></div>
					</div>
				</div>
			</div>
			<?php
}
?>
			
			
		</div>
		<div class="col-md-12 user_player">
			<?php				
			?>
			<div class="col-md-4">
				<div class="human_card">
					<span style="display: none;"><?php echo $card1['card_id'];?></span>
					<div style="background-image: url(img/<?php echo $card1['picture'];?>);" class="human_image" >
						<div class="card_type">
							<img src="img/<?php echo $logo_row['logo'] ?>">
						</div>
						<div class="motto"><?php echo $card1['description'];?></div>
					</div>
					<div class="human_info" >
						<div class="human_attack"><p><span><?php echo $card1['upg_card_att']?></span>Attack</p></div>
						<div class="human_defense" ><p><span><?php echo $card1['upg_card_def'];?></span>Defense</p></div>
						<div class="human_name" ><h3><?php echo $card1['name'];?></h3></div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="human_card">
					<span style="display: none;"><?php echo $card2['card_id'];?></span>
					<div style="background-image: url(img/<?php echo $card2['picture'];?>);" class="human_image" >
						<div class="card_type">
							<img src="img/<?php echo $logo_row['logo'] ?>">
						</div>
						<div class="motto"><?php echo $card2['description'];?></div>
					</div>
					<div class="human_info" >
						<div class="human_attack"><p><span><?php echo $card2['upg_card_att']?></span>Attack</p></div>
						<div class="human_defense" ><p><span><?php echo $card2['upg_card_def'];?></span>Defense</p></div>
						<div class="human_name" ><h3><?php echo $card2['name'];?></h3></div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="human_card">
					<span style="display: none;"><?php echo $card3['card_id'];?></span>
					<div style="background-image: url(img/<?php echo $card3['picture'];?>);" class="human_image" >
						<div class="card_type">
							<img src="img/<?php echo $logo_row['logo'] ?>">
						</div>
						<div class="motto"><?php echo $card3['description'];?></div>
					</div>
					<div class="human_info" >
						<div class="human_attack"><p><span><?php echo $card3['upg_card_att']?></span>Attack</p></div>
						<div class="human_defense" ><p><span><?php echo $card3['upg_card_def'];?></span>Defense</p></div>
						<div class="human_name" ><h3><?php echo $card3['name'];?></h3></div>
					</div>
				</div>
			</div>
			<?php
?>
		</div>
	</div>
</div>
<?php
include'./includes/footer.php'; 
?>