	<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "db_ahmedabad.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>lead</title>
	<link rel="stylesheet" href="style.css">

</head>
<body>
<h1 align="center">Leads</h1>
<form action="" method="POST">
<input  type="text" style=" margin-left: 10%" placeholder="Search By NAME / CONTACT / SOURCE / PROGRAM  " name="name" size="30" >

<input type="submit"  value="Submit">

<br>
<br>

<input type="button" style="float: left; margin-left: 10%"  onclick="location.href = 'ahmedabad_lead_add.php';" value="Add Lead"/>




<br><br><br>

<table border="1" style ="border-collapse : collapse;" width = 80% align="center">
		<th align="center" colspan="12"> Lead Information</th>
<tr>
	<th>Sr. No.</th>
	<th>Name</th>
	<th>Phone</th>
	<th>Program</th>
	<th>DOB</th>
	<th>Source</th>
	<th>Lead By</th>
	<th>Comments</th>
	<th>Date</th>
	<th>Action</th>
	</tr> 
<?php
$i =1;   


    if($_POST['name'])
    {
        $page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*75)-75;
        }    
        
        
   $datas =  $_POST['name'];
   
  $table_query = "SELECT * FROM leads where `programme`='$datas' or `source`= '$datas' or `phone` = '$datas' or `name` = '$datas' ORDER BY DATE DESC  limit $page1,75 ";

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		?>
			
			<tr>
			<td align='center'><?php echo $i; $i++ ?></td>
			<td align='center'><?php echo $row['name']; ?></td>
			<td align='center'><?php echo $row['phone']; ?></td>
			<td align='center'><?php echo $row['programme']; ?></td>
			<td align='center'><?php echo $row['dob']; ?></td>
			<td align='center'><?php echo $row['source']; ?></td>
			<td align='center'><?php echo $row['lead_by']; ?></td>
			<td align='center'><?php echo $row['comments']; ?></td>
			<td align='center'><?php echo $row['date']; ?></td>
		
		<td align="center">
            
                <a href="ahmedabad_edit_lead_add.php?id=<?php echo $row['id'] ?>"target="_blank"><font color=blue>Edit</font></a>	
                |
                <a onclick='confirmdelete();return false;' href="ahmedabad_lead_delete.php?id=<?php echo $row['id'] ?>"><font color=red>Delete</font></a>
           
        </td>
           			

			</tr>
		 

<?php
  }
  echo "</table>";
}

	$stmt1 = "SELECT * FROM leads where `programme`='$datas' or `source`= '$datas' or `phone` = '$datas' or `name` = '$datas' ORDER BY DATE DESC  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/75;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="ahmedabad_lead.php?page=<?php echo $b;?>&&name=<?php echo $datas;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
?>
</p>
<br><br>

<input type="button"   onclick="location.href = 'ahmedabad_export_leads.php?name=<?php echo $datas;?>';"  value="Export"/>
<br><br><br><br>
<?php	
}

elseif($_GET["name"])
    {
        $page = $_GET["page"];
        $datas = $_GET["name"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*75)-75;
        }    
        
    
   
  $table_query = "SELECT * FROM leads where `programme`='$datas' or `source`= '$datas' or `phone` = '$datas' or `name` = '$datas' ORDER BY DATE DESC  limit $page1,75 ";

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		?>
			
			<tr>
			<td align='center'><?php echo $i; $i++ ?></td>
			<td align='center'><?php echo $row['name']; ?></td>
			<td align='center'><?php echo $row['phone']; ?></td>
			<td align='center'><?php echo $row['programme']; ?></td>
			<td align='center'><?php echo $row['dob']; ?></td>
			<td align='center'><?php echo $row['source']; ?></td>
			<td align='center'><?php echo $row['lead_by']; ?></td>
			<td align='center'><?php echo $row['comments']; ?></td>
			<td align='center'><?php echo $row['date']; ?></td>
		
		<td align="center">
            
                <a href="ahmedabad_edit_lead_add.php?id=<?php echo $row['id'] ?>"target="_blank"><font color=blue>Edit</font></a>	
                |
                <a onclick='confirmdelete();return false;' href="ahmedabad_lead_delete.php?id=<?php echo $row['id'] ?>"><font color=red>Delete</font></a>
           
        </td>
           			

			</tr>
		 

<?php
  }
  echo "</table>";
}

	$stmt1 = "SELECT * FROM leads where `programme`='$datas' or `source`= '$datas' or `phone` = '$datas' or `name` = '$datas' ORDER BY DATE DESC  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/75;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="ahmedabad_lead.php?page=<?php echo $b;?>&&name=<?php echo $datas;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
	?>
	</p>
<br><br>
<input type="button"   onclick="location.href = 'ahmedabad_export_leads.php?name=<?php echo $datas;?>';"  value="Export"/>
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
	$page1= ($page*75)-75;
        }    
   
  $table_query = "SELECT * FROM leads ORDER BY DATE DESC limit $page1,75";

	if ($result =$conn->query($table_query))
	 {

		while ($row = $result->fetch_assoc())
		 {
		?>
			
			<tr>
			<td align='center'><?php echo $i; $i++ ?></td>
			<td align='center'><?php echo $row['name']; ?></td>
			<td align='center'><?php echo $row['phone']; ?></td>
			<td align='center'><?php echo $row['programme']; ?></td>
			<td align='center'><?php echo $row['dob']; ?></td>
			<td align='center'><?php echo $row['source']; ?></td>
			<td align='center'><?php echo $row['lead_by']; ?></td>
			<td align='center'><?php echo $row['comments']; ?></td>
			<td align='center'><?php echo $row['date']; ?></td>
		
		<td align="center">
            
                <a href="ahmedabad_edit_lead_add.php?id=<?php echo $row['id'] ?>"target="_blank"><font color=blue>Edit</font></a>	
                |
                <a onclick='confirmdelete();return false;' href="ahmedabad_lead_delete.php?id=<?php echo $row['id'] ?>"><font color=red>Delete</font></a>
           
        </td>
           			

			</tr>
		 

<?php
  }
    echo "</table>";
}
$stmt1 = "SELECT * FROM leads ORDER BY DATE DESC  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/75;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="ahmedabad_lead.php?page=<?php echo $b;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	
	}
	?>
	</p>   
	<br><br>
	
<input type="button"   onclick="location.href = 'ahmedabad_export_leads.php?';"  value="Export"/>
<br><br><br><br>
<?php
	
}
  ?>


<script>
function confirmdelete()
{
   var conf = confirm('Do you want to delete this record?');
   if(conf)
     {
       header("location:delete.php");
     }
  
}
</script>

</form>
</body>
</html>
