<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "staff_master.html";
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>expenditure</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 align="center">Expenditure</h1>

<input type="submit" style="float: left; margin-left: 15%"  onclick="location.href = 'expenditure_add.php';" value="Add Expenditure"/>
<br><br><br>

<table border="1" style ="border-collapse : collapse;" width = 70% align="center">
<tr>
	<th>Id</th>
	<th>Type</th>
	<th>Subtype</th>
	<th>Description</th>
	<th>Date</th>
	<th>Bill/Voucher</th>
	<th>Entry By</th>
	<th>Amount</th>
	<th>Payment Type</th>
	<th>Neft/Cheque No.</th>
</tr> 
<?php
 {
$i=1;
$page = $_GET["page"];
        
       if ($page=="" || $page=="1") 
        {
	$page1=0;
        }

    else
        {
	$page1= ($page*30)-30;
        }    
        
$stmt = "SELECT * from expenditure ORDER BY id DESC limit $page1,30 ";
	$stmt_exec = mysqli_query($conn, $stmt);
	
	if ($stmt_exec-> num_rows > 0) {
		while ($row = $stmt_exec->fetch_assoc()) {

				  ?>
				  <tr>
				  	<td align='center'><?php echo $row['id']; ?></td>
					<td align="center"><?php echo $row['type']; ?></td>
					<td align="center"><?php echo $row['subtype']; ?></td>
					<td align="center"><?php echo $row['description']; ?></td>
					<td align="center"><?php echo $row['date']; ?></td>
					<td align="center"><?php echo $row['bill']; ?></td>
					<td align="center"><?php echo $row['entry_by'] ?></td>
					<td align="center"><?php echo $row['amount'] ?></td>
					<td align="center"><?php echo $row['modeofpay']; ?></td>
					<td align="center"><?php echo $row['neft/cheque_no']; ?></td>
				</tr>
<?php
			
			}
			echo"</table>";

		}
 
					
$stmt1 = "SELECT * from expenditure ORDER BY id DESC  ";
$stmt_exec1 = mysqli_query($conn, $stmt1);
$cou =mysqli_num_rows($stmt_exec1);
$a = $cou/30;
$a= ceil($a);

echo "<p align='center'>Pages:";

	for($b=1; $b<=$a; $b++) 
	{
	?><a href="expenditure.php?page=<?php echo $b;?>" style="text-decoration: none"><?php echo $b." ";?></a> <?php   
	}
	 ?>
   	<br><br>	
	<input type="button"   onclick="location.href = 'export_expenditure.php?';"  value="Export"/>
	<br><br><br><br>
	<?php
}
?>

</body>
</html>
