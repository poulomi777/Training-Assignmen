<html>

	<head>

			<title> Employee REGISTRATION PAGE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">

	</head>

	<body>
		<div>
			<form action = "update_records.php" method ="post" enctype = "multipart/form-data"> //
				<div class = "container">
					<h1> Welcome Trainee </h1>
					<p> Here is your credentials </p>

				</div>
			</form>
			<?php

				session_start();
				require_once('connection.php');

				if(isset($_POST['create']))
				{
		
		
					$sql = "SELECT * FROM `employee";
					if($is_query_run = mysqli_query($conn, $sql))
					{
						while($query_executed = mysqli_fetch_assoc($is_query_run))
						{
							echo "image : <img src = '".$query_executed['image']."' height = '100px' width = '100px'><br>";
							echo 'User Type : '.$query_executed['user_type']. '<br>';
							echo 'Email : '.$query_executed['Email'].'<br>';
							echo 'Password : '.$query_executed['Password'].'<br>';
							echo 'Sex : '.$query_executed['Sex'].'<br>';
							echo 'City : '.$query_executed['City'].'<br>';
							echo 'Skill : '.$query_executed['Skill'].'<br>';
					
							
						}
					}
				}
			?>
			<input class = "btn btn-primary" type = "submit" name = "create" value = "UPDATE">
		</div>
		
	</body>
</html>

