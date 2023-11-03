<?php
error_reporting(E_ERROR | E_PARSE);
include "db.php";
include "staff_master.html";


if(isset($_POST['add_fees']))
{
  
$sid=$_REQUEST['sid'];
$total_fees = "SELECT * FROM student WHERE sid='$sid'";

$total_fees_executed = mysqli_query($conn,$total_fees);
if($rowed =mysqli_fetch_assoc($total_fees_executed))
  {
    $fee_t = $rowed['fee_t'];
    $fee_p = $rowed['fee_p'];
    $fee_r = $rowed['fee_r'];    
  }

{
  
  $sql= "SELECT * FROM student WHERE sid='$sid'";
   $res = mysqli_query($conn,$sql);
  if($row=mysqli_fetch_assoc($res))
     
     {
  $name = $row['sname'];    
  $fee_t = $row['fee_t'];
     }
  
  $amount = $_POST['amount'];
  $date = $_POST['date'];

  $modeofpayment = $_POST['modeofpayment']; 
  $neftcheque_no = $_POST['neft/cheque_no'];  

  
    
 if (empty($_POST['amount'])) 
      {
        echo "<p align='center'><font color=red> Required Field Amount</font></p>";
      } 
    else
      {      
       
       $total = $amount ;
       $fees_r = $total + $fee_p;
       $remaining_fees = $fee_r - $total;

       if($remaining_fees <0)
       {
        echo "<p align='center'><font color=red> Please enter Amount less than or equal to Remaining Fees.</font></p>";
       }
       elseif($total < 0)
       {
          echo "<p align='center'><font color=red> Please enter Amount greater than 0.</font></p>";
       }
    else
    {
        
        
       $stmt1 = "UPDATE student SET fee_p = '$fee_p' + '$total', fee_r = '$fee_t' - '$fees_r' where sid= '$sid'";
       $stmt_query1 = mysqli_query($conn,$stmt1);
        
    


        $stmt= " INSERT into fees_receipt (sid, name , amount , date , modeofpay,cheque_neftno ) VALUES ('$sid', '$name' ,'$amount', '$date' ,'$modeofpayment', '$neftcheque_no')";



          $stmt_query = mysqli_query($conn,$stmt);
      
          {
            header("location:invoice.php?sid= $sid ");
          }
      }
     }
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#modeofpayment").change(function () {
            if ($(this).val() == "neft/cheque") {
                $("#neft").removeAttr("disabled");
                $("#neft").focus();
            } else {
                $("#neft").attr("disabled", "disabled");
            }
        });
    });
</script>
  <title>fees_add</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form action =" " method="POST">
<h1 align="center">Fees Receipt Generation</h1>

<?php

$sid=$_REQUEST['sid'];
$total_fees = "SELECT * FROM student WHERE sid='$sid'";

$total_fees_executed = mysqli_query($conn,$total_fees);
if($rowed =mysqli_fetch_assoc($total_fees_executed))
  {

    echo "<b>Remaining Fees :- " . $rowed["fee_r"]. "</b><br><br>";   
  }

?>

<label for="amount">Amount :</label>
<input type="text"  name="amount" size="30" required><br><br>

<label for="date">Date :</label>
<input type="date"  name="date" size="10" required><br><br>


Mode of payment :  
<select name="modeofpayment" id="modeofpayment">
    <option value="cash">Cash</option>
    <option value="neft/cheque">NEFT/Cheque</option>
</select>
<br />
<br />
NEFT/Cheque No. :
<input type="text" id="neft" name="neft/cheque_no" disabled="disabled" />
<br>
<br>

<input type="submit" name="add_fees" value="Add fees">
</form>
</body>
</html>

