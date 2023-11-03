<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "staff_master.html";
include "db_inventory.php";


	if (isset($_POST['update'])) 
	{
		$book_id = $_REQUEST['book_id'];
		$updavail = $_POST['avail'];
			if($_POST['avail']<=0)
			{
				echo "<p align='center'><font color='red'>Please Enter Positive digit</font></p>";
			}
			else
			{

				$stmt1 = "UPDATE surat SET su_available = su_available + '$updavail' where book_id= '$book_id'";
				$stmt1_exec = mysqli_query($conn, $stmt1);
		
				var_dump($stmt1);

				if ($stmt1_exec) 
				{
             		header("location:inventory_disp.php");
				}		
			}
			          	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Availability</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1 align="center">Change Availability</h1>
<form action="" method ="POST">
<?php
	
	
	$book_id = $_REQUEST['book_id'];
	$stmt = "SELECT book_name from surat where book_id= '$book_id'";
	$stmt_exec = mysqli_query($conn, $stmt);
	

?>


<br>
<label for='avail'>Change Availability:</label>	
<input type='text' id='avail' name='avail' size='30' required>
<br>
<br>
<input type='submit' name='update' value ='Update'>



</form>

<input type="submit" style="float: left;"  onclick="location.href = 'inventory_disp.php';" value="Back"/>
</body>
</html>