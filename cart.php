<!DOCTYPE html>
<html>
<head>
	<title>Assignment 2 - Exercise 6 - Dylan Seto</title>
	<link rel="stylesheet" href="exercise6Style.css">
	<script src="clock.js"></script>
</head>
<body>
	<?php
	include 'items.php';
		session_start();
	?>
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
		<table>
			<?php
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
				{
					$total = 0;
					foreach($_SESSION['items'] as $item)
					{
						echo "<tr><th>" . $item->name . "</th><th>$" . $item->price . "</th></tr>";
						$total += $item->price;
					}
					echo "<p>Total Price: $" . $total;
					echo "<form><button>Checkout</button> <button><a href='exercise6.php'> Continue Shopping</a></button></form>";
				}else 
				{
					echo "You must be logged in to view.";
				}
			?>
		</table>
	</div>
	<div id="footer">
		<a href="#">About</a>
		<a href="#">Contact Us</a>
		<a href="#">Privacy Policy</a>
		<a href="#">FAQ</a>
	</div>
	<script type="text/javascript" src="register.js"></script>
</body>
</html>