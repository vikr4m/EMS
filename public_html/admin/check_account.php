<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "genexp_logic.php";
include "db_expense.php";
if(isset($_POST['paytovendor']))
{	
	$vid=$_REQUEST['vid'];
	$paid=$_POST['amount'];
	$stmt = "SELECT sum(total) from invoice where `vid` = '$vid'";
	$payable = mysqli_query($conn,$stmt);
	if($row = $payable->fetch_assoc())
	{
		$payable_amount = ceil($row['sum(total)']);
	}


$stmt1 = "SELECT sum(paid) from paid where `vid` = '$vid'";
	$paid1 = mysqli_query($conn,$stmt1);
	if($row = $paid1->fetch_assoc())
	{
		$paid_amount = ceil($row['sum(paid)']);
	}

	$remaining_amount = $payable_amount - $paid_amount;
	
	$balance = $remaining_amount - $paid;
	
	if($balance >= 0)
	{
    	$vid=$_REQUEST['vid'];
	$paid=$_POST['amount'];
	$date=$_POST['date'];
	$comment=$_POST['comment'];

	$stmt2= "INSERT into paid (`vid` ,`paid`,`date`,`comments`) VALUES ('$vid','$paid','$date','$comment')";
        //var_dump($stmt);
          $stmt_query2 = mysqli_query($conn,$stmt2);
          {
            echo "<p align='center'><font color=green> Amount Successfully Paid</font></p>";
          }
    }
    else
    {
       echo "<p align='center'><font color=red> Amount must be less than or Equal to Balance.</font></p>";

    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Check Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$vid=$_REQUEST['vid'];
$stmt1 = "select * from vendor where `vid`= '$vid'";
$stmt_exec1 = mysqli_query($conn,$stmt1);
if ($stmt_exec1-> num_rows > 0)
	 {
		while ($row = $stmt_exec1->fetch_assoc())
		 {
		     $vendor_name = $row['name'];
		 }
	 }
?>
<h1 align="center"><?php echo "$vendor_name";  ?> account</h1>
<input type="button" style="float: left;"  onclick="location.href = 'vendor_history.php?vid=<?php echo "$vid" ?>';" value="Back"/>
<br>
<br>
<br>
<form action ="" method="POST">

<label>Amount :</label><input type="text1" name="amount" width="25px" required>
&nbsp&nbsp&nbsp<label>Date :</label><input type="date" name="date" required>
&nbsp&nbsp&nbsp<label>Comment:</label><input type="text1" name="comment" width="30px" required>
<?php

$stmt = "SELECT sum(total) from invoice where `vid` = '$vid'";
	$payable = mysqli_query($conn,$stmt);
	if($row = $payable->fetch_assoc())
	{
		$payable_amount = ceil($row['sum(total)']);
	}


$stmt1 = "SELECT sum(paid) from paid where `vid` = '$vid'";
	$paid = mysqli_query($conn,$stmt1);
	if($row = $paid->fetch_assoc())
	{
		$paid_amount = ceil($row['sum(paid)']);
	}

	$remaining_amount = $payable_amount - $paid_amount;

?>  
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	
	<label ><b>Balance :</b></label><?php echo " $remaining_amount"; ?>
<br>
<br>
<input type="submit" style="float: left" name="paytovendor" value="Pay to Vendor">

</form>

<?php

$stmt = "SELECT sum(total) from invoice where `vid` = '$vid'";
	$payable = mysqli_query($conn,$stmt);
	if($row = $payable->fetch_assoc())
	{
		$payable_amount = ceil($row['sum(total)']);
	}


$stmt1 = "SELECT sum(paid) from paid where `vid` = '$vid'";
	$paid = mysqli_query($conn,$stmt1);
	if($row = $paid->fetch_assoc())
	{
		$paid_amount = ceil($row['sum(paid)']);
	}

	echo "<br><br><br><br><br><label><b>Payable Amount :</b></label> $payable_amount
	 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php
		<br><label><b>Paid Amount :</b></label> $paid_amount";  
?>   	

<br>
    <table border="1" style ="float:left ;" width= "40%" align="center">
		<th align="center" colspan="12">Payable Account</th>
<tr>
	<th>Invoice</th>
	<th>Payable</th>
	<th>Date</th>
</tr>
	
<?php
$vid=$_REQUEST['vid'];

$stmt = "select * from invoice where `vid`= '$vid' order by date";
$stmt_exec = mysqli_query($conn,$stmt);

	if ($stmt_exec-> num_rows > 0)
	 {
		while ($row = $stmt_exec->fetch_assoc())
		 {
		?>
			
			<tr>
			<td width="200px" align='center'><?php echo $row['invno']; ?></td>
			<td width="200px" align="center"><?php echo $row['total']; ?></td>
			<td width="200px" align='center'><?php echo $row['date']; ?></td>
			</tr>
		<?php
  }
  	echo "</table>";
}
?>


&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

	<table border="1" style ="display: inline-block;" width= "30%" align="center">
		<th align="center" colspan="12">Paid Account</th>

	<tr>
		<th>Paid</th>
		<th>Date</th>
		<th>Comment</th>
	</tr>

		<?php
$vid=$_REQUEST['vid'];

$stmt = "select * from paid where `vid`= '$vid' order by date";
$stmt_exec = mysqli_query($conn,$stmt);

	if ($stmt_exec-> num_rows > 0)
	 {
		while ($row = $stmt_exec->fetch_assoc())
		 {
		?>
			
			<tr>
			<td width="200px" align='center'><?php echo $row['paid']; ?></td>
			<td width="200px" align="center"><?php echo $row['date']; ?></td>
			<td width="200px" align="center"><?php echo $row['comments']; ?></td>
			</tr>
		<?php
  }

}
?>
</table>
</body>
</html>
