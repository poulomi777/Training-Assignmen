<?php
session_start();
require_once('connection.php');
if(isset($_POST['back']))
{
	header("location: welcome.php");
}


				
	
	$sql = "SELECT * from `employee` WHERE user_type = 'trainee'";
	
	if($is_query_run = mysqli_query($conn, $sql))
	{
		if(mysqli_num_rows($is_query_run)== 0)//check is rows are available in database
		{
			echo 'No user found... <br>';
		}
		else
		{
?>
		<html>
		<head>
		
			<title> VIEW DETAILS OF TRAINEE | PHP </title>
			<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css">
			<style>
			table, th, td {
				border: 1px solid black;
			}
			</style>
		</head>
		
		<body>
		<div class = "container">
			<p> <b>TRAINEE DETAILS</b></p>

		</div>
		<div>
		<table style="width:100%">
		<tr>
			<th> EMAIL </th>
			<th> SEX </th>
			<th> CITY </th>
			<th> SKILL </th>
			<th> IMAGE </th>
			<th> REMOVE </th>
		</tr>
		<?php
			while($fetch = mysqli_fetch_assoc($is_query_run))
			{
		?>
				<tr>
					<td> <?php echo $fetch['Email'];?> </td>
					<td> <?php echo $fetch['Sex'];?> </td>
					<td> <?php echo $fetch['City'];?> </td>
					<td> <?php echo $fetch['Skill'];?> </td>
					<td> <img src = <?php echo $fetch['image'];?> height = '100px' width = '100px'> </td>
					<td> <a href = "delete.php"> REMOVE </a> </td>
				</tr>
				
			
			
		<?php	
			}
		?>
		</table>
		</div>
		<div>
		<form action = "details.php" method ="post">
			<div class = "container">
			 <hr class = "mb-3">
				<input class = "btn btn-primary" type = "submit" name = "back" value = "BACK">
			</div>
		</form>
		</div>
		</body>
		</html>
		<?php	
		
		}
	
	}
//}
?>