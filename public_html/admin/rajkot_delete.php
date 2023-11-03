
<?php
session_start();
include "db_rajkot.php";

$sid=$_REQUEST['sid'];
//var_dump($category_id);


  {
  

                  

                      $delete ="DELETE FROM `student` WHERE `sid`='$sid'";
                  
                      $que=mysqli_query($conn,$delete);


                      

                    
      if(isset($que))
       {
        header("location:rajkot_student.php");
       }  

  }

?>
            