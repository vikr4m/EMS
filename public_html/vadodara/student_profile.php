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
<br>
<input type="submit" style="float: left;"  onclick="location.href = 'student.php';" value="Back"/>
<?php
$sid=$_REQUEST['sid'];
?>

<input type="submit" style="float: right;" onclick=" location.href='fees_add.php?sid=<?php echo $sid ?>'"; value="Add Fees"/>
<br>
<br>
<h2>Students Personal Information</h2>
<?php
$student_profile = student_profile();
foreach ($student_profile as $value ) 
{
  ?>
 <table border="0" style = "border-collapse : collapse;" width = 80%  cellspacing="2" cellpadding="2" >
  
  <tr>
    <td> <strong><label>Student Name:-</label></strong> <?php echo $value['sname']; ?><br></td>
    <td> <strong><label>Guardian Name:-</label></strong> <?php echo $value['gname']; ?><br></td>
  </tr>
  
  <tr>
  <td><strong><label>Gender:-</label></strong> <?php echo $value['gender']; ?><br></td>
  <td><strong><label>Contact no:-</label></strong> <?php echo $value['wcontact']; ?><br></td>
  </tr>

  <tr>  
  <td><strong><label>DOB:-</label></strong> <?php echo $value['dob']; ?><br></td>
  <td><strong><label>DOJ:-</label></strong> <?php echo $value['doj']; ?><br></td>
  </tr>
      
  <tr>
  <td><strong><label>Program:-</label></strong> <?php echo $value['programme']?><br></td>
  <td><strong><label>Email id:-</label></strong> <?php echo $value['email']; ?><br></td>
  </tr>
  
    <tr>
  <td><strong><label>Address:-</label></strong><?php echo $value['cor_address'];
   
}
?>
</td>
</tr>   



 <table border="1" style = "border-collapse : collapse;" width = 70%  cellspacing="2" cellpadding="2" align="center"><br>
  <th align="center" colspan="4"> Fees Information</th>
<tr>
  <th align="center">Id</th>
  <th align="center">Total Fees</th>
  <th align="center">Fees Paid</th>
  <th align="center">Fees Remaining</th>
</tr>    

<h2 >Fees Information </h2>   

<?php

$i=1;
$fees = "SELECT * FROM student WHERE sid='$sid'";
$fees_execution = mysqli_query($conn, $fees); 
if($row=mysqli_fetch_assoc($fees_execution)) 
  
?>
      <tr>
          <td align="center"><?php echo $i;  ?></td> 
          <td align="center"><?php echo $row['fee_t']; ?></td>
          <td align="center"><?php echo $row['fee_p']; ?></td>
          <td align="center"><?php echo $row['fee_r']; ?></td> 
      </tr>

 
</table>








<h2 >Add New Book </h2>     
<?php
include "inventory_logic.php";
?>

<form  action="" method="post">
  <br><br>
  Select Program :
<select name="program">
  <option >--Please Select Program--</option> 
  <option value="UPSC">UPSC</option>
  <option value="GPSC">GPSC</option>
  <option value="IBPS">IBPS</option>
</select>

<input type="submit" value="Search">

<br>
<br>

        <label>Book Name :</label>
          <select name="book_name" >


<?php

$dropdown = add_category();
//print_r($dropdown);
$result = arraytostring($dropdown,$result_string=null);

echo $result;

//print_r($result);
//echo $result;
//print_r($dropdown);*/

?>

</select>
  <input type="submit" name="add" value="ADD"/>

<br>
<h2 align="center">Students Book Information</h2>
<table border="1"  style="border-collapse: collapse;" align="center" width="50%">
  <tr>
    <th align="center">Sr. No.</th>
    <th align="center">Book Name</th>
    <th align="center">Actions</th>
  </tr>
  <?php
  $i =1;
    $array = book_table();
    foreach ($array as $value) {
      
    
  ?>

  <tr>
    <td align="center"><?php echo $i; $i++ ?></td>
    <td align="center"><?php echo $value['book_name']; ?></td>
    <td align="center">
                <a onclick='confirmremove();return false;' href="remove.php?bno=<?php echo $value['bno']?> "><font color=red>Remove</font></a>
    </td>        
  </tr>

  <?php
  }
  ?>
</table>
<br><br><br>
<script>
function confirmremove()
{
   var conf = confirm('Do you want to remove this book from record?');
   if(conf)
     {
       header("location:remove.php");
     }
  
}
</script>


</form>

</body>
</html>
