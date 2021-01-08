<html>
	
	<head>
		
			<title> HOME PAGE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
			
	</head>
	
	<body>
		<div>
			<form action = "login.php" method ="post">
				<div class = "container">
					<h1> HELLO </h1>
					<p><b> WELCOME TO TECHMONASTIC SOLUTION PVT. LTD. </b></p>
				</div>
			</form>
		</div>
	</body>
	<?php
		echo 'New User? Create Account'.'  '.'<a href="form.php" class="btn btn-primary">SIGNUP</a><br>';
		echo 'Already Have Account?'.'  '.'<a href="login.php" class="btn btn-primary">SIGNIN</a>';
	?>
</html>