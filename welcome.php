

<html>
	
	<head>
		
			<title> Welcome Page | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
			
	</head>
	
	<body>
		<div>
			<form action = "form.php" method ="post">
				<div class = "container">
					<h2 style="text-align: center;"> ADMIN PANEL</h2>
					<p><b> You are Logged in Successfully... </b></p>
					
				</div>
			</form>
		</div>
	</body>
	<?php
		session_start();
		
		// Showing Admin's information
		echo "<br> <br> Profile Information ::: <br><br>";
		
		$email = $_SESSION["Email_id"];
		$sex = $_SESSION['sex'];
		$city = $_SESSION['city'];
		$skill = $_SESSION['skill'];
		$image = $_SESSION['image'];
		
		echo 'Email : '.$email.'<br>';
		echo 'Sex : '.$sex.'<br>';
		echo 'City : '.$city.'<br>';
		echo 'Skill : '.$skill.'<br>';
		echo "image : <img src = '".$image."' height = '200px' width = '200px'><br>";
		
		echo '<b>Register a new trainee</b>'.'  '.'<a href="form.php" class="btn btn-primary">ADD</a><br>';		
		echo '<b>View trainee Details</b>'.'  '.'<a href="details.php" class="btn btn-primary">VIEW ALL TRAINEE</a><br>';
		echo '<a href="logout.php" class="btn btn-primary">LOGOUT</a>';
	?>
</html>
