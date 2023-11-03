<?php
session_start();
include "db_expense.php";

$vid=$_REQUEST['vid'];
//var_dump($category_id);


  {
  

                  

                      $delete ="DELETE FROM `vendor` WHERE `vid`='$vid'";
                  
                      $que=mysqli_query($conn,$delete);


                      

                    
      if(isset($que))
       {
		header("location:genexpdisp.php");
		echo "<p align='center'><font color=red> Vendor Deleted Successfully</font></p>";
       }  

  }

?>
            