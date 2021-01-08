<?php 
	session_start();
	require_once('connection.php');

	if(isset($_POST['login']))
	{
		if (empty($_POST["email"])||empty($_POST["password"]))
		{
			header("location:login.php?Empty = Please fill the blanks");
		}
		else
		{
			$email = $_POST["email"];
			$password = $_POST["password"];
			
			
			$pwd = md5($password);

			$query = "SELECT * FROM `employee` WHERE Email = '$email' AND Password = '$pwd'";
		
			
			$is_query_run = mysqli_query($conn, $query);
			
			if($is_query_run)
			{
				while($query_executed = mysqli_fetch_assoc($is_query_run))
				{
					$sex = $query_executed['Sex'];
					$city = $query_executed['City'];
					$skill = $query_executed['Skill'];
					$image = $query_executed['image'];
					
					$_SESSION['sex'] = $sex;
					$_SESSION['city'] = $city;
					$_SESSION['skill'] = $skill;
					$_SESSION['image'] = $image;
					
					if ($query_executed['user_type'] === "admin")
					{
						echo 'Welcome Admin <br>';
						$_SESSION['Email_id'] = $email; //creating session
						header("location: welcome.php");
					}
					else
					{
						$_SESSION['Email_id'] = $email; //creating session
						header("location:trainee_record.php");
					}
				}
			}
			else
			{
				header("location:login.php?Invalid = Please enter correct email or password");
			}
			
			
		}
	}
	
?>




<html>
	
	<head>
		
			<title> USER LOGIN PAGE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="login.js"></script>
			
	</head>
	
	<body>
		<div>
			<form action = "login.php" method ="post">
				<div class = "container">
					<h1> LOGIN </h1>
					<p> Fill the form with correct value. </p>
					
					<div class = "row">
						<div class = "col-sm-3">
							<hr class = "mb-3">
								<div id= "login_output"></div>
							
								<label for = "email"> <b> Email: </b> </label>
								<input class = "form-control" type = "email" name = "email" placeholder = "username@domain.com" required><br>
								
								<label for = "password"> <b> Password : </b> </label>
								<input class = "form-control" type = "password" name = "password" placeholder = "********" required><br>
								
								
								
								<hr class = "mb-3">
								
								<input class = "btn btn-primary" id = "login" type = "submit" name = "login" value = "LOGIN"><br>
								
								<a href="forgetpw.php" class="btn btn-primary">FORGET PASSWORD? Click Here </a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>



