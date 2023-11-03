<?php

    error_reporting(E_ERROR | E_PARSE);
    
session_start();
if(!isset($_SESSION["uid"]))
{
  header("location:../index.php");
}
include "admin_master.php";
include "logic_mehsana.php";

if (isset($_POST['edit_expenditure'])) 
    {
        $id = $_REQUEST['id'];
         $type = $_POST['type'];
         $sub = $_POST['subtype'];
        $description = $_POST['description'];
        $bill =$_POST['bill'];
        $date = $_POST['date'];
        $amount = $_POST['amount'];
        $modeofpay = $_POST['modeofpay'];
        $neftchequeno = $_POST['neft/cheque_no'];
        
        $stmt1 = "UPDATE `expenditure` SET `type` ='$type' , `subtype` ='$sub' , `description` = '$description' , `bill` = '$bill', `date` = '$date' , `amount` = '$amount', `modeofpay` = '$modeofpay' , `neft/cheque_no` = '$neftchequeno'   where `id`= '$id'";

        


        $stmt1_exec = mysqli_query($conn, $stmt1);
        {
        echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>"; 
        }
    }


?>
<!DOCTYPE html>
<html>
<head>  

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#modeofpay").change(function () {
            if ($(this).val() == "neft/cheque_no") {
                $("#neft").removeAttr("disabled");
                $("#neft").focus();
            } else {
                $("#neft").attr("disabled", "disabled");
            }
        });
    });
</script>

    <title>expenditure_add</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
</head>
<body>

<?php
$edit_expenditure_form = edit_expenditure_form();
foreach ($edit_expenditure_form as $value ) 
{
  ?>

<h1 align="center">Edit Expenditure</h1>

<form action ="" method="POST">
Please select type:
<select name="type" required>
    <option value=""> Please select category</option>  
    <?php

    $dropdown = add_expen_category();
    //var_dump($dropdown);
    $result = arraytostring($dropdown,$result_string =null);
    //var_dump($result);
    echo $result;

    ?>
</select><br><br>
<label for="subtype">Subtype :</label>
<input type="text" id="subtype" name="subtype" value="<?php echo $value['subtype']; ?>" size="30" required><br><br>

<label for="date">Date :</label>
<input type="date" id="date" name="date"  value="<?php echo $value['date']; ?>" size="30" required><br><br>

<label for="bill">Bill/Voucher :</label>
<input type="radio"  name="bill" value="bill" <?php if($value['bill']=="bill"){ echo "checked";}?> required>

<label for="bill">Bill</label>
<input type="radio"  name="bill" value="voucher" <?php if($value['bill']=="voucher"){ echo "checked";}?>>
<label for="voucher">Voucher</label>


<div>
<label for="description">Description :</label>
</div>
<textarea name="description" rows="4" cols="50"  required><?php echo $value['description'];?></textarea><br><br>    

<label for="amount">Amount :</label>
<input type="amount" id="amount" name="amount" value="<?php echo $value['amount']; ?>"size="30" required><br><br>  
  
Mode of payment :  
<select name="modeofpay" id="modeofpay" required>
     <option >--Please Select--</option>
    <option value="cash">Cash</option>
    <option value="neft/cheque_no">NEFT/Cheque No.</option>
</select>
<br />
<br />
NEFT/Cheque No. :
<input type="text" id="neft"  name="neft/cheque_no" value="<?php echo $value['neft/cheque_no']; ?>" disabled="disabled" required/>
<br>
<br>
<!-- <label for="b_name">Bank Name :</label>
<input type="b_name" id="b_name" name="b_name" size="30" /><br><br>  -->

<input type="button" style="float: left;"  onclick="location.href = 'mehsana_expenditure.php';" value="Back"/>

<input type="submit" name="edit_expenditure" value="Submit"/>
</form>
<?php
}
?>
</body>
</html>