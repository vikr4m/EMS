<?php
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}

include "staff_master.html";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<body>
	<br>
	 <?php
   echo "<p><h1 align='center'><font color=green>You are Welcome <b>" . $_SESSION['uid'] ."</b><br></font><h1></p>";
    ?>

</body>
</html>
