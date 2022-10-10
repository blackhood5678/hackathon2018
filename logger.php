<?php
include './includes/header.php';
include 'connect.php';
session_start();
$get_logs = "SELECT * FROM logs JOIN planets ON logs.planet_id = planets.id WHERE user_id = '".$_SESSION['user_id']."'";
$result = mysqli_query($conn, $get_logs);
$total = $result->num_rows;
while ($row = $result->fetch_assoc()) {
    $loggs[] = $row;
}
?>
<link rel="stylesheet" type="text/css" href="planets/earth/earth.css">
<link rel="stylesheet" type="text/css" href="planets/jupiter/jupiter.css">
<link rel="stylesheet" type="text/css" href="planets/mars/mars.css">
<link rel="stylesheet" type="text/css" href="planets/mercury/mercury.css">
<link rel="stylesheet" type="text/css" href="planets/neptune/neptune.css">
<link rel="stylesheet" type="text/css" href="planets/saturn/saturn.css">
<link rel="stylesheet" type="text/css" href="planets/sun/sun.css">
<link rel="stylesheet" type="text/css" href="planets/uranus/uranus.css">
<link rel="stylesheet" type="text/css" href="planets/venus/venus.css">

<!-- Trigger/Open The Modal -->
<button class="btn btn-success" id="myBtn">Open Modal</button>
<a href="lobby.php"><button class="btn btn-info">go lobby</button></a>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="col-md-12 modal-content">
    <span class="close">&times;</span>
    
    <?php 
    foreach ($loggs as $key => $log_value) {
        echo "<div class='col-md-12 log_container container d-md-inline-flex'>";
        echo "<div class='col-md-6'><p class='text_info'>Planet:</br>".$log_value['name']."</br>Description:</br>".$log_value['description']."</p></div>";
        switch ($log_value['id']) {
        case 1:
        echo '<div class=col-md-6 planet id=earth_outside>
        <div id=earth_inside></div>
        </div>';
          break;
        case 2:
        echo '<div class=col-md-6 planet id=jupiter_outside>
    <div id=jupiter_inside></div>
  </div>';
          break;
        default:
          # code...
          break;
      }
      echo "</div>";
    }
    ?>
</div>
</div>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
include'./includes/footer.php'; ?> 