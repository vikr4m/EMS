<?php

error_reporting(E_ERROR | E_PARSE);

	session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}

include "admin_master.php";
include "db_mehsana.php";
include "logic_mehsana.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Fees</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 align="center">Revenue</h1>
	<form action="mehsana_fees_information.php" method="POST">
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
		<th align="center">Program</th>
		<th align="center">Total Fees</th>
		<th align="center">Fees Paid</th>
		<th align="center">Fees Remaining</th>
	</tr>
	<?php
	$i=1;
	if (isset($_POST['show_course']))
	{
  
   $page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*40)-40;
        }    
 $course = $_POST['programme'];

 $stmt  = "SELECT * from student where `programme` ='$course' ORDER BY sname limit $page1,40";
$stmt_exec = mysqli_query($conn,$stmt);
  if ($stmt_exec-> num_rows > 0) 
  {
    while ($value = $stmt_exec->fetch_assoc()) 
    {
		
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align="center"><?php echo $value['sname']; ?></td>
		<td align="center"><?php echo $value['wcontact']; ?></td>
		<td align="center"><?php echo $value['programme']; ?></td>
		<td align="center"><?php echo $value['fee_t']; ?></td>
		<td align="center"><?php echo $value['fee_p']; ?></td>
		<td align="center"><?php echo $value['fee_r']; ?></td>
	</tr>

	<?php
	}
	 
  }
  echo "</table>";
  
  
  $stmt1 = "SELECT * from student where `programme` ='$course'  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="mehsana_fees_information.php?page=<?php echo $b;?>&&course=<?php echo $course;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
 ?>
</p>
<br><br>
<input type="button"   onclick="location.href = 'mehsana_export_revenue.php?course=<?php echo $course;?>';"  value="Export"/>
<br><br><br><br>
<?php
	
}

    elseif ($_GET["course"])
	{
	    
   $course= $_GET["course"];
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
$stmt_exec = mysqli_query($conn,$stmt);
  if ($stmt_exec-> num_rows > 0) 
  {
    while ($value = $stmt_exec->fetch_assoc()) 
    {
		
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align="center"><?php echo $value['sname']; ?></td>
		<td align="center"><?php echo $value['wcontact']; ?></td>
		<td align="center"><?php echo $value['programme']; ?></td>
		<td align="center"><?php echo $value['fee_t']; ?></td>
		<td align="center"><?php echo $value['fee_p']; ?></td>
		<td align="center"><?php echo $value['fee_r']; ?></td>
	</tr>

	<?php
	}
	 
  }
  echo "</table>";
  
  
  $stmt1 = "SELECT * from student where `programme` ='$course' ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
		?><a href="mehsana_fees_information.php?page=<?php echo $b;?>&&course=<?php echo $course;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}

	 ?>
	</p>
	<br><br>
	<input type="button"   onclick="location.href = 'mehsana_export_revenue.php?course=<?php echo $course;?>';"  value="Export"/>
	<br><br><br><br>
	<?php
	}

    else
    {
    	
  
   $page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*40)-40;
        }    


 $stmt  = "SELECT * from student  ORDER BY sname limit $page1,40";
$stmt_exec = mysqli_query($conn,$stmt);
  if ($stmt_exec-> num_rows > 0) 
  {
    while ($value = $stmt_exec->fetch_assoc()) 
    {
		
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align="center"><?php echo $value['sname']; ?></td>
		<td align="center"><?php echo $value['wcontact']; ?></td>
		<td align="center"><?php echo $value['programme']; ?></td>
		<td align="center"><?php echo $value['fee_t']; ?></td>
		<td align="center"><?php echo $value['fee_p']; ?></td>
		<td align="center"><?php echo $value['fee_r']; ?></td>
	</tr>

	<?php
	}
	 echo "</table>";
  }
  
  
  $stmt1 = "SELECT * from student ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="mehsana_fees_information.php?page=<?php echo $b;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
	 ?>
</p>
<br><br>
<input type="button"   onclick="location.href = 'mehsana_export_revenue.php?';"  value="Export"/>
<br><br><br><br>
<?php

    }
 

?>

</body>
</html>

