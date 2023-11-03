<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "db_inventory.php";
include "logic_inventory.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<form action="masterinventory_add.php" method="POST">
	  <h2 align="center">Add New Book To Inventory</h2>
	  <label for="book_id">Book Id :</label>
	  <input type="text" name="book_id" size="10"><br><br>
<label for="book_name">Book Name :</label>
<input type="text"  name="book_name"  size="30"><br><br>

<label>Select Program :</label>
<select name="program1">
  <option>--Please Select Program--</option>	
  <option value="UPSC">UPSC</option>
  <option value="GPSC">GPSC</option>
  <option value="IBPS">IBPS</option>
</select>


<input type="submit" name="add_book" value="ADD"/>

  
	    
	    <br><br>
	    
	<h1 align="center">Inventory Information</h1>    
	<br>
	<label style="margin-left: 15%">Select Program :</label>
<select name="program">
  <option >--Please Select Program--</option>	
  <option value="UPSC">UPSC</option>
  <option value="GPSC">GPSC</option>
  <option value="IBPS">IBPS</option>
</select>

<input type="submit" name="show_inventory" value="Search"><br><br>	
</form>
<br>

<table border="1"  style="border-collapse: collapse;" align="center" width="80%">
	<tr>
		<th width="200px"  rowspan="2" >Sr. No.</th>
		<th width="200px"  rowspan="2" >Book Id</th>
		<th width="200px"  rowspan="2" align="center">Book Name</th>
		<th colspan="2" align="center">Anand</th>	
		<th colspan="2" align="center">Ahmedabad</th>
		<th colspan="2" align="center">Gandhinagar</th>
		<th colspan="2" align="center">Mehsana</th>
		<th colspan="2" align="center">Rajkot</th>
		<th colspan="2" align="center">Surat</th>
		<th colspan="2" align="center">Vadodara</th>
		<th width="200px" rowspan="2" align="center">Total Avail</th>
		<th width="200px" rowspan="2" align="center">Total Given</th>
		<th width="200px" rowspan="2" align="center">Move Inventory</th>
		<th width="200px" rowspan="2" align="center">Actions</th>
	</tr>

	
	<tr>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>
		<th width="200px" align="center">Avail</th>
		<th width="200px" align="center">Given</th>

        
	</tr>
	<?php
	$i=1;
		$inventory = show_inventory();
		foreach ($inventory as $value) {
		    
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align='center'><?php echo $value['book_id']; ?></td>
		<td align="center"><?php echo $value['book_name']; ?></td>
		<td align="center"><?php echo $value['available']; ?></td>
		<td align="center"><?php echo $value['given']; ?></td>
		<td align="center"><?php echo $value['available1']; ?></td>
		<td align="center"><?php echo $value['given1']; ?></td>
		<td align="center"><?php echo $value['available2']; ?></td>
		<td align="center"><?php echo $value['given2']; ?></td>
		<td align="center"><?php echo $value['available3']; ?></td>
		<td align="center"><?php echo $value['given3']; ?></td>
		<td align="center"><?php echo $value['available4']; ?></td>
		<td align="center"><?php echo $value['given4']; ?></td>
		<td align="center"><?php echo $value['available5']; ?></td>
		<td align="center"><?php echo $value['given5']; ?></td>
		<td align="center"><?php echo $value['available6']; ?></td>
		<td align="center"><?php echo $value['given6']; ?></td>
		
		<td align="center"><?php echo $value['available'] + $value['available1'] + $value['available2'] + $value['available3'] + $value['available4'] + $value['available5'] + $value['available6']; ?></td>

		<td align="center"><?php echo $value['given'] + $value['given1'] + $value['given2'] + $value['given3'] + $value['given4'] + $value['given5'] + $value['given6']; ?></td>
		
		<td align="center">

					<a  href = "moveinventory_update.php?book_id=<?php echo $value['book_id'] ?>"><font color=green>Move</font></a>

	    </td>	
		
		 <td align="center">
        
                <a onclick='confirmdelete();return false;' href="delete_inventory.php?book_id=<?php echo $value['book_id'] ?>"><font color=red>Delete</font></a>
           
        </td>
		
	</tr>
	

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
</table>	
<br><br>
<?php
$program = $_POST['program'];
?>
<input type="button"   onclick="location.href = 'masterinventory_export.php?name=<?php echo $program;?>';"  value="Export"/>
<br><br><br><br>
</body>
</html>