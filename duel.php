<?php
include './includes/header.php';
include 'connect.php';
session_start();
echo $_SESSION['user_id'];
$get_cards = "SELECT * FROM player_decks JOIN cards on player_decks.card_id = cards.id WHERE user_id = '".$_SESSION['user_id']."'";
$result = mysqli_query($conn, $get_cards);
$total = $result->num_rows;
?>
<form>
<?php 
while ($row = $result->fetch_assoc()) { 
	echo '<img src="img/'.$row['picture'].'">';
	echo '<input type="checkbox" id="ch_card_'.$row['card_id'].'" name="ch_card" class="ch_card" value="'.$row['id'].'">';
	echo '<label for="ch_card_'.$row['card_id'].'">'.$row['name'].'</label>​';
}
?>
<input type="submit" name="submit" value="enter battle">
</form>

<style type="text/css">
	.ch_card{
		display: none;
	}
</style>
<?php
include'./includes/footer.php'; ?> 