<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}

include "db_expense.php";
include "admin_master.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>General Expenditure</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<h1 align="center">General Expenditure</h1>

<input type="submit" onclick="location.href = 'vendor_add.php';" align="center"  value="Add New Vendor"/>

<br><br><br>
<table border="1" style ="border-collapse : collapse;" width = 80% align="center">
		<th align="center" colspan="12"> Vendors</th>
<tr>
	<th width="10%">Sr. No.</th>
	<th>Name</th>
	<th>Description</th>
	<th>Contact</th>
	<th>Actions</th>
	</tr> 

<?php
$i=1;
$stmt = "SELECT * from vendor ";
	$stmt_exec = mysqli_query($conn, $stmt);
	
	if ($stmt_exec-> num_rows > 0)
	 {
		while ($row = $stmt_exec->fetch_assoc())
		 {
		?>
			
			<tr>
			<td align='center'><?php echo $i; $i++ ?></td>
			<td align="center"><a href="vendor_history.php?vid=<?php echo $row['vid'] ?>"><font color=blue><?php echo $row['name']; ?></font></a></td>
			<td align='center'><?php echo $row['descr']; ?></td>
			<td align='center'><?php echo $row['contact']; ?></td>

			
				
		<td align="center" width="10%">
            
                <a href="vendor_edit_add.php?vid=<?php echo $row['vid'] ?>"><font color=blue>Edit</font></a>	
                |
                <a onclick='confirmdelete();return false;' href="vendor_delete.php?vid=<?php echo $row['vid'] ?>"><font color=red>Delete</font></a>
           
        </td>

			</tr>


<?php
  }
}
  ?>
</table>


<script>
function confirmdelete()
{
   var conf = confirm('Do you want to delete this record?');
   if(conf)
     {
       header("location:vendor_delete.php");
     }
  
}
</script>

</body>
</html>
