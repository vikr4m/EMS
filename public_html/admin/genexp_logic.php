<?php
include "db_expense.php";
if(isset($_POST['add_vendor']))
{
  $name = $_POST['name'];
  $descr = $_POST['descr'];
  $contact = $_POST['contact'];

  $stmt= "INSERT into vendor (`name` ,`descr` ,`contact`) VALUES ('$name','$descr', '$contact')";
        //var_dump($stmt);
          $stmt_query = mysqli_query($conn,$stmt);
          {
			header("location:genexpdisp.php");
			echo "<p align='center'><font color=green> Vendor Added Successfully</font></p>";
          }


}

if(isset($_POST['edit_vendor']))
{

  $vid = $_REQUEST['vid'];
  ////var_dump($vid);

  $name = $_POST['name'];
  $descr = $_POST['gname'];
  $contact = $_POST['contact'];


  $update = " UPDATE `vendor` SET `name` = '$name' , `descr` = '$descr' , `contact` = '$contact' WHERE `vid` = '$vid' ";

      ////var_dump($update);
          $stmt_query = mysqli_query($conn,$update);
      
      ////var_dump($stmt_query);
          {
               echo "<p align='center'><font color=green> Your Records have been Updated Successfully</font></p>";
          }
}

function edit_vendor_form()
{
  global $conn;
  $vid=$_REQUEST['vid'];

  $table_query = "SELECT * FROM vendor where `vid` ='$vid'";
  ////var_dump($my);
 //var_dump($table_query);
    if ($result =$conn->query($table_query))
    {
      while ($row = $result->fetch_assoc())
      
        {
          
     $data[] = array('name' => $row['name'], 'descr' => $row['descr'], 'contact' => $row['contact']); 
        }       

                              //echo '<pre>'; print_r($data);

    }
    
return $data;
}


if(isset($_POST['calc']))
{

  $vid = $_REQUEST['vid'];

  $descr = $_POST['descr'];
  $invo= $_POST['invoice'];
  $date = $_POST['date'];
  $amount = $_POST['amount'];
  $gstp = $_POST['gstp'];
  $tdsp = $_POST['tdsp'];

  $gst = $amount-(($amount/(100+$gstp))*100);
  $tds = (($amount-$gst)*($tdsp/100));

  $total = $amount-$tds;

  $stmt= "INSERT into invoice (`vid` ,`invno`,`date`,`descr`, `amount`,`gstp`, `tdsp`,`gst`, `tds`, `total`) VALUES ('$vid','$invo','$date', '$descr', '$amount', '$gstp', '$tdsp', '$gst', '$tds' ,'$total')";
        //var_dump($stmt);
          $stmt_query = mysqli_query($conn,$stmt);
          {
            header("location:vendor_history.php");
            echo "<p align='center'><font color=green> Invoice Added Successfully</font></p>";
            echo "Payable amount:$total";

          }

}


?>