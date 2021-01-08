

<html>
	
	<head>
		
			<title> Welcome Trainee Page | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
			
	</head>
	
	<body>
		<div>
			<form action = "trainee_records.php" method ="post">
				<div class = "container">
					<h1> WElCOME User; you are logged in successfully... </h1>
					<p><b> Profile Information ::: </b></p>
				</div>
			</form>
		</div>
	</body>
	<?php
		session_start();		
		
		$email = $_SESSION["Email_id"];
		$sex = $_SESSION['sex'];
		$city = $_SESSION['city'];
		$skill = $_SESSION['skill'];
		$image = $_SESSION['image'];
		
		echo "image : <img src = '".$image."' height = '200px' width = '200px'><br>";
		echo 'Email : '.$email.'<br>';
		echo 'Sex : '.$sex.'<br>';
		echo 'City : '.$city.'<br>';
		echo 'Skill : '.$skill.'<br>';
		
		
		echo '<a href="update_records.php" class="btn btn-danger">UPDATE PROFILE INFORMATION</a><br>';
		echo '<br>';
		echo '<br>';
		echo '<a href="logout.php" class="btn btn-danger">LOGOUT</a>';
	?>
</html>
