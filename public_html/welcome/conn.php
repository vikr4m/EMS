<?php
$dbservername="localhost";
$dbusername="u781963308_visitpage";
$dbpassword="Chahal123";
$dbname="u781963308_visitpage";
$conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

date_default_timezone_set("Asia/Kolkata");


if(isset($_POST['submit']))
{
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $callback_detail= " INSERT into callback ( name, contact, datetime ) VALUES ('$name','$contact',now())";
 

          $callback_detail_query = mysqli_query($conn,$callback_detail);
 			echo '<script>alert("We will shortly call you back !")</script>';

 			
}

?>

