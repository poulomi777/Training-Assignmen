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
		

		$query = "SELECT * FROM `employee`";

		if($is_query_run = mysqli_query($_conn,$sql) //mysqli procedural type ;;if($conn->query($sql) === TRUE)//mysqli object oriented
		{
			while($query_executed = mysqli_fetch_assoc($is_query_run))
			{
				echo "Form Submitted Successfully .... <br><br>";
				echo 'User Type : '.$utype. '<br>';
				echo 'Email : '.$email.'<br>';
				echo 'Password : '.$password.'<br>';
				echo 'Sex : '.$sex.'<br>';
				echo 'City : '.$city.'<br>';
				echo 'Skill : '.$sk.'<br>';
				echo "image : <img src = '".$image."' height = '200px' width = '200px'><br>";
				
			}
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	
?>