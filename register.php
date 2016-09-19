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
		if ($_SERVER["REQUEST_METHOD"] == "GET") 
		{
			$error = "";
			
			if (empty($_GET["fname"])) 
			{
				$error = "First Name Required!";
			}
			else if (empty($_GET["lname"])) 
			{
				$error = "Last Name Required!";
			}
			else if (empty($_GET["email"]))
			{
				$error = "Email Required!";
			}
			else if (empty($_GET["phone"]))
			{
				$error = "Phone Number Required!";
			}
			else if (empty($_GET["pass"]))
			{
				$error = "Password Required!";
			}
			else if (empty($_GET["check"]))
			{
				$error = "Confirmation Required!";
			}
			else
			{
				if($_GET["pass"] != $_GET["check"])
				{
					$error = "Passwords Don't Match!";
				}
				else 
				{
					if(strlen($_GET["pass"]) < 8)
					{
						$error = "Passwords Must be at least 8 characters!";
					}
					else
					{
						//Write to file
						$file = fopen("members.txt","a+");
						echo fwrite($file, $_GET["fname"]);
						echo fwrite($file, " ");
						echo fwrite($file, $_GET["lname"]);
						echo fwrite($file, " ");
						echo fwrite($file, $_GET["email"]);
						echo fwrite($file, " ");
						echo fwrite($file, $_GET["phone"]);
						echo fwrite($file, " ");
						echo fwrite($file, $_GET["pass"]);
						echo fwrite($file, "\n");
						fclose($file);
						
						$error = "Successfully Registered!";
					}
				}
			}
		}
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
		<h1>Register</h1>
		
		<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onSubmit="checkRegister()">
			<?php echo $error . "<br>"?>
			<input type="text" id="fname"  name="fname" placeholder="First Name"> <br>
			<input type="text" id="lname" name="lname" placeholder="Last name"><br>
			<input type="text" id="email" name="email" placeholder="E-mail"><br>
			<input type="text" id="phone" name="phone" placeholder="Phone Number"><br>
			<input type="password" id="pass" name="pass" placeholder="Password"><br>
			<input type="password" id="check" name="check" placeholder="Confirm Password"><br>
			<input id="submit" type="submit" value="Register">
		</form>
		
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