<html>
	<head>
		<meta charset="UTF-8" />
		<title>Login Page.</title>
		<link rel="stylesheet" type="text/css" href="chaoscodecss.css" />
	</head>
	<body>
		<div class="whole-wrapper">
			<div class="nav-wrapper">
				<a class="home" href="#">Home</a>
				<a class="news" href="#">News</a>
				<a class="contact" href="#">Contact</a>
			</div>
			<div class="form-wrapper">
				<form action="chaoscodeclub.php" method="POST">
					<h2 class="form-title">Log In.</h2>
					<h3 class="form-subtitle">In money we trust</h3>
					<label for="username">Username: </label>
					<input type="text" name="username" placeholder="username..." /><br/><br/>
					<label for="password">Password: </label>
					<input type="password" name="password" placeholder="super secret..." /><br/><br/>
					<input type="submit" name="login" value="Log in" /> <p class="or"> or </p> <a class="register" href="chaoscodereg.php">Register</a>
					<?php
					session_start();
					include("chaoscodecon.php");
					include("chaoscodefunctions.php");

					if($_SERVER['REQUEST_METHOD'] == "POST") {
						$user = $_POST['username'];
						$pass = $_POST['password'];

						if(!empty($user) && !empty($pass)) {
							$query = "select * from members where username = '$user'";

							$result = mysqli_query($connect, $query);
		
							if($result && mysqli_num_rows($result) > 0) {
								$user_data = mysqli_fetch_assoc($result);

								if($user_data['password'] === $pass) {
									$_SESSION['user_id'] = $user_data['id'];
									//echo "logged in.";
									header("Location: welcomecoder.php");
									die;
								} else {
									echo "<br/><p class='wrongp'>wrong password.</p>";
								}
							} else {
								echo "</br><p class='wrongu'>wrong username.</p>";
							}
						}
					}
					?>
				</form>
			</div>
			<div class="main-wrapper">
				<h1 class="title">Chaos Code Club.</h1>
				<p class="content">Welcome to the revolution. If you find any bugs, refer to me, the admin, on the contact page; and please be patient on updates - I am a lone coder, fullstacking the site. Enjoy your stay.</p>
			</div>
		</div>
	</body>
</html>
