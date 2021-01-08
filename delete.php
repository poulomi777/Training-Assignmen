<?php
	require_once('connection.php');
	if(isset($_POST['delete']))
	{
		$email = $_POST["email"];
		
		//query for deleting the record
		$sql= "DELETE FROM `employee` WHERE Email = '$email'";
		
		//if the query executes succesfully then it will be redirected to View details of trainee page
		if($is_query_run = mysqli_query($conn, $sql))
		{
			header("location:details.php");
		}
	}
?>

<html>
<head>
		<title> DELETE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
</head>
<body>
		<div>
			<form action = "delete.php" method ="post" enctype = "multipart/form-data"> 
				<div class = "container">
					<h1> DELETE RECORD </h1>
					<p> Enter the email id of a particular Trainee </p>

					<div class = "row">
						<div class = "col-sm-3">
							<hr class = "mb-3">
											
								<label for = "email"> <b> Email: </b> </label>
								<input class = "form-control" type = "email" name = "email" required><br>
								
								<hr class = "mb-3">
								<input class = "btn btn-primary" type = "submit" name = "delete" value = "DELETE">
							</div>
						</div>
					</div>
				</form>
			</div>
	</body>
</html>

								

