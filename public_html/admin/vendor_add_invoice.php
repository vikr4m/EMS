<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "genexp_logic.php";




?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Invoice</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 align="center">Add Invoice</h1>
<form action ="" method="POST">

<?php
$vid=$_REQUEST['vid'];
?>

<label for="invoice">Invoice No. <span class="error"></span> :</label>
<input type="text"  name="invoice" placeholder="Number only" title="Number only" size="30" required><br><br>
 
<label for="descr">Description <span class="error"></span> :</label>
<input type="text"  name="descr" size="30" required><br><br>

<label for="amount">Total Amount <span class="error"></span> :</label>
<input type="text"  name="amount" size="30" required><br><br>

<label for="date">Date <span class="error"></span> :</label>
<input type="date"  name="date" size="30" required><br><br>

<label for="gstp">GST <span class="error"></span> :</label>
<input type="text"  name="gstp" size="30" required> %<br><br>

<label for="tdsp">TDS <span class="error"></span> :</label>
<input type="text"  name="tdsp" size="30" required> %<br><br>
<br><br>
<input type="button" style="float: left;"  onclick="location.href = 'vendor_history.php?vid=<?php echo $vid;?>';" value="Back"/>
<input type="submit"  name="calc" value="Submit">


</form>
</body>
</html>