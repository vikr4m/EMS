
<?php
session_start();
include "db_gandhinagar.php";

$id=$_REQUEST['id'];
//var_dump($category_id);


  {
  

                  

                      $delete ="DELETE FROM `leads` WHERE `id`='$id'";
                  
                      $que=mysqli_query($conn,$delete);


                      

                    
      if(isset($que))
       {
        header("location:gandhinagar_lead.php");
       }  

  }

?>
            