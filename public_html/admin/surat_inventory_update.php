<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "db_inventory.php";

$book_id = $_REQUEST['book_id'];
	$stmt = "SELECT book_name from surat where book_id= '$book_id'";
	$stmt_exec = mysqli_query($conn, $stmt);


if (isset($_POST['update'])) 
	{
		$book_id = $_REQUEST['book_id'];
		$updavail = $_POST['avail'];
		
		$stmt1 = "UPDATE surat SET su_available = su_available + '$updavail' where book_id= '$book_id'";
		$stmt1_exec = mysqli_query($conn, $stmt1);
		{
		echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Inventory Added</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1 align="center">New Inventory Added</h1>
<form action="" method ="POST">
<br>
<label for='avail'>Change Availability:</label>	
<input type='text' id='avail' name='avail' size='30' required>
<br>
<br>
<input type='submit' name='update' value ='Update'>
</form>

<input type="submit" style="float: left;"  onclick="location.href = 'surat_inventory_disp.php';" value="Back"/>
</body>
</html>