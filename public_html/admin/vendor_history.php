<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "db_expense.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vendor History</title>
  <link rel="stylesheet" href="style.css">
  	<h1 align="center">Vendor History</h1>
	<meta charset="utf-8">
</head>
<body>
<?php
$vid=$_REQUEST['vid'];
?>

<input type="submit" style="float: left;"  onclick="location.href = 'genexpdisp.php';" value="Back"/>
<input type="submit" onclick="location.href = 'vendor_add_invoice.php?vid=<?php echo "$vid" ?>';" value="Add Invoice"/><br><br><br>
<input type="submit" onclick="location.href = 'check_account.php?vid=<?php echo "$vid" ?>';" value="Check account"/>

<br><br><br><br>
<table border="1" style ="border-collapse : collapse;" width = 80% align="center">
		
<tr>
	<th width="10%">Sr. No.</th>
	<th>Invoice No.</th>
	<th>Date</th>
	<th>Description</th>
	<th>Total Amount</th>
	<th>GST</th>
	<th>TDS</th>
	</tr> 
<tr>	
<?php
$i=1;
$stmt = "SELECT * from invoice where `vid` ='$vid' order by DATE ";
	$stmt_exec = mysqli_query($conn, $stmt);
	
	if ($stmt_exec-> num_rows > 0)
	 {
		while ($row = $stmt_exec->fetch_assoc())
		 {
		?>
			
			<tr>
			<td align='center'><?php echo $i; $i++ ?></td>
			<td align="center"><?php echo $row['invno']; ?></td>
			<td align="center"><?php echo $row['date']; ?></td>
			<td align='center'><?php echo $row['descr']; ?></td>
			<td align='center'><?php echo $row['total']; ?></td>
			<td align='center'><?php echo $row['gst']; ?></td>
			<td align='center'><?php echo $row['tds']; ?></td>

			
				
		<!-- <td align="center" width="10%">
            
                <a href="vendor_edit_add.php?vid=<?php echo $row['vid'] ?>"><font color=blue>Edit</font></a>	
                |
                <a onclick='confirmdelete();return false;' href="vendor_delete.php?vid=<?php echo $row['vid'] ?>"><font color=red>Delete</font></a>
           
        </td> -->

			</tr>


<?php
  }
}
  ?>

</table>
