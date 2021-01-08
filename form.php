<?php

	require_once('connection.php');

	//if(isset($_POST['create']))
	
		$utype = $_POST["user_type"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$pw = md5($password);
		$sex = $_POST["sex"];
		$city = $_POST["City"];
		$skill = $_POST["skill"];
		
		$image12 = $_FILES["image"];
		$filename = $image12['name'];
		$filetemp = $image12['tmp_name'];
		$destfile = 'upload/'.$filename;
		move_uploaded_file($filetemp,$destfile);
		

		$sk="";  
		foreach($skill as $sk1)  
		{  
			$sk .= $sk1.",";  
		}  
		/*echo "Form Submitted Successfully .... <br><br>";
		echo 'User Type : '.$utype. '<br>';
		echo 'Email : '.$email.'<br>';
		echo 'Password : '.$password.'<br>';
		echo 'Sex : '.$sex.'<br>';
		echo 'City : '.$city.'<br>';
		echo 'Skill : '.$sk.'<br>';
		echo "image : <img src = '".$destfile."' height = '100px' width = '100px'><br>";*/

		$sql = "INSERT INTO `employee` (`Email`, `Password`, `Sex`, `City`, `Skill`,`image`,`user_type`) VALUES ('$email','$pw','$sex','$city','$sk', '$destfile','$utype')";

		/*if(mysqli_query($_conn,$sql)//mysqli procedural type*/
		if($conn->query($sql) === TRUE)//mysqli object oriented
		{
			header("location: register.php");
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	
?>



<html>

	<head>

			<title> Employee REGISTRATION PAGE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="registe.js"> </script>

	</head>

	<body>
		<div>
			<form action = "register.php" method ="post" enctype = "multipart/form-data"> 
				<div class = "container">
					<h1> REGISTER HERE </h1>
					<p> Fill the form with correct value. </p>

					<div class = "row">
						<div class = "col-sm-3">
						
							<hr class = "mb-3">
								<div id = "form_output"> </div>
								<label for = "user_type"> <b> User Type : </b> </label> <br>
								<input type="radio" id="user" name="user_type" value="admin">
								<label for="admin">Admin</label><br>
								<input type="radio" id="trainee" name="user_type" value="trainee">
								<label for="trainee">Trainee</label><br>
								
								<label for = "email"> <b> Email: </b> </label>
								<input class = "form-control" type = "email" name = "email" required><br>
								
								<label for = "password"> <b> Password : </b> </label>
								<input class = "form-control" type = "password" name = "password" required><br>
								
								<label for = "Sex"> <b> Sex : </b> </label> <br>
								<input type="radio" id="male" name="sex" value="male">
								<label for="male">Male</label><br>
								<input type="radio" id="female" name="sex" value="female">
								<label for="female">Female</label><br>
								<input type="radio" id="other" name="sex" value="other">
								<label for="other">Other</label> <br> <br>

								<label for = "City"> <b> City : </b> </label>
								<select class ="form-control" name = "City" required>
								<option disabled="disabled" selected="selected">-- Choose option--</option>
								<option value = "Kolkata"> Kolkata</option>
								<option value = "Pune"> Pune</option>
								<option value = "Bangalore"> Bangalore</option>
								</select> <br>
	
								<label for = "skill"> <b> Skills : </b> </label> <br>
								<input type = "checkbox" name = "skill[]" value ="c"> &nbsp C <br>
								<input type = "checkbox" name = "skill[]" value ="Java"> &nbsp Java <br>
								<input type = "checkbox" name = "skill[]" value="Python"> &nbsp Python <br>
								<input type = "checkbox" name = "skill[]" value="Perl"> &nbsp Perl <br>
								<input type = "checkbox" name = "skill[]" value="PHP"> &nbsp PHP
								<br><br>

								<label for = "image"> <b> Insert Profile Photo: </b> </label>
								<input class = "form-control" type = "file" id = "image" name = "image" required>

								<hr class = "mb-3">
								<input class = "btn btn-primary" id = "create" type = "submit" name = "create" value = "Register">
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>

