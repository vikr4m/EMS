<?php

	error_reporting(E_ERROR | E_PARSE);

	session_start();
	if(!isset($_SESSION["uid"]))
	{
  	header("location:../index.php");
	}
include "admin_master.php";
 include "db.php";
include "logic_anand.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>course</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 align="center">Filter By Program</h1>
	<form action="anand_course.php" method="POST">
	<label style=" margin-left: 15%">Select Programme :</label>
<select name="programme" >
	<?php

	$dropdown = add_course();
	/*var_dump($dropdown);*/
	$result = arraytostring($dropdown,$result_string =null);
	/*var_dump($result);*/
	echo $result;

	?>


</select>
<input type="submit" name="show_course" value="Search">	
</form>
<br>
<table border="1"  style="border-collapse: collapse;" align="center" width="70%">
	<tr>
		<th>Sr. No.</th>
		<th align="center">Name</th>
		<th align="center">Contact</th>
		<th align="center">DOB</th>
		<th align="center">Program</th>
		<th align="center">Course</th>
		<th align="center">Email</th>
	</tr>
	<?php
	$i=1;
if (isset($_POST['show_course']))
 {
  
 $course = $_POST['programme'];
 $page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*40)-40;
        }    
        
        

 $stmt  = "SELECT * from student where `programme` ='$course' ORDER BY sname limit $page1,40";
////var_dump($stmt);
$stmt_exec = mysqli_query($conn,$stmt);
  ////var_dump($stmt_exec);
  if ($stmt_exec-> num_rows > 0) 
  {
    while ($value = $stmt_exec->fetch_assoc()) 
    {
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align="center"><?php echo $value['sname']; ?></td>
		<td align="center"><?php echo $value['wcontact']; ?></td>
		<td align="center"><?php echo $value['dob']; ?></td>
		<td align="center"><?php echo $value['programme']; ?></td>
		<td align="center"><?php echo $value['course']; ?></td>
		<td align="center"><?php echo $value['email']; ?></td>
	</tr>

	<?php
	}
	echo "</table>";
   }

   $stmt1 = "SELECT * from student where `programme` ='$course'";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="anand_course.php?page=<?php echo $b;?>&&name=<?php echo $course;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}

   	?>
   	<br><br>	
	<input type="button"   onclick="location.href = 'anand_export_program.php?name=<?php echo $course;?>';"  value="Export"/>
	<br><br><br><br>
	<?php

  }

 else
 
{
	{
  
 $course = $_GET["name"];
 $page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*40)-40;
        }    
        
        

 $stmt  = "SELECT * from student where `programme` ='$course' ORDER BY sname limit $page1,40";
////var_dump($stmt);
$stmt_exec = mysqli_query($conn,$stmt);
  ////var_dump($stmt_exec);
  if ($stmt_exec-> num_rows > 0) 
  {
    while ($value = $stmt_exec->fetch_assoc()) 
    {
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align="center"><?php echo $value['sname']; ?></td>
		<td align="center"><?php echo $value['wcontact']; ?></td>
		<td align="center"><?php echo $value['dob']; ?></td>
		<td align="center"><?php echo $value['programme']; ?></td>
		<td align="center"><?php echo $value['course']; ?></td>
		<td align="center"><?php echo $value['email']; ?></td>
	</tr>

	<?php
	}
	echo "</table>";
   }

   $stmt1 = "SELECT * from student where `programme` ='$course'";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="anand_course.php?page=<?php echo $b;?>&&name=<?php echo $course;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}

   	?>
   	<br><br>	
	<input type="button"   onclick="location.href = 'anand_export_program.php?name=<?php echo $course;?>';"  value="Export"/>
	<br><br><br><br>
	<?php

  }

 } 


?>


</body>
</html>

