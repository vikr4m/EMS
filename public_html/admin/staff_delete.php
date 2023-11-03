
<?php
session_start();
include "db_login.php";

$sid=$_REQUEST['sid'];
//var_dump($category_id);


  {
  

                  

                      $delete ="DELETE FROM `login` WHERE `sid`='$sid'";
                  
                      $que=mysqli_query($con,$delete);


                      

                    
      if(isset($que))
       {
        header("location:staff.php");
       }  

  }

?>
            