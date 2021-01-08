<?php
		session_start();
		require_once('connection.php');
		if(isset($_POST['update']))
		{
			
			$password = $_POST["password"];
			//encrypting the password using md5 encrytion technique
			$pw = md5($password);
			$sex = $_POST["sex"];
			$city = $_POST["City"];
			$skill = $_POST["skill"];
		
			$image12 = $_FILES["image"];
			$filename = $image12['name'];
			$filetemp = $image12['tmp_name'];
			$destfile = 'upload/'.$filename;
			move_uploaded_file($filetemp,$destfile);
			
			$email = $_SESSION['Email_id'];//fetching email data using session
			
			
			
			//loop for skill value
			$sk="";  
			foreach($skill as $sk1)  
			{  
				$sk .= $sk1.",";  
			}  
			
			$update_sql = "UPDATE `employee` SET `Password`= '$pw',`Sex`= '$sex',`City`= '$city',`Skill`= '$sk',`image`= '$destfile' WHERE `Email` = '$email'";
			//echo $update_sql;
			if($conn->query($update_sql) === TRUE)
			{
				$_SESSION['sex'] = $sex;
				$_SESSION['city'] = $city;
				$_SESSION['skill'] = $sk;
				$_SESSION['image'] = $destfile;
				header("location: trainee_record.php");
				
			}
			else
			{
				echo "Error : " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
			
		}
?>

<html>

	<head>

			<title> RECORD UPDATION PAGE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">

	</head>

	<body>
		<div>
			<form action = "update_records.php" method ="post" enctype = "multipart/form-data"> 
				<div class = "container">
					<h1> UPDATE RECORDS </h1>
					<p> Fill the form with correct value. </p>

					<div class = "row">
						<div class = "col-sm-3">
							<hr class = "mb-3">
							
								
								<label for = "password"> <b> Password : </b> </label>
								<input class = "form-control" type = "password" name = "password"><br>
								
								<label for = "Sex"> <b> Sex : </b> </label> <br>
								<input type="radio" id="male" name="sex" value="male">
								<label for="male">Male</label><br>
								<input type="radio" id="female" name="sex" value="female">
								<label for="female">Female</label><br>
								<input type="radio" id="other" name="sex" value="other">
								<label for="other">Other</label> <br> <br>

								<label for = "City"> <b> City : </b> </label>
								<select class ="form-control" name = "City">
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
								<input class = "form-control" type = "file" id = "image" name = "image">

								<hr class = "mb-3">
								<input class = "btn btn-primary" type = "submit" name = "update" value = "SAVE">
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>

