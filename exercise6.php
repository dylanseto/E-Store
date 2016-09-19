<!DOCTYPE html>
<html>
<head>
	<title>Assignment 2 - Exercise 6 - Dylan Seto</title>
	<link rel="stylesheet" href="exercise6Style.css">
	<script src="clock.js"></script>
</head>
<body>
	<?php
		session_start();
		
		include "items.php";
		
		$_SESSION['items'] = array();
	?>
	<script>
		function buyLenticular()
		{
			<?php
					$lenticular = new item();
					$lenticular->name = "LENTICULAR FOULARD SILK SHIRT";
					$lenticular->price = 600;
					array_push($_SESSION['items'], $lenticular);
			?>
		}
		function buyAbstract()
		{
			<?php
					$abstract = new item();
					$abstract->name = "ABSTRACT PRINCE OF WALES SHIR";
					$abstract->price = 799;
					array_push($_SESSION['items'], $abstract);
			?>
		}
		function buyInstargia()
		{
			<?php
					$instargia = new item();
					$instargia->name = "INTARSIA FOULARD PRINT SILK SHIRT";
					$instargia->price = 249;
					array_push($_SESSION['items'], $instargia);
			?>
		}
	</script>
	<div id="topBanner">
		<p>SOMETHING COOL</p>
		<p id="clock"></p>
		<script>updateClock();</script>
	</div>
	<div id="sideMenu">
		<ul>
			<li><a href="exercise6.php">Home</a></li>
			<li><a href="cart.php">Cart</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">
				<?php 
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
					{
						echo "Log Out";
					}
					else
					{
						echo "Login";
					}
				?></a></li>
		</ul>
	</div>
	<div id="content">
		<h1>Something Cool -</h1>
		<p>Something cool will be a fake clothing brand selling custom made high fashion clothes.</p>
		<ul>
			<li class="Items">
				<img src="img/1.png"></img>
				<p>LENTICULAR FOULARD SILK SHIRT</p>
				<p> $600</p>
				<form action="" method="" onsubmit="">
					<button onclick="buyLenticular()">Add To Cart</button>
				</form>
			</li>
			<li class="Items">
				<img src="img/2.png"></img>
				<p>ABSTRACT PRINCE OF WALES SHIRT</p>
				<p> $799</p>
				<form action="" method="" onsubmit="">
					<button onclick="buyAbstract()">Add To Cart</button>
				</form>
			</li>
			<li class="Items">
				<img src="img/3.png"></img>
				<p>INTARSIA FOULARD PRINT SILK SHIRT</p>
				<p> $249</p>
				<form action="" method="" onsubmit="">
					<button id="INTARSIA">Add To Cart</button>
				</form>
			</li>
		</ul>
	</div>
	<div id="footer">
		<a href="#">About</a>
		<a href="#">Contact Us</a>
		<a href="#">Privacy Policy</a>
		<a href="#">FAQ</a>
	</div>
</body>
</html>