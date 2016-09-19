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
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
		{
			$_SESSION['loggedin'] = false;
			session_unset();
			session_destroy();
			header("Location: exercise6.php", true, 301);
		}
		else 
		{
			if ($_SERVER["REQUEST_METHOD"] == "GET") 
			{
				$error = "";
				
				if (empty($_GET["email"]))
				{
					$error = "Email Required!";
				}
				else if (empty($_GET["pass"]))
				{
					$error = "Password Required!";
				}
				else
				{
					$myfile = fopen("members.txt", "r") or die("Unable to open file!");
					
					while(!feof($myfile)) 
					{
						$line = fgets($myfile);
						$tokens = preg_split('/\s+/', $line);
						
							
						if(isset($tokens[2]) && isset($tokens[4]) && $tokens[2] == $_GET["email"] && $tokens[4] == $_GET["pass"])
						{
							$_SESSION['loggedin'] = true;
							break;
						}
					}
					fclose($myfile);
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
		<h1>Login</h1>
		
		<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onSubmit="checkRegister()">
			<?php echo $error . "<br>"?>
			<input type="text" id="email" name="email" placeholder="E-mail"><br>
			<input type="password" id="pass" name="pass" placeholder="Password"><br>
			<input id="submit" type="submit" value="Login">
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