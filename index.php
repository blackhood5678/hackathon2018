<?php 
include './includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="./css/intro.css">
<div id="intro-container">
	<div class="intro">
  A long time ago, in a galaxy far,<br> far away....
</div>
<div class="logo">
    <img src="./img/SpaceVaders2.png" alt="">
</div>
<!-- Change the text to your liking -->
<div id="board">  
  <div id="content">
    <p id="title">Hack 2018</p>
    <p id="subtitle">Universal Conquest</p>
    <br>
    <p>The humanity just recieved news tat humans are not alone in the universe, 
	the returned information contains hidden messages, part of messages images and other kind 
	of information about the other planets in the galaxy, so the humans decide to take a quest
	to explore the vast space, and conquere new planets, universes and races.<br>
	The race for the Universal Domination, and complete OWNAGE OF THE GALAXY BEGIN ... NOW!
	</p>    
  </div>  
</div>
</div>
	<script type="text/javascript" charset="utf-8">
		const numStars = 120;
		var rand_class = false;
for (let i = 0; i < numStars; i++) {
	let star = document.createElement("div"); 
	var rand_star_class = "blink_star"; 
	if(!rand_class){
		star.className = "star blink_star";
		rand_class = true;
	}else{
		star.className = "star";
		rand_class = false;
	}

	var xy = getRandomPosition();
	star.style.top = xy[0] + 'px';
	star.style.left = xy[1] + 'px';
	document.body.append(star);
}

function getRandomPosition() {  
	var y = window.innerWidth;
	var x = window.innerHeight;
	var randomX = Math.floor(Math.random()*x);
	var randomY = Math.floor(Math.random()*y);
	return [randomX,randomY];
}
</script>
<script>
setTimeout(function () {
   window.location.href= './signup_login.php';
}, 55000);
</script>
<script type="text/javascript">
	$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        window.location.href= './signup_login.php';
    }
});
</script>
<?php 
include './includes/footer.php';
?>