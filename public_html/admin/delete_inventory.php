<?php

session_start();
include "db_inventory.php";

$id=$_REQUEST['book_id'];
//var_dump($category_id);


  {
  

                  

                      $delete ="DELETE FROM `anand` WHERE `abook_id`='$id' ";
                      $delete1 ="DELETE FROM `ahmedabad` WHERE `book_id`='$id' ";
                      $delete2 ="DELETE FROM `gandhinagar` WHERE `book_id`='$id' ";
                      $delete3 ="DELETE FROM `mehsana` WHERE `book_id`='$id' ";
                      $delete4 ="DELETE FROM `rajkot` WHERE `book_id`='$id' ";
                      $delete5 ="DELETE FROM `surat` WHERE `book_id`='$id' ";
                      $delete6 ="DELETE FROM `vadodara` WHERE `book_id`='$id' ";
                      
                      $que=mysqli_query($conn,$delete);
                      $que1=mysqli_query($conn,$delete1);
                      $que2=mysqli_query($conn,$delete2);
                      $que3=mysqli_query($conn,$delete3);
                      $que4=mysqli_query($conn,$delete4);
                      $que5=mysqli_query($conn,$delete5);
                      $que6=mysqli_query($conn,$delete6);
                    

                      

                    
      if(isset($que6))
       {
        header("location:masterinventory_add.php");
       }  

  }
?>