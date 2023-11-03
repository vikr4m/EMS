<?php
  error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "staff_logic.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Profile</title>
  <link rel="stylesheet" href="style.css">

	<meta charset="utf-8">
</head>
<body>
<br>
<input type="submit" style="float: left;"  onclick="location.href = 'staff.php';" value="Back"/>
<?php
$sid=$_REQUEST['sid'];
?>

<br>
<br>
<h2>Staff Personal Information</h2>
<?php
$staff_profile = staff_profile();
foreach ($staff_profile as $value ) 
{
  ?>
  <label>Staff Name:-</label>
  <?php echo $value['name']; ?><br>
  <label>User Name:-</label>
  <?php echo $value['user_id']; ?><br>
  <label>Date Of Joining:-</label>
  <?php echo $value['doj']; ?><br>
  <label>Designation:-</label>
  <?php echo $value['designation']; ?><br>
  <label>Contact no:-</label>
  <?php echo $value['contact_no']; ?><br>
  <label>Email id:-</label>	
  <?php echo $value['email']; ?><br>
  <label>Salary:-</label>  	
  <?php echo $value['salary'];?><br>
  <label>Password:-</label> 
  <?php echo $value['password'];

  }
  ?>    

</body>
</html>
