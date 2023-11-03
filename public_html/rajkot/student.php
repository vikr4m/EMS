<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "staff_master.html";
include "db.php";
include "logic.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
  <link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
</head>
<body>
<form action="" method="post">

<h1 align="center">Students</h1>

<input  type="text" style=" margin-left: 10%" placeholder="Search By NAME / CONTACT " name="name" size="30" >
<input type="submit"  value="Submit">
 <br>
 <br>



<input type="button" style="float: left; margin-left: 10%"  onclick="location.href = 'student_add.php';" value="Add Student"/>
<br>
<br>


  		<table border="1" style = "border-collapse : collapse;" width = 80%  cellspacing="2" cellpadding="2" align="center"><br>
 	<th align="center" colspan="10"> Students Information</th>

<tr>  
	<th align="center">Sr No.</th>
	<th align="center">Student Name</th>
	<th align="center">Student Contact</th>
  <th align="center">Emergency Contact</th>
  <th align="center">Program</th>
  <th align="center">Course</th>
  <th align="center">Fees remaining</th>
    <th align="center">Date Of Joining</th>
  <th align="center">Duration</th>
  <th align="center">Actions</th>
</tr>    


<?php
$i = 1;
if($_POST['name'])
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
        
        
   $datas =  $_POST['name'];
   
  $table_query = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname limit $page1,40 ";

	if ($result =$conn->query($table_query))
	 {

		while ($value = $result->fetch_assoc())
		 {
		?>
			<tr>
           
    	     
    		  <td align="center"><?php echo $i; $i++ ?></td> 
    		  <td align="center"><a href="student_profile.php?sid=<?php echo $value['sid'] ?>"><font color=blue><?php echo $value['sname']; ?></font></a></td>
      		<td align="center"><?php echo $value['wcontact']; ?></td>
          <td align="center"><?php echo $value['econtact']; ?></td> 
          <td align="center"><?php echo $value['programme']; ?></td>
          <td align="center"><?php echo $value['course']; ?></td>
          <td align="center"><?php echo $value['fee_r']; ?></td>
          <td align="center"><?php echo $value['doj']; ?></td>    
          <td align="center"><?php echo $value['duration']; ?></td>

        <td align="center">
            
                <a href="edit_student_add.php?sid=<?php echo $value['sid'] ?>"target="_blank"><font color=blue>Edit</font></a>
                |
                <a onclick='confirmdelete();return false;' href="delete.php?sid=<?php echo $value['sid'] ?>"><font color=red>Delete</font></a>
           
        </td>
           			
   			</tr>
        <?php
		 }
		 echo"</table>";
	 }
	$stmt1 = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="student.php?page=<?php echo $b;?>&&name=<?php echo $datas;?>"  style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
  ?>
</p>
<br><br>
<input type="button"   onclick="location.href = 'export_student.php?name=<?php echo $datas;?>';"  value="Export"/>
<br><br><br><br>
<?php
}



   elseif ($_GET["name"])
    {
        $page = $_GET["page"];
        $datas = $_GET["name"];
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*40)-40;
        }    
        
        
   
  $table_query = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname limit $page1,40 ";

	if ($result =$conn->query($table_query))
	 {

		while ($value = $result->fetch_assoc())
		 {
		?>
			<tr>
           
    	     
    		  <td align="center"><?php echo $i; $i++ ?></td> 
    		  <td align="center"><a href="student_profile.php?sid=<?php echo $value['sid'] ?>"><font color=blue><?php echo $value['sname']; ?></font></a></td>
      		<td align="center"><?php echo $value['wcontact']; ?></td>
          <td align="center"><?php echo $value['econtact']; ?></td> 
          <td align="center"><?php echo $value['programme']; ?></td>
          <td align="center"><?php echo $value['course']; ?></td>
          <td align="center"><?php echo $value['fee_r']; ?></td>
          <td align="center"><?php echo $value['doj']; ?></td>    
          <td align="center"><?php echo $value['duration']; ?></td>

        <td align="center">
            
                <a href="edit_student_add.php?sid=<?php echo $value['sid'] ?>"target="_blank"><font color=blue>Edit</font></a>
                |
                <a onclick='confirmdelete();return false;' href="delete.php?sid=<?php echo $value['sid'] ?>"><font color=red>Delete</font></a>
           
        </td>
           			
   			</tr>
        <?php
		 }
		 echo"</table>";
	 }
	$stmt1 = "SELECT * FROM student where `programme`= '$datas' or `wcontact` = '$datas' or `sname` = '$datas' order by sname  ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="student.php?page=<?php echo $b;?>&&name=<?php echo $datas;?>"  style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
    ?>
</p>
<br><br>
<input type="button"   onclick="location.href = 'export_student.php?name=<?php echo $datas;?>';"  value="Export"/>
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
        
        
   
  $table_query = "SELECT * FROM student order by sname limit $page1,40 ";

	if ($result =$conn->query($table_query))
	 {

		while ($value = $result->fetch_assoc())
		 {
		?>
			<tr>
           
    	     
    		  <td align="center"><?php echo $i; $i++ ?></td> 
    		  <td align="center"><a href="student_profile.php?sid=<?php echo $value['sid'] ?>"><font color=blue><?php echo $value['sname']; ?></font></a></td>
      		<td align="center"><?php echo $value['wcontact']; ?></td>
          <td align="center"><?php echo $value['econtact']; ?></td> 
          <td align="center"><?php echo $value['programme']; ?></td>
          <td align="center"><?php echo $value['course']; ?></td>
          <td align="center"><?php echo $value['fee_r']; ?></td>
          <td align="center"><?php echo $value['doj']; ?></td>    
          <td align="center"><?php echo $value['duration']; ?></td>

        <td align="center">
            
                <a href="edit_student_add.php?sid=<?php echo $value['sid'] ?>"target="_blank"><font color=blue>Edit</font></a>
                |
                <a onclick='confirmdelete();return false;' href="delete.php?sid=<?php echo $value['sid'] ?>"><font color=red>Delete</font></a>
           
        </td>
           			
   			</tr>
        <?php
		 }
		 
		 echo"</table>";
		 
	 }
	$stmt1 = "SELECT * FROM student order by sname ";
	$stmt_exec1 = mysqli_query($conn, $stmt1);
	$cou =mysqli_num_rows($stmt_exec1);
			
$a = $cou/40;
$a= ceil($a);
echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="student.php?page=<?php echo $b;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php
	    
	}
    ?>
</p>
<br><br>
<input type="button"   onclick="location.href = 'export_student.php?';"  value="Export"/>
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
