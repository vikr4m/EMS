
<?php
session_start();
include "db_vadodara.php";

$id=$_REQUEST['id'];
//var_dump($category_id);


  {
  

                  

                      $delete ="DELETE FROM `leads` WHERE `id`='$id'";
                  
                      $que=mysqli_query($conn,$delete);


                      

                    
      if(isset($que))
       {
        header("location:vadodara_lead.php");
       }  

  }

?>
            