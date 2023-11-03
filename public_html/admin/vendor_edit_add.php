<?php
error_reporting(E_ERROR | E_PARSE);
  session_start();
  if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}

include "admin_master.php";
include "db_expense.php";
include "genexp_logic.php";

?>

<!DOCTYPE html>
<html>
<head>
  
	<title>Vendor Edit</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
$edit_vendor_form = edit_vendor_form();
foreach ($edit_vendor_form as $value ) 
{
 ?>


<form   action ="" method="POST">
<h1 align="center">Edit Vendor</h1>

<label for="name">Vendor Name <span class="error">*</span> :</label>
<input type="text"  name="name" value="<?php echo $value['name']; ?>" pattern="[A-Z a-z]+" title="Use only alphabets" size="30" required><br><br>
 
<label for="descr">Description <span class="error">*</span> :</label>
<input type="text"  name="descr" value="<?php echo $value['descr']; ?>" size="30" required><br><br>

<label for="contact">Contact no.<span class="error">*</span> : +91 </label>
<input type="text" id="contact" name="contact" value="<?php echo $value['contact']; ?>" pattern="[0-9]{10}" title="10-digit number only" size="10" required><br><br>

<input type="submit" name="edit_vendor" value="Submit">
</form>

<?php
}
?>
</body>
</html>