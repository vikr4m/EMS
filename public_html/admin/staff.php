<?php

	error_reporting(E_ERROR | E_PARSE);

include "admin_master.php";
include "staff_logic.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>staff</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <br>
    <h1 align="center">Staff Information</h1>
	<form action="staff.php" method="POST">
	<br>
	<label style="float: left; margin-left: 15%">Select Branch :</label>
<select name="branch" >
  <option>Please Select Branch</option>    
 <option value="anand">Anand</option>
  <option value="ahmedabad">Ahmedabad</option>
  <option value="gandhinagar">Gandhinagar</option>
  <option value="surat">Surat</option>
  <option value="rajkot">Rajkot</option>
  <option value="vadodara">Vadodara</option>
  <option value="mehsana">Mehsana</option>
</select>

<input type="submit" name="show_branch" value="Search">
<br>
<br>

<input type="button" style="float: left; margin-left: 15%"  onclick="location.href = 'staff_add.php';" value="Add Staff"/>
<br><br><br>

</form>

<table border="1"  style="border-collapse: collapse;" align="center" width="70%">
	<tr>
		<th>Sr. No.</th>
		<th align="center">Name</th>
		<th align="center">Email</th>
		<th align="center">Designation</th>
		<th align="center">Branch</th>
		<th align="center">Contact_no</th>
		<th align="center">Actions</th>
	</tr>
	<?php
	$i=1;
		$branch = show_branch();
		foreach ($branch as $value) {
			
		
	?>

	<tr>
		<td align='center'><?php echo $i; $i++ ?></td>
		<td align="center"><a href="staff_profile.php?sid=<?php echo $value['sid'] ?>"><font color=blue><?php echo $value['name']; ?></font></a></td>
		<td align="center"><?php echo $value['email']; ?></td>
		<td align="center"><?php echo $value['designation']; ?></td>
		<td align="center"><?php echo $value['branch']; ?></td>
		<td align="center"><?php echo $value['contact_no']; ?></td>
		
         <td align="center">
            
                <a onclick='confirmdelete();return false;' href="staff_delete.php?sid=<?php echo $value['sid'] ?>"><font color=red>Delete</font></a>
           
        </td>

	</tr>

	<?php
	}
	?>
</table>

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
</body>
</html>

